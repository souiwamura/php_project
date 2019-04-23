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
     * コメント投稿時の入力チェック
     *
     * @return チェック済入力値
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ];
    }
}
