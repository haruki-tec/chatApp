<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div class="oopsContainer">
        <h1>ページはまだ作られてないみたいだよ</h1>
        <p>Tips>DBレスポンスが遅いのはお金がないからだよ!</p>
        <form class="logoutButton" action="{{ route('auth_logout') }}" method="POST">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </div>
</body>
</html>