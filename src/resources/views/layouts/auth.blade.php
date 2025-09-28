<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PiGLy - 認証画面')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @yield('css')
</head>

<body>
    <div class="register-container">

        <h1 class="logo">PiGLy</h1>

        @yield('content')
    </div>
</body>

</html>