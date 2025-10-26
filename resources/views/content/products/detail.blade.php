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
       @include('layouts.style')

  </head>
<style>

</style>

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
      @include('components.navbar')

      <!-- 🔹 Overlay fokus search -->
      <div id="searchOverlay"></div>


        <!-- / Navbar -->
        <!-- BODY PRODUK -->
        <div class="content-wrapper mt-4">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:50px;">
            <div class="product-page">
              <!-- Bagian kiri: gambar produk -->
              <div class="product-gallery">
                  <img src="{{ asset($product->images->path ?? 'assets/images/no-product.png') }}" alt="{{ $product->name }}" class="main-image">
                  <div class="thumbnail-row">
                  {{-- Thumbnail bisa ditambahkan nanti --}}
                  </div>
              </div>

          <!-- Bagian kanan: detail produk -->
          <div class="product-info">
              <h2 class="product-title">{{ $product->name }}</h2>

              <div class="product-price text-1">{{ formatRupiah($product->price) }}</div>

              <!-- ============================ -->
              <!-- Bagian TAB Detail Produk -->
              <!-- ============================ -->
              <div class="product-tabs">
                  <div class="tab-header">
                      <button class="tab-btn active" data-tab="detail">Detail Produk</button>
                      <button class="tab-btn" data-tab="panduan">Panduan</button>
                      <button class="tab-btn" data-tab="info">Info Penting</button>
                  </div>

                  <div class="tab-content">
                      <!-- Tab Detail -->
                      <div id="tab-detail" class="tab-pane active">
                      <p><strong>Kondisi:</strong> Baru</p>
                      <p><strong>Min. Pemesanan:</strong> 1 Buah</p>
                      <p><strong>Etalase:</strong> <a href="#" class="text-1">Semua Etalase</a></p>

                      <div class="product-description mt-3">
                          <div class="desc-content" id="productDesc">
                          FIT TO L <br>
                          LD (lingkar dada): 96-100 cm <br>
                          P (panjang): 70 cm <br>
                          Bahan: Cotton combed 30s <br><br>

                          Ready warna:
                          <ul>
                              <li>Hitam</li>
                              <li>Putih</li>
                              <li>Abu-abu</li>
                              <li>Merah Marun</li>
                          </ul>
                          <br>
                          Baju ini dibuat dari bahan katun combed premium yang lembut di kulit,
                          adem dipakai, dan tahan lama. Cocok digunakan untuk aktivitas harian
                          maupun santai di rumah. Jahitan kuat dan rapi.
                          </div>

                          <a href="javascript:void(0);" id="toggleDesc" class="text-1 fw-semibold d-inline-block mt-2">
                          Lihat Selengkapnya ▼
                          </a>
                      </div>
                      </div>

                      <!-- Tab Panduan -->
                      <div id="tab-panduan" class="tab-pane">
                          <p><strong>Cara Pemesanan:</strong></p>
                          <ul>
                              <li>Pilih warna dan jumlah.</li>
                              <li>Klik tombol “+ Keranjang” atau “Beli Langsung”.</li>
                              <li>Pastikan alamat dan metode pembayaran benar.</li>
                          </ul>
                          </div>

                          <!-- Tab Info Penting -->
                          <div id="tab-info" class="tab-pane">
                          <p>Barang dikirim dari gudang pusat dengan pengemasan aman. Pastikan membuka video unboxing untuk klaim garansi atau retur.</p>
                      </div>
                  </div>
              </div>
              <!-- ============================ -->
          </div>
        </div>

<!-- Script tab interaktif -->
<script>
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-pane').forEach(c => c.classList.remove('active'));

      btn.classList.add('active');
      const target = btn.dataset.tab;
      document.getElementById('tab-' + target).classList.add('active');
    });
  });
</script>
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
    @include('layouts.scripts')

