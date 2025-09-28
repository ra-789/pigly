<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Step2Request;

class RegisterController extends Controller
{
    public function step1()
    {
        return view('register.step1');
    }

    public function postStep1(Request $request)
    {
        $messages = [
            'name.required'     => 'お名前を入力してください',
            'email.required'    => 'メールアドレスを入力してください',
            'email.email'       => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ];

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], $messages);

        session([
            'register.name'     => $request->name,
            'register.email'    => $request->email,
            'register.password' => bcrypt($request->password),
        ]);
        return redirect('/register/step2');
    }

    public function step2()
    {
        return view('register.step2');
    }

    public function postStep2(Step2Request $request)
    {

        $user = User::create([
            'name'           => session('register.name'),
            'email'          => session('register.email'),
            'password'       => session('register.password'),
            'current_weight' => $request->current_weight,
            'target_weight'  => $request->target_weight,
        ]);

        session()->forget('register');

        return redirect('/weight_logs');
    }
}
