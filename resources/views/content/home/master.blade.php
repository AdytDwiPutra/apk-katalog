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
    @include('layouts.style')
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
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
              <img src="{{ asset('assets/images/logo2.png') }}" alt="Elang Omega" height="42" class="me-2">
              <span class="fw-bold text-danger">Elang Omega</span>
            </a>

            <!-- 🔹 Search tengah -->
            <div class="search-wrapper flex-grow-1 mx-3 d-flex align-items-center justify-content-center">
              <div class="search-box d-flex flex-wrap align-items-center w-100" style="max-width: 900px;">
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


        <!-- / Navbar -->
        <!-- BODY PRODUK -->
        <div class="content-wrapper mt-4">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:50px;">
            <div class="alert alert-warning py-2 px-3 mb-0 mt-2">
              <small>
                <strong>INFO:</strong><br>
                • Pemesanan produk hubungi admin CS kami di <b>082223244130</b><br>
                • Produk yang dengan brand HOTEL memiiki <b>Minimal Order Quantity (MOQ)</b>
              </small>
            </div>
              <div class="section-header text-center mb-4">
                <div class="section-underline"></div>
              </div>
              <div id="productContainer" class="row g-3"></div>
          </div>
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
    @yield('scripts')



<script>
  let selectedCategory = "";
  let products = [];
  const productContainer = document.getElementById("productContainer");

  // 🔹 Ambil data produk dari API
  async function loadProducts() {
    try {
      const res = await fetch("/api/products");
      const data = await res.json();
      products = data.data || [];
      renderProducts(products);
    } catch (err) {
      console.error("Gagal memuat produk:", err);
    }
  }

  // 🔹 Tampilkan produk ke dalam container
  function renderProducts(list) {
    productContainer.innerHTML = "";

    if (!list || list.length === 0) {
      productContainer.innerHTML =
        `<p class="text-center text-muted mt-4">Produk tidak ditemukan.</p>`;
      return;
    }

    list.forEach(p => {
      const col = document.createElement("div");
      col.className = "col-12 col-md-6 col-lg-4 mb-4"; // lebih lebar karena bentuk horizontal

      // batasi panjang nama & deskripsi
      const desc = p.description
                  ? (p.description.length > 30 ? p.description.substring(0, 60) + "..." : p.description)
                  : "Tidak ada deskripsi";
                  
      col.innerHTML = `
        <div class="card product-card shadow-sm border-0 d-flex flex-row align-items-stretch"
            onclick="window.location.href='{{ url('products') }}/${p.id}'"
            style="cursor: pointer;">
          <div class="card-img-wrapper" data-title="${p.name}">
            <img src="${p.images ? p.images.path : '{{ asset("assets/images/no-product.png") }}'}"
                alt="${p.name}" class="card-img-left">
          </div>
          <div class="card-body d-flex flex-column justify-content-center">
            <h6 class="card-title mb-1 fw-semibold">${p.name}</h6>
            <br>
            <p class="card-price mb-2 text-black fw-bold">
              Rp ${Number(p.price).toLocaleString('id-ID')}
            </p>
            <br>
            <p class="card-desc text-muted mb-0">${desc}</p>
          </div>
        </div>
      `;
      
      productContainer.appendChild(col);
    });


  }

  // 🔹 Ambil kategori dari API
  async function loadCategories() {
    try {
      const res = await fetch("/api/categories");
      const x = await res.json();
      const data = x.data;
      console.log(data);
      
      const categoryList = document.getElementById("categoryList");
      categoryList.innerHTML =
        `<li><a class="dropdown-item" href="#" data-id="">All Kategori</a></li>`;

      data.forEach(cat => {
        const li = document.createElement("li");
        li.innerHTML =
          `<a class="dropdown-item" href="#" data-id="${cat.id}">${cat.name}</a>`;
        categoryList.appendChild(li);
      });

      categoryList.querySelectorAll("a").forEach(a => {
        a.addEventListener("click", e => {
          e.preventDefault();
          selectedCategory = a.dataset.id;
          document.getElementById("categoryDropdown").textContent =
            a.textContent || "All Kategori";
          filterProducts();
        });
      });
    } catch (err) {
      console.error("Gagal memuat kategori:", err);
    }
  }

  // 🔹 Filter berdasarkan kategori & pencarian
  function filterProducts() {
    const keyword = document
      .getElementById("productSearch")
      .value
      .toLowerCase()
      .trim();

    // kalau kosong → tampilkan semua produk
    if (keyword === "" && selectedCategory === "") {
      renderProducts(products);
      return;
    }

    let filtered = products;

    if (keyword !== "") {
      filtered = filtered.filter(p =>
        p.name.toLowerCase().includes(keyword)
      );
    }

    if (selectedCategory) {
      filtered = filtered.filter(p => p.category_id == selectedCategory);
    }

    renderProducts(filtered);
  }

  document
    .getElementById("productSearch")
    .addEventListener("input", filterProducts);
  // 🔹 Load awal
  loadProducts();
  loadCategories();




</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const overlay = document.getElementById("loading-overlay");
    const searchInput = document.getElementById("productSearch");
    const searchOverlay = document.getElementById("searchOverlay");

    searchInput.addEventListener("focus", () => {
      searchOverlay.classList.add("active");
    });

    searchInput.addEventListener("blur", () => {
      // Delay biar ga langsung ilang kalau klik dropdown
      setTimeout(() => searchOverlay.classList.remove("active"), 150);
    });
    
    // Setelah 2,5 detik (selesai animasi)
    setTimeout(() => {
      overlay.classList.add("hidden");
    }, 1500);
  });
</script>
  </body>
</html>