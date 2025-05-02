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

            // Nếu request là AJAX thì trả JSON
            if ($request->ajax()) {
                return response()->json([
                    'code' => 200,
                    'redirect' => route('orders.index') . '?success=' . urlencode('Đặt hàng thành công!')
                ]);
                
            }

            // Nếu không phải AJAX thì redirect như bình thường
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
        $order = Order::with('orderItems')->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('frontend.order_detail', compact('order'));
    }
}
