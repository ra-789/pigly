<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightLogRequest;
use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class WeightLogController extends Controller
{
    public function index(Request $request) //フォーム//
    {
        $userId = auth()->id();

        // 目標体重
        $targetWeight = WeightTarget::where('user_id', $userId)->value('target_weight');

        // 現在体重（最新）
        $currentWeight = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->value('weight');

        // 差分
        $diff = $currentWeight - $targetWeight;

        // 検索条件
        $query = WeightLog::where('user_id', $userId)->orderBy('date', 'desc');

        $from = $request->input('from');
        $to   = $request->input('to');

        if ($from && $to) {
            $query->whereBetween('date', [$from, $to]);
        }

        $logs = $query->paginate(8);

        return view('weight_logs.index', compact(
            'targetWeight',
            'currentWeight',
            'diff',
            'logs',
        ));
    }

    public function getDetail($weightLogId) //詳細
    {
        $weightLog = WeightLog::findOrFail($weightLogId);
        return view('weight_logs.detail', compact('weightLog'));
    }
}
