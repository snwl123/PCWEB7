@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/categoryList.css') }}" />
@endsection

@section('content')

    <div id = "titles">

        <h1 id = "category-header">{{ $category }}</h1>

        <div id = "all-titles">

            @foreach ($titles as $title)
                <li class = "title-info">
                    <a href = "{{ url('/review/'.$title->title) }}" class = "title-link">
                        <div class="title-images">
                            @if (empty($title->image))

                            <img class="title-img" width="300" src="/assets/resources/default.jpg">
                            @else:

                            <img class="title-img" width="300" src="/assets/resource/{{ $resource->image }}"> 
                            @endif
                        </div>

                        <span class = "title"> {{ $title -> title }}</span>
                        <span class = "author"> by {{ $title -> author }}</span>
                        <span class = "resource-type"> {{ $title -> resource_type }}</span>
                    </a>
                </li>
            @endforeach

        </div>

    </div>

@endsection

