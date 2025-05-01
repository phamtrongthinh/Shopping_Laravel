<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductDetail;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // dd($request->all());
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
            $price = str_replace('.', '', $request->price); // xử lý trước
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'product_detail_id' => $productDetail->id,
                'product_name' => $request->product_name,
                'colorid' => $request->colorid, // Lưu tên màu
                'size' => $request->size,      // Lưu tên size
                'price' => $price,              // dùng biến đã xử lý // "349.000" => "349000"
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng.'], 200);
    }

    public function index()
    {
        // Lấy giỏ hàng của người dùng đang đăng nhập
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first(); // Lấy giỏ hàng của người dùng

        // Nếu giỏ hàng không tồn tại, tạo một giỏ hàng mới
        if (!$cart) {
            $cart = Cart::create(['user_id' => $userId]);
        }

        // Lấy các sản phẩm trong giỏ hàng
        $cartItems = $cart->cartItems; // Giả sử bạn đã định nghĩa mối quan hệ trong model Cart
        $provinces = Province::orderBy('name')->get(); // Lấy tất cả tỉnh, sắp xếp theo tên         

        return view('frontend.cart', compact('cartItems', 'provinces'));
    }
    public function remove($id)
    {

        $cartItem = CartItem::find($id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }



    public function count()
    {
        if (!auth()->check()) {
            return response()->json(['count' => 0]);
        }

        $userId = auth()->id();

        // Truy vấn để lấy tổng quantity từ bảng cart_items
        $count = DB::table('cart_items')
            ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
            ->where('carts.user_id', $userId)
            ->sum('cart_items.quantity');

        return response()->json(['count' => $count]);
    }


    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Lấy CartItem theo ID
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Tính tổng tiền toàn bộ giỏ hàng của user hiện tại thông qua Cart
        $cart = Cart::where('user_id', Auth::id())->first(); // Lấy giỏ hàng của user

        // Nếu tìm thấy giỏ hàng, tính tổng tiền các item trong giỏ hàng
        if ($cart) {
            // Lấy tổng số tiền cho tất cả cartItems của giỏ hàng này
            $total = $cart->cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
        } else {
            $total = 0; // Nếu không có giỏ hàng, tổng tiền là 0
        }

        // Trả về kết quả
        return response()->json([
            'success' => true,
            'itemTotal' => $cartItem->price * $cartItem->quantity,
            'total' => $total,
        ]);
    }
}
