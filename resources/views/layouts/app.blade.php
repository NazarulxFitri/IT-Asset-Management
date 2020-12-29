<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FVAM</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    nav.navbar.navbar-expand-md.shadow-sm {
        background-color: #892f2f;
        position: fixed;
        width: 100%;
        z-index: 1;
    }
    a.nav-link {
        color:#fff;
    }
    a.navbar-brand.d-flex {
        color: #fff;
    }
    a#navbarDropdown {
        color: #fff;
    }
    .card {
        margin-top: 75px;
    }
    .dropdown-item:hover {
        background-color: #892f2f;
        color: #fff;
    }
    .mr-2.ml-2 {
        margin-top: 50px;
    }
   .sidebar {
        width: 10%;
        background-color: #E8E8E8;
        position: fixed !important;
        top: 60px;
        height: 100%;
        overflow: auto;
    }
    .sidebar a {
        display: block;
        color: #000;
        padding: 16px;
        text-decoration: none;
    }
    .sidebar a:hover:not(.active) {
        background-color: #343a40;
        color: #fff;
    }
    button.btn {
        width: 80px;
    }
    @media screen and (max-width: 700px) {
        #web-view {
            margin-left:0 !important;
        }       
        .sidebar {
            width: 100%;
            height: auto;
            position: relative !important;
        }
        .sidebar a {
            float: left;
        }
    }
    @media screen and (max-width: 400px) {
        #web-view {
            margin-left:0 !important;
        }        
        .sidebar {
            width: 100%;
            height: auto;
            position: relative !important;
        }     
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" >
            <div class="container-fluid">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div class="pt-1 pl-1">
                        IT Asset Management
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <!--<li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>-->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                  
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="">
            @if(auth()->check())
            <div class="sidebar">
                <a href="/dashboard">Dashboard</a>
                <a href="/item/list">Laptop</a>
                <a href="/monitor/list">Monitor</a>
                <a href="/vendor/list">Vendor</a>
                <a href="/accessory/list">Accessory</a>
            </div>
            <main class="py-2" id="web-view" style="margin-left:10%;">
                @yield('content')
            </main>
            @else
            <main class="py-2" id="web-view">
                @yield('content')
            </main>
            @endif
        </div>
    </div>
</body>
</html>
