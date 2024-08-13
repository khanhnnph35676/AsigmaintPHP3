<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartDetailRequest extends FormRequest
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
             'quantity.*'=> 'required|integer|max:100|min:1'
        ];
    }
    public function messages():array
    {
        return [
            'quantity.*.required' => 'Số lượng đang không có',
            'quantity.*.min' => 'Số lượng tối thiểu là 1',
            'quantity.*.max' => 'Số lượng tối đa là 100',
            'quantity.*.integer' => 'Số lượng phải là một số nguyên'
        ];
    }
}
