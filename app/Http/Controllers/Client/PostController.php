<?php

namespace App\Http\Controllers\Client;

use App\Enum\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
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
        $categories = Category::query()->whereNull('child_id')->whereNot('slug', 'tham-khao')->get();
        $category_child = Category::query()->whereNotNull('child_id')->get();
        $user = Auth::user();

        $posts = Post::query();
        if ($request->get('title')){
            $posts = $posts->where('title', 'like', '%' . $request->get('title') . '%')->get();
        }else {
            $posts = Post::query()->where('status', 1)->orderByDesc('id')->get();
        }

        return view('client.searchs.search', compact( 'categories', 'user', 'posts', 'category_child'));
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
    public function show($category, $slug)
    {
        $posts_hot = Post::query()->where('status', PostStatus::Active)->orderByDesc('id')->inRandomOrder()->limit(4)->get();
        $post = Post::query()->where('slug', $slug)->first();

        // sau 3h mới tiếp tục lưu lượt view của bài viết này trên cùng 1 trình duyệt
        $expiresAt = now()->addHours(3);
        views($post)
            ->cooldown($expiresAt)
            ->record();

        $categories = Category::query()->whereNull('child_id')->whereNot('slug', 'tham-khao')->get();
        $category_child = Category::query()->whereNotNull('child_id')->get();
        $category = Category::query()->findOrFail($post->id_category);
        $user = Auth::user();

        $video = Video::query()->orderByDesc('id')->paginate(1);

        return view('client.posts.detail', compact('post', 'category', 'posts_hot', 'user', 'categories', 'video', 'category_child'));
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
