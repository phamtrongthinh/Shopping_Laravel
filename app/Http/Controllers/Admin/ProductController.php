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
        $query = Product::query();

        $search = $request->search; // Lấy từ khóa tìm kiếm từ request

        if (!empty($search)) {
            $query->whereRaw("name REGEXP '[[:<:]]" . $search . "[[:>:]]'");
        }

        $product= $query->orderBy('id', 'desc')->paginate(8);       

        return view('admin.products.index', [
            'title' => 'Quản lý sản phẩm',
            'product' => $product,
            'page' => $request->query('page') // truyền page xuống view
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
            } else {
                $absoluteImagePath = null;
            }
            // Lưu sản phẩm mới
            $product = Product::create([
                'name' => $validatedData['name'],
                'image' => $absoluteImagePath,
                'description' => $validatedData['description'],               
                'category_id' => $validatedData['category_id'],
                'hot' => $request->input('hot'),
                'gender' => $request->input('gender') ?? 'unisex',
                'status' => $validatedData['status'],
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Thêm danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm sản phẩm thất bại. ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
    
        return view('admin.products.edit', [
            'title' => 'Quản lý sản phẩm',
            'product' => $product,
            'categories' => $categories,
           'page' => $request->page
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
                'category_id' => $validatedData['category_id'],
                'hot' => $request->input('hot'),
                'gender' => $request->input('gender') ?? 'unisex',
                'status' => $validatedData['status'],
                'image' => $imageName, // Sử dụng $imageName, đường dẫn mới hoặc cũ.
            ]);

            return redirect()->route('admin.products.index', [
               'page' => $request->page
            ])->with('success', 'Cập nhật sản phẩm thành công!');           
          
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi cập nhật sản phẩm: ' . $e->getMessage());
        }
    }



    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index', ['page' => $request->page])->with('success', 'Xóa sản phẩm thành công');
    }
}
