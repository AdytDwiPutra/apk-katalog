@extends('layouts.app')

@section('title', 'Produk | Elang Omega')
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
  color: #2a0000;
}

.tab-btn.active::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: #2a0000;
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

.text-1 {
    color : #2a0000;
}
.product-description {
  position: relative;
  max-width: 600px;
}

.desc-content {
  overflow: hidden;
  max-height: 100px;
  transition: max-height 0.5s ease, opacity 0.4s ease;
  opacity: 0.9;
}

.desc-content.expanded {
  opacity: 1;
}

#toggleDesc {
  color: #0d6efd;
  cursor: pointer;
  user-select: none;
  transition: color 0.3s;
}

#toggleDesc:hover {
  text-decoration: underline;
  color: #084298;
}

#carouselExample-cf{
    display: none !important;
}
</style>
@section('content')
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
        <button class="btn btn-sm btn-outline-success add-to-cart" data-name="{{ $product->name }}" data-price="{{ $product->price }}">Tambah ke Keranjang</button>

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

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", async () => {
        const searchResults = document.createElement("div");
        const categoryDropdown = document.getElementById("categoryDropdown");
        const categoryList = document.getElementById("categoryList");
        const productSearch = document.getElementById("productSearch");
        const desc = document.getElementById("productDesc");
        const toggleBtn = document.getElementById("toggleDesc");
        let expanded = false;
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

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(c => c.classList.remove('active'));

            btn.classList.add('active');
            const target = btn.dataset.tab;
            document.getElementById('tab-' + target).classList.add('active');
            });
        });
        
        // Jalankan pertama kali
        loadCategories();
    });
</script>
@endpush
