@extends('layouts.app')
@section('content')
<div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="postCard col-sm-6 col-md-4 col-lg-3 card px-3">
                        <a href="/post/{{$post->id}}">
                            <div class="row p-3">
                                <img src="/storage/{{$post->image}}" class="w-100">
                            </div>
                            
                            <div class="row px-3">
                               Trip number: {{$post->trip}}
                            </div>
                            <div class="row px-3">
                               Travelling date: {{$post->date}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
</div>
@endsection