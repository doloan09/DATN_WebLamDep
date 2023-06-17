<?php

namespace App\Http\Controllers\Client;

use App\Enum\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts_hot      = Post::query()->where('status', PostStatus::Active)->inRandomOrder()->limit(4)->get();
        $categories     = Category::query()->whereNull('child_id')->whereNot('slug', 'tham-khao')->get();
        $category_child = Category::query()->whereNotNull('child_id')->get();
        $category       = Category::query()->where('slug', $slug)->first();
        $posts          = $category->posts()->orderByDesc('id')->paginate(16);
        $user           = Auth::user();
        $video          = Video::latest()->first();

        return view('client.posts.list', compact('posts', 'posts_hot', 'category', 'user', 'categories', 'video', 'category_child'));
    }

}
