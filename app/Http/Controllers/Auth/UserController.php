<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ],[
            'password.required' => 'Mật khẩu không được bỏ trống!',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự!',
            'password.confirmed' => 'Mật khẩu mới phải trùng nhau!',
        ]);

        try {
            $user = User::query()->findOrFail($id);

            $user->update(['password' => Hash::make($request->get('password'))]);

            return redirect()->route('home')->with(['status' => 'Cập nhật mật khẩu thành công!']);
        }catch (\Exception){
            return abort(404);
        }
    }

    public function update_info(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Họ tên không được bỏ trống!',
        ]);

        try {
            $user = User::query()->findOrFail($id);

            $user->update(['name' => $request->get('name')]);

            return redirect()->route('home')->with(['status' => 'Cập nhật thông tin thành công!']);
        }catch (\Exception){
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return Application|Factory|View
     */
    public function about(){
        $posts_hot = Post::query()->where('status', 1)->limit(4)->get();
        $user = Auth::user();
        $categories = Category::query()->get();
        $wishlist = [];
        if ($user){
            $wishlist = $user->wishlist()->join('posts', 'posts.id', '=', 'wishlists.id_post')->get();
        }
        return view('client.about', compact('user', 'posts_hot', 'wishlist', 'categories'));
    }
}
