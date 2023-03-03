<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function verifySend(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Đã gửi liên kết xác minh! Vui lòng kiểm tra email của bạn!');
    }

    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home')->with('message', 'Bạn đã xác minh tài khoản thành công!');
    }
}
