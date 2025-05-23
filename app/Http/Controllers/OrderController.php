<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $cart = Cart::where('user_id', Auth::id())->with('cartItems.productDetail.product')->first();

            if (!$cart || $cart->cartItems->isEmpty()) {
                return response()->json([
                    'code' => 400,
                    'html' => 'Giỏ hàng trống.',
                ]);
            }

            // Kiểm tra tồn kho trước
            foreach ($cart->cartItems as $item) {
                $productDetail = $item->productDetail;

                if (!$productDetail || $item->quantity > $productDetail->quantity) {
                    return response()->json([
                        'code' => 400,
                        'html' => 'Sản phẩm "' . $item->product_name . '" không đủ số lượng trong kho. Chỉ còn ' . $productDetail->quantity . ' sản phẩm.',
                    ]);
                }
            }

            $totalAmount = $cart->cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $shippingAddress = $request->address . ', ' . $request->ward . ', ' . $request->district . ', ' . $request->province;

            $order = Order::create([
                'user_id' => Auth::id(),
                'staff_id' => null,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'note' => $request->note ?? null,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            foreach ($cart->cartItems as $item) {
                // Trừ số lượng tồn kho
                $productDetail = $item->productDetail;
                $productDetail->quantity -= $item->quantity;
                $productDetail->save();

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_detail_id' => $item->product_detail_id,
                    'product_name' => $item->product_name,
                    'color_name' => $item->color_name,
                    'size' => $item->size,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                ]);
            }

            $cart->cartItems()->delete();
            DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    'code' => 200,
                    'redirect' => route('orders.index') . '?success=' . urlencode('Đặt hàng thành công!')
                ]);
            }

            return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'html' => 'Lỗi đặt hàng: ' . $e->getMessage(),
            ]);
        }
    }


    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.order', compact('orders'));
    }

    public function show($id)
    {
        // Eager load các quan hệ 'orderItems', 'province', 'district', 'ward'
        $order = Order::with(['orderItems', 'provinceRelation', 'districtRelation', 'wardRelation'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('frontend.order_detail', compact('order'));
    }

    public function cancelRequest(Request $request)
    {
        $order = Order::where('id', $request->order_id)
            ->where('user_id', auth()->id())
            ->where('status', 'pending')
            ->firstOrFail();

        $order->update([
            'status' => 'cancel_requested',
            'note2' => $request->cancel_reason,
        ]);

        // Đánh dấu đã gửi yêu cầu trong session
        $cancelledOrders = session('cancel_requested_orders', []);
        $cancelledOrders[] = $order->id;
        session(['cancel_requested_orders' => $cancelledOrders]);

        return back()->with('success', 'Đã gửi yêu cầu huỷ đơn hàng.');
    }


    //-------------------------------------------------------Admin------------------------------------------------
    // Hiển thị danh sách đơn hàng
    public function Admin_index(Request $request)
    {
        $query = Order::query();

        // Tìm kiếm theo mã đơn hàng hoặc tên khách hàng
        if ($request->search) {
            $query->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('fullname', 'like', '%' . $request->search . '%');
        }

        // Lọc theo trạng thái đơn hàng
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(5);


        return view('admin.orders.index', [
            'orders' => $orders,
            'title' => 'Quản lý đơn hàng',
        ]);
    }

    // Hiển thị chi tiết đơn hàng
    public function Admin_show($id)
    {
        $order = Order::with('orderDetails.product', 'wardRelation', 'districtRelation', 'provinceRelation')->findOrFail($id);
        return view('admin.orders.show', [
            'order' => $order,
            'title' => 'Chi tiết đơn hàng',
        ]);
    }

    public function Admin_edit($id)
    {
        $order = Order::findOrFail($id);

        // Nếu đơn hàng đã in thì không cho chỉnh sửa
        if ($order->printed) {
            return redirect()->route('admin.orders.show', $id)->with('error', 'Đơn hàng đã in phiếu, không thể chỉnh sửa.');
        }
        // Nếu đơn hàng đã huỷ thì không cho chỉnh sửa
        if ($order->status === 'cancelled') {
            return redirect()->route('admin.orders.show', $id)->with('error', 'Đơn hàng đã bị huỷ, không thể chỉnh sửa.');
        }

        return view('admin.orders.edit', [
            'order' => $order,
            'title' => 'Cập nhật đơn hàng',
        ]);
    }


    public function Admin_updateStatus(Request $request, $id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|in:pending,processing,shipping,completed,cancelled,cancel_requested',
        ]);

        $order->status = $validatedData['status'];

        // Ghi timestamp tương ứng nếu chưa có
        switch ($order->status) {
            case 'processing':
                if (!$order->processing_at) {
                    $order->processing_at = now();
                }
                break;
            case 'shipping':
                if (!$order->shipping_at) {
                    $order->shipping_at = now();
                }
                break;
            case 'completed':
                if (!$order->completed_at) {
                    $order->completed_at = now();
                }
                break;
            case 'cancelled':
                if (!$order->cancelled_at) {
                    $order->cancelled_at = now();
                }

                // Tăng lại số lượng tồn kho
                foreach ($order->orderDetails as $item) {
                    $productDetail = \App\Models\ProductDetail::find($item->product_detail_id);
                    if ($productDetail) {
                        $productDetail->quantity += $item->quantity;
                        $productDetail->save();
                    }
                }
                break;
        }

        if ($request->has('shop_note')) {
            $order->note3 = $request->input('shop_note');
        }

        $order->save();

        return redirect()->route('admin.orders.show', $id)->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function Admin_print($id)
    {
        $order = Order::with('orderDetails.product', 'wardRelation', 'districtRelation', 'provinceRelation')->findOrFail($id);

        // Chỉ cho in nếu đơn hàng đã hoàn thành
        if ($order->status !== 'completed') {
            return redirect()->back()->with('error', 'Chỉ có thể in phiếu cho đơn hàng đã hoàn thành.');
        }
        // Nếu chưa in thì đánh dấu đã in
        if (!$order->printed) {
            $order->printed = true;
            $order->save();
        }

        return view('admin.orders.print', [
            'order' => $order,
            'title' => 'In phiếu đơn hàng',
        ]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Chỉ cho phép xóa nếu trạng thái là completed hoặc cancelled
        if (!in_array($order->status, ['completed', 'cancelled'])) {
            return redirect()->route('admin.orders.index')->with('error', 'Chỉ được xóa đơn hàng đã hoàn thành hoặc đã huỷ.');
        }

        // Xóa mềm nếu có dùng SoftDeletes, hoặc xóa vĩnh viễn
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}
