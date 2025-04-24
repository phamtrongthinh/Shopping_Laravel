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
            'title' => 'Quản lý sản phẩm'
        ], compact('product', 'details'));
    }

    public function create(Product $product)
    {
        // Truyền thông tin sản phẩm đến view
        $colors = Color::all(); // Lấy tất cả các màu sắc từ cơ sở dữ liệu
        return view('admin.product_details.create', [
            'title' => 'Quản lý sản phẩm'
        ], compact('product', 'colors'));
    }

    public function store(StoreProductDetailRequest $request, $productId)
    {
        $validated = $request->validated();

        // Kiểm tra trùng lặp color_id và size cho cùng product_id
        $exists = ProductDetail::where('product_id', $productId)
            ->where('color_id', $validated['colorselect'])
            ->where('size', $validated['size'])
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['duplicate' => 'Đã tồn tại sản phẩm với màu và size này vui lòng chỉ cập nhập!'])
                ->withInput();
        }

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product_details'), $fileName);
            $imagePath = 'uploads/product_details/' . $fileName;
        } else {
            $imagePath = null;
        }

        ProductDetail::create([
            'product_id' => $productId,
            'color_id' => $validated['colorselect'],
            'size' => $validated['size'],
            'price' => $validated['price'],
            'sale' => $validated['sale'] ?? 0,
            'quantity' => $validated['quantities'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.product_details.index', ['product' => $productId])
            ->with('success', 'Chi tiết sản phẩm đã được thêm thành công.');
    }


    public function edit($productId, $detailId)
    {
        // Tìm sản phẩm và chi tiết sản phẩm
        $product = Product::findOrFail($productId);
        $detail = ProductDetail::where('product_id', $productId)->findOrFail($detailId);
        $colors = Color::all(); // Lấy tất cả các màu sắc từ cơ sở dữ liệu

        // Trả về view sửa chi tiết sản phẩm
        return view('admin.product_details.edit', [
            'title' => 'Quản lý sản phẩm'
        ], compact('product', 'detail', 'colors'));
    }
    public function update(StoreProductDetailRequest $request, $productId, $detailId)
    {
        // Tìm chi tiết sản phẩm
        $detail = ProductDetail::where('product_id', $productId)->findOrFail($detailId);
    
        // Lấy dữ liệu đã validate từ form
        $validated = $request->validated();
    
        // Kiểm tra xem có bản ghi trùng màu + size (nhưng khác ID) không
        $exists = ProductDetail::where('product_id', $productId)
            ->where('color_id', $validated['colorselect'])
            ->where('size', $validated['size'])
            ->where('id', '!=', $detailId) // bỏ qua chính bản ghi đang update
            ->exists();
    
        if ($exists) {
            return redirect()->back()
                ->withErrors(['duplicate' => 'Đã tồn tại sản phẩm với màu và size này, vui lòng chọn thông tin khác.'])
                ->withInput();
        }
    
        // Cập nhật thông tin
        $detail->color_id = $validated['colorselect'];
        $detail->size = $validated['size'];
        $detail->price = $validated['price'];
        $detail->sale = $validated['sale'] ?? 0;
        $detail->quantity = $validated['quantities'];
    
        // Nếu có ảnh mới
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product_details'), $imageName);
            $detail->image = 'uploads/product_details/' . $imageName;
        }
    
        // Lưu lại
        $detail->save();
    
        return redirect()->route('admin.product_details.index', ['product' => $productId])
            ->with('success', 'Chi tiết sản phẩm đã được cập nhật!');
    }
    

    public function destroy($productId, $detailId)
    {
        // Tìm sản phẩm và chi tiết sản phẩm
        $product = Product::findOrFail($productId);
        $detail = ProductDetail::where('product_id', $productId)->findOrFail($detailId);

        // Xóa chi tiết sản phẩm
        $detail->delete();

        return redirect()->route('admin.product_details.index', $productId)
            ->with('success', 'Chi tiết sản phẩm đã được xóa!');
    }
}
