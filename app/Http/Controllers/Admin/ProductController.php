<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {
        $categories = Category::all(); // Hoặc có thể sử dụng logic lọc danh mục        
        $colors = Color::all(); // Lấy tất cả các màu sắc từ cơ sở dữ liệu
        return view('admin.products.add', ['title' => 'Tạo danh sản phẩm'], compact('categories', 'colors'));
    }

    public function store(ProductStoreRequest $request)
    {
        // Dữ liệu đã được xác thực
        $validatedData = $request->validated();
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
            }
            // Lưu sản phẩm mới
            $product = Product::create([
                'name' => $validatedData['name'],
                'image' => $imageName,
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'sale' => $validatedData['sale'] ?? 0,
                'category_id' => $validatedData['category_id'],
                'status' => $validatedData['status'],
            ]);

            return redirect()->route('admin.categorys.index')->with('success', 'Thêm danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm sản phẩm thất bại. ' . $e->getMessage());
        }
    }
}
