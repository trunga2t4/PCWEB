@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-6 col-lg-7 card"> <img src="/storage/{{ $post->image }}" class="w-100 p-3"> </div>
        <div class="col-sm-8 col-md-6 col-lg-5 ">
            <div class="row p-3 card">
             <div class="row p-3">
                <div class="col-sm-6 col-md-8 col-lg-8 col-12">
                    <h3><b>{{$user2->name}}</b></h3>
                </div>
                @if ($post->user_id == $user ->id)
                    <div class="col-sm-3 col-md-2 col-lg-2 col-6">
                        <form action="{{ route('post.edit', $post) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="GET">
                            <button name="editrecord" class="btn btn-primary" type="submit">&#x270E;</button>
                        </form>
                    </div>
                    @endif
                    @if (($post->user_id == $user ->id) or ($user -> type == 'admin'))
                    <div class="col-sm-3 col-md-2 col-lg-2 col-6">
                        <form action="{{ route('post.destroy', $post) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button name="delrecord" class="btn btn-danger" type="submit">&#10007;</button>
                        </form>
                    </div>
                @endif
                </div>
                <div class="row p-3 mx-3 mb-3 card" style = "overflow-wrap: break-word;">
                    {{$post->caption}}  
                </div>
                <div class="row px-3">
                    <div class="col-sm-6 col-md-6 col-lg-6 "> <b>Rating</b> </div>
                    @php
                        if ($post->rating === null){$tempRating = "NA";}else{$tempRating = $post->rating . "/5";}
                    @endphp
                    <div class="col-sm-6 col-md-6 col-lg-6 "> {{$tempRating}} </div>   
                </div>
                <div class="row px-3">
                    <div class="col-sm-6 col-md-6 col-lg-6 "> <b>Reviews</b> </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 "> {{$post->review}} </div>
                </div>
                <div class="row px-3">
                    <div class="col-sm-6 col-md-6 col-lg-6 "> <b>Bookmarks</b> </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 "> {{$post->bookmark}} </div>
                </div>
            </div>
             <div class="row p-3">
                @if ($post->user_id !== $user ->id)
                    <h3><b>My Review</b></h3>
                    @if (!empty($yourReview))
                        <form action="{{ route('review.update', $yourReview)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row px-3">
                                <div class="col-sm-6 col-md-8 col-lg-8 ">
                                    <label for="updatereview">Review</label>
                                <textarea class="form-control px-3" style="resize:none" type="text" rows="4" name="updatereview" id="updatereview" value="{{ $yourReview->review }}">{{ $yourReview->review }}</textarea>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4 ">
                                    <label for="updaterating" >Rating</label>
                                    <input class="form-control px-3" type="number" name="updaterating" id="updaterating" value="{{ $yourReview->rating }}">
                                    <div class="form-group row justify-content-center px-3 mt-3">
                                        <button type="submit" class="btn btn-primary">Update</button>                          
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('review.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input class="form-control hidden" type="hidden" name="storepost" id="storepost" value="{{ $post->id }}">
                            <div class="row px-3">
                                <div class="col-sm-6 col-md-8 col-lg-8 ">
                                    <label for="storereview">Review</label>
                                    <textarea class="form-control px-3" style="resize:none" type="text" rows="4" name="storereview" id="storereview"></textarea>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4 ">
                                    <label for="storerating">Rating</label>
                                    <select id="storerating" name="storerating" class="form-control">
                                        @for ($i = 1; $i<=4; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                        <option value="5" selected>5</option>
                                    </select>
                                    <div class="form-group row justify-content-center px-3 mt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
                <div class="row p-3">
                @if ($post->user_id !== $user ->id)
                    <div><h3><b>My Bookmark</b></h3></div>
                    @if (!empty($yourBookmark))
                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 px-3">
                            <form action="{{ route('bookmark.update', $yourBookmark)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="col-sm-7 col-md-7 col-lg-7 col-xl-8 px-3">
                                        <label for="updatereview">Date</label>
                                        <input class="form-control px-1" type="date" name="updatedate" id="updatedate" value="{{ $yourBookmark->date }}">
                                    </div>
                                    <div class="col-sm-3 col-md-4 col-lg-4 col-xl-3">
                                        <label for="updaterating">Trip</label>
                                        <select id="updatetrip" name="updatetrip" class="form-control px-1">
                                            @for ($i = 1; $i<=10; $i++)
                                                @if ($yourBookmark->trip == $i){<option value="{{$i}}" selected>{{$i}}</option> }
                                                @else{ <option value="{{$i}}">{{$i}}</option> }
                                                @endif
                                            @endfor
                                        </select>
                                    </div>                                 
                                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 px-1">
                                            <button type="submit" class="btn btn-primary">&#x270E;</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 px-3">
                            <form action="{{ route('bookmark.destroy', $yourBookmark)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button name="delbookmark" class="btn btn-danger" type="submit" formaction="{{ route('bookmark.destroy', $yourBookmark)}}">&#10007;</button>
                            </form>
                        </div>
                    @else
                        <div class="row px-3">
                        <form action="{{ route('bookmark.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="storepost2" id="storepost2" value="{{ $post->id }}">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-7 px-3">
                                    <label for="storereview" >Date</label>
                                    <input class="form-control px-1" type="date" name="storedate" id="storedate">
                                </div>
                                <div class="col-sm-3 col-md-4 col-lg-4 col-xl-3">
                                    <label for="storerating" >Trip</label>
                                    <select id="storetrip" name="storetrip" class="form-control">
                                            @for ($i = 1; $i<=10; $i++) 
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                                
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 px-1">
                                    <button type="submit" class="btn btn-primary">Bookmark</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
        @php $index = 0; @endphp
        @foreach($reviews as $review)
            @php $index++; @endphp
            <div class="row card">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-lg-2 px-3">
                        <div class="row px-3">
                            <b>#{{$index}}</b>
                        </div>
                        <div class="row px-3">
                            <b>{{\App\Models\User::where(['id' => $review->user_id])->first()->name}}</b>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-7 col-lg-7 px-3">
                        <div class="row px-3">
                            <b>Review</b>
                        </div>
                        <div class="row px-3">
                            {{$review->review}}
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-2 px-3">
                        <div class="row px-3">
                            <b>Rating</b>
                        </div>
                        <div class="row px-3">
                            {{$review->rating}}/5
                        </div>
                    </div>
                     <div class="col-sm-2 col-md-1 col-lg-1 px-3">
                            @if (($user->id == $review->user_id) or ($user->type == 'admin'))
                                <form action="{{ route('review.destroy', [$review]) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button name="delreview" class="btn btn-danger" type="submit">&#10007;</button>
                                </form>
                            @endif
                    </div>
                </div>
            </div>
        @endforeach
    
</div>
@endsection
