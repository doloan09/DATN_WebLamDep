<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Post;

class LikeNotifyController extends Controller
{
    public function store($id, $slug) // đánh dấu thông báo là đã đọc, đồng thời chuyên sang trang bài viết tương ứng
    {
        Notification::where('id', $id)->update(['read_at' => now()]);
        $post     = Post::query()->where('slug', $slug)->first();
        $category = Category::query()->findOrFail($post->id_category);
        return redirect()->route('posts.show', ['category' => $category->slug, 'slug' => $slug]);
    }
}
