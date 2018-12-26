<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CPanel Usaha</title>

    <!-- Style -->
    
    <link rel="stylesheet" href="{{ asset('templateadmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templateadmin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('templateadmin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sweet_alert/dist/sweetalert2.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <style>
        * {
            font-family: 'Bree Serif', serif;
        }
        .navbar.default-layout-navbar .navbar-brand-wrapper .navbar-brand img {
          height: auto;
        }
        .navbar.default-layout-navbar .navbar-brand-wrapper .brand-logo-mini img {
          width: 40px;
        }
    </style>

  <script src="{{ asset('template1/vendor/jquery/jquery.min.js') }}"></script>

</head>

<body>

        <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                  <a class="navbar-brand brand-logo" href="{{ route('home') }}"><img src="{{ asset('storage/images/web/lapakdesa_logo1.png') }}" alt="logo" class="img-fluid"/></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}"><img src="{{ asset('storage/images/web/lapakdesa_logosmall.png') }}" alt="logo"/></a>
                  </div>
                  <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    
                    <ul class="navbar-nav navbar-nav-right">
                      <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                          <div class="nav-profile-img">
                            <img src="{{ asset('storage/images/user/'.Auth::user()->avatar) }}" alt="image">
                            <span class="availability-status online"></span>             
                          </div>
                          <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ Auth::user()->nama }}</p>
                          </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                          <a class="dropdown-item" href="{{ url('/p_usaha/profil') }}">
                            <i class="mdi mdi-store mr-2 text-success"></i>
                            Profil
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            Keluar
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                      </li>
                      
                      
                      
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                      <span class="mdi mdi-menu"></span>
                    </button>
                  </div>
                </nav>
                <!-- partial -->
                <div class="container-fluid page-body-wrapper">
                  <!-- partial:partials/_sidebar.html -->
                  <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                      <li class="nav-item nav-profile">
                        <a href="{{ url('/p_usaha/profil') }}" class="nav-link">
                          <div class="nav-profile-image">
                            <img src="{{ asset('storage/images/user/'.Auth::user()->avatar) }}" alt="profile">
                            <span class="login-status online"></span> <!--change to offline or busy as needed-->              
                          </div>
                          <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">{{ Auth::user()->nama }}</span>
                            <span class="text-secondary text-small">{{ Auth::user()->alamat }}</span>
                          </div>
                          @if (!Auth::user()->usaha->terverifikasi)
                          <i class="mdi mdi-bookmark-remove text-danger nav-profile-badge"></i>  
                          @else
                          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                          @endif
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/p_usaha/dashboard') }}">
                          <span class="menu-title">Dashboard</span>
                          <i class="mdi mdi-home menu-icon"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#produk" aria-expanded="false" aria-controls="produk">
                          <span class="menu-title">Produk</span>
                          <i class="menu-arrow"></i>
                          <i class="mdi mdi-diamond menu-icon"></i>
                        </a>
                        <div class="collapse" id="produk">
                          <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/p_usaha/produk') }}">Tabel Produk</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/p_usaha/produk/form') }}">Tambah Produk</a></li>
                            
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/p_usaha/transaksi') }}">
                          <span class="menu-title">Transaksi</span>
                          <i class="mdi mdi-cash-usd menu-icon"></i>
                        </a>
                      </li>
                      
                    </ul>
                  </nav>
                  <!-- partial -->
                  <div class="main-panel">
                    <div class="content-wrapper">
                        @if (!Auth::user()->usaha->terverifikasi)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-information"></i>
                                Usaha Anda masih belum terverifikasi oleh Admin.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            
                      
                        <!-- CONTENT -->

                        @yield('content')

                        <!-- CONTENT end -->

                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                      <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                      </div>
                    </footer>
                    <!-- partial -->
                  </div>
                  <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
              </div>
              <!-- container-scroller -->


    

    <!-- Scripts -->
    <script src="{{ asset('templateadmin/vendors/js/vendor.bundle.base.js') }}" defer></script>
    <script src="{{ asset('templateadmin/vendors/js/vendor.bundle.addons.js') }}" defer></script>
    <script src="{{ asset('templateadmin/js/off-canvas.js') }}" defer></script>
    <script src="{{ asset('templateadmin/js/misc.js') }}" defer></script>
    <script src="{{ asset('sweet_alert/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('sweet_alert/dist/sweetalert2.min.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweetalert::view')
</body>

</html>
