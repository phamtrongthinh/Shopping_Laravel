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
            'price' => 'required|numeric|min:0', //numeric đảm bảo chỉ nhận số
            'sale' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|boolean',
            'colors' => 'required|array', // yêu cầu dữ liệu đầu vào phải là mảng vì bên nhập view phần hập các biến thể mỗi biến thêr có màu sác và kích thước khác nhau
            'colors.*' => 'string|max:255',// với mỗi đối tượng trong mảng phải là kiểu string
            'sizes' => 'required|array',
            'sizes.*' => 'in:S,M,L,XL,XXL',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'sale.numeric' => 'Giảm giá phải là số.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'colors.required' => 'Màu sắc là bắt buộc.',
            'sizes.required' => 'Kích thước là bắt buộc.',
            'quantities.required' => 'Số lượng là bắt buộc.',
            'images.*.image' => 'Hình ảnh phải có định dạng ảnh.',
        ];
    }
}
