<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255', // Tiêu đề bắt buộc
            'full_name' => 'required|min:3|max:255', // Tên bắt buộc
            'phone' => 'required|digits:10',
            'email' => 'nullable|email', // Email có thể rỗng
            'content' => 'required|min:10', // Nội dung bắt buộc
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề liên hệ.',
            'title.min' => 'Tiêu đề cần ít nhất 3 ký tự.',
            'title.max' => 'Tiêu đề không được dài quá 255 ký tự.',

            'full_name.required' => 'Vui lòng nhập họ và tên của bạn.',
            'full_name.min' => 'Họ và tên cần ít nhất 3 ký tự.',
            'full_name.max' => 'Họ và tên không được dài quá 255 ký tự.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số.',

            'email.email' => 'Email không hợp lệ, vui lòng nhập đúng định dạng.',

            'content.required' => 'Vui lòng nhập nội dung liên hệ.',
            'content.min' => 'Nội dung cần ít nhất 10 ký tự.',
        ];
    }
}
