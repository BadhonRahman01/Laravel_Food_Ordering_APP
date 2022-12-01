<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <nav class="nav">
                <div class="container">
                    <h1 class="logo"><a href="{{ url('/') }}">Food Ordering APP</a></h1>
                    <ul>
                        <li><a href="#" class="current">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Registration</a></li>
                        {{-- <li><a href="#">Contact</a></li> --}}
                    </ul>
                </div>
            </nav>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
