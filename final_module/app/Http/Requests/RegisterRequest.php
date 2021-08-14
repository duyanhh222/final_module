<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:30',
            'email' => 'required|email',
            'password' => 'required|min:8',
            're_password' => 'required_with:password|same:password'
        ];
    }

    public function messages()
    {
        $message = [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'name.min' => 'Tên của bạn quá ngắn',
            'name.max' => 'Tên của bạn quá dài',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn',
            're_password.required_with' => 'Nhập lại mật khẩu',
            're_password.same' => 'Sai mật khẩu',
        ];
        return $message;
    }
}
