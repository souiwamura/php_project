<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

/**
 * ユーザ削除
 *
 * @auth sou.iwamura
 * @since 2019/05/06
 * @verison 1.0
 */
class DeleteController extends Controller
{
    // 確認画面なしいきなり削除
    public function delete(Request $request)
    {
        $user_id = $request->user_id;

        User::find($user_id)->delete();

        return view('welcome');
    }
}
