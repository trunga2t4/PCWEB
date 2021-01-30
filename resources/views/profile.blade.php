@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12 card">
            <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-4 col-md-3 col-lg-2 p-3">
                            <img src="/storage/{{ $profile->image }} " class="w-100">
                        </div>
                        <div class="col-sm-8 col-md-9 col-lg-10">
                            <h3>{{ $user->name }}</h3>
                            <span><strong>{{ $postscount }}</strong> posts</span>
                            <div class="pt-3">{{$profile->description}}</div>
                            <div class="pt-3"><a href="/profile/edit">Edit profile</a></div>
                        </div>
                    </div>
               </div>
       </div>
        <div class="col-md-12">
            <div class="row">
                @foreach($posts as $post)
                    <div class="postCard col-sm-6 col-md-4 col-lg-3 card px-3">
                        <a href="/post/{{$post->id}}">
                            <div class="row p-3">
                                <img src="/storage/{{$post->image}}" class="w-100">
                            </div>
                            <div class="row px-3">
                                {{$post->caption}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
   </div>
</div>
@endsection


