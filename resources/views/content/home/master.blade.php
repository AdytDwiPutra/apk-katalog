<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('vuexy') }}/assets/"
  data-template="vertical-menu-template"
>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>@yield('title', 'Catalog Products App')</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('vuexy') }}/assets/img/favicon/favicon.ico" />

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/fonts/tabler-icons.css" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/css/demo.css" />

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="{{ asset('vuexy') }}/assets/vendor/libs/typeahead-js/typeahead.css" />

  <!-- Third party CSS -->
  <link rel="stylesheet" href="{{ asset('assets/js/izitoast/dist/css/iziToast.min.css') }}" />

  @stack('styles')

  <!-- Helpers -->
  <script src="{{ asset('vuexy') }}/assets/vendor/js/helpers.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/js/template-customizer.js"></script>
  <script src="{{ asset('vuexy') }}/assets/js/config.js"></script>
</head>

@include('layouts.style')

<body>
  <!-- Loading overlay -->
  <div id="loading-overlay">
    <div class="loading-center">
      <img src="{{ asset('assets/images/logo2.png') }}" alt="Elang Omega Logo" class="logo">
      <div class="brand">
        <h1 class="brand-title">
          <span>E</span><span>L</span><span>A</span><span>N</span><span>G</span>
          <span style="margin:0rem;"></span>
          <span>O</span><span>M</span><span>E</span><span>G</span><span>A</span>
        </h1>
        <p class="subtitle">AMENITIES HOTEL SUPPLIER</p>
      </div>
      <div class="loading-text"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> &nbsp; Loading…</div>
    </div>
  </div>

  <div id="app">
    <!-- Navbar -->
    @include('components.navbar')
    <div id="searchOverlay"></div>

    <!-- Main content -->
    <main class="content-wrapper mt-4">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-2">
          <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/images/hotel1.avif') }}" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                  <h4>First slide</h4>
                  <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/images/hotel2.avif') }}" alt="Second slide" />
                <div class="carousel-caption d-none d-md-block">
                  <h4>Second slide</h4>
                  <p>In numquam omittam sea.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/images/hotel3.avif') }}" alt="Third slide" />
                <div class="carousel-caption d-none d-md-block">
                  <h4>Third slide</h4>
                  <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>

        @yield('content')        
        
      </div>
      <!-- WhatsApp floating button -->
      @include('layouts.whatsapp-float')
      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </main>
  </div>

  <!-- Core JS -->
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/popper/popper.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/js/bootstrap.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/hammer/hammer.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/i18n/i18n.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="{{ asset('vuexy') }}/assets/vendor/js/menu.js"></script>
  <script src="{{ asset('vuexy') }}/assets/js/main.js"></script>

  @include('layouts.scripts')
  @yield('scripts')

  <!-- Page scripts: organized & DOM-ready -->
</body>
</html>