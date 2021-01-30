@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-sm-1 col-md-2 col-lg-2"></div>
             <div class="col-sm-10 col-md-8 col-lg-8">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="px-3" for="postpic">Post a picture</label>
                    </div>

                    <div class="form-group row justify-content-center">
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label class="px-3" for="caption">Caption</label>
                        <textarea class="form-control mx-3 px-3" style="resize:none" type="text" rows="4" name="caption" id="caption" ></textarea>
                    </div>

                   <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-primary">Post It</button>
                    </div>
                </form>
            </div>
             <div class="col-sm-1 col-md-2 col-lg-2"></div>
        </div>
    </div>
@endsection



