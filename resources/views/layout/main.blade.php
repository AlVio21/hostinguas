<!DOCTYPE html>
<html lang="en">
<head>
  <base href="{{url('./')}}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Aplikasi Logam Mulia</title>
  <link rel="apple-touch-icon" sizes="57x57" href="{{url('assets/favicon/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{url('assets/favicon/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{url('assets/favicon/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets/favicon/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{url('assets/favicon/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{url('assets/favicon/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{url('assets/favicon/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{url('assets/favicon/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets/favicon/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{url('assets/favicon/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{url('assets/favicon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{url('assets/favicon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="{{url('vendors/simplebar/css/simplebar.css')}}">
  <link rel="stylesheet" href="{{url('css/vendors/simplebar.css')}}">
  <!-- Main styles for this application-->
  <link href="{{url('css/style.css')}}" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link href="{{url('css/examples.css')}}" rel="stylesheet">
  <!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
  <link href="{{url('css/ads.css')}}" rel="stylesheet">
  <script src="{{url('js/config.js')}}"></script>
  <script src="{{url('js/color-modes.js')}}"></script>
  <link href="{{url('vendors/@coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">
  <style>
    .sidebar-hidden {
      display: none;
    }

    .sidebar-minimized {
      width: 80px; /* Adjust this value as needed */
    }
  </style>
</head>
<body>
  <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
        <img class="sidebar-brand-full" src="{{url('assets/img/logoLM.png')}}" width="120" height="32" alt="CoreUI Logo">
      </div>
      <button class="btn-close d-lg-none" type="button" aria-label="Close" onclick="toggleSidebar()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="{{url('dashboard')}}">
          <svg class="nav-icon">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-home')}}"></use>
          </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
      <li class="nav-title">Ketersediaan Layanan</li>
      <li class="nav-item"><a class="nav-link" href="{{url('products')}}">
          <svg class="nav-icon">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-diamond')}}"></use>
          </svg> Products</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('prices')}}">
          <svg class="nav-icon">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-money')}}"></use>
          </svg> Categories</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('orders')}}">
          <svg class="nav-icon">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-cart')}}"></use>
          </svg> Orders</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('customers')}}">
          <svg class="nav-icon">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-group')}}"></use>
          </svg> Testimoni</a></li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
  </div>
  <div class="wrapper d-flex flex-column min-vh-100">
    <header class="header header-sticky p-0 mb-4">
      <div class="container-fluid border-bottom px-4">
        <button class="header-toggler" type="button" onclick="toggleSidebar()" style="margin-inline-start: -14px;">
          <svg class="icon icon-lg">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
          </svg>
        </button>
        <ul class="header-nav d-none d-lg-flex">
          <li class="nav-item"><a class="nav-link" href="dashboard">Dashboard</a></li>
        </ul>
        <ul class="header-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
              </svg></a></li>
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-list-rich')}}"></use>
              </svg></a></li>
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
              </svg></a></li>
        </ul>
        <ul class="header-nav">
          <li class="nav-item py-1">
            <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
              <svg class="icon icon-lg theme-icon-active">
                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-contrast')}}"></use>
              </svg>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                  <svg class="icon icon-lg me-3">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-sun')}}"></use>
                  </svg>Light
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                  <svg class="icon icon-lg me-3">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-moon')}}"></use>
                  </svg>Dark
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                  <svg class="icon icon-lg me-3">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-contrast')}}"></use>
                  </svg>Auto
                </button>
              </li>
            </ul>
          </li>
          <li class="nav-item py-1">
            <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="dashboard" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md"><img class="avatar-img" src="{{url('assets/img/avatars/8.jpg')}}" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="dashboard">
                <svg class="icon me-2">
                  <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                </svg> Profile</a><a class="dropdown-item" href="dashboard">
                  <svg class="icon me-2">
                  <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-settings')}}"></use>
                </svg> Settings</a><a class="dropdown-item" href="dashboard">
                  <svg class="icon me-2">
                  <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-credit-card')}}"></use>
                </svg> Payments</a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                                  this.closest('form').submit();" class="dropdown-item">
                  <svg class="icon me-2">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                  </svg>{{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </div>
          </li>
        </ul>
      </div>
      <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0">
            <li class="breadcrumb-item"><a href="dashboard">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="products">Products</a>
            </li>
            <li class="breadcrumb-item"><a href="prices">Prices</a>
            </li>
            <li class="breadcrumb-item"><a href="orders">Orders</a>
            </li>
            <li class="breadcrumb-item"><a href="customers">Testimoni</a>
            </li>
            <li class="breadcrumb-item active"><span>@yield('breadcrumb')</span>
            </li>
          </ol>
        </nav>
      </div>
    </header>
    <div class="body flex-grow-1">
      <div class="container-lg px-4">
        <div class="row mb-4">
          <div class="col-xl-5 col-xxl-4 mb-4 mb-xl-0">
            {{-- <script id="_carbonads_js" async="" type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CEAICKJY&amp;placement=coreuiio"></script> --}}
          </div>
          <div class="col-xl-12 col-xxl-8">
            <h4 class="fw-bolder">Selamat Datang, {{auth()->user()->name}} Di Aplikasi Logam Mulia</h4>
            <p>Silahkan Melihat Semua Produk yang Tersedia di Aplikasi Kami, Semua Produk yang Anda Butuhkan Kini Tersedia.</p>
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CoreUI and necessary plugins-->
  <script src="{{url('vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
  <script src="{{url('vendors/simplebar/js/simplebar.min.js')}}"></script>

  <!-- Your custom scripts -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('sidebar-minimized');
      sidebar.classList.toggle('sidebar-hidden');
    }
  </script>
</body>
</html>
