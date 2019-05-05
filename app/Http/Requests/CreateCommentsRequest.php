<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 継承するのはFormRequest、Requestではない
 *
 */
class CreateCommentsRequest extends FormRequest
{
    /**
     * 特に認証は必要ないのでtrueで素通り
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 投稿詳細ページのコメント登録時チェック
     * 
     * @return チェック済入力値
     */
    public function rules()
    {
        return [
            'create_user' => 'required',
            'create_user_id' => 'required',
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ];
    }
}
