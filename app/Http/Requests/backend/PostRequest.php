<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required',
            'content' => 'required|string',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'description.required' => 'Mô tả không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'image.required' => 'Vui lòng chọn ảnh.',
        ];
    }

    
}
