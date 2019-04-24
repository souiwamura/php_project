<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * .
     *
     * @return void
     */
    public function __construct()
    {
        // AUTHは以下のサブコントローラを呼び出す
        $this->middleware('auth');
    }

    /**
     * ログイン処理.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('top');
    }
    
    /**
     * ログアウト処理.
     *
     */
     public function logout()
     {
         return redirect()->route('login');
     }
}
