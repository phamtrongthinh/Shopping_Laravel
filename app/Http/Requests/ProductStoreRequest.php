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
            'price' => 'required|numeric|min:0|max:999999999999',
            //numeric đảm bảo chỉ nhận số
            'sale' => 'nullable|numeric|min:0|max:100',
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
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'price.max' => 'Giá sản phẩm không được vượt quá 9.999.999',
            'sale.numeric' => 'Giảm giá phải là số.',
            'sale.min' => 'Giảm giá phải lớn hơn hoặc bằng 0.',
            'sale.max' => 'Giảm giá không được vượt quá 100%.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'colors.required' => 'Màu sắc là bắt buộc.',
            'sizes.required' => 'Kích thước là bắt buộc.',
            'quantities.required' => 'Số lượng là bắt buộc.',
            'image' => 'Hình ảnh phải có định dạng ảnh.',
        ];
    }
}
