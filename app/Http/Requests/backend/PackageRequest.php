<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'package_name' => 'required|string|max:255',
            'duration_days' => 'required|numeric|max:200',
            'price' => 'required|numeric|max:10000000',
            'image' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'package_name.required' => 'Tên gói tập không được để trống.',
            'duration_days.required' => 'Số ngày tập không được để trống.',
            'duration_days.numeric' => 'Thời gian phải là số.',
            'duration_days.max' => 'Số ngày tập không được lớn hơn 31.',
            'price.required' => 'Giá tiền không được để trống.',
            'image.required' => 'Vui lòng chọn ảnh.',
           
        ];
    }

    
}
