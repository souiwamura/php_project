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
     * コメント登録時の入力チェック
     * 
     * @return チェック済入力値
     */
    public function rules()
    {
        return [
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ];
    }
}
