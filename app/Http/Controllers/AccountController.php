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
            'address' => 'string|max:255', // Đảm bảo validate địa chỉ
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'address.string' => 'Địa chỉ không hợp lệ.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        // 2. Tạo tài khoản
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address ?? "",
            'password' => Hash::make($request->password),
            'role' => 'khach_hang',
            'status' => 'Active',
        ]);

        // 3. Tự động đăng nhập sau khi đăng ký
        Auth::login($user);

        // 4. Chuyển hướng về trang chủ hoặc nơi bạn muốn
       
        return redirect('/')->with('success', 'Đăng ký tài khoản thành công!');
       

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


    public function edit()
    {
        return view('frontend.users.profile'); // ví dụ: resources/views/auth/edit.blade.php
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address ?? "";
        $user->save();
        
        return redirect()->route('home')->with('success', 'Thông tin đã được cập nhật.');
    }
}
