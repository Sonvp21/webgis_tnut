<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content_question' => 'required|string',
            'content_answer' => 'nullable|string',
            'status' => 'boolean',
            'answered_at' => 'nullable|date',
            'read_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'phone.required' => 'Trường điện thoại là bắt buộc.',
            'email.required' => 'Trường email là bắt buộc.',
            'address.required' => 'Trường địa chỉ là bắt buộc.',
            'title.required' => 'Trường tiêu đề là bắt buộc.',
            'content_question.required' => 'Trường nội dung câu hỏi là bắt buộc.',
            'content_answer.string' => 'Nội dung câu trả lời phải là chuỗi ký tự.',
            'status.boolean' => 'Trạng thái hiển thị phải là kiểu boolean.',
            'answered_at.date' => 'Trường ngày trả lời phải là một ngày hợp lệ.',
            'read_at.date' => 'Trường ngày đọc phải là một ngày hợp lệ.',
        ];
        
    }

    public function prepareForValidation()
    {
        // Đặt giá trị mặc định cho 'status'
        $this->merge([
            'status' => 2,
        ]);
    }
}
