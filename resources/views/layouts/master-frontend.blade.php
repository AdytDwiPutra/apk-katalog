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


    <!-- Layout wrapper -->
      <!-- Navbar -->
      <header class="app-header shadow-sm">
        <nav class="navbar navbar-expand-lg bg-white px-3 py-2">
          <div class="container-fluid align-items-center justify-content-between">
            
            <!-- 🔹 Logo kiri -->
            <a class="navbar-brand d-flex align-items-center" href="#">
              <img src="{{ asset('assets/images/logo2.png') }}" alt="Elang Omega" height="42" class="me-2">
              <span class="fw-bold text-danger">Elang Omega</span>
            </a>

            <!-- 🔹 Search tengah -->
            <div class="search-wrapper flex-grow-1 mx-3 d-flex align-items-center justify-content-center">
              <div class="search-box d-flex flex-wrap align-items-center w-100" style="max-width: 700px;">
                <div class="dropdown me-2 category-dropdown d-none d-md-block">
                  <button
                    class="btn btn-outline-secondary dropdown-toggle"
                    type="button"
                    id="categoryDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    All Kategori
                  </button>
                  <ul class="dropdown-menu" id="categoryList" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="#" data-id="">All Kategori</a></li>
                  </ul>
                </div>

                <div class="flex-grow-1 position-relative">
                  <div class="input-group">
                    <span class="input-group-text"><i class="ti ti-search"></i></span>
                    <input
                      type="text"
                      id="productSearch"
                      class="form-control"
                      placeholder="Cari produk..."
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- 🔹 Theme switch kanan -->
            <div class="dropdown dropdown-style-switcher">
              <a class="nav-link dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown">
                <i class="ti ti-md"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                <li><a class="dropdown-item" href="#" data-theme="light"><i class="ti ti-sun me-2"></i>Light</a></li>
                <li><a class="dropdown-item" href="#" data-theme="dark"><i class="ti ti-moon me-2"></i>Dark</a></li>
              </ul>
            </div>

          </div>
        </nav>
      </header>

      <!-- 🔹 Overlay fokus search -->
      <div id="searchOverlay"></div>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

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
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const overlay = document.getElementById("loading-overlay");

        // Setelah 2,5 detik (selesai animasi)
        setTimeout(() => {
          overlay.classList.add("hidden");
        }, 1500);
      });
    </script>
  </body>
</html>