<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showLogin()
    {
        if (Auth::user()){
            return redirect()->route('home');
        }

        $url = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '/';

        return view('client.auth.login');
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        try {
            $validate = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], [
                'email.required'    => 'Email không được bỏ trống!',
                'email.email'       => 'Email không đúng định dạng!',
                'password.required' => 'Password không được bỏ trống!',
            ]);

            $validate['password'] = ($request->get('password'));
            if (Auth::attempt($validate)){
                return redirect()->route('home');
            }

            return redirect()->route('login.show')->with('message', 'Thông tin tài khoản không đúng!');
        }catch (\Exception $e){
            $err = $e->errors();
            $errorEmail = isset($err['email'][0]) ? $err['email'][0] : "";
            $errorPassword = isset($err['password'][0]) ? $err['password'][0] : "";

            return redirect()->route('login.show')->with('errorEmail', $errorEmail)->with('errorPassword', $errorPassword);
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showRegister()
    {
        if (Auth::user()){
            return redirect()->route('home');
        }
        return view('client.auth.register');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register(UserRequest $request)
    {
        try {
            $validate = $request->validated();

            $validate['password'] = Hash::make($validate['password']);
            $validate['created_at'] = Carbon::now();
            $validate['updated_at'] = Carbon::now();
            User::query()->insert($validate);

            $req = $request->only('email', 'password');
            Auth::attempt($req);

            return redirect()->route('home')->with('message', 'Bạn đã đăng ký tài khoản thành công!');
        }catch (\Exception $e){
            $err = $e->errors();
            return redirect()->route('register.show')->with('errorName', $err['name'][0] ?? '')->with('errorEmail', $err['email'][0] ?? '')->with('errorPassword', $err['password'][0] ?? '');
        }
    }

    /// Login fb, gg
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $ggUser = Socialite::driver('google')->stateless()->user();

        $userCheck = User::where('email', $ggUser->email)->first();

        if ($userCheck){
            Auth::login($userCheck);

            return redirect()->route('home');
        }

        // $user->token
        $user = User::updateOrCreate([
            'google_id' => $ggUser->id,
        ], [
            'name' => $ggUser->name,
            'email' => $ggUser->email,
            'password' => Hash::make('12345678'),
            'avatar' => $ggUser->avatar,
            'google_token' => $ggUser->token,
            'google_refresh_token' => $ggUser->refreshToken,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home')->with('message', 'Bạn đã đăng nhập thành công! Vui lòng kiểm tra email để xác thực tài khoản của bạn!');
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
        $githubUser = Socialite::driver('facebook')->stateless()->user();

        $userCheck = User::where('email', $githubUser->email)->first();

        if ($userCheck){
            Auth::login($userCheck);

            return redirect()->route('home');
        }

        // $user->token
        $user = User::updateOrCreate([
            'facebook_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => Hash::make('12345678'),
            'avatar' => $githubUser->avatar,
            'facebook_token' => $githubUser->token,
            'facebook_refresh_token' => $githubUser->refreshToken,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home')->with('message', 'Bạn đã đăng ký thành công! Vui lòng kiểm tra email để xác thực tài khoản của bạn!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/login');
    }

}
