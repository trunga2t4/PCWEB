@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-6 card ">
                <h1>Feature</h1>
                <ul>
                    <li>Users are forced to login in order to see the posts</li>
                    <li>Homepage shows 30 newest posts, from all users</li>
                    <li>Profile page shows all user's posts</li>
                    <li>Admin user is created automatically when migrating (admin@blog.com/password)</li>
                    <li>User can only edit/delete his/her posts, but not others</li>
                    <li>Admin user can edit/delete all posts</li>
                    <li>Add the current weather to your page, using a weather API</li>
                    <li>JavaScript requirements: add some jQuery animations when buttons are clicked!</li>
                    <li>Add some loading image when waiting for page to be loaded</li>
                    <li>Add css changes when moving mouse into, and out of the elements</li>
                </ul>
            </div>
            <div class="col-6 card ">
                <h1>Progressing</h1>
                <ul>
                    <li>Room for improving the look using CSS and Bootstrap</li>
                    <li>Auto expanding the home and profile pages when scrolling down</li>
                    <li>Auto adding new post from other to home page when there is new post</li>
                    <li>Rating system (database is ready)</li>
                    <li>Follower system (show post from your followees on top - database is ready)</li>
                    <li>Implement Heroku</li>
                    <li>Fixing the errors caused by abnormal access to the pages</li>
                </ul>
            </div>
        </div>
    </div>
@endsection