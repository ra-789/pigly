<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン | PiGLy</title>
    <style>
        body {
            background: linear-gradient(135deg, #ff91d9, #f3ded2);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 360px;
        }

        h1 {
            font-size: 2rem;
            color: #ff91d9;
            margin-bottom: 0.5rem;
        }

        p {
            margin-bottom: 1.5rem;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .error {
            color: red;
            font-size: 0.85rem;
            text-align: left;
            margin-bottom: 0.5rem;
        }

        button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, #c190e9, #f773c9);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        .link {
            display: block;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: hsl(218, 84%, 70%);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>PiGLy</h1>
        <p>ログイン</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="パスワード">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">ログイン</button>
        </form>
        <a href="{{ route('register.step1') }}" class="link">アカウント作成はこちら</a>
    </div>
</body>

</html>