@extends('layouts.app')
@section('content')
<div class="container">
            <div class="row">
                @foreach($posts as $post)
                    @php
                        $yourBookmark = \App\Models\Bookmarks::where(['post_id' => $post->id, 'user_id' =>$user->id])->first();
                    @endphp
                    <div class="postCard col-sm-6 col-md-6 col-lg-4 col-xl-3 card px-3">
                            <div class="row py-3">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <form action="{{ route('bookmark.destroy', $yourBookmark)}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button name="delbookmark" class="btn btn-danger" type="submit" formaction="{{ route('bookmark.destroy', $yourBookmark)}}">&#8213;</button>
                                    </form>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <div class="row">
                                        Trip number: {{$post->trip}}
                                    </div>
                                    <div class="row">
                                        Travelling date: {{$post->date}}
                                    </div>
                                </div>
                            </div>
                        <a href="/post/{{$post->id}}">
                            <div class="row p-3">
                                <img src="/storage/{{$post->image}}" class="w-100">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
</div>
@endsection