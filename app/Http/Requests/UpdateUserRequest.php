<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Cho phép tất cả người dùng sử dụng request này
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->route('id'), // Giữ nguyên email hiện tại ko check trùng email voi chinh no
            'phone' => 'nullable|regex:/^(\+?[0-9]{10,15})$/',
            'address' => 'nullable|string|max:255',
            'role' => 'required|in:khach_hang,nhan_vien_ban_hang,nhan_vien_kho,chu_cua_hang',
            'status' => 'required|in:Active,Inactive',
            'password' => 'nullable|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'phone.max' => 'Số điện thoại không được quá 15 ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'role.required' => 'Vui lòng chọn vai trò.',
            'role.in' => 'Vai trò không hợp lệ.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ];
    }
}