<script>
document.addEventListener("DOMContentLoaded", async () => {
  const categoryDropdown = document.getElementById("categoryDropdown");
  const categoryList = document.getElementById("categoryList");
  const productSearch = document.getElementById("productSearch");
  const searchResults = document.createElement("div");
  const BASE_ASSET_URL = "{{ asset('') }}";

  // Elemen hasil pencarian (dropdown)
  searchResults.id = "searchResults";
  searchResults.className = "list-group position-absolute w-100 shadow-sm";
  searchResults.style.zIndex = "1000";
  searchResults.style.marginTop = "40px";
  searchResults.style.background = "cornsilk";
  productSearch.parentElement.appendChild(searchResults);

  let selectedCategory = "all";

  // 🔹 1. Load kategori dari API
  async function loadCategories() {
    try {
      const res = await fetch("/api/categories");
      const x = await res.json();
      const result = x.data;

        categoryList.innerHTML = `<li><a class="dropdown-item" href="#" data-id="all">All Kategori</a></li>`;
        result.forEach(cat => {
          const li = document.createElement("li");
          li.innerHTML = `<a class="dropdown-item" href="#" data-id="${cat.id}">${cat.name}</a>`;
          categoryList.appendChild(li);
        });
    } catch (err) {
      console.error("Gagal memuat kategori:", err);
    }
  }

  // 🔹 2. Event listener kategori
  categoryList.addEventListener("click", (e) => {
    e.preventDefault();
    if (e.target.classList.contains("dropdown-item")) {
      selectedCategory = e.target.getAttribute("data-id");
      const selectedText = e.target.textContent;
      categoryDropdown.textContent = selectedText;
    }
  });

  // 🔹 3. Search produk (fetch dari API Laravel)
  async function searchProducts(keyword) {
    if (!keyword.trim()) {
      searchResults.style.display = "none";
      searchResults.innerHTML = "";
      return;
    }

    try {
      const res = await fetch(`/api/products/search?query=${encodeURIComponent(keyword)}&category=${selectedCategory}`);
      const result = await res.json();

      if (!result.success) {
        searchResults.innerHTML = `<div class="p-2 text-muted">Terjadi kesalahan saat memuat data</div>`;
        searchResults.style.display = "block";
        return;
      }

      const products = result.data;

      if (products.length === 0) {
        searchResults.innerHTML = `<div class="p-2 text-muted">Produk tidak ditemukan</div>`;
        searchResults.style.display = "block";
        return;
      }

      // Tampilkan hasil
      searchResults.innerHTML = products.map(p => {
        const image = p.images?.path 
                        ? `${BASE_ASSET_URL}${p.images.path}` 
                        : `${BASE_ASSET_URL}assets/images/no-product.png`;
        const harga = `Rp ${Number(p.price).toLocaleString('id-ID')}`;
        return `
          <a href="{{ url('products/${p.id}') }}" class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="${image}" alt="${p.name}" class="me-3 rounded" width="50" height="50" style="object-fit:cover;">
            <div>
              <div class="fw-semibold">${p.name}</div>
              <div class="text-muted small">${harga}</div>
            </div>
          </a>
        `;
      }).join("");

      searchResults.style.display = "block";

    } catch (err) {
      console.error("Error:", err);
      searchResults.innerHTML = `<div class="p-2 text-muted">Gagal mengambil data</div>`;
      searchResults.style.display = "block";
    }
  }

  // 🔹 4. Event listener input search
  let searchTimeout;
  productSearch.addEventListener("input", (e) => {
    const keyword = e.target.value;
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => searchProducts(keyword), 300); // debounce 300ms
  });

  // Tutup hasil kalau klik di luar
  document.addEventListener("click", (e) => {
    if (!searchResults.contains(e.target) && e.target !== productSearch) {
      searchResults.style.display = "none";
    }
  });

  // Jalankan pertama kali
  loadCategories();
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const desc = document.getElementById("productDesc");
  const toggleBtn = document.getElementById("toggleDesc");
  let expanded = false;

  toggleBtn.addEventListener("click", () => {
    if (!expanded) {
      // expand
      const fullHeight = desc.scrollHeight + "px";
      desc.style.maxHeight = fullHeight;
      desc.classList.add("expanded");
      toggleBtn.innerHTML = "Lihat Lebih Sedikit ▲";
    } else {
      // collapse
      desc.style.maxHeight = "100px";
      desc.classList.remove("expanded");
      toggleBtn.innerHTML = "Lihat Selengkapnya ▼";
    }
    expanded = !expanded;
  });
});
</script>

  </body>
</html>
