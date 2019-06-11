
 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- link to custom css --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- link to FONT AWESOME --}}
    
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-transparent">
            <a class="navbar-brand" href="/">
                <img src="{{url('/images/logo.jpg')}}" alt="MLN Express Logo" class=".img-thumbnail" id="mlnLogo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">


                @if(Session::get("user") !== null)
                    @if(Session::get("user")->isAdmin == true)
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/vehicles">The Fleet</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/trips">Trip Manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user">user Directory</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">                                 
                                    <a class="dropdown-item" href="/">Administrator Options</a>
                                    <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <form id="logout-form" action="/logout" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Book Trip</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/bookings">Manage Bookings</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">                                 
                                    <a class="dropdown-item" href="/">My Account Info</a>
                                    <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <form id="logout-form" action="/logout" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    @endif
                @else
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">The Company</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/">Chartered Bus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Premium Services</a>
                        </li>
                       <li class="nav-item">
                            <a class="nav-link" href="/login">Manage Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="/register"><b>Register</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  -" href=""><b></b></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-info" href="/login">Login
                            </a>
                        </li>
                    </ul>             
                @endif
            </div>

        </nav>
    </div>


        <main class="py-4">
            @yield('content')

        </main>


    {{-- link to custom js --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

