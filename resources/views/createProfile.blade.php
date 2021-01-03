@extends('layouts.app')

<!-- CSS for homepage -->

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/createProfile.css') }}" />
@endsection

@section('content')

    <div id="create-profile">
        <form action="{{ route('profile.postCreate') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label class = "label" for="description">Description</label>
                <input class="form-control" type="text" name="description" id="description">
            </div>

            <div class="form-group">
                <label class = "label" for="profilepic">Profile picture</label>
                <input type="file" name="profilepic" id="profilepic">
            </div>

            <div id = "btn" class="form-group">
                <button id = "btn-text" type="submit">Edit profile</button>
            </div>
        </form>
    </div>

@endsection