<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$posts = Post::orderBy('updated_at', 'desc')->take(30)->get();
        $user = Auth::user();
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('home', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
