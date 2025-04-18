<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.users.login'); // ví dụ: resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Thử đăng nhập
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Kiểm tra role phải là 'khach_hang' mới cho phép đăng nhập
            if ($user->role === 'khach_hang') {
                return redirect('/'); // Đổi URL nếu cần
            }

            // Nếu không phải khách hàng, đăng xuất và báo lỗi
            Auth::logout();
            return back()->withErrors(['email' => 'Chỉ khách hàng mới được phép đăng nhập.']);
        }

        // Sai email hoặc mật khẩu
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])->withInput();
    }

    public function showRegisterForm()
    {
        return view('frontend.users.signup'); // ví dụ: resources/views/auth/register.blade.php
    }

    public function register(Request $request)
    {
        
        // 1. Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required |nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        // 2. Tạo tài khoản
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ,
            'password' => Hash::make($request->password),
            'role' => 'khach_hang',
            'status' => 'Active',
        ]);

        // 3. Tự động đăng nhập sau khi đăng ký
        Auth::login($user);

        // 4. Chuyển hướng về trang chủ hoặc nơi bạn muốn
        return redirect('/login')->with('success', 'Đăng ký thành công!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
