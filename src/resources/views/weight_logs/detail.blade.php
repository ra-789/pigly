@extends('layouts.app')

@section('content')
<h2 class="page-title">Weight Log</h2>
<div class="container mx-auto p-6">

    <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">日付</label>
            <input type="date" name="date"
                value="{{ old('date', $weightLog->date ?? now()->format('Y-m-d')) }}"
                class="border rounded w-full p-2">
            @error('date')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">体重 (kg)</label>
            <input type="number" step="0.1" name="weight"
                value="{{ old('weight', $weightLog->weight) }}"
                class="border rounded w-full p-2">
            @error('weight')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">摂取カロリー (cal)</label>
            <input type="number" name="calories"
                value="{{ old('calories', $weightLog->calories) }}"
                class="border rounded w-full p-2">
            @error('calories')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">運動時間</label>
            <input type="time" name="time"
                value="{{ old('time', $weightLog->time) }}"
                class="border rounded w-full p-2">
            @error('time')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">運動内容</label>
            <input type="text" name="content"
                value="{{ old('content', $weightLog->content) }}"
                class="border rounded w-full p-2">
            @error('content')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-between items-center">

            <a href="{{ route('index') }}" class="px-4 py-2 bg-gray-300 rounded">戻る</a>

            <button type="submit" class="px-4 py-2 bg-pink-400 text-white rounded">更新</button>
        </div>
    </form>

</div>
@endsection