<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    function listusser()
    {
        $users = User::paginate(2);
        return view('admin.account.listusser', ['title' => 'Danh sách tài khoản', 'users' => $users]);
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
        return view('admin.account.edit');
    }
    function update(Request $request, $id)
    {
        return view('admin.account.update');
    }
}
