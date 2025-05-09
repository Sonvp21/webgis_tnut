<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductionFacilityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'geom' => 'nullable', // Cần kiểm tra dữ liệu đầu vào cho tọa độ
            'name' => 'required|string|max:255',
            'owner' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',

            'note' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên cơ sở sản xuất không thể bỏ trống. Hãy nhập vào nhé!',
            'name.string' => 'Tên cơ sở sản xuất phải là chữ, không được chứa ký tự đặc biệt.',
            'name.max' => 'Tên cơ sở sản xuất không được vượt quá 255 ký tự.',

            'owner.string' => 'Tên chủ sở hữu phải là chữ.',
            'owner.max' => 'Tên chủ sở hữu không được vượt quá 255 ký tự.',

            'address.string' => 'Địa chỉ phải là chữ.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'description.string' => 'Mô tả phải là văn bản hợp lệ.',

            'type.string' => 'Loại hình sản xuất phải là chữ.',
            'type.max' => 'Loại hình sản xuất không được vượt quá 100 ký tự.',

            'note.string' => 'Ghi chú phải là văn bản hợp lệ.',
        ];
    }
}
