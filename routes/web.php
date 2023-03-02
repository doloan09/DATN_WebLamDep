<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPassController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

//Login - logout (User)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show'); // hien thi view login
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show'); // hien thi view sign in
Route::post('/login', [AuthController::class, 'login'])->name('login'); // login
Route::post('/register', [AuthController::class, 'register'])->name('register'); //sign in
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

///Login gg
Route::get('/login/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('login.google.redirect');
Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('login.google.callback');

///Login fb
Route::get('/login/facebook/redirect', [AuthController::class, 'redirectToFacebook'])->name('login.facebook.redirect');
Route::get('/login/facebook/callback', [AuthController::class, 'handleFacebookCallback'])->name('login.facebook.callback');

/// email verify
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify'); // xu ly xac thuc email khi user click vao link trong email xac thuc

/// forgot password
Route::get('/forgot-password', [ResetPassController::class, 'showForgotPass'])->middleware('guest')->name('password.request'); // view forgot pass
Route::post('/forgot-password', [ResetPassController::class, 'forgotPass'])->middleware('guest')->name('password.email'); // gui mail kem link de reset pass
Route::get('/reset-password/{token}', [ResetPassController::class, 'showResetPass'])->middleware('guest')->name('password.reset'); // view reset pass
Route::post('/reset-password', [ResetPassController::class, 'resetPass'])->middleware('guest')->name('password.update'); // reset pass

//
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/trang-chu', [PostController::class, 'index'])->name('home');
Route::get('/gioi-thieu', [AuthController::class, 'about'])->name('about');
Route::get('/danh-muc/{category}', [CategoryController::class, 'show'])->name('categories.show'); // danh sach bai viet theo theo loai
Route::get('/bai-viet/{slug}', [PostController::class, 'show'])->name('posts.show'); // chi tiet 1 bai viet
