<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduAll') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    
    @yield('css')
    @yield('cookie')
    @yield('api')


</head>

<body>
    <header id = "header">


        <a id = "app-name" href = "{{ url('') }}"><h1> EduAll</h1></a>


        <nav id="navbar">
                <ul id = "nav-ul">
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/home') }}" id = "home">Home</a></li>
                            <li><a href="{{ url('/addresource') }}" id = "home">Add Resource</a></li>
                            <li><a href="{{ url('/profile') }}" id = "home">Profile</a></li>
                            <li><a href = "{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); deleteCookie();"> Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}" id = "login">Login</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" id = "register">Register</a></li>
                            @endif
                        @endif
                    @endif
                </ul>
        </nav>

    </header>

    <main>

        @if (Route::has('login'))
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        @endif

        @yield('content')

    </main>

    @yield('js')
</body>
</html>
