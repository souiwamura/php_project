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
            <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
                @csrf

                <input
                    name="post_id"
                    type="hidden"
                    value="{{ $post->id }}"
                >

                <div class="form-group">
                    <label for="body">
                        本文
                    </label>

                    <textarea
                      id="body"
                      name="body"
                      class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                      rows="4">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            <!-- エラー表示 -->
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                </div>
            </form>
            <a class="btn btn-primary" href="{{ route('top', ['post' => $post]) }}">
                Topへ戻る
            </a>
        </div>
    </div>
@endsection