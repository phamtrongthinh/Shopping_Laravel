<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductDetailRequest;
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
        // $productDetailscolor = $product->productDetails()->with('color')->get();


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

    public function store(StoreProductDetailRequest $request, $productId)
    {
        // Lấy dữ liệu từ form sau khi đã được xác thực
        $validated = $request->validated();

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu ảnh vào thư mục 'public/images'
        } else {
            $imagePath = null;
        }

        // Tạo chi tiết sản phẩm mới và lưu vào cơ sở dữ liệu
        ProductDetail::create([
            'product_id' => $productId,
            'color_id' => $validated['colorselect'],
            'size' => $validated['size'],
            'quantity' => $validated['quantities'],
            'image' => $imagePath,  // Lưu đường dẫn ảnh
        ]);

        return redirect()->route('admin.product_details.index', ['product' => $productId])
            ->with('success', 'Chi tiết sản phẩm đã được thêm thành công.');
    }
}
