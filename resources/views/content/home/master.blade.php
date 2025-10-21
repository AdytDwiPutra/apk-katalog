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
<style>
    #template-customizer{
        display:none !important;
    }
    /* --- Base style --- */
/* 🔍 Styling utama search bar */
/* =========================
   🔍 Search Box Style Umum
   ========================= */
.search-wrapper {
  flex-grow: 1;
  display: flex;
  justify-content: center;
}

.search-box {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: nowrap;
  gap: 0.5rem;
  width: 100%;
  max-width: 100px;
}

.category-dropdown .btn {
  height: 42px;
  border-radius: 6px;
  white-space: nowrap;
}

.search-box .form-control {
  border-radius: 6px;
}

.search-box .input-group {
  flex-grow: 1;
}

#searchResults .list-group-item:hover {
  background-color: rgba(255, 255, 255, 0.08);
}

/* =========================
   💻 Desktop (>=1200px)
   ========================= */
@media (min-width: 1200px) {
  .search-wrapper {
    justify-content: center;
  }
}

/* =========================
   📱 Tablet (<=992px)
   ========================= */
@media (max-width: 992px) {
  .navbar-nav-right {
    flex-direction: column;
    align-items: stretch;
  }

  .search-wrapper {
    width: 100%;
    padding: 0 1rem;
  }

  .search-box {
    flex-direction: column;
    align-items: stretch;
    max-width: 100%;
  }

  .category-dropdown {
    width: 100%;
  }
}

/* =========================
   📱 Mobile (<=576px)
   ========================= */
@media (max-width: 576px) {
  .layout-navbar {
    flex-wrap: wrap;
    padding: 0.5rem 0.75rem;
  }

  .search-wrapper {
    order: 3; /* pindah ke bawah toggle menu & mode gelap */
    width: 100%;
    /* margin-top: 0.5rem; */
    padding: 0;
  }

  .search-box {
    flex-direction: column;
    align-items: stretch;
    width: 100%;
    gap: 0.4rem;
  }

  .category-dropdown,
  .search-box .input-group {
    width: 100%;
  }

  .input-group-text {
    display: none;
  }

  #searchResults {
    width: 100%;
  }
}


</style>
  <body>
    <!-- Layout wrapper -->
        <!-- Navbar -->
        <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">

        <!-- Tombol menu kiri (mobile) -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>

        <!-- Konten utama navbar -->
        <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">

            <!-- 🔍 Search & Category -->
            <div class="search-wrapper flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="search-box d-flex flex-wrap align-items-center w-100">

                <!-- Dropdown kategori -->
                <div class="dropdown me-2 category-dropdown">
                <button
                    class="btn btn-outline-secondary dropdown-toggle"
                    type="button"
                    id="categoryDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    All Kategori
                </button>
                <ul class="dropdown-menu" id="categoryList" aria-labelledby="categoryDropdown">
                </ul>
                </div>

                <!-- Input search -->
                <div class="flex-grow-1 position-relative">
                <div class="input-group">
                    <span class="input-group-text"><i class="ti ti-search"></i></span>
                    <input
                    type="text"
                    id="productSearch"
                    class="form-control"
                    placeholder="Cari produk..."
                    autocomplete="off" />
                </div>

                <!-- hasil pencarian -->
                <div id="searchResults"
                    class="list-group position-absolute w-100 shadow-sm"
                    style="z-index: 1050; display:none; max-height: 300px; overflow-y:auto;">
                </div>
                </div>
            </div>
            </div>
            <!-- /Search -->

            <!-- kanan: contoh switcher -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                <li><a class="dropdown-item" href="#" data-theme="light"><i class="ti ti-sun me-2"></i>Light</a></li>
                <li><a class="dropdown-item" href="#" data-theme="dark"><i class="ti ti-moon me-2"></i>Dark</a></li>
                </ul>
            </li>
            </ul>

        </div>
        </nav>
        
        <!-- / Navbar -->

        @yield('content')
        <!-- / Content -->

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
    @yield('scripts')
    <script>
    let selectedCategory = 'all';  
    const categoryList = document.getElementById("categoryList");
    const searchInput = document.getElementById("productSearch");
    const searchResults = document.getElementById("searchResults");

    // 🔹 Load kategori dari API
    async function loadCategories() {
        try {
        const response = await fetch("/api/categories");
        const res = await response.json();
        const data = res.data;
        
        categoryList.innerHTML = `
            <li><a class="dropdown-item" href="#" data-category="all">All Kategori</a></li>
        ` + data.map(cat => `
            <li><a class="dropdown-item" href="#" data-category="${cat.slug}">${cat.name}</a></li>
        `).join("");

        // ketika kategori diklik
        categoryList.querySelectorAll(".dropdown-item").forEach(item => {
            item.addEventListener("click", e => {
            e.preventDefault();
            selectedCategory = item.getAttribute("data-category");
            document.getElementById("categoryDropdown").innerText = item.innerText;
            });
        });
        } catch (err) {
        console.error("Gagal memuat kategori:", err);
        }
    }

    // 🔹 Pencarian produk (live search)
    async function searchProducts(keyword) {
        if (!keyword.trim()) {
            searchResults.style.display = "none";
            return;
        }

        try {
            const res = await fetch(`/api/products/search?query=${encodeURIComponent(keyword)}&category=${selectedCategory}`);
            const result = await res.json();

            // Pastikan data hasil pencarian ada
            const products = result.data || [];
            console.log(products);
            
            if (products.length === 0) {
                searchResults.innerHTML = `<div class="list-group-item text-muted">Tidak ada hasil</div>`;
            } else {
                searchResults.innerHTML = products.map(p => `
                    <a href="/product/${p.slug}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <img src="${p.images ? p.images.path : '/images/no-image.png'}"
                            alt="${p.name}"
                            class="me-2 rounded"
                            width="40"
                            height="40">
                        <span>${p.name}</span>
                    </a>
                `).join("");
            }

            searchResults.style.display = "block";
        } catch (err) {
        console.error("Gagal mencari produk:", err);
        }
    }

    // 🔹 Event listener untuk input search
    let typingTimeout;
    searchInput.addEventListener("input", () => {
        clearTimeout(typingTimeout);
        typingTimeout = setTimeout(() => {
        searchProducts(searchInput.value);
        }, 300); // debounce 300ms
    });

    // klik di luar area hasil pencarian untuk menutup
    document.addEventListener("click", (e) => {
        if (!e.target.closest("#searchResults") && !e.target.closest("#productSearch")) {
        searchResults.style.display = "none";
        }
    });

    document.addEventListener("DOMContentLoaded", loadCategories);
    
    </script>
  </body>
</html>