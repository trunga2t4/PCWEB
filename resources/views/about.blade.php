@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-6 card ">
                <h1>Feature</h1>
                <ul>
                    <li>Users are forced to login in order to see the posts</li>
                    <li>Homepage shows posts from all users, ordered from the last updated_at</li>
                    <li>Profile page shows all user's posts</li>
                    <li>Admin user is created by seeding (admin@blog.com/password)</li>
                    <li>User can only edit/delete his/her posts, but not others</li>
                    <li>Admin user can edit/delete all posts</li>
                    <li>Show user's current weather to all pages, using a weather API</li>
                    <li>Add css changes when moving mouse into, and out of the elements</li>
                    <li>Rating system</li>
                    <li>Implement Heroku, image can not be shown</li>
                </ul>
            </div>
            <div class="col-6 card ">
                <h1>Progressing</h1>
                <ul>
                    <li>Room for improving the look using CSS and Bootstrap</li>
                    <li>Auto expanding the home and profile pages when scrolling down</li>
                    <li>Auto adding new post from other to home page when there is new post</li>
                    <li>Follower system (show post from your followees on top - database is ready)</li>
                    <li>Proper Authorization and Eloquent Relationship</li>
                </ul>
            </div>
        </div>
    </div>
@endsection