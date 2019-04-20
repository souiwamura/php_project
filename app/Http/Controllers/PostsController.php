<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    // ルートアクセスの制御
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('posts.index', ['posts' => $posts]);
    }
    
    // postsアクセスの制御
    public function create()
    {
        return view('posts.create');
    }

    // createViewでの操作制御
    public function store(Request $request)
    {
        // 入力チェック（タイトル:50文字 本文：2000文字まで）
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        // データ登録（レスポンスparamに追加 DB登録ではない）
        Post::create($params);

        return redirect()->route('top');
    }
    
    // 投稿詳細表示のアクセス制御
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
