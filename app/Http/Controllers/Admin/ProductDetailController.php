<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($productId)
    {
        // Lấy thông tin sản phẩm
        $product = Product::findOrFail($productId);

        // Lấy các chi tiết của sản phẩm
        $details = ProductDetail::where('product_id', $productId)->get();


        return view('admin.product_details.index', [
            'title' => 'Quản lý chi tiết sản phẩm'
        ], compact('product', 'details'));
    }

    public function create(Product $product)
    {
        // Truyền thông tin sản phẩm đến view
        $colors = Color::all(); // Lấy tất cả các màu sắc từ cơ sở dữ liệu
        return view('admin.product_details.create', [
            'title' => 'Quản lý chi tiết sản phẩm'
        ], compact('product', 'colors'));
    }
}
