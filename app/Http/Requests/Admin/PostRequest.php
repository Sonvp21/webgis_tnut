<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('post') ? $this->route('post')->id : null;
    
        return [
            'category_id' => 'required|exists:post_categories,id',
            'title' => 'required|string|max:255|unique:posts,title,' . ($id ?? 'NULL') . ',id',
            'description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'views' => 'integer|min:0',
            'status' => 'boolean',
            'published_at' => 'nullable|date',
        ];
    }
    

    public function messages(): array
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'title.required' => 'Vui lòng nhập tiêu đề cho bài viết.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'content.required' => 'Vui lòng nhập nội dung.',
        ];
    }
}
