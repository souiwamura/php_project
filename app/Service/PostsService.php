<?php

namespace App\Service;

use App\Http\Requests\CreatePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Requests\DestroyPostsRequest;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostsService
{
    // ルートアクセスの制御の(返却値の型宣言が？ arrayで返っている)
    public function top()
    {
        $posts = Post::with(['comments'])
          ->orderBy('Posts.id', 'desc')
          ->paginate(10);

        return $posts;
    }

    // 投稿ページの登録制御
    public function store(CreatePostsRequest $request)
    {
        // 全入力値を取得(requestパラムに対してはCreatePostsRequestで検証済み)
        $params = $request->all();

        // データ登録(DB登録)
        \DB::transaction(function () use ($params) {
           Post::create($params);
        });
    }

    // 投稿詳細ページのアクセス制御
    public function show($post_id) : Post
    {
        // ※※※対象投稿有無チェック
        $post = $this->checkTarget($post_id);

        return $post;
    }

    // 投稿編集ページのアクセス制御
    public function edit($post_id) : Post
    {
        // ※※※対象投稿有無チェック
        $post = $this->checkTarget($post_id);
        
        return $post;
    }

    // 投稿編集ページの更新制御
    public function update(UpdatePostsRequest $request) : Post
    {
        // 全入力値を取得(requestパラムに対してはUpdatePostsRequestで検証済み)
        $params = $request->all();

        // ※※※更新対象有無チェック
        $post = $this->checkTarget($params['post_id']);
        
        // 更新処理(更新対象を悲観的ロック(レコード物理ロック))
        \DB::transaction(function () use ($post, $params) {
            Post::where('id', '=', $post->id)->lockForUpdate()->get();
            $post->fill($params)->save();
        });
        
        return $post;
    }

    // 投稿編集ページの削除制御
    public function destroy(DestroyPostsRequest $request)
    {
       // 全入力値を取得(requestパラムに対してはDestroyPostsRequestで検証済み)
       $params = $request->all();
       
       // ※※※更新対象有無チェック
       $post = $this->checkTarget($params['post_id']);

       // 削除処理(comments、postの順じゃないと参照権限でエラーになる)
       \DB::transaction(function () use ($post) {
           $post->comments()->delete();
           $post->delete();
       });

    }

    // 対象チェック
    private function checkTarget($post_id) : Post
    {
       return Post::findOrFail($post_id);
    }
}
