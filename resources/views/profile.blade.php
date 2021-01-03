@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/profile.css') }}" />
@endsection

@section('content')

    <div id="profile-container">
        <div class="profile-img">
            @if (empty($profile->image))

            <img class="profile-img-circle" width="150" src="/assets/profile/profile.png">
            @else:

            <img class="profile-img-circle" width="150" src="/assets/{{ $profile->image }}"> 
            @endif
        </div>

        <div id="profile-info">

            <h3 id = "username">{{ $user->name }}</h3>
            <span id = "post-count"><strong>{{ $postscount }}</strong> post(s), <strong>{{ $reviewscount }}</strong> review(s)</span>

            @if (empty($profile->description))

                <div id="profile-description"><a href="/profile/edit">Add a description to your profile!</a></div>

            @else:

                <div id = "edit-profile">
                    <div id="edit-profile-01">{{ $profile->description }}</div>
                    <div id="edit-profile-02"><a href="/profile/edit">Edit profile</a></div>
                </div>

            @endif
        </div>

        <div id = "all-posts-info">
            <div id = "all-titles">
            @foreach ($posts as $post)
                <li class = "title-info">
                    <a href = "{{ url('/review/'.$post->title) }}" class = "title-link">
                        <div class="title-images">
                            @if (empty($post->image))

                            <img class="title-img" width="300" src="/assets/resources/default.jpg">
                            @else:

                            <img class="title-img" width="300" src="/assets/resource/{{ $post->image }}"> 
                            @endif
                        </div>

                        <span class = "title"> {{ $post -> title }}</span>
                        <span class = "author"> by {{ $post -> author }}</span>
                        <span class = "resource-type"> {{ $post -> resource_type }}</span>
                    </a>
                </li>
            @endforeach
            </div>
        </div>

        @if ( sizeof($reviews)>0 )
            <div id ="review-history">
                <table id = "review-history-container">
                    <tr class="review-instance">
                        <th class = "review-header">Date</th>
                        <th class = "review-header">Title</th>
                        <th class = "review-header">Rating</th>
                        <th class = "review-header">Review Title</th>
                        <th class = "review-header">Review</th>
                        <th class = "review-header"></th>
                        
                    </tr>
                    @foreach ($reviews as $review)
                        <tr class="review-instance">
                            <td class = "review"> {{$review -> created_at}}</td>
                            <td class = "review"> 
                                <a href = "/track/id={{$review -> track_id}}" class ="review-link" >{{$review -> title}}</a>
                            </td>
                            <td class = "review"> {{$review -> rating}}</td>
                            <td class = "review"> {{$review -> review_title}}</td>
                            <td class = "review"> {{$review -> review}}</td>
                            <td class = "review">
                                <form action="{{ route('profile.deleteReview') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                    <input type="hidden" id="review-id" name="review-id" value= "{{ $review->review_id }}" />
                                    <button class = "btn-delete" type="submit">
                                        <img class = "delete-icon" src = "/assets/icons/delete.png">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif

    </div>

@endsection
