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
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Đặt tên file (có timestamp tránh trùng)
            $file->move(public_path('uploads/product_details'), $fileName); // Di chuyển file

            $imagePath = 'uploads/product_details/' . $fileName; // Lưu đường dẫn tương đối để hiển thị
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


    public function edit($productId, $detailId)
    {
        // Tìm sản phẩm và chi tiết sản phẩm
        $product = Product::findOrFail($productId);
        $detail = ProductDetail::where('product_id', $productId)->findOrFail($detailId);
        $colors = Color::all(); // Lấy tất cả các màu sắc từ cơ sở dữ liệu

        // Trả về view sửa chi tiết sản phẩm
        return view('admin.product_details.edit', [
            'title' => 'Quản lý chi tiết sản phẩm'
        ], compact('product', 'detail', 'colors'));
    }
    public function update(StoreProductDetailRequest $request, $productId, $detailId)
    {
        // Tìm sản phẩm và chi tiết sản phẩm
        $product = Product::findOrFail($productId);
        $detail = ProductDetail::where('product_id', $productId)->findOrFail($detailId);

        // Cập nhật thông tin chi tiết sản phẩm (ví dụ như size, color, quantity, v.v.)
        $detail->size = $request->input('size');
        $detail->color_id = $request->input('colorselect');
        $detail->quantity = $request->input('quantities');

        // Nếu có ảnh mới
        if ($request->hasFile('image')) {
            // Xử lý ảnh
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            // Di chuyển ảnh vào thư mục public/uploads/product_details
            $file->move(public_path('uploads/product_details'), $imageName);

            // Cập nhật đường dẫn ảnh vào chi tiết sản phẩm
            $detail->image = 'uploads/product_details/' . $imageName;
        }

        // Lưu thông tin chi tiết sản phẩm đã được cập nhật
        $detail->save();

        // Chuyển hướng về danh sách chi tiết sản phẩm với thông báo thành công
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
