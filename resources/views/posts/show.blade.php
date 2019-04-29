@extends('layouts.postsLayout')

@section('content')
    <div class="container mt-4">
        <div class="border">
            <div class="h5 card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            投稿の詳細
                        </div>
                        <div class="col-md-3 offset-md-6">
                            <a class="btn btn-primary offset-md-2" href="{{ route('posts.edit', ['post' => $post]) }}">
                                編集する
                            </a>
                            <form class="float-right" method="POST" action="{{ route('postsDestroy', ['post' => $post]) }}">
                                @csrf
                                <input type="submit" value="削除する" class="btn btn-danger" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h5">
                【投稿のタイトル】
            </div>
            <div class="card-body">
                {{ $post->title }}
            </div>
            <div class="h5">
                【本文】
            </div>
            <div class="card-body">
                <p class="card-text">
                    <!-- 全文表示  str_limit()による制限なし -->
                    {!! nl2br(e($post->body)) !!}
                </p>
            </div>
            <section>
                <div class="h5 card-footer">
                    コメント
                </div>

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
            <form class="mb-4" method="POST" action="{{ route('commentsStore', ['post_id' => $post->id]) }}">
                @csrf
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

                <div>
                    <input type="submit" class="btn btn-primary" value="コメントする" />
                </div>
            </form>
        </div>
    </div>
@endsection