<?php

namespace App\Http\Controllers;

use App\Enum\PostStatus;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts_hot = Post::query()->where('status', 1)->limit(4)->get();
        $categories = Category::query()->get();
        $user = Auth::user();
        $wishlist = [];
        if ($user){
            $wishlist = $user->wishlist()->join('posts', 'posts.id', '=', 'wishlists.id_post')->paginate(4);
        }

        $posts = Post::query();
        if ($request->get('title')){
            $posts = $posts->where('title', 'like', '%' . $request->get('title') . '%');
        }

        $posts = $posts->paginate();

        return view('client.home', compact('posts_hot', 'categories', 'user', 'wishlist', 'posts'));
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
    public function show($slug)
    {
        $posts_hot = Post::query()->where('status', PostStatus::Active)->limit(4)->get();
        $post = Post::query()->where('slug', $slug)->first();

        // sau 3h mới tiếp tục lưu lượt view của bài viết này trên cùng 1 trình duyệt
        $expiresAt = now()->addHours(3);
        views($post)
            ->cooldown($expiresAt)
            ->record();

        $categories = Category::query()->get();
        $category = Category::query()->findOrFail($post->id_category);
        $user = Auth::user();

        return view('client.posts.detail', compact('post', 'category', 'posts_hot', 'user', 'categories'));
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
        //
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
}
