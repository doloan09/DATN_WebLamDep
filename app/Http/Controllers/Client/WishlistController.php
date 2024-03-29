<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            User::query()->findOrFail($request->get('id_user'));
            Post::query()->findOrFail($request->get('id_post'));

            $wishlist = Wishlist::query()->where('id_post', $request->get('id_post'))->where('id_user', $request->get('id_user'))->first();
            if ($wishlist){
                $wishlist->delete();
                return back()->with(['wishlist' => 'Xóa thành công vào danh sách yêu thích!']);
            }

            Wishlist::query()->insert([
                'id_post' => $request->get('id_post'),
                'id_user' => $request->get('id_user')
            ]);

            return back()->with(['wishlist' => 'Thêm thành công vào danh sách yêu thích!']);
        }catch (\Exception){
            toastr()->error('Vui lòng đăng nhập để thêm bài viết vào danh mục yêu thích!', 'Thông báo');
            return back()->with(['wishlist_err' => 'Vui lòng đăng nhập để thêm bài viết vào mục yêu thích!']);
        }
    }

}
