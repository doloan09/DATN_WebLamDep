<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPassController extends Controller
{
    public function showForgotPass () {
        return view('client.auth.forgot-password');
    }

    public function forgotPass(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required' => 'Email không được bỏ trống!',
            'email.email' => 'Email không đúng định dạng!',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Vui lòng kiểm tra email để đặt lại mật khẩu!'])
            : back()->withErrors(['email' => 'Không tồn tại tài khoản với email này! Vui lòng kiểm tra lại!']);
    }

    public function showResetPass ($token) {
        return view('client.auth.reset-password', ['token' => $token]);
    }

    public function resetPass (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ],[
            'token.required' => 'Token không được bỏ trống!',
            'email.required' => 'Email không được bỏ trống!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Mật khẩu không được bỏ trống!',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự!',
            'password.confirmed' => 'Mật khẩu phải trùng nhau!',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login.show')->with('status', 'Đặt lại mật khẩu thành công! Vui lòng đăng nhập tài khoản!')
            : back()->withErrors(['email' => 'Không tồn tại tài khoản với email này! Vui lòng kiểm tra lại!']);
    }
}
