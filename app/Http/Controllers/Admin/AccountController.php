<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;

class AccountController extends Controller
{
    public function listusser(Request $request)
    {
        $query = User::query();

        $search = $request->search_user; // Đổi thành 'search_user' cho khớp với input name

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            });
        }

        $users = $query->orderBy('id', 'desc')->paginate(5);

        return view('admin.account.listusser', [
            'title' => 'Danh sách tài khoản',
            'users' => $users,
            'search_user' => $search, // Truyền từ khóa tìm kiếm về view
        ]);
    }



    function create()
    {
        return view('admin.account.create', ['title' => 'Tạo tài khoản']);
    }

    function store(AccountRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone ?? 'Chưa cập nhật',
                'address' => $request->address ?? 'Chưa cập nhật',
                'role' => $request->role,
                'status' => $request->status ?? 'Active',
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.account.listusser')->with('success', 'Tạo tài khoản thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $title = 'Chỉnh sửa thông tin tài khoản';
            return view('admin.account.edit', compact('user', 'title'));
        } catch (\Exception $e) {
            return redirect()->route('admin.account.listusser')->with('error', 'Không tìm thấy tài khoản.');
        }
    }


    function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Chuẩn bị dữ liệu cập nhật
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role,
                'status' => $request->status,
            ];

            // Nếu có mật khẩu mới thì cập nhật
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            // Cập nhật tài khoản
            $user->update($data);

            return redirect()->route('admin.account.listusser')->with('success', 'Cập nhật tài khoản thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật tài khoản thất bại. ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id); // Tìm danh mục theo ID
            $user->delete(); // Xoá danh mục

            return redirect()->route('admin.account.listusser')->with('success', 'Xoá danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xoá danh mục thất bại. ' . $e->getMessage());
        }
    }
}
