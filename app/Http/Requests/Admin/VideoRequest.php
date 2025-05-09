<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => $this->isMethod('post') ? 'required|file|mimes:mp4,mov,avi|max:102400' : 'nullable|file|mimes:mp4,mov,avi|max:102400',
            'published_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Vui lòng chọn file video.',
            'file.mimes' => 'Định dạng video không hợp lệ (chỉ mp4, mov, avi).',
            'file.max' => 'Dung lượng video quá lớn, tối đa 100MB.',
        ];
    }
}
