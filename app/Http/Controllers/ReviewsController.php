<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bookmarks;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
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
        $data = request()->validate([
            'storereview' => 'required',
            'storerating' => 'required',
        ]);

        $user = Auth::user();
        $review = new Reviews();
        $review->user_id = $user->id;
        $review->post_id = request('storerpost');
        $review->review = request('storereview');
        $review->rating = request('storerating');

        $reviewSaved = $review->save();

        $post = Post::where('id', '=', $review->post_id)->first();
        $post->review = count(Reviews::where('post_id', '=', $review->post_id)->get());
        $post->rating = Reviews::where('post_id', '=', $review->post_id)->sum('rating') / $post->review;

        $postSaved = $post->save();

        // if it saved, we send them to the profile page
        if (($reviewSaved) and ($postSaved)) {
            $tempID = $review->post_id;
            return redirect('/post/' . $tempID);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviews $review)
    {
        $data = request()->validate([
            'updatereview' => 'required',
            'updaterating' => 'required',
        ]);

        $review->review = request('updatereview');
        $review->rating = request('updaterating');

        $reviewSaved = $review->save();

        $post = Post::where('id', '=', $review->post_id)->first();
        $post->review = count(Reviews::where('post_id', '=', $review->post_id)->get());
        $post->rating = Reviews::where('post_id', '=', $review->post_id)->sum('rating') / $post->review;


        $postSaved = $post->save();

        // if it saved, we send them to the profile page
        if (($reviewSaved) and ($postSaved)) {
            $tempID = $review->post_id;
            return redirect('/post/' . $tempID);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
