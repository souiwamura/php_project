@extends('layouts.postsLayout');

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="h1 card-header mb-4">
                投稿の編集
            </div>

            <form method="POST" action="{{ route('postsUpdate', ['post_id' => $post->id]) }}">
                @csrf
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') ?: $post->title }}"
                            type="text"
                        />
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="body"
                            name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') ?: $post->body }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('posts.show', ['post' => $post]) }}">
                            キャンセル
                        </a>

                        <input type="submit" value="更新する" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection