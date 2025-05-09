<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|image|max:2048',
        ];
    }
}
