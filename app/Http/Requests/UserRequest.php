<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];
    }
    public function messages():array
    {
        return[
            'name.required' =>'Bạn để trống tên tài khoản',
            'email.required' =>'Bạn để trống Email',
            'password.required' => 'Bạn để trống password',
            'email.email' =>'Bạn nhập không đúng định dạng email',
            'password.confirmed' => 'Mật khẩu và nhập lại mật khẩu không khớp',
            'email.unique' => 'Email này đã tồn tại'
        ];
    }
}
