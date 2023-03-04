<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class LikeNotifyController extends Controller
{
    public function store($id, $slug) // đánh dấu thông báo là đã đọc, đồng thời chuyên sang trang bài viết tương ứng
    {
        Notification::where('id', $id)->update(['read_at' => now()]);
        return redirect()->route('posts.show', $slug);
    }
}
