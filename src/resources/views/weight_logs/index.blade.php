@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow rounded p-4 text-center">
            <p class="text-gray-500">目標体重</p>
            <p class="text-2xl font-bold">{{ number_format($targetWeight, 1) }}kg</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <p class="text-gray-500">目標まで</p>
            <p class="text-2xl font-bold">{{ number_format($diff, 1) }}kg</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <p class="text-gray-500">最新体重</p>
            <p class="text-2xl font-bold">{{ number_format($currentWeight, 1) }}kg</p>
        </div>
    </div>

    <form method="GET" class="flex gap-2 mb-4">
        <input type="date" name="from" value="{{ request('from') }}" class="border rounded p-2">
        <span>〜</span>
        <input type="date" name="to" value="{{ request('to') }}" class="border rounded p-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">検索</button>
    </form>

    <div class="bg-white shadow rounded">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">日付</th>
                    <th class="p-2">体重</th>
                    <th class="p-2">摂取カロリー</th>
                    <th class="p-2">運動時間</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-2">{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                    <td class="p-2">{{ number_format($log->weight, 1) }}kg</td>
                    <td class="p-2">{{ $log->calories }}kcal</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($log->exercise_time)->format('H:i') }}</td>
                    <td class="p-2 text-right">
                        <a href="{{ route('weight_logs.edit', $log->id) }}" class="text-purple-500">✏️</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection