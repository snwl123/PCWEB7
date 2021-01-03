@extends('layouts.app')

<!-- CSS for homepage -->

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/addResource.css') }}" />
@endsection

@section('content')

    <div id="add-resource">
        <form action="{{ route('addResource.postCreate') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label class = "label" for="resource-img">Image</label>
                <input type="file" name="resource-img" id="resource-img">
            </div>

            <div class="form-group">
                <label class = "label" for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <label class = "label" for="author">Author(s)</label>
                <input class="form-control" type="text" name="author" id="author">
            </div>

            <div class="form-group">
                <label class = "label" for="descriptionn">Description</label>
                <textarea class="form-control"  name="description" id="description"></textarea>
            </div>

            <div class="form-group">
                <label class = "label" for="resource-type">Type</label>
                <select name="resource-type" id="resource-type">
                    <option value="text">Text</option>
                    <option value="video">Video</option>
                    <option value="audio">Audio</option>
                </select>
            </div>

            <div class="form-group">
                <label class = "label" for="category">Category</label>
                <input class="form-control" type="text" name="category" id="category">
            </div>

            <div class="form-group">
                <label class = "label" for="publication-date">Date of Publication</label>
                <input type="date" name="publication-date" id="publication-date">
            </div>

            <div class="form-group">
                <label class = "label" for="price">Price (SGD)</label>
                <select name="price" id="price">
                    <option value="Free">Free</option>
                    <option value="SGD $0-25">$0-$25</option>
                    <option value="SGD $25-50">$25-$50</option>
                    <option value="SGD $50-100">$50-$100</option>
                    <option value="SGD $100-250">$100-$250</option>
                    <option value="SGD $250-500">$250-$500</option>
                    <option value="SGD >$500">>$500</option>
                </select>
            </div>

            <div id = "btn" class="form-group">
                <button id = "btn-text" type="submit">Add</button>
            </div>
        </form>
    </div>

@endsection