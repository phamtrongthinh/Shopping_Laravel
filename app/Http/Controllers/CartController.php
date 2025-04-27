<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'colorid' => 'required',
            'size' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'product_name' => 'required|string',
           
           
        ]);

        // Tìm product_detail_id dựa vào product_id + color_id + size_id
        $productDetail = ProductDetail::where('product_id', $request->product_id)
            ->where('color_id', $request->colorid)
            ->where('size', $request->size)
            ->first();

        if (!$productDetail) {
            return response()->json(['message' => 'Không tìm thấy chi tiết sản phẩm phù hợp.'], 404);
        }

        // Tạo giỏ hàng nếu chưa có
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng (cùng chi tiết) thì cộng dồn số lượng
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_detail_id', $productDetail->id)
            ->first();

        if ($cartItem) {
            // Nếu đã có thì cộng thêm số lượng
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Nếu chưa có thì tạo mới
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'product_detail_id' => $productDetail->id,
                'product_name' => $request->product_name,
                'colorid' => $request->colorid, // Lưu tên màu
                'size' => $request->size,      // Lưu tên size
                'price' => $request->price,
                'quantity' => $request->quantity,
                
            ]);
        }

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng.'], 200);
    }
}
