<?php

namespace App\Http\Controllers;

use App\Service\PostsService;
use App\Http\Requests\CreatePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Requests\DestroyPostsRequest;

class PostsController extends Controller
{

    static $service;

    public function __construct()
    {
        $this->middleware('auth');
	
        $this::$service = new PostsService();
    }

    // ルートアクセスの制御
    public function top()
    {
        // Postモデルに全データを取り込む(作成日の降順)
        $posts = $this::$service->top();

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
        // サービス呼び出し
        $this::$service->store($request);

        return redirect()->route('top');
    }

    // 投稿詳細ページのアクセス制御
    public function show($post_id)
    {
        // サービス呼び出し
        $post = $this::$service->show($post_id);

        return view('posts.show', ['post' => $post,]);
    }

    // 投稿編集ページのアクセス制御
    public function edit($post_id)
    {
        // サービス呼び出し
        $post = $this::$service->edit($post_id);

        return view('posts.edit', ['post' => $post,]);
    }

    // 投稿編集ページの更新制御
    // パラメータの方をUpdatePostsRequestにすることで自前の検証付きリクエストを呼ぶ
    public function update(UpdatePostsRequest $request)
    {
        // サービス呼び出し
        $post = $this::$service->update($request);
        
        return redirect()->route('posts.show', ['post' => $post,]);
    }

    // 投稿編集ページの削除制御
    public function destroy(DestroyPostsRequest $request)
    {
       // サービス呼び出し
       $this::$service->destroy($request);

       return redirect()->route('top');
    }
}
