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
            'name' => 'required | string | max:255',
            'email' => 'required | email | string | max:255 | unique:users',
            'password' => 'required | min:8 | max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max:255' => '文字数は255以内で入力してください',
            'name.string' => '文字型で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください',
            'email.string' => '文字型で入力してください',
            'email.max:255' => '255以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min:8' => 'パスワードは８文字以上入力してください',
            'password.max:255' => 'パスワードは２５５文字以内で入力してください',
        ];
    }
}