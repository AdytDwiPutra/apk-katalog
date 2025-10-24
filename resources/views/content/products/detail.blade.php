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
    #searchResults {
  max-height: 350px;
  overflow-y: auto;
}

#searchResults .search-item:hover {
  background-color: #f8f9fa;
}

.product-page {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-top: 50px;
  font-family: 'Poppins', sans-serif;
}

/* ==== GALERI ==== */
.product-gallery {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.product-gallery .main-image {
  width: 100%;
  border-radius: 12px;
  border: 1px solid #eee;
  max-width: 400px;
  object-fit: contain;
}

.thumbnail-row {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}

.thumbnail-row .thumb {
  width: 70px;
  height: 70px;
  border-radius: 8px;
  border: 2px solid transparent;
  cursor: pointer;
  object-fit: cover;
  transition: all 0.2s ease;
}

.thumbnail-row .thumb:hover,
.thumbnail-row .thumb.active {
  border-color: #00a856;
  transform: scale(1.05);
}

/* ==== DETAIL PRODUK ==== */
.product-info .product-title {
  font-size: 1.4rem;
  font-weight: 600;
  margin-bottom: 8px;
  color: #222;
}

.product-rating {
  font-size: 0.9rem;
  color: #888;
  margin-bottom: 16px;
}

.product-price {
  font-size: 1.8rem;
  font-weight: 700;
  color: #00a856;
  margin-bottom: 20px;
}

/* ==== PILIH WARNA ==== */
.product-color .label {
  font-weight: 500;
  margin-bottom: 6px;
}

.color-option {
  display: flex;
  gap: 10px;
}

.color-btn {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  border: 2px solid transparent;
  cursor: pointer;
  transition: transform 0.2s ease, border-color 0.2s ease;
}

.color-btn:hover,
.color-btn.active {
  transform: scale(1.1);
  border-color: #00a856;
}

/* ==== AKSI PRODUK ==== */
.product-action {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 25px 0;
  flex-wrap: wrap;
}

.qty-control {
  display: flex;
  align-items: center;
  border: 1px solid #ddd;
  border-radius: 6px;
  overflow: hidden;
}

.qty-btn {
  background: #f3f3f3;
  border: none;
  width: 36px;
  height: 36px;
  font-weight: 700;
  cursor: pointer;
}

.qty-input {
  width: 45px;
  text-align: center;
  border: none;
  outline: none;
}

.btn-cart {
  background: #00a856;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 10px 20px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease;
}

.btn-cart:hover {
  background: #008b46;
}

.btn-buy {
  background: #fff;
  color: #00a856;
  border: 2px solid #00a856;
  border-radius: 6px;
  padding: 9px 20px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-buy:hover {
  background: #00a856;
  color: #fff;
}

/* ==== DETAIL TAMBAHAN ==== */
.product-detail {
  border-top: 1px solid #eee;
  padding-top: 20px;
}

.product-detail h4 {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 10px;
}

/* ==== SELLER BOX ==== */
.seller-box {
  display: flex;
  align-items: center;
  gap: 15px;
  background: #fafafa;
  border-radius: 10px;
  padding: 12px 16px;
  margin-top: 25px;
  border: 1px solid #eee;
}

.seller-logo {
  width: 50px;
  height: 50px;
  border-radius: 6px;
}

.seller-name {
  font-weight: 600;
  margin: 0;
}

.seller-rating {
  font-size: 0.9rem;
  color: #777;
}

/* ==== RESPONSIVE ==== */
@media (max-width: 992px) {
  .product-page {
    grid-template-columns: 1fr;
  }
}

/* ==== TABS PRODUK ==== */
.product-tabs {
  border-top: 1px solid #eee;
  margin-top: 30px;
  padding-top: 15px;
}

.tab-header {
  display: flex;
  gap: 30px;
  border-bottom: 1px solid #eee;
  margin-bottom: 15px;
}

.tab-btn {
  background: none;
  border: none;
  font-weight: 600;
  color: #555;
  padding-bottom: 10px;
  cursor: pointer;
  position: relative;
}

.tab-btn.active {
  color: #00a856;
}

.tab-btn.active::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: #00a856;
}

.tab-pane {
  display: none;
  font-size: 0.95rem;
  color: #333;
}

.tab-pane.active {
  display: block;
}

.tab-pane ul {
  margin-left: 20px;
}
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
      <header class="app-header shadow-sm">
        <nav class="navbar navbar-expand-lg bg-white px-3 py-2">
          <div class="container-fluid align-items-center justify-content-between">
            
            <!-- 🔹 Logo kiri -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
              <img src="{{ asset('assets/images/logo2.png') }}" alt="Elang Omega" height="42" class="me-2">
              <span class="fw-bold text-danger">Elang Omega</span>
            </a>

            <!-- 🔹 Search tengah -->
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

                <!-- Hasil pencarian muncul di sini -->
                <div id="searchResults" class="position-absolute bg-white w-100 border rounded shadow-sm" style="z-index: 1000; display: none;margin-top:40px !important;"></div>
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

            <div class="product-price">{{ formatRupiah($product->price) }}</div>

            <div class="product-color">
            <p class="label">Pilih warna:</p>
            <div class="color-option">
                <button class="color-btn active" style="background:#000;" title="Hitam"></button>
                <button class="color-btn" style="background:#187bcd;" title="Biru"></button>
                <button class="color-btn" style="background:#f6c3c9;" title="Putih"></button>
                <button class="color-btn" style="background:#d83535;" title="Merah"></button>
            </div>
            </div>

            <div class="product-action">
            <div class="qty-control">
                <button class="qty-btn">-</button>
                <input type="text" value="1" class="qty-input">
                <button class="qty-btn">+</button>
            </div>
            <button class="btn-cart">+ Keranjang</button>
            <button class="btn-buy">Beli Langsung</button>
            </div>

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
                <p><strong>Etalase:</strong> <a href="#" class="text-success">Semua Etalase</a></p>

                <p class="mt-3">
                    FIT TO L <br>
                    LD (lingkar dada): 96-100 cm <br>
                    P (panjang): 70 cm <br>
                    Bahan: Cotton combed 30s
                </p>

                <p>Ready warna:</p>
                <ul>
                    <li>Hitam</li>
                    <li>Putih</li>
                </ul>

                <a href="#" class="text-success fw-semibold">Lihat Selengkapnya</a>
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

            <div class="seller-box">
            <img src="{{ asset('images/liger-logo.png') }}" alt="LIGER" class="seller-logo">
            <div>
                <p class="seller-name">LIGER OFFICIAL STORE</p>
                <p class="seller-rating">⭐ 4.6 (35,4 rb)</p>
            </div>
            </div>
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
        searchResults.innerHTML = `<div class="p-2 text-muted">Tidak ada produk ditemukan</div>`;
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

  </body>
</html>
