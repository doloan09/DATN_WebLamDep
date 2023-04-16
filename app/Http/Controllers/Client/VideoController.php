<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::query()->get();
        $user = Auth::user();

        $videos_main = Video::query()->inRandomOrder()->limit(1)->get();
        $videos_nav = Video::query()->inRandomOrder()->limit(5)->get();
        $videos_list = Video::query()->where('link_video', 'like', '%&list=%')->inRandomOrder()->limit(6)->get();  // danh sach phat
        $videos = Video::query()->where('link_video', 'not like', '%&list=%')->paginate(9);

        return view('client.videos.list', compact('categories', 'user', 'videos_list', 'videos_nav', 'videos_main', 'videos'));
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
        try {
            $categories = Category::query()->get();
            $user = Auth::user();

            $videos_main = Video::query()->where('slug', $slug)->first();
            $videos_nav = Video::query()->inRandomOrder()->limit(5)->get();

            if ($videos_main) {
                return view('client.videos.show', compact('categories', 'user', 'videos_nav', 'videos_main'));
            }else{
                return abort(404);
            }
        }catch (\Exception $exception){
            return abort(500);
        }
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
