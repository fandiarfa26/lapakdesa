<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Style -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('template1/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    {{-- <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('template1/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('sweet_alert/dist/sweetalert2.min.css') }}">
    
    <script src="{{ asset('template1/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.threesixty.js') }}"></script>
{{-- 
    <style>
            * {
                font-family: 'Bree Serif', serif;
            }
        </style> --}}
</head>

<body>
    <!-- navbar-->
    <header class="header mb-5">
        <!--
            *** TOPBAR ***
            _________________________________________________________
            -->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 text-center text-lg-right">
                        <ul class="menu list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ url('/about') }}">Tentang Kami</a></li>
                            <!-- Authentication Links -->
                            @guest
                            <li class="list-inline-item"><a href="{{ route('login') }}">Masuk</a></li>
                            @if (Route::has('register'))
                            <li class="list-inline-item"><a href="{{ route('register') }}">Daftar</a></li>
                            @endif
                            @else
                            <li class="list-inline-item"><a href="{{ url('/profil') }}"><i class="fa fa-user-circle"
                                        aria-hidden="true"></i> {{ Auth::user()->nama }}</a></li>
                            <li class="list-inline-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Keluar</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endguest

                        </ul>
                    </div>
                </div>
            </div>
            <!-- *** TOP BAR END ***-->


        </div>
        <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="{{ url('/') }}" class="navbar-brand home"><img src="{{ asset('storage/images/web/lapakdesa_logo1.png') }}" style="height:50px" alt="LapakDesa logo" class="d-none d-md-inline-block"><img src="{{ asset('storage/images/web/lapakdesa_logo1.png') }}" alt="LapakDesa logo" style="height:50px" class="d-inline-block d-md-none"><span class="sr-only">{{
                        config('app.name', 'Laravel') }} - kembali ke halaman awal</span></a>
                <div class="navbar-buttons">
                    <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span
                            class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                    <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span
                            class="sr-only">Toggle search</span><i class="fa fa-search"></i></button>
                </div>
                <div id="navigation" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>
                        <li class="nav-item"><a href="{{ url('/lapak') }}" class="nav-link">Lapak</a></li>
                        {{-- <li class="nav-item"><a href="{{ url('/produk') }}" class="nav-link">Produk</a></li> --}}
                        @auth
                            <li class="nav-item"><a href="{{ url('/transaksi') }}" class="nav-link">Transaksi</a></li>
                        @endauth
                    </ul>
                    <div class="navbar-buttons d-flex justify-content-end">
                        <!-- /.nav-collapse-->
                        <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse"
                            href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle
                                search</span><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </nav>
        <div id="search" class="collapse">
            <div class="container">
                <form role="search" action="/cari" method="post" class="ml-auto">
                    @csrf
                    <div class="input-group">
                        <input type="text" placeholder="Cari Produk" name="keyword" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <div id="all">
        <div id="content">
            @yield('content')
        </div>
    </div>
    <!--
        *** FOOTER ***
        _________________________________________________________
        -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-3">Halaman</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/lapak') }}">Lapak</a></li>
                        {{-- <li><a href="{{ url('/produk') }}">Produk</a></li> --}}
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                    </ul>
                </div>
                <!-- /.col-lg-3-->
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-3">User section</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('login') }}">Masuk</a></li>
                        <li><a href="{{ route('register') }}">Daftar</a></li>
                    </ul>
                </div>
                <!-- /.col-lg-3-->
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-3">Kontak</h4>
                    <p><strong>{{ config('app.name', 'Laravel') }}</strong><br>Jalan xxxx<br>Dau, Malang<br>61422<br>Indonesia</p><a
                        href="{{ url('/about') }}">Selengkapnya tentang kami</a>
                    <hr class="d-block d-md-none">
                </div>
                <!-- /.col-lg-3-->
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-3">Sosial Media</h4>
                    <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="#"
                            class="twitter external"><i class="fa fa-twitter"></i></a><a href="#" class="instagram external"><i
                                class="fa fa-instagram"></i></a><a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a><a
                            href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
                </div>
                <!-- /.col-lg-3-->
            </div>
            <!-- /.row-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->


    <!--
        *** COPYRIGHT ***
        _________________________________________________________
        -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-center text-lg-left">©2018 {{ config('app.name', 'Laravel') }}.</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious:
                            E-commerce</a>
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :)-->
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- *** COPYRIGHT END ***-->

    
    <script src="{{ asset('template1/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('template1/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template1/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('template1/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template1/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{ asset('template1/js/front.js') }}"></script>
    <script src="{{ asset('sweet_alert/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('sweet_alert/dist/sweetalert2.min.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweetalert::view')
</body>

</html>
