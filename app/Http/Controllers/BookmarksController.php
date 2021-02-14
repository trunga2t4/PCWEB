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
            ->orderBy('bookmarks.trip', 'asc')
            ->orderBy('bookmarks.date', 'asc')
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
        $data = request()->validate([
            'storepost2' => 'required',
            'storedate' => 'required',
            'storetrip' => 'required',
        ]);

        $user = Auth::user();
        $bookmark = new Bookmarks();
        $bookmark->user_id = $user->id;
        $bookmark->post_id = request('storepost2');
        $bookmark->date = request('storedate');
        $bookmark->trip = request('storetrip');

        $bookmarkSaved = $bookmark->save();

        $post = Post::where('id', '=', $bookmark->post_id)->first();
        $post->bookmark = count(Bookmarks::where('post_id', '=', $bookmark->post_id)->get());

        $postSaved = $post->save();

        // if it saved, we send them to the profile page
        if (($bookmarkSaved) and ($postSaved)) {
            $tempID = $bookmark->post_id;
            return redirect()->back();
        }
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
    public function update(Request $request, Bookmarks $bookmark)
    {
        $data = request()->validate([
            'updatedate' => 'required',
            'updatetrip' => 'required',
        ]);
        $bookmark->date = request('updatedate');
        $bookmark->trip = request('updatetrip');

        $bookmarkSaved = $bookmark->save();

        // if it saved, we send them to the profile page
        if ($bookmarkSaved) {
            $tempID = $bookmark->post_id;
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmarks $bookmark)
    {
        $tempID = $bookmark->post_id;
        $user = Auth::user();

        $post = Post::where('id', '=', $bookmark->post_id)->first();

        if (($user->id == $bookmark->user_id) or ($user->type == 'admin')) {
            $bookmark->delete();
        }

        $post->bookmark = count(Bookmarks::where('post_id', '=', $bookmark->post_id)->get());
        $postSaved = $post->save();

        return redirect()->back();
    }
}
