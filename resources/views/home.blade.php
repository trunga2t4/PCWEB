@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
            <div class="row px-3">
                @foreach($posts as $post)
                        <div class="postCard col-sm-6 col-md-6 col-lg-4 col-xl-3 card px-3">
                            @if (($post->user_id == $user ->id) or ($user -> type == 'admin'))
                                <div class="row">
                                    <form action="{{ route('post.destroy', $post) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button name="delrecord" class="btn btn-danger" type="submit">&#10007;</button>
                                    </form>
                                </div>
                            @endif
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