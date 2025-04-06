<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'code' => 'required|string|size:7', // Mã màu phải có 7 ký tự (bao gồm #)
        ];

        // Nếu đang cập nhật (sửa), bỏ qua kiểm tra 'unique' cho trường 'name'
        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $rules['name'] = 'required|string|max:255';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên màu không được để trống.',
            'name.unique' => 'Tên màu đã tồn tại.',
            'code.required' => 'Mã màu không được để trống.',
            'code.size' => 'Mã màu phải có 7 ký tự (bao gồm #).',
        ];
    }
}
