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
        <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/css/data_tables.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper ">
            @include('layouts.dashboard_elements.navbar')
            <div class="main-panel">
                @include('layouts.dashboard_elements.second_navbar')
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
                @include('layouts.dashboard_elements.footer')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.1.0') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/demo/demo.js') }}"></script>
    </body>
</html>