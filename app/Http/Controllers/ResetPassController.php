<?php

namespace App\Http\Controllers;

use App\Events\ResetPassEvent;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPassController extends Controller
{
    public function resetPassPage(Request $request)
    {
        $forgot = false;
        if ($request->get('action') === 'forgot') {
            $forgot = true;
        }
        return view('userpage.reset-pass', ['forgot' => $forgot]);
    }

    public function index(Request $request)
    {
        $random_string = Str::random(5);
        $action = $request->get('action');
        $email = session()->get('user_email');

        // Trường hợp reset pass
        if ($action === 'reset-pass') {
            $email_user = $request->get('email');
            $user = User::query()->where('email', $email_user)->first();

            // Kiểm tra xem nhập đúng email hay chưa
            if ($user) {
                $user_id = $user->user_id;
                $exist_user = Token::query()->where('user_id', $user_id)->first();

                // Kiểm tra user có tồn tại trong table chưa
                if ($exist_user) {
                    Token::query()
                        ->where('user_id', $user_id)
                        ->update([
                            'reset_token' => $random_string
                        ]);
                } else {
                    Token::query()->create([
                        'reset_token' => $random_string,
                        'email' => $email,
                        'user_id' => $user_id
                    ]);
                }
                $token = Token::query()->where('user_id', $user_id)->first();
                ResetPassEvent::dispatch($token);

                // Lưu email vào section để tìm kiếm user bằng email
                session()->put('email_reset', $email_user);
                return redirect()->route('userpage.page-reset');
            } else {
                return redirect()->back()->withErrors('Email không chính xác');
            }
        }
        // Trường hợp đổi mật khẩu khi đã đăng nhập thành công
        else {
            $user_id = session()->get('user_id');
            $exist_user = Token::query()->where('user_id', $user_id)->first();

            // Kiểm tra user có tồn tại trong table chưa
            if ($exist_user) {
                Token::query()
                    ->where('user_id', $user_id)
                    ->update([
                        'reset_token' => $random_string
                    ]);
            } else {
                Token::query()->create([
                    'reset_token' => $random_string,
                    'email' => $email,
                    'user_id' => $user_id
                ]);
            }
            $token = Token::query()->where('user_id', $user_id)->first();
            ResetPassEvent::dispatch($token);
        }
        return redirect()->route('userpage.page-reset')->with('success', 'Kiểm tra email để lấy mã');
    }

    public function processChangePass(Request $request)
    {
        $user_id = session()->get('user_id');
        $new_password = $request->get('password');
        $re_password = $request->get('re_password');
        $token = $request->get('reset_token');
        $exist_token = Token::query()->where('reset_token', $token)->first();

        if (!$exist_token) {
            echo json_encode('Mã xác nhận không chính xác');
            return;
        } else {
            if ($user_id == null) {
                User::query()
                    ->where('email', session()->get('email_reset'))
                    ->update([
                        'password' => Hash::make($new_password)
                    ]);
            } else {
                User::query()
                    ->where('user_id', $user_id)
                    ->update([
                        'password' => Hash::make($new_password)
                    ]);
            }
            echo json_encode('success');
            return;
        }
    }
}
