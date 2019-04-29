<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentsRequest;
use App\Service\CommentsService;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CreateCommentsRequest $request)
    {
        $service = new CommentsService();
        
        // サービス呼び出し
        $post = $service->store($request);

        return redirect()->route('posts.show', ['post' => $post]);
    }
}