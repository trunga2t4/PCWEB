@extends('layouts.app')
@section('content')
   <div class="container">
        @if ($profile == null)
            <div>Please login</div>
        @else
            <div class="row">
               <div class="col-sm-2 col-md-3 col-lg-4"></div>
                <div class="col-sm-8 col-md-6 col-lg-4 card ">
                    <form action="{{ route('profile.update', $profile->user_id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="description">Description</label>
                            <input class="form-control" type="text" name="description" id="description"
                                value="{{ $profile->description }}">
                        </div>
                        <div class="form-group row justify-content-center">
                            <img class="w-100 p-3"  src="/storage/{{ $profile->image }}">
                        </div>
                        <div class="form-group row justify-content-center">
                            <input type="file" name="profilepic" id="profilepic">
                        </div>
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">Edit profile</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 col-md-3 col-lg-4"></div>
            </div>
        @endif
   </div>
@endsection