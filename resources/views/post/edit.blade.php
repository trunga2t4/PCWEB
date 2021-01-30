@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-sm-2 col-md-3 col-lg-4"></div>
          <div class="col-sm-8 col-md-6 col-lg-4 card ">
               <form action="{{ route('post.update', $post) }}" enctype="multipart/form-data" method="post">
                   @csrf
                   <input name="_method" type="hidden" value="PATCH">

                   <div class="form-group row ">
                        <label for="postpic">Current post picture</label>
                    </div>

                    <div class="form-group row justify-content-center">
                        <img class="w-100 p-3" src="/storage/{{ $post->image }}">
                    </div>

                    <div class="form-group row justify-content-center">
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label for="caption">Edit your caption</label>
                        <input class="form-control" type="text" name="caption" id="caption" value="{{ $post->caption }}">
                    </div>

                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-primary">Repost It</button>
                    </div>
               </form>
           </div>
           <div class="col-sm-2 col-md-3 col-lg-4"></div>
       </div>
   </div>
@endsection



