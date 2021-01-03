@extends('layouts.app')

<!-- CSS for homepage -->

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/resourcesList.css') }}" />
@endsection

@section('content')
    <section id = "resources-list">
        <h1 id = "category-name">{{ ucwords($path) }}</h1>

        <div id = "all-resources">
            @foreach ($resources as $resource)
                <a class = "resource-link" href = "{{ url('/') }}">
                    <div id = "resource">
                        <img src = "#">
                        <p id = "resource-name">{{ $category -> category_name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection