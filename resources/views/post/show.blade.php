@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-6 col-lg-8 card">
            <div class="row pt-3">
            @if (($post->user_id == $user ->id) or ($user -> type == 'admin'))
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <form action="{{ route('post.edit', $post) }}" enctype="multipart/form-data" method="post">
                        @csrf
                            <input name="_method" type="hidden" value="GET">
                            <button name="editrecord" class="btn btn-default" type="submit">Edit</button>
                        </form>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <form action="{{ route('post.destroy', $post) }}" enctype="multipart/form-data" method="post">
                        @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button name="delrecord" class="btn btn-default" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                
            @else
                <div class="col-md-2">
                    <h2>{{$user2->name}}</h2>
                </div>

                @if ($post->user_id !== $user ->id)
                    @if (!empty($yourBookmark))
                        <div class="col-md-10">
                        <form action="{{ route('bookmark.update', $yourBookmark)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group row">
                                <input name="_method" type="hidden" value="PATCH">
                                <label for="updatereview" class="col-md-2 col-form-label text-md-right">Date</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="date" name="updatedate" id="updatedate" value="{{ $yourBookmark->date }}">
                                </div>
                                <label for="updaterating" class="col-md-2 col-form-label text-md-right">Trip</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="number" name="updatetrip" id="updatetrip" value="{{ $yourBookmark->trip }}">
                                </div>
                                <div class="form-group col-md-2 justify-content-center px-3">
                                    <button type="submit" class="btn btn-primary">Update Bookmark</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    @else
                        <div class="col-md-10">
                        <form action="{{ route('bookmark.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="form-group row">
                                <input class="form-control hidden" type="hidden" name="storerpost2" id="storerpost2" value="{{ $post->id }}">
                                <label for="storereview" class="col-md-2 col-form-label text-md-right">Date</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="date" name="storedate" id="storedate">
                                </div>
                                <label for="storerating" class="col-md-2 col-form-label text-md-right">Trip</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="number" name="storetrip" id="storetrip">
                                </div>
                                <div class="form-group col-md-2 justify-content-center px-3">
                                    <button type="submit" class="btn btn-primary">Bookmark</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    @endif
                @endif
            @endif
            </div>
            <img src="/storage/{{ $post->image }}" class="w-100 p-3">
        </div>
        <div class="col-sm-8 col-md-6 col-lg-4 card">
                <div class="row p-3 m-3 card" style = "overflow-wrap: break-word;">
                    {{$post->caption}}  
                </div>
                <div class="row px-3">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <b>Rating</b>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        {{$post->rating}}
                    </div>   
                </div>
                <div class="row px-3">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <b>Reviews</b>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        {{$post->review}}
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <b>Bookmarks</b>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        {{$post->bookmark}}
                    </div>
                </div>
                @if ($post->user_id !== $user ->id)
                    @if (!empty($yourReview))
                        <form action="{{ route('review.update', $yourReview)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row px-3 mx-1">
                                <label for="updatereview" class="row px-3">Review</label>
                                <textarea class="form-control px-3" style="resize:none" type="text" rows="5" name="updatereview" id="updatereview" value="{{ $yourReview->review }}">{{ $yourReview->review }}</textarea>
                            </div>
                            <div class="form-group row px-3 mx-1">
                                <label for="updaterating" class="row px-3">Rating</label>
                                <input class="form-control px-3" type="number" name="updaterating" id="updaterating" value="{{ $yourReview->rating }}">
                            </div>
                            <div class="form-group row justify-content-center px-3">
                                <button type="submit" class="btn btn-primary">Update Review</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('review.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                            <input class="form-control hidden" type="hidden" name="storerpost" id="storerpost" value="{{ $post->id }}">
                            <div class="form-group row px-3 mx-1">
                                <label for="storereview" class="row px-3">Review</label>
                                <textarea class="form-control px-3" style="resize:none" type="text" rows="5" name="storereview" id="storereview"></textarea>
                            </div>
                            <div class="form-group row px-3 mx-1">
                                <label for="storerating" class="row px-3">Rating</label>
                                <input class="form-control px-3" type="number" name="storerating" id="storerating">
                            </div>
                            <div class="form-group row justify-content-center px-3">
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </div>
                        </form>
                    @endif
                @endif
        </div>
    </div>
        @foreach($reviews as $review)
            <div class="row card">
                    <div class="col-sm-4 col-md-3 col-lg-3 px-3">
                        <div class="row px-3">
                               <h2>{{$review->name}}</h2>
                        </div>
                        <div class="row px-3">
                            Rating: {{$review->rating}}
                        </div>
                    </div>
                <div class="col-sm-7 col-md-8 col-lg-8 px-3">
                    <div class="row px-3">
                        Review: {{$review->review}}
                    </div>
                </div>
            </div>
        @endforeach
    
</div>
@endsection
