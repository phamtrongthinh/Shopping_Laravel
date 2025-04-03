<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {

        $categories = Category::all(); // Hoặc có thể sử dụng logic lọc danh mục        
        return view('admin.products.add', ['title' => 'Tạo danh sản phẩm'],compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            // dd($request->all());
            // Tạo danh mục mới
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'active' => $request->active ?? 1, // Nếu không có giá trị, mặc định là 1
            ]);
            return redirect()->route('admin.categorys.index')->with('success', 'Thêm danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm danh mục thất bại. ' . $e->getMessage());
        }
    }
}
