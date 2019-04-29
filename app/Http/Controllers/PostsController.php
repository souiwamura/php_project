<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Requests\DestroyPostsRequest;
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
        // 全入力値を取得(requestパラムに対してはCreatePostsRequestで検証済み)
        $params = $request->all();

        // データ登録（DB登録）
        Post::create($params);

        return redirect()->route('top');
    }

    // 投稿詳細ページのアクセス制御
    public function show($post_id)
    {
        // ※※※更新対象有無チェック
        $post = Post::findOrFail($post_id);

        return view('posts.show', ['post' => $post,]);
    }

    // 投稿編集ページのアクセス制御
    public function edit($post_id)
    {
        // ※※※更新対象有無チェック
        $post = Post::findOrFail($post_id);

        return view('posts.edit', ['post' => $post,]);
    }

    // 投稿編集ページの更新制御
    // パラメータの方をUpdatePostsRequestにすることで自前の検証付きリクエストを呼ぶ
    public function update(UpdatePostsRequest $request)
    {
        // 全入力値を取得(requestパラムに対してはUpdatePostsRequestで検証済み)
        $params = $request->all();

        // ※※※更新対象有無チェック
        $post = Post::findOrFail($params['post_id']);
        
        // 更新処理
        $post->fill($params)->save();
        
        return redirect()->route('posts.show', ['post' => $post,]);
    }

    // 投稿編集ページの削除制御
    public function destroy(DestroyPostsRequest $request)
    {
       // 全入力値を取得(requestパラムに対してはUpdatePostsRequestで検証済み)
       $params = $request->all();

       // ※※※更新対象有無チェック
       $post = $this->checkTarget($params['post']);

       // 削除処理(comments、postの順じゃないと参照権限でエラーになる)
       $post->comments()->delete();
       $post->delete();
       
       return redirect()->route('top');
    }

    // 対象チェック
    private function checkTarget($post_id) : Post
    {
       return Post::findOrFail($post_id);
    }
}
