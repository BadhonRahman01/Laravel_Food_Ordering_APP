<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FOA - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Laravel Food Ordering App</title>
    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  	color: #222222;
  	font-family: 'Open Sans', sans-serif;
  	padding-bottom: 50px;
}
	
.container {
  	margin: 0 auto;
  	max-width: 1200px;
}

.nav {
  	background-color: #222222;
  	left: 0;
  	position: fixed;
  	right: 0;
  	top: 0;
  	transition: all 0.3s ease-in-out;
}

.nav .container {
  	align-items: center;
  	display: flex;
  	justify-content: space-between;
  	padding: 20px 0;
  	transition: all 0.3s ease-in-out;
}

.nav ul {
  	align-items: center;
  	display: flex;
  	justify-content: center;
  	list-style-type: none;
}

.nav a {
  	color: #FFFFFF;
  	padding: 7px 15px;
  	text-decoration: none;
  	transition: all 0.3s ease-in-out;
}

.nav.active {
  	background-color: #FFFFFF;
  	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.nav.active a {
  	color: #000000;
}

.nav.active .container {
  padding: 10px 0;
}

.nav a.current,
.nav a:hover {
  color: #c0392b;
  font-weight: bold;
}



</style>
</head>
<body>



    <nav class="nav">
        <div class="container">
            <h1 class="logo"><a href="{{ url('/home') }}">Food Ordering APP</a></h1>

            <ul>
                @guest
                {{-- <li><a href="#" class="current">Home</a></li> --}}
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Registration</a></li>
              @endguest
              @auth
                <li>
                {{-- <div class="dropdown">

                    <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Badhon Rahman
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="#" class="dropdown-item"> Settings</a>
                        <a href="#" class="dropdown-item"> Logout</a>
                    </div>
                    
                  </div> --}}
                  <a href="#" >
                    {{ auth()->user()->name}}
                  </a>
                </li>
                <li>
                <a href="{{ route('cart.list') }}" class="flex items-center">
                  <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  </svg>
                  {{ Cart::getTotalQuantity()}}
              </a>
            </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
              @endauth
            </ul>
            
        </div>
    </nav>
    

    <div class="con">
        @yield('con')
    </div>

    <script>
        const nav = document.querySelector('.nav')
window.addEventListener('scroll', fixNav)

function fixNav() {
    if(window.scrollY > nav.offsetHeight + 150) {
        nav.classList.add('active')
    } else {
        nav.classList.remove('active')
    }
}
        </script>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>