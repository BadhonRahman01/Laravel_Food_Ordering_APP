        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
        <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
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
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
        </style>    
    </head>
    <body>
        <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Dashboard </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action bg-light">Categories</a>
            <a href="{{ route('banners.index') }}" class="list-group-item list-group-item-action bg-light">Banners</a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light">Users</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-light">Products</a>
            <a href="{{ route('services.index') }}" class="list-group-item list-group-item-action bg-light">Services</a>
            <a href="{{ route('menus.index') }}" class="list-group-item list-group-item-action bg-light">Menu</a>
            <a href="{{ route('featprods.index') }}" class="list-group-item list-group-item-action bg-light">Featured Products</a>
            <a href="{{ route('stores.index') }}" class="list-group-item list-group-item-action bg-light">Stores</a>
            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action bg-light">Orders</a>
        </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>