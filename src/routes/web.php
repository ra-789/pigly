<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WeightLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::get('/register/step1', [RegisterController::class, 'step1'])->name('register.step1');
    Route::post('/register/step1', [RegisterController::class, 'postStep1'])->name('register.postStep1');

    Route::get('/register/step2', [RegisterController::class, 'step2']);
    Route::post('/register/step2', [RegisterController::class, 'postStep2'])->name('register.postStep2');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');
Route::post('/weight_logs', [WeightLogController::class, 'index'])->name('index');

Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'getDetail'])
    ->name('weight_logs.detail'); //詳細
Route::post('/weight_logs/{weightLogId}', [WeightLogController::class, 'update'])
    ->name('weight_logs.update');

Route::post('/logout', function () {
    Auth::logout();              // ログアウト処理
    request()->session()->invalidate(); // セッション無効化
    request()->session()->regenerateToken();
    return redirect('/login');   // ログイン画面へリダイレクト
})->name('logout');
