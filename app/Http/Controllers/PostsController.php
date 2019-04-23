<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    // ルートアクセスの制御
    public function index()
    {
        // Postモデルに全データを取り込む(作成日の降順)
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('posts.index', ['posts' => $posts]);
    }
    
    // 投稿ページへのアクセス制御
    public function create()
    {
        return view('posts.create');
    }

    // 投稿ページの登録制御
    public function store(Request $request)
    {
        // 入力チェック（タイトル:50文字 本文：2000文字まで）
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        // データ登録（DB登録）
        Post::create($params);

        return redirect()->route('top');
    }
    
    // 投稿詳細ページのアクセス制御
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
