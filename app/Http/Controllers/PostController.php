<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bookmarks;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class PostController extends Controller
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
        return view('post.create');
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
            'caption' => 'required',
            'postpic' => ['required', 'image'],
        ]);

        // store the image in uploads, under public
        // request(‘profilepic’) is like $_GET[‘profilepic’]
        $imagePath = request('postpic')->store('uploads', 'public');

        // create a new profile, and save it
        $user = Auth::user();
        $post = new Post();
        $post->user_id = $user->id;
        $post->caption = request('caption');
        $post->image = $imagePath;
        $post->rating = null;
        $post->review = 0;
        $post->bookmark = 0;
        $saved = $post->save();

        // if it saved, we send them to the profile page
        if ($saved) {
            return redirect('/profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postID)
    {
        $post = Post::where('id', $postID)->first();
        $user = Auth::user();
        $user2 = User::where('id', $post->user_id)->first();
        $reviews = Reviews::where('post_id', $post->id)->get();
        $yourReview = Reviews::where('post_id', $post->id)->where('user_id', $user->id)->first();
        $yourBookmark = Bookmarks::where('post_id', $post->id)->where('user_id', $user->id)->first();

        return view('post.show', [
            'post' => $post,
            'user' => $user,
            'user2' => $user2,
            'reviews' => $reviews,
            'yourReview' => $yourReview,
            'yourBookmark' => $yourBookmark
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $user = Auth::user();

        return view('post.edit', [
            'post' => $post,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'caption' => 'required',
            'postpic' => 'image',
        ]);
        $user = Auth::user();

        $post->caption = request('caption');
        // Save the new post pic... if there is one in the request()!
        if (request()->has('postpic')) {
            $imagePath = request('postpic')->store('uploads', 'public');
            $post->image = $imagePath;
        }
        // Now, save it all into the database
        if (($user->id == $post->user_id) or ($user->type == 'admin')) {
            $updated = $post->save();
        }

        if ($updated) {
            $tempID = $post->id;
            return redirect('/post/' . $tempID);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $user = Auth::user();
        if (($user->id == $post->user_id) or ($user->type == 'admin')) {
            $post->delete();
        }

        return redirect()->back();
    }
}
