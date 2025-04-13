<!DOCTYPE html>

<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/error.css')
    <title>404 NotFount</title>
</header>

<body>
    <div class="oopsContainer">
    <h1>419</h1>
    なんか変なことしませんでした？<br>
    <a href="{{ route('login') }}" class="toLogin">ログイン画面に戻る</a>
    </div>
</body>