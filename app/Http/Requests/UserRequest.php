<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Username không được bỏ trống!',
            'email.required'    => 'Email không được bỏ trống!',
            'email.email'       => 'Email không đúng định dạng!',
            'email.unique'      => 'Email phải là duy nhất!',
            'password.required' => 'Password không được bỏ trống!',
            'password.min'      => 'Password phải chứa ít nhất 8 ký tự!',
        ];
    }

    /**
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator): array
    {
        return $validator->errors()->getMessages();
    }
}
