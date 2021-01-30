<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Post;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = DB::table("bookmarks")
            ->where('bookmarks.user_id', '=', $user->id)
            ->join('posts', 'bookmarks.post_id', '=', 'posts.id')
            ->orderBy('bookmarks.id', 'desc')
            ->get();

        $postscount = Bookmarks::where('user_id', $user->id)->count();
        return view('bookmark', [
            'user' => $user,
            'posts' => $posts,
            'postscount' => $postscount
        ]);
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
     * @param  \App\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmarks $bookmarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmarks $bookmarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmarks $bookmarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmarks $bookmarks)
    {
        //
    }
}
