<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // リクエストパラムの入力チェックと変数宣言
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);
        
        // 対象レコードの検索
        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);

        return redirect()->route('posts.show', ['post' => $post]);
    }
}
