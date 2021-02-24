<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u|max:15|' . Rule::unique('users')->ignore(Auth::id()),
            'email' => 'required|string|email|max:255|' . Rule::unique('users')->ignore(Auth::id()),
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザー名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => ':attributeに「/」と半角スペースは使用できません。'
        ];
    }
}
