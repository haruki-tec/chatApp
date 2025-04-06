@php
    use Illuminate\Support\Facades\Route;
@endphp
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
    <div class="wrapper">
        <div class="container">
            <h1>Login</h1>
            <form class="form" action="{{ route('auth_login') }}" method="POST" id="loginForm">
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <input type="email" name="email" placeholder="username">
                <input type="password" name="password" placeholder="password">
                <button type="submit" id="login-button">Login</button>
            </form>
            <a href="{{ route('glogin') }}" class="google-login">Googleでログイン</a>

            <p class=tip1>
                ↑開発用アカウントは<br>
                username:developer@dev.com, password:dev<br><br>
                ⚠google認証を行うと鯖主に垢名がモロバレします。
            </p>
        </div>
    </div>
</body>
</html>
