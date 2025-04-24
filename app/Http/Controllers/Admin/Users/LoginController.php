<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



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
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();
            // Kiểm tra role và điều hướng
            switch ($user->role) {
                case 'chu_cua_hang':
                    return redirect()->route('admin.main');              
                default:
                    Auth::logout(); // Nếu role không hợp lệ, logout luôn
                    return redirect()->route('admin.login')->withErrors(['error' => 'Tài khoản không hợp lệ']);
            }
        }
        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        return redirect()->back();
    }
}
