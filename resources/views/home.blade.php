@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
            <div class="row px-3">
                @foreach($posts as $post)
                        <div class="postCard col-sm-6 col-md-4 col-lg-3 card px-3">
                            <a href="/post/{{$post->id}}">
                                <div class="imageHome row p-3">
                                    <img src="/storage/{{$post->image}}" class="w-100">
                                </div>
                                <div class="captionHome row px-3">
                                    {{$post->caption}}
                                </div>
                            </a>
                        </div>
                @endforeach
            </div>
    </div>
</div>
@endsection