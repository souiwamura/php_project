<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- 今は大丈夫だけどEdgeでデザインが崩れるみたいなので対応 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- レスポンシブル対応 ピンチには非対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Laravel BBS</title>

    <!-- bootstrapフォルダ内では読み込めないため移動 変更対応容易にするためのローカル読み込み -->
    <link
        rel="stylesheet"
        href="{{ url('/') }}/css/bootstrap.min.css">
</head>
<body>
    @auth
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                Laravel BBS
            </a>
            <a href="{{ route('top') }}" class="btn btn-primary" style="margin-left:20; margin-top:10px;">
                Topへ戻る
            </a>
            </form>
        </div>
    </header>

    <div>
        @yield('content')
    </div>
    @else
        ログインしていません。<br/>
        <a href="http://localhost:8000/">こちらからログインしてください。</a>
    @endauth
</body>
</html>