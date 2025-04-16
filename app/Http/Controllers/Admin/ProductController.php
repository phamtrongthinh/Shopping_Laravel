<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::orderBy('id', 'desc')->paginate(5);


        return view('admin.products.index', [
            'title' => 'Quản lý sản phẩm',
            'product' => $product,

        ]);
    }

    public function add()
    {
        $categories = Category::all(); // Hoặc có thể sử dụng logic lọc danh mục        
        $colors = Color::all(); // Lấy tất cả các màu sắc từ cơ sở dữ liệu
        return view('admin.products.add', ['title' => 'Quản lý sản phẩm'], compact('categories', 'colors'));
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
                // Tạo đường dẫn tuyệt đối
                $absoluteImagePath = 'uploads/products/' . $imageName;
            }
            // Lưu sản phẩm mới
            $product = Product::create([
                'name' => $validatedData['name'],
                'image' => $absoluteImagePath,
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'sale' => $validatedData['sale'] ?? 0,
                'category_id' => $validatedData['category_id'],
                'hot' => $request -> input('hot'),
                'status' => $validatedData['status'],
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Thêm danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm sản phẩm thất bại. ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Hoặc có thể sử dụng logic lọc danh mục
        return view('admin.products.edit', [
            'title' => 'Quản lý sản phẩm',
            'product' => $product,
            'categories' => $categories,
        ]);
    }
    public function update(ProductStoreRequest $request, $id)
    {
        $validatedData = $request->validated();
    
        try {
            $product = Product::findOrFail($id);
    
            $imageName = $product->image; // Giữ ảnh cũ nếu không chọn ảnh mới
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                // Tạo đường dẫn tuyệt đối
                $imageName = 'uploads/products/' . $imageName;
            }
    
            $product->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'sale' => $validatedData['sale'] ?? 0,
                'category_id' => $validatedData['category_id'],
                'hot' => $request->input('hot'),
                'status' => $validatedData['status'],
                'image' => $imageName, // Sử dụng $imageName, đường dẫn mới hoặc cũ.
            ]);
    
            return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi cập nhật sản phẩm: ' . $e->getMessage());
        }
    }



    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
