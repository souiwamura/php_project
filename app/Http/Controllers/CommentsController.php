<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentsRequest;
use App\Post;

class CommentsController extends Controller
{
    public function store(CreateCommentsRequest $request)
    {
        // 全入力値を取得(hiddenも含めて)
        $params = $request->all();
        
        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);

        return redirect()->route('posts.show', ['post' => $post]);
    }
}