@extends('layouts.app')

<!-- CSS for homepage -->

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/home.css') }}" />
@endsection

<!-- Setting cookie to alert user if they have logged in to the website such that it does not repeat on page reload-->

@section('cookie')

<script>

function setCookie(status)
{
    document.cookie = "status=" + status;
}


function getCookie()

{   
    var status = decodeURIComponent(document.cookie);
    var statuscheck = new RegExp("logged-in");
    if (statuscheck.test(status) == true)
    {
        return true;
    }
    else
    {
        return false;
    }
};

function checkCookie()
{
        var status = getCookie("status");
        if (status == false)
        {
            alert("You have logged in!");
            setCookie("logged-in");
        }
}

function deleteCookie()
{
    document.cookie = "status=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

checkCookie();

</script>

@endsection



<!-- Main Content -->

@section('content')

    <section id="billboard">

        <div id = "img-container">
            <img id = "billboard-img" src = "/assets/home/homepg-banner.jpg">
        </div>

        <div id = "all-categories">

            <div id = "category-info">
                <h1 id = "category-header">Categories</h1>
                <div id = "categories">
                    @foreach ($topics as $topic)
                        <li class = "category-container"><a href = "{{ url('/category/'.$topic->category_name) }}" class = "category"> {{ $topic -> category_name }} </a></li>
                    @endforeach
                </div>
            </div>
        
        </div>

    </section>

@endsection