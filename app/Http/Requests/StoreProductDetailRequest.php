<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'colorselect' => 'required|string',
            // 'colorInput' => 'required|string',
            'size' => 'required|string',
            'quantities' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra ảnh
        ];
        
    }

    public function messages()
    {
        return [
            'colorselect.required' => 'Vui lòng chọn màu.',
            'colorInput.required' => 'Vui lòng chọn mã màu.',
            'size.required' => 'Vui lòng chọn kích thước.',
            'quantities.required' => 'Vui lòng nhập số lượng.',
            'quantities.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'image.image' => 'Ảnh phải có định dạng hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
        ];
    }
}
