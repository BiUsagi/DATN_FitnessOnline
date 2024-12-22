<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class SlidesRequest extends FormRequest
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
            'name' => 'required|regex:/^[^\d].*$/',
            'description' => 'required|regex:/^[^\d].*$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.regex' => 'Tên không được viết số đầu tiên.',
            'description.required' => 'Mô tả không được để trống.',
            'description.regex' => 'Mô tả không được viết số đầu tiên.',
        ];
    }
}
