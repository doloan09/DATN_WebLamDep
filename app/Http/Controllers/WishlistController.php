<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            User::query()->findOrFail($request->get('id_user'));
            Post::query()->findOrFail($request->get('id_post'));

            $wishlist = Wishlist::query()->where('id_post', $request->get('id_post'))->where('id_user', $request->get('id_user'))->first();
            if ($wishlist){
                $wishlist->delete();
                return back()->with(['wishlist' => 'Thêm thành công vào danh sách yêu thích!']);
            }

            Wishlist::query()->insert([
                'id_post' => $request->get('id_post'),
                'id_user' => $request->get('id_user')
            ]);

            return back()->with(['wishlist' => 'Thêm thành công vào danh sách yêu thích!']);
        }catch (\Exception){
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        //
    }
}
