<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class createFormRequest extends FormRequest
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
            'menu' => 'required|string|max:255',
            'parent_id' => 'required|integer',
            'description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'active' => 'required|boolean',
        ];
    }

     public function messages()
    {
        return [
            'menu.required' => 'Tên danh mục không được để trống.',
            'menu.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'menu.max' => 'Tên danh mục tối đa 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'description.max' => 'Mô tả tối đa 500 ký tự.',
            'parent_id.integer' => 'Danh mục cha không hợp lệ.',
            'active.required' => 'Vui lòng chọn trạng thái kích hoạt.',
            'active.boolean' => 'Giá trị kích hoạt không hợp lệ.',
        ];
    }
}
