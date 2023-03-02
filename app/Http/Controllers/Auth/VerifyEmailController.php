<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home')->with('message', 'Bạn đã xác minh tài khoản thành công!');
    }
}
