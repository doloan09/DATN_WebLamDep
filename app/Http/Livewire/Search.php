<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Search extends Component
{
    public $posts;
    public $str = 'Bài viết nổi bật';
    public $wishlist = false;

    public function searchPost(string $title)
    {
        $this->str = 'Kết quả tìm kiếm';
        $this->wishlist = false;
        $this->posts = Post::query();
        if ($title){
            $this->posts = $this->posts->where('title', 'like', '%' . $title . '%');
            $this->posts = $this->posts->get();
        }else{
            $this->posts = [];
        }
    }

    public function wishlist()
    {
        $this->str = 'Danh mục yêu thích';
        $this->wishlist = true;
        $user = Auth::user();
        if ($user){
            $this->posts = $user->wishlist()->join('posts', 'posts.id', '=', 'wishlists.id_post')->get();
        }
    }

    public function postHost()
    {
        $this->str = 'Bài viết nổi bật';
        $this->wishlist = false;
        $this->posts = Post::query()->where('status', 1)->get();
    }

    public function render()
    {
        return view('livewire.search');
    }

}
