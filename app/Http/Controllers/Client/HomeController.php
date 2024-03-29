<?php

namespace App\Http\Controllers\Client;

use App\Enum\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts_hot      = Post::query()->where('status', PostStatus::Active)->inRandomOrder()->limit(4)->get();
        $categories     = Category::query()->whereNull('child_id')->whereNot('slug', 'tham-khao')->get();
        $category_child = Category::query()->whereNotNull('child_id')->get();
        $user           = Auth::user();
        $posts          = Post::query()->inRandomOrder()->limit(6)->get();
        $posts          = $posts->chunk(2);
        $posts_3        = Post::query()->inRandomOrder()->limit(3)->get();
        $list_img       = Image::query()->join('folder_images', 'folder_images.id', '=', 'images.id_folder')->where('folder_images.name', 'like', '%Nổi bật%')->inRandomOrder()->limit(4)->get();

        return view('client.home', compact('posts_hot', 'categories', 'user', 'posts', 'posts_3', 'list_img', 'category_child'));
    }

}
