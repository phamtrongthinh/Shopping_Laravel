<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\createFormRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Log;


class MenuController extends Controller
{
    public function index()
    {
        return view('Admin.menu.index', ['title' => 'List category']);
    }

    public function create()
    {
        return view('admin.menu.create', ['title' => 'Create category']);
    }

    public function store(createFormRequest $request)
    {
        dd($request->all());
        $validatedData = $request->validated(); // Lấy dữ liệu đã được kiểm tra hợp lệ
        // Tạo danh mục mới

    }

    public function edit($id)
    {
        return 'Trang sửa menu có id = ' . $id;
    }

    public function update(Request $request, $id)
    {
        return 'Xử lý sửa menu có id = ' . $id;
    }

    public function delete($id)
    {
        return 'Xử lý xóa menu có id = ' . $id;
    }
}
