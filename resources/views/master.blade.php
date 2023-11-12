<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        UC Showroom
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a class="simple-text logo-mini">
                    UC
                </a>
                <a class="simple-text logo-normal">
                    Showroom
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper"> .
                <ul class="nav">
                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i class="now-ui-icons education_atom"></i>
                            <p>Home</p>
                        </a>
                    </li>

                    <li class="{{ request()->is('kendaraan') ? 'active' : '' }}">
                        <a href="{{ route('kendaraan') }}">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Kendaraan</p>
                        </a>
                    </li>
                    <li class="{{ request()->is('order') ? 'active' : '' }}">
                        <a href="{{ route('order') }}">
                            <i class="now-ui-icons shopping_shop"></i>
                            <p>Order</p>
                        </a>
                    </li>
                    <li class="{{ request()->is('customer') ? 'active' : '' }}">
                        <a href="{{ route('customer') }}">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Customer</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            {{-- <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        </div>
                    </div>
            </nav> --}}
            <div class="panel-header panel-header-lg mt-10">
                <img src="{{ asset('ngeng.png') }}" alt="Dashboard Image" style="width: 200%; height: 200%;">
            </div>

            {{--  CONTENT --}}
            @yield('content')

            {{--  END OF CONTENT --}}
        </div>
    </div>


    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif
    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table-datatable').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true,
                "pageLength": 5

            });

            $('body').on('click', '.hamburger', function() {
                $(".profil_admin").toggle();
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table-datatable2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true,
                "pageLength": 5

            });

            $('body').on('click', '.hamburger', function() {
                $(".profil_admin").toggle();
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table-datatable3').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true,
                "pageLength": 5

            });

            $('body').on('click', '.hamburger', function() {
                $(".profil_admin").toggle();
            });

        });
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</body>

</html>
