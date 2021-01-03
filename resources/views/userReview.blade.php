@extends('layouts.app')

<!-- CSS for homepage -->

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/userReview.css') }}" />
@endsection

@section('content')

    <div id="review-resource">

        <div id = "review-left-container">

            <div id="resource-info">
                <div id="resource-image">
                    @if (empty($resource->image))

                    <img class="resource-img-square" width="300" src="/assets/resources/default.jpg">
                    @else:

                    <img class="resource-img-square" width="300" src="/assets/resource/{{ $resource->image }}"> 
                    @endif
                </div>

                <div id = "resource-details">
                    <span class="resource" id = "resource-title"> {{$resource -> title}} </span>
                    <span class="resource" id = "resource-author"> by {{$resource -> author}} </span>
                    <span class="resource" id = "resource-date"> {{$resource -> publication_date}} </span>
                    <span class="resource" id = "category-name"> {{$resource -> category_name}} </span>
                    @if (($resource->price) == 'Free')
                        <span class="resource" id = "resource-price"> {{$resource -> price}} </span>
                    @else
                        <span class="resource" id = "resource-price"> SGD ${{$resource -> price}} </span>
                    @endif
                    <span class="resource" id = "resource-type"> {{$resource -> type}} </span>
                    <span class="resource" id = "resource-description"> {{$resource -> description}} </span>
                </div>

            </div>

            <div id = "resource-reviews">

                <form id = "user-review" enctype="multipart/form-data" method="post" action = "{{ route('userReview.postReview', $path ) }}">
                    @csrf


                        <div id = "review-container">

                            <h1 class = "user-review-label">Leave a Review</h1>

                            <div class = "review-subcontainer">

                                <label for = "rating" class = "user-review-sublabel">Number of Stars</label>
                                <input type = "number" id="rating" name="rating" class = "user-input" min="1" max="5">

                            </div>

                            <div class = "review-subcontainer">

                                <label for = "review-title" class = "user-review-sublabel">Review Title</label>
                                <input type = "text" id="review-title" name="review-title" class = "user-input">

                            </div>

                            <div class = "review-subcontainer">

                                <label for = "review" class = "user-review-sublabel">Review Feedback</label>
                                <textarea name= "user-review" form="user-review" id = "review-textarea" class = "user-input"></textarea>

                            </div>

                        </div>

                        <input type="hidden" id="resource_id" name="resource_id" value= "{{ $resource -> resource_id }}" />
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user -> id }}"/>


                        <input type="submit" value="Submit" id = "submit-btn">

                </form>
                
            </div>
        
        </div>


        <div id = "review-right-container">
            @foreach ($reviews as $review)
                <div class = "individual-review">

                    <p class = "username">{{$review->name}}</p>

                    <div class = "review-info">

                        <div class = "review-wrapper">
                            <p class = "review-text-title">{{$review->review_title}}</p>
                            <p class = "review-rating">{{$review->rating}} stars</p>
                            <p class = "review-text">{{$review->review}}</p>
                        </div>

                        <p class = "review-time">{{$review->created_at}}</p>

                    </div>

                </div>
            @endforeach
        </div>
        
    </div>

@endsection