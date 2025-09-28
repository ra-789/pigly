@extends('layouts.auth')

@section('content')
<h2 class="page-title">新規会員登録</h2>
<p>STEP2 体重データの入力</p>

<form method="POST" action="{{ route('register.postStep2') }}">
    @csrf
    <label>現在の体重</label>
    <input
        type="number" name="current_weight" id="current_weight" step="0.1" max="9999.9" value="{{ old('current_weight') }}"> kg
    @if ($errors->has('current_weight'))
    <div class="error-message" style="color: red;">{{ $errors->first('current_weight') }}</div>
    @endif

    <label>目標の体重</label>
    <input
        type="number" name="target_weight" id="target_weight" step="0.1" max="9999.9" value="{{ old('target_weight') }}">kg
    @if ($errors->has('target_weight'))
    <div class="error-message" style="color: red;">{{ $errors->first('target_weight') }}</div>
    @endif

    <button type="submit">アカウント作成</button>
</form>
</div>
@endsection