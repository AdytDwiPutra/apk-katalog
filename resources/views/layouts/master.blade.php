<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('vuexy')}}/assets/"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Catalog Products App')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('vuexy')}}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Helpers -->
    <script src="{{asset('vuexy')}}/assets/vendor/js/helpers.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/js/template-customizer.js"></script>
    <script src="{{asset('vuexy')}}/assets/js/config.js"></script>

    <!-- Third party CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/izitoast/dist/css/iziToast.min.css') }}">

    <!-- Page CSS (Optional) -->
    @stack('styles')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

    @include('layouts.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('layouts.nav')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            @include('layouts.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{asset('vuexy')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{asset('vuexy')}}/assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="{{asset('vuexy')}}/assets/js/main.js"></script>

    <!-- Page JS (from child views) -->
    @include('layouts.scripts')
    @stack('scripts')
  </body>
</html>