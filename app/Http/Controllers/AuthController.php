<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('userpage.login');
    }

    public function processLogin(Request $request) {
        try {
            $user = User::query()
            ->where('email', $request->get('email'))
            ->where('password', $request->get('password'))
            ->firstOrFail();

            session()->put('user_id', $user->user_id);
            session()->put('name', $user->name);

            return redirect()->route('userpage.index');
        } catch (\Throwable $th) {
            return redirect()->route('userpage.login')->with('error', 'Email hoặc mật khẩu không chính xác');
        }
    }

    public function logout(Request $request){
        session()->flush();
        return redirect()->route('userpage.index');
    }
}
