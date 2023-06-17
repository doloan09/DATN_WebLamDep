<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories     = Category::query()->whereNull('child_id')->whereNot('slug', 'tham-khao')->get();
        $category_child = Category::query()->whereNotNull('child_id')->get();
        $user           = Auth::user();
        $videos_main    = Video::query()->inRandomOrder()->limit(1)->get();
        $videos_nav     = Video::query()->inRandomOrder()->limit(5)->get();
        $videos         = Video::query()->whereNull('id_playlist')->paginate(9); // video don
        $play_lists     = [];                                                      // danh sach phat
        $videos_list    = [];                                                      // video dau tien trong danh sach phat

        $playlists = Playlist::query()->get();
        foreach ($playlists as $playlist) {
            $list = Video::query()->where('id_playlist', $playlist->id)->whereNotNull('id_playlist')->orderByDesc('public_at')->get();
            if (count($list)) {
                $play_lists[]               = $playlist;
                $videos_list[$playlist->id] = $list[0];
            }
        }

        return view('client.videos.list', compact('categories', 'user', 'videos_list', 'videos_nav', 'videos_main', 'videos', 'play_lists', 'category_child'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $categories     = Category::query()->whereNull('child_id')->whereNot('slug', 'tham-khao')->get();
            $category_child = Category::query()->whereNotNull('child_id')->get();
            $user           = Auth::user();
            $videos_main    = Video::query()->where('slug', $slug)->first();
            $videos_nav     = Video::query()->inRandomOrder()->limit(5)->get();
            $playlist       = Video::query()->where('id_playlist', $videos_main->id_playlist)->whereNotNull('id_playlist')->orderByDesc('public_at')->get();

            if ($videos_main) {
                return view('client.videos.show', compact('categories', 'user', 'videos_nav', 'videos_main', 'playlist', 'category_child'));
            } else {
                return abort(404);
            }
        } catch (\Exception $exception) {
            return abort(500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
