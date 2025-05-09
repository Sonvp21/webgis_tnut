<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NotifyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'title.required' => 'Tiêu đề là bắt buộc.',
            'content.required' => 'Nội dung là bắt buộc.',
        ];
    }
}
