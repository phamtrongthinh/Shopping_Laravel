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
            // Lấy giỏ hàng của người dùng hiện tại
            $cart = Cart::where('user_id', Auth::id())->with('cartItems.productDetail.product')->first();

            // Kiểm tra giỏ hàng trống
            if (!$cart || $cart->cartItems->isEmpty()) {
                return back()->with('error', 'Giỏ hàng trống.');
            }

            // Tính tổng giá trị đơn hàng
            $totalAmount = $cart->cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            // Xử lý địa chỉ giao hàng
            $shippingAddress = $request->address . ', ' . $request->ward . ', ' . $request->district . ', ' . $request->province;

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => Auth::id(),
                'staff_id' => null, // Nếu có staff_id liên kết
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'note' => $request->note ?? null,
                'total_amount' => $totalAmount,
                'status' => 'pending', // Trạng thái đơn hàng
            ]);
           

            // Lưu các sản phẩm trong giỏ hàng vào OrderItems
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

            // Xoá giỏ hàng sau khi đặt hàng
            $cart->cartItems()->delete();

            // Xác nhận giao dịch
            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            // Nếu có lỗi, rollback giao dịch
            DB::rollBack();
            dd($e->getMessage()); // Debug lỗi
            return back()->with('error', 'Lỗi đặt hàng: ' . $e->getMessage());
        }
    }
}
