<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('admin.users.login', ['title' => 'Đăng nhập hệ thống']);
    }

    function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required|min:6'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')] . $request->input('remember'))) {
            return redirect()->route('admin.main');
        }
        return redirect()->back();
    }
}
