@extends('layouts.commonLayout')

@section('content')
    <div class="mb-4 px-5 py-2">
        <a href="{{ route('posts.create') }}" class="float-left btn btn-primary">
            投稿作成
        </a>
        <form action="{{ route('getTotal') }}" method="POST" class="float-left mx-1">
            @csrf
            <input
             type="hidden"
             id="scid"
             name="scid"
             value="getMt" />
            <input
             type="hidden"
             id="userId"
             name="userId"
             value="{{ Auth::user()->id }}" />
            <input type="submit" class="btn btn-primary px-2" value="月次集計" />
        </form>
        <form action="{{ route('getTotal') }}" method="POST" class="mx-1">
            @csrf
            <input
             type="hidden"
             id="scid"
             name="scid"
             value="getWt" />
            <input
             type="hidden"
             id="userId"
             name="userId"
             value="{{ Auth::user()->id }}" />
            <input type="submit" class="btn btn-primary px-2" value="週次集計" />
        </form>
    </div>
    <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <!-- ①postモデルのbodyから200文字取得 -->
                        <!-- ②取得した文字列を表示する ← eはechoの略 -->
                        <!-- ③表示文字列中の改行文字をbrタグで置き換える -->
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
                    </p>
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-primary p-1" >
                        続きを読む
                    </a>
                </div>
                <div class="card-footer">
                    <span>
                       投稿者 : {{ $post->create_user }}
                    </span>
                    <span class="mr-2 px-2">
                        投稿日 : {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
        
        <!-- ページャー -->
        <div class="d-flex justify-content-right mb-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
