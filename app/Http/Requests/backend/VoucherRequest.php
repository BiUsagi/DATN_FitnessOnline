<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
        // Kiểm tra xem yêu cầu hiện tại là tạo mới hay cập nhật
        if ($this->isMethod('post')) {
            return [
                'code' => 'required|string|min:8|max:10', // Thay đổi ở đây
                'sale' => 'required|integer|in:10,15,20,25,30',
                'usage_limit' => 'required|integer|min:1',
                'startday' => 'required|date',
                'endday' => 'required|date|after:startday',
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'code_modal' => 'required|string|max:10|min:8', // Thay đổi ở đây
                'sale_modal' => 'required|integer|in:10,15,20,25,30',
                'usage_limit_modal' => 'required|integer|min:1',
                'startday_modal' => 'required|date',
                'endday_modal' => 'required|date|after:startday_modal',
            ];
        }

        return [];
    }


    public function messages()
    {
        return [
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.min' => 'Mã voucher phải có ít nhất 8 ký tự.',
            'code.max' => 'Mã voucher không được vượt quá 10 ký tự.',
            'sale.required' => 'Vui lòng chọn giá trị giảm giá.',
            'sale.in' => 'Giá trị giảm giá không hợp lệ.',
            'usage_limit.required' => 'Số lượt nhập là bắt buộc.',
            'usage_limit.integer' => 'Số lượt nhập phải là một số nguyên.',
            'startday.required' => 'Ngày bắt đầu là bắt buộc.',
            'endday.required' => 'Ngày kết thúc là bắt buộc.',
            'endday.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',

            'code_modal.required' => 'Mã voucher là bắt buộc.',
            'code_modal.string' => 'Mã voucher phải là chuỗi.',
            'code_modal.max' => 'Mã voucher không được vượt quá 10 ký tự.',
            'code_modal.min' => 'Mã voucher phải có ít nhất 8 ký tự.',
            'sale_modal.required' => 'Vui lòng chọn giá trị giảm giá.',
            'sale_modal.in' => 'Giá trị giảm giá không hợp lệ.',
            'usage_limit_modal.required' => 'Số lượt nhập là bắt buộc.',
            'usage_limit_modal.integer' => 'Số lượt nhập phải là một số nguyên.',
            'usage_limit_modal.min' => 'Số lượt nhập phải lớn hơn 0.',
            'startday_modal.required' => 'Ngày bắt đầu là bắt buộc.',
            'endday_modal.required' => 'Ngày kết thúc là bắt buộc.',
            'endday_modal.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
        ];
    }

}
