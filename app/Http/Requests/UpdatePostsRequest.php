<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostsRequest extends FormRequest
{
    /**
     * 特に認証は必要ないのでtrueで素通り
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 投稿編集ページの編集時チェック
     *
     * @return チェック済入力値
     */
    public function rules()
    {
        return [
            'post_id' => 'required', // nullはダメ
            'title' => 'required|max:50', // nullはダメ 最大50文字
            'body' => 'required|max:2000', // nullはダメ 最大2000文字
        ];
    }
}
