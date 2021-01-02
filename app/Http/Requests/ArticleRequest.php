<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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

    //  バリデーションのルール
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'body' => 'required|max:500',
        ];
    }

    // バリデーションエラーメッセージのカスタマイズ(日本語化)
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
        ];
    }
}
