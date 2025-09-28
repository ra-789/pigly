@extends('layouts.auth')

@section('content')
<h2 class="page-title">新規会員登録</h2>
<p>STEP1 アカウント情報の登録</p>

<form method="POST" action="{{ route('register.postStep1') }}">
    @csrf

    <label>お名前</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
    <div class="error-message" style="color: red;">{{ $errors->first('name') }}</div>
    @endif

    <label>メールアドレス</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
    <div class="error-message" style="color: red;">{{ $errors->first('email') }}</div>
    @endif

    <label>パスワード</label>
    <input type="password" name="password">
    @if ($errors->has('password'))
    <div class="error-message" style="color: red;">{{ $errors->first('password') }}</div>
    @endif

    <button type="submit">次に進む</button>

    <a href="{{ route('login') }}">ログインはこちら</a>
    </div>
    @endsection