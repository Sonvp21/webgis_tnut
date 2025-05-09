<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'asker_name' => 'required|string|max:255', // Người hỏi (đã sửa tên trường)
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'content_question' => 'required|string',
            'content_answer' => 'nullable|string',
            'status' => 'nullable|integer|in:0,1,2', // Trạng thái: 0 = chưa trả lời, 1 = đã trả lời, 2 = ẩn
            'answered_at' => 'nullable|date',
            'read_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'asker_name.required' => 'Vui lòng nhập tên của bạn.',
            'title.required' => 'Vui lòng nhập tiêu đề cho câu hỏi.',
            'content_question.required' => 'Bạn chưa nhập nội dung câu hỏi.',
            'content_answer.string' => 'Câu trả lời phải là văn bản hợp lệ.',
            'status.in' => 'Trạng thái không hợp lệ, vui lòng chọn lại.',
            'answered_at.date' => 'Ngày trả lời không hợp lệ, vui lòng kiểm tra lại.',
            'read_at.date' => 'Ngày đọc không hợp lệ, vui lòng kiểm tra lại.',
            'phone.max' => 'Số điện thoại quá dài, vui lòng nhập tối đa 20 ký tự.',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.max' => 'Địa chỉ email quá dài, vui lòng nhập tối đa 255 ký tự.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ?? 0, // Nếu không có `status`, đặt mặc định là 0 (chưa trả lời)
        ]);
    }
}
