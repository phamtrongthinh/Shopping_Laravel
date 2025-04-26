<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');

        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        // Kiểm tra xem đã like chưa
        $like = Like::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->first();

        if ($like) {
            // Nếu đã like → unlike (xóa like)
            $like->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            // Nếu chưa like → like (tạo mới)
            Like::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            return response()->json(['status' => 'liked']);
        }
    }

    public function count()
    {
        if (auth()->check()) {
            // Giả sử user có quan hệ likes() với bảng likes
            return response()->json([
                'count' => auth()->user()->likes()->count(),
            ]);
        }

        return response()->json(['count' => 0]);
    }
    public function favorites()
    {
        // Lấy danh sách sản phẩm mà user đã yêu thích
        $user = auth()->user();
        if ($user) {
            $dataproduct = Product::whereHas('likes', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        } else {
            $dataproduct = collect(); // Nếu không đăng nhập, trả về một tập rỗng
        }

        return view('frontend.list_like', compact('dataproduct'));
    }
}
