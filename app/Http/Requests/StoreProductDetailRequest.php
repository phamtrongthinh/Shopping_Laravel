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
            'price' => 'required|numeric|min:0|max:999999999999',
            //numeric đảm bảo chỉ nhận số
            'sale' => 'nullable|numeric|min:0|max:100',
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
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'price.max' => 'Giá sản phẩm không được vượt quá 9.999.999',
            'sale.numeric' => 'Giảm giá phải là số.',
            'sale.min' => 'Giảm giá phải lớn hơn hoặc bằng 0.',
            'sale.max' => 'Giảm giá không được vượt quá 100%.',            
            'quantities.required' => 'Vui lòng nhập số lượng.',
            'quantities.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'image.image' => 'Ảnh phải có định dạng hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
        ];
    }
}
