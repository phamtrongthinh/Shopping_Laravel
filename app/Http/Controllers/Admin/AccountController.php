<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function listusser()
    {
        $users = User::all();
        return view('admin.account.listusser', ['title' => 'Danh sách tài khoản', 'users' => $users]);
    }
    function create()
    {
        return view('admin.account.create', ['title' => 'Tạo tài khoản']);
    }
    function store(Request $request)
    {
        return view('admin.account.store');
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
