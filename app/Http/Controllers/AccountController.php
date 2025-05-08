<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
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
            return redirect('/'); // Đổi URL nếu cần
            // $user = Auth::user();

            // // Kiểm tra role phải là 'khach_hang' mới cho phép đăng nhập
            // if ($user->role === 'khach_hang') {
            //     return redirect('/'); // Đổi URL nếu cần
            // }

            // // Nếu không phải khách hàng, đăng xuất và báo lỗi
            // Auth::logout();
            // return back()->withErrors(['email' => 'Chỉ khách hàng mới được phép đăng nhập.']);
        }

        // Sai email hoặc mật khẩu
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])->withInput();
    }

    public function showRegisterForm()
    {
        $provinces = Province::orderBy('name')->get(); // sửa biến thành $provinces
        return view('frontend.users.signup', compact('provinces'));
    }


    public function register(Request $request)
    {

        // 1. Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required |nullable|string|max:20',
            'province' => 'required', // Kiểm tra tỉnh
            'district' => 'required', // Kiểm tra quận/huyện
            'ward' => 'required', // Kiểm tra xã/phường
            'address' => 'string|max:255', // Đảm bảo validate địa chỉ
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'province.required' => 'Vui lòng chọn tỉnh / thành phố.',
            'province.exists' => 'Tỉnh / thành phố không hợp lệ.',
            'district.required' => 'Vui lòng chọn quận / huyện.',
            'district.exists' => 'Quận / huyện không hợp lệ.',
            'ward.required' => 'Vui lòng chọn xã / phường.',
            'ward.exists' => 'Xã / phường không hợp lệ.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);
        // $shippingAddress = $request->detail_address . ', ' . $request->ward . ', ' . $request->district . ', ' . $request->province;


        // 2. Tạo tài khoản
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' =>  $request->detail_address ?? "",
            'province' =>  $request->province ?? "",
            'district' =>  $request->district ?? "",
            'ward' =>  $request->ward ?? "",

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
        $user = Auth::user();  // lấy thông tin user đã đăng nhập
    
        // Lấy danh sách các tỉnh
        $provinces = Province::orderBy('name')->get();
    
        // Lấy các huyện của tỉnh mà user đã chọn
        $districts = District::where('province_id', $user->province)->orderBy('name')->get();
    
        // Lấy các xã của huyện mà user đã chọn
        $wards = Ward::where('district_id', $user->district)->orderBy('name')->get();
    
        // Truyền vào view các biến cần thiết
        return view('frontend.users.profile', compact('provinces', 'districts', 'wards', 'user'));
    }
    

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'province' => 'required', // Kiểm tra tỉnh
            'district' => 'required', // Kiểm tra quận/huyện
            'ward' => 'required', // Kiểm tra xã/phường
            'address' => 'string|max:255', // Đảm bảo validate địa chỉ
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address ?? '';
        $user->province= $request->province ?? null;
        $user->district = $request->district ?? null;
        $user->ward = $request->ward ?? null;
        $user->save();
        return redirect()->route('home')->with('success', 'Thông tin đã được cập nhật.');
    }
}
