<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('userpage.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();

            if (!Hash::check($request->get('password'), $user->password)) {
                throw new Exception('Mật khẩu không chính xác');
            }

            session()->put('user_id', $user->user_id);
            session()->put('name', $user->name);

            return redirect()->route('userpage.index');
        } catch (\Throwable $th) {
            return redirect()->route('userpage.login')->with('error', 'Email không chính xác');
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('userpage.index');
    }
}
