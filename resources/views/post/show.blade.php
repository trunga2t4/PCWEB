@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-sm-5 col-md-4 col-lg-3 card">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3">
            @if (($post->user_id == $user ->id) or ($user -> type == 'admin'))
                
                <form action="{{ route('post.destroy', $post) }}" enctype="multipart/form-data" method="post">
                @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <a href="/post/{{$post->id}}/edit">Edit Post</a>
                    <button name="delrecord" class="btn btn-default" type="submit">Delete Post</button>
                </form>
            @else

            @endif
            <h2>{{$user2->name}}</h2>
            <p> {{$post->caption}}</p>
        </div>
        <div class="col-sm-1 col-md-2 col-lg-3"></div>
    </div>
    
</div>
@endsection
