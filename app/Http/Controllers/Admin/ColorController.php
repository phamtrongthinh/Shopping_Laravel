<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        // Lấy tất cả các màu sắc từ cơ sở dữ liệu
        $colors = Color::orderBy('id', 'desc')->paginate(5);

        // Trả về view 'admin.colors.index' với dữ liệu màu sắc
        return view('admin.colors.index', [
            'title' => 'Quản lý mã màu sản phẩm',
            'colors' => $colors,
        ]);
    }

    public function add()
    {
        return view('admin.colors.add', ['title' => 'Quản lý mã màu sản phẩm']);
    }


    public function store(ColorRequest $request)
    {
        try {
            // Kiểm tra xem màu sắc đã tồn tại chưa
            $existingColor = Color::where('name', $request->name)->first();
            if ($existingColor) {
                // Nếu màu sắc đã tồn tại, quay lại trang trước với thông báo lỗi
                return redirect()->back()->withErrors(['name' => 'Màu sắc đã tồn tại.'])->withInput();
            }

            // Lưu màu sắc vào cơ sở dữ liệu
            $color = new Color();
            $color->name = $request->name;
            $color->code = $request->code;
            $color->save();

            // Quay lại trang danh sách màu sắc và thông báo thành công
            return redirect()->route('admin.products.colors.index')->with('success', 'Thêm màu sắc thành công!');
        } catch (\Exception $e) {
            // Xử lý lỗi và quay lại trang trước với thông báo lỗi
            return redirect()->back()->withErrors(['error' => 'Lỗi khi thêm màu sắc: ' . $e->getMessage()])->withInput();
        }
    }



    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', [
            'title' => 'Quản lý mã màu sản phẩm',
            'color' => $color,
        ]);
    }
    public function update(ColorRequest $request, $id)
    {
        try {
            // Kiểm tra xem màu sắc đã tồn tại chưa, ngoại trừ màu sắc hiện tại
            $existingColor = Color::where('name', $request->name)->where('id', '!=', $id)->first();
            if ($existingColor) {
                // Nếu màu sắc đã tồn tại, quay lại trang trước với thông báo lỗi
                return redirect()->back()->withErrors(['name' => 'Màu sắc đã tồn tại.'])->withInput();
            }

            // Cập nhật màu sắc vào cơ sở dữ liệu
            $color = Color::findOrFail($id);
            $color->name = $request->name;
            $color->code = $request->code;
            $color->save();

            // Quay lại trang danh sách màu sắc và thông báo thành công
            return redirect()->route('admin.products.colors.index')->with('success', 'Cập nhật màu sắc thành công!');
        } catch (\Exception $e) {
            // Xử lý lỗi và quay lại trang trước với thông báo lỗi
            return redirect()->back()->withErrors(['error' => 'Lỗi khi cập nhật màu sắc: ' . $e->getMessage()])->withInput();
        }
    }

    public function delete($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        return redirect()->route('admin.products.colors.index')->with('success', 'Xóa màu sắc thành công');
    }
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        return redirect()->route('admin.products.colors.index')->with('success', 'Xóa màu sắc thành công');
    }
}
