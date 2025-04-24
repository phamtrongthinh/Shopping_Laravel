<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id', // kiểm tra xem giá trị category_id có tồn tại trong bảng categories và trong cột id hay không.
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // kiểm tra xem hình ảnh có phải là định dạng ảnh hay không
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category_id.exists' => 'Danh mục sản phẩm không tồn tại.',          
            'status.required' => 'Trạng thái là bắt buộc.',
            'colors.required' => 'Màu sắc là bắt buộc.',
            'sizes.required' => 'Kích thước là bắt buộc.',
            'quantities.required' => 'Số lượng là bắt buộc.',
            'image' => 'Hình ảnh phải có định dạng ảnh.',
        ];
    }
}
