<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 継承するのはFormRequest、Requestではない
 *
 */
class CreatePostsRequest extends FormRequest
{
    /**
     * 特に認証は必要ないのでtrueで素通り
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 投稿作成ページの投稿時チェック
     *
     * @return チェック済入力値
     */
    public function rules()
    {
        return [
            'create_user_id' => 'required',
            'create_user' => 'required',
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ];
    }
}
