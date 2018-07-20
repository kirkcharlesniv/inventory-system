<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Inventory System</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

        <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>

    <body>
        <div class="wrapper ">
            <div class="sidebar" data-color="blue">
                <div class="logo">
                    <a href="https://facebook.com/callmackoy" class="simple-text logo-mini">
                        M. E
                    </a>
                    <a href="https://facebook.com/callmackoy" class="simple-text logo-normal">
                        Inventory System
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="{{active_check('home')}}">
                            <a href="{{ URL::route('home') }}">
                                <i class="now-ui-icons loader_gear"></i>
                                <p>Inventory</p>
                            </a>
                        </li>
                        <li class="{{active_check('home/items/create')}}">
                            <a href="{{ action('ItemsController@create') }}">
                                <i class="now-ui-icons design-2_ruler-pencil"></i>
                                <p>Create New Item</p>
                            </a>
                        </li>
                        <hr>
                        <li class="{{active_check('home/employees')}}">
                            <a href="{{ action('EmployeesController@index') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>Employees</p>
                            </a>
                        </li>
                        <li class="{{active_check('home/employees/create')}}">
                            <a href="{{ action('EmployeesController@create') }}">
                                <i class="now-ui-icons education_hat"></i>
                                <p>Register A New Employee</p>
                            </a>
                        </li>
                        <hr>
                        <li class="{{active_check('home/borrow')}}">
                            <a href="{{ action('BorrowsController@index') }}">
                                <i class="now-ui-icons shopping_delivery-fast"></i>
                                <p>Borrowed Item</p>
                            </a>
                        </li>
                        <li class="{{active_check('home/borrow/create')}}">
                            <a href="{{ action('BorrowsController@create') }}">
                                <i class="now-ui-icons design-2_ruler-pencil"></i>
                                <p>Borrow New Item</p>
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a href="{{ URL::to('home/export') }}" target="_blank">
                                <i class="now-ui-icons design-2_ruler-pencil"></i>
                                <p>Export All Data to Excel</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            <a class="navbar-brand" href="#">@yield('page_title')</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="now-ui-icons users_single-02"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">User Menu</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="panel-header panel-header-sm">
                </div>
                <div class="content">
                    @yield('custom_content_top')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@yield('card_title')</h4>
                                </div>
                                <div class="card-body">
                                    @include('layouts.messages')
                                    @yield('card_body')
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('custom_content_bottom')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav>
                            <ul>
                                <li>
                                    <a href="https://facebook.com/callmackoy">
                                        Mark Elias Gunao
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright">
                            &copy;
                            <script> document.write(new Date().getFullYear().toString()) </script>,
                            Designed and Coded by
                                <a href="https://facebook.com/callmackoy" target="_blank">Mark Elias Gunao</a> and <a href="https://facebook.com/kirk.niverba.9" target="_blank"> Kirk Charles Niverba</a>. Template by
                                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.1.0') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/demo/demo.js') }}"></script>
    </body>
</html>