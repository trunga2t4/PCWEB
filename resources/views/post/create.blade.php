@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-sm-2 col-md-3 col-lg-4"></div>
             <div class="col-sm-8 col-md-6 col-lg-4 card ">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                    </div>

                    <div class="form-group row justify-content-center">
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label for="caption">Caption</label>
                        <input class="form-control" type="text" name="caption" id="caption">
                    </div>

                   <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-primary">Post It</button>
                    </div>
                </form>
            </div>
             <div class="col-sm-2 col-md-3 col-lg-4"></div>
        </div>
    </div>
@endsection



