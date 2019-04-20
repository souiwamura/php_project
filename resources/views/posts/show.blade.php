@extends('posts.layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="card-header">
                {{ $post->title }}
            </h1>
            <div class="card-body">
                <p class="card-text">
                    <!-- 全文表示  str_limit()による制限なし -->
                    {!! nl2br(e($post->body)) !!}
                </p>
            </div>
            <section>
                <h2 class="h5 card-footer">
                    コメント
                </h2>

                @forelse($post->comments as $comment)
                    <div class="card-text">
                        <time>
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p>
                            <!-- 全文表示  str_limit()による制限なし -->
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
            <a class="btn btn-primary" href="{{ route('top', ['post' => $post]) }}">
                Topへ戻る
            </a>
        </div>
    </div>
@endsection