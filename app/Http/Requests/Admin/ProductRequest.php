<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (int) $this->user_id === Auth::user()->id;
    }

    public function rules()
    {
        return [
            'commune_id' => 'nullable|exists:communes,id',
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'representatives' => 'required|string|max:255',
            'content' => 'required',
            'weight' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document.*' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'commune_id.exists' => 'Vui lòng chọn một xã hợp lệ.',
            'user_id.exists' => 'Người dùng không tồn tại. Vui lòng kiểm tra lại.',
            
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.max' => 'Tên sản phẩm quá dài, tối đa 255 ký tự.',
            
            'content.required' => 'Bạn chưa nhập mô tả sản phẩm. Hãy bổ sung thông tin.',
            
            'owner.required' => 'Vui lòng nhập tên tên chủ thể.',
            'owner.max' => 'Tên tên chủ thể quá dài, tối đa 255 ký tự.',
            
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.max' => 'Địa chỉ không được dài quá 255 ký tự.',
            
            'representatives.required' => 'Vui lòng nhập tên người đại diện.',
            'representatives.max' => 'Tên người đại diện không được vượt quá 255 ký tự.',

            'weight.numeric' => 'Khối lượng phải là số.',
            'weight.min' => 'Khối lượng không thể nhỏ hơn 0.',

            'price.numeric' => 'Giá tiền phải là số.',
            'price.min' => 'Giá tiền không thể nhỏ hơn 0.',
            
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: JPEG, PNG, JPG, GIF, hoặc SVG.',
            'image.max' => 'Dung lượng hình ảnh tối đa là 2MB.',
            
            'document.*.mimes' => 'Tài liệu phải có định dạng: PDF, DOC, hoặc DOCX.',
            'document.*.max' => 'Dung lượng mỗi tài liệu tối đa là 2MB.',
        ];
    }    
}
