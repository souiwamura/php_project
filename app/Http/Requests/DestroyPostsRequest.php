<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyPostsRequest extends FormRequest
{
    /**
     * 特に認証は必要ないのでtrueで素通り
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 投稿編集ページの削除時チェック
     *
     * @return チェック済入力値
     */
    public function rules()
    {
        return [
            'post' => 'required', // nullはダメ
        ];
    }
}