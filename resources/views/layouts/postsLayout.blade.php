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
    <div class="navbar-header navbar-dark bg-dark p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('') }}" class="navbar-brand">
                        Laravel BBS &nbsp ようこそ{{ Auth::user()->name }}さん
                    </a>
                </div>
                <div class="col-md-3 offset-md-6">
                    <a href="{{ route('top') }}" class="btn btn-primary">
                        Topへ戻る
                    </a>
                    <a href="#" class="btn btn-primary"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>
    @else
        ログインしていません。<br/>
        <a href="http://localhost:8000/">こちらからログインしてください。</a>
    @endauth
</body>
</html>
