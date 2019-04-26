<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostsRequest;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ルートアクセスの制御
    public function top()
    {
        // Postモデルに全データを取り込む(作成日の降順)
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('posts.top', ['posts' => $posts]);
    }
    
    // 投稿ページへのアクセス制御
    public function create()
    {
        return view('posts.create');
    }

    // 投稿ページの登録制御
    public function store(CreatePostsRequest $request)
    {
        // 全入力値を取得
        $params = $request->all();

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
