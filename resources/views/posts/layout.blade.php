<!DOCTYPE html>
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
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                Laravel BBS
            </a>
        </div>
    </header>

    <div>
        @yield('content')
    </div>
</body>
</html>