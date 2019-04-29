<?php

namespace App\Service;

use App\Http\Requests\CreateCommentsRequest;
use App\Post;
use Illuminate\Support\Facades\DB;

class CommentsService
{
    public function store(CreateCommentsRequest $request) : Post
    {
        // 全入力値を取得(hiddenも含めて)
        $params = $request->all();

        $post = Post::findOrFail($params['post_id']);

        // コメント投稿処理(紐付く投稿情報を弄られないように行ロックする)
        \DB::transaction(function () use ($post, $params) {
            // select for updateによる行ロック
            Post::where('id', '=', $post->id)->lockForUpdate()->get();
            $post->comments()->create($params);
        });

        return $post;
    }
}