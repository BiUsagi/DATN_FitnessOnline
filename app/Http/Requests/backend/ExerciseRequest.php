<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'sets' => 'required|numeric',
            'reps' => 'required|numeric',
            'description' => 'required|string',
            'video_url' => 'required',
            'video_url2' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bài tập không được để trống.',
            'sets.required' => 'Set không được để trống.',
            'reps.required' => 'Rep không được để trống.',
            'description.required' => 'Mô tả không được để trống.',
            'video_url.required' => 'Vui lòng thêm video.',
            'video_url2.required' => 'Vui lòng thêm video 2.'
        ];
    }

    
}
