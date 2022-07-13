<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Socialite;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================ User login ==============================
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
            session()->put('user_email', $user->email);
            session()->put('name', $user->name);

            return redirect()->route('userpage.index');
        } catch (\Throwable $th) {
            return redirect()->route('userpage.login')->withErrors('Email không chính xác');
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('userpage.index');
    }

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')
            ->where('provider_user_id', $provider->getId())
            ->first();
        if ($account) {
            //login in vao trang quan tri
            $account_name = User::where('user_id', $account->user)->first();
            session()->put('user_id', $account->user_id);
            session()->put('user_email', $account->email);
            session()->put('name', $account->name);
            return redirect()->route('userpage.index');
        } else {

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = User::where('email', $provider->getEmail())->first();

            if (!$orang) {
                $orang = User::create([
                    // 'admin_name' => $provider->getName(),
                    // 'admin_email' => $provider->getEmail(),
                    // 'admin_password' => '',
                    // 'admin_status' => 1,

                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'gender' => 1,
                    'birthdate' => '',
                    'password' => '',
                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = User::where('user_id', $account->user)->first();

            session()->put('user_id', $account_name->user_id);
            session()->put('user_email', $account_name->email);
            session()->put('name', $account_name->name);
            return redirect()->route('userpage.index');
        }
    }

    // =================== Admin Login ==================

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function processLoginAdmin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->where('role_id', '!=', 3)
                ->firstOrFail();

            if (!Hash::check($request->get('password'), $user->password)) {
                throw new Exception('Mật khẩu không chính xác');
            }

            session()->put('admin_id', $user->user_id);
            session()->put('admin_name', $user->name);
            session()->put('admin_level', $user->role_id);

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.login')->withErrors('Đăng nhập không thành công');
        }
    }

    public function logoutAdmin()
    {
        session()->flush();
        return redirect()->route('admin.login');
    }
}
