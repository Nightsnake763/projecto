<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>
<body>
    <div id="app">
        @role('admin')
        <div class="row">
            <div class="col-2 mh-100 p-0" style="height: 98vh;">
                <aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark border-0" style="height: 100%">
                    <h3 class="text-center">Admin Menu</h3>
                    <ul class="nav nav-pills flex-column mb-auto mt-5 text-center">
                        <li class="mt-2"><a class="text-decoration-none" href="{{ route('usersView') }}"><h4>Users</h4></a></li>
                        <li class="mt-2"><a class="text-decoration-none" href="{{ route('productsView') }}"><h4>Products</h4></a></li>
                        <li class="mt-2"><a class="text-decoration-none" href="{{ route('categoryView') }}"><h4>Categories</h4></a></li>
                        <li class="mt-2"><a class="text-decoration-none" href="{{ route('roleView') }}"><h4>Roles</h4></a></li>
                    </ul>
                </aside>
            </div>
            @endrole
            <div class="col p-0" style="">
                <div class="py-0" style="overflow-x: hidden; overflow-y: hidden">
                    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm border-bottom">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('userProducts') }}">Add Product</a>

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
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
