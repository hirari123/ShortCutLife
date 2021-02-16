<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'article_id' => 'required|integer',
            'comment' => 'required|string|max:250'
        ];
    }

    // バリデーションエラーメッセージのカスタマイズ(日本語化)
    public function attributes()
    {
        return [
            'article_id' => '投稿ID',
            'comment' => 'コメント'
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'コメントは必ず入力してください。',
        ];
    }
}
