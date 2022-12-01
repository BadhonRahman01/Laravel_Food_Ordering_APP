        <!-- Fonts -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
        <style>
            body {
        overflow-x: hidden;
        color: black;
        }
        #sidebar-wrapper {
        min-height: 30vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
       
        #sidebar-wrapper .list-group {
        width: 15rem;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
      
        }
        </style>    
    </head>
    <body>
        <div class="d-flex py-5" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-success border-right " id="sidebar-wrapper">

            @auth
        <div class="list-group list-group-flush py-5">

            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action bg-success text-light">Categories</a>
            <a href="{{ route('banners.index') }}" class="list-group-item list-group-item-action bg-success text-light">Banners</a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-success text-light">Users</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-success text-light">Products</a>
            <a href="{{ route('services.index') }}" class="list-group-item list-group-item-action bg-success text-light">Services</a>
            <a href="{{ route('menus.index') }}" class="list-group-item list-group-item-action bg-success text-light">Menu</a>
            <a href="{{ route('featprods.index') }}" class="list-group-item list-group-item-action bg-success text-light">Featured Products</a>
            <a href="{{ route('stores.index') }}" class="list-group-item list-group-item-action bg-success text-light">Stores</a>
            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action bg-success text-light">Orders</a>

        </div>
        @endauth
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="container">
            @yield('content')
        </div>

