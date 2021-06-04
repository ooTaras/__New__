<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">   -->
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('layoutsHead')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container ">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!-- start header -->
            <div class="container-fluid">
                <div class="row mt-5 mb-2">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="w"></div>
                        <div class="w"></div>
                        <div class="w"></div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-1">
                        <img src="https://image.flaticon.com/icons/png/512/25/25347.png " alt="" width="25">
                        <img src="https://thumbs.dreamstime.com/b/%D1%87%D0%B5%D1%80%D0%BD%D0%BE-%D0%B1%D0%B5%D0%BB%D1%8B%D0%B9-%D0%B7%D0%B0%D0%BA%D1%80%D0%B0%D1%88%D0%B5%D0%BD%D0%BD%D1%8B%D0%B9-%D0%B7%D0%BD%D0%B0%D1%87%D0%BE%D0%BA-%D0%BB%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF%D0%B0-instagram-%D1%81-%D0%B7%D0%B0%D0%BA%D1%80%D1%83%D0%B3%D0%BB%D0%B5%D0%BD%D0%BD%D1%8B%D0%BC%D0%B8-%D1%83%D0%B3%D0%BB%D0%B0%D0%BC%D0%B8-199612618.jpg" alt="" width="30" class="me-5">
                    </div>
                    <div class="col-md-1 "></div>
                    <!-- <div class="col-md-1"></div> -->
                </div>
            </div>
            <!-- end header -->

            <!-- start line -->
            <div class="row m-0">
                <div class="col-sm-1 "></div>
                <div class="col-md-4">
                    <hr>
                </div>
                <div class="col-md-2">
                    <strong class="h5 mr-3"><a href="{{route('blog.admin.posts.index')}}">Blog</a></strong>
                    <strong class="h5 mr-3"><a href="{{route('blog.admin.categories.index')}}">Category</a></strong>
                    <strong class="h5 mr-3">About</strong>
                    <strong class="h5">Contact</strong>
                </div>
                <div class="col-md-4">
                    <hr>
                </div>
                <div class="col-md-1"></div>
                <!-- end line -->
                @yield('content')
        </main>
    </div>
</body>

</html>