@extends('layouts.app')

@section('title', 'Produk | Elang Omega')
<style>
    .product-card {
  transition: all 0.3s ease;
  border-radius: 0.75rem;
  overflow: hidden;
}

.card-img-wrapper {
  overflow: hidden;
  border-top-left-radius: 0.75rem;
  border-top-right-radius: 0.75rem;
}

.card-img-top {
  width: 100%;
  height: 270px; /* Tinggi gambar (¾ tinggi card) */
  object-fit: cover;
  transition: transform 0.3s ease;
}

.product-card:hover .card-img-top {
  transform: scale(1.05);
}

.card-body {
  padding: 1rem;
  text-align: center;
}

.card-title {
  font-size: 1rem;
}

.card-price {
  font-size: 0.95rem;
  color: #000;
}

.card-desc {
  font-size: 0.85rem;
  color: #888;
  min-height: 30px;
}
@media (max-width: 576px) {
  .card-img-top {
    height: 220px;
  }
}

</style>
@section('content')

{{-- <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:50px;">
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

</div> --}}
<!-- Product grid -->
<div id="productContainer" class="row g-3 mt-2 p-y"></div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Base server-side values exposed to JS once (clean)
            const baseProductUrl = "{{ url('products') }}";
            const defaultImage = "{{ asset('assets/images/no-product.png') }}";
            const productSearchEl = document.getElementById('productSearch');
            const categoryListEl = document.getElementById('categoryList');
            const categoryDropdownBtn = document.getElementById('categoryDropdown');

            // DOM refs
            const productContainer = document.getElementById('productContainer');
            let products = [];
            let selectedCategory = "";

            // Utilities
            function escapeHtml(str) {
                if (!str) return '';
                return String(str).replace(/[&<>"']/g, function (m) {
                    return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[m];
                });
            }
            function escapeAttr(s){ return escapeHtml(s).replace(/"/g,'&quot;'); }
            
            function formatCurrency(n) {
                return 'Rp ' + Number(n || 0).toLocaleString('id-ID');
            }

            // Loading products & categories
            async function loadProducts() {
                try {
                    const res = await fetch('/api/products');
                    const json = await res.json();
                    products = json.data || [];
                    renderProducts(products);
                } catch (err) {
                    console.error('Gagal memuat produk:', err);
                    productContainer.innerHTML = '<p class="text-center text-muted mt-4">Gagal memuat produk.</p>';
                }
            }

            // Render functions
            function renderProducts(list) {
                productContainer.innerHTML = '';
                if (!list || list.length === 0) {
                    productContainer.innerHTML = '<p class="text-center text-muted mt-4">Produk tidak ditemukan.</p>';
                    return;
                }

                list.forEach(p => {
                    const col = document.createElement('div');
                    col.className = 'col-12 col-md-6 col-lg-4 mb-4';

                    const imageSrc = (p.images && p.images.path) ? p.images.path : defaultImage;
                    const shortDesc = p.description ? (p.description.length > 60 ? p.description.substring(0, 60) + '...' : p.description) : 'Tidak ada deskripsi';

                    col.innerHTML = `
<div class="card product-card shadow-sm border-0" style="cursor:pointer;">
  <div class="card-img-wrapper" data-title="${escapeHtml(p.name)}">
    <img src="${imageSrc}" alt="${escapeHtml(p.name)}" class="card-img-top">
  </div>

  <div class="card-body text-center d-flex flex-column justify-content-between">
    <div>
      <h6 class="card-title mb-1 fw-semibold">${escapeHtml(p.name)}</h6>
      <p class="card-price mb-2 text-black fw-bold">${formatCurrency(p.price)}</p>
      <p class="card-desc text-muted mb-3">${escapeHtml(shortDesc)}</p>
    </div>

    <div class="d-flex gap-2 justify-content-center mt-auto">
      <a class="btn btn-sm btn-primary btn-details" href="{{ url("products") }}/${p.id}" data-id="${p.id}">
        Lihat
      </a>
      <button class="btn btn-sm btn-success add-to-cart" data-name="${escapeAttr(p.name)}" data-price="${p.price}">
        Tambah &nbsp; <i class="fas fa-shopping-cart fa-lg text-white"></i>
      </button>
    </div>
  </div>
</div>

                    `;

                    productContainer.appendChild(col);
                });
            }

            // Filtering
            function filterProducts() {
                const keyword = productSearchEl.value.toLowerCase().trim();
                if (!keyword && !selectedCategory) {
                    renderProducts(products);
                    return;
                }
                let filtered = products.slice();
                if (keyword) {
                    filtered = filtered.filter(p => (p.name || '').toLowerCase().includes(keyword));
                }

                if (selectedCategory) {
                    filtered = filtered.filter(p => 
                    p.category && p.category.id == selectedCategory
                    );
                }        
                renderProducts(filtered);
            }

            // Categories
            async function loadCategories() {
                try {
                    const res = await fetch('/api/categories');
                    const json = await res.json();
                    const data = json.data || [];
                    categoryListEl.innerHTML = '<li><a class="dropdown-item" href="#" data-id="">All Kategori</a></li>';
                    data.forEach(cat => {
                    const li = document.createElement('li');
                    li.innerHTML = `<a class="dropdown-item" href="#" data-id="${cat.id}">${cat.name}</a>`;
                    categoryListEl.appendChild(li);
                    });

                    categoryListEl.querySelectorAll('a').forEach(a => {
                    a.addEventListener('click', e => {
                        e.preventDefault();
                        selectedCategory = a.dataset.id || "";
                        categoryDropdownBtn.textContent = a.textContent || 'All Kategori';
                        filterProducts();
                    });
                    });
                } catch (err) {
                    console.error('Gagal memuat kategori:', err);
                }
            }

            // 🔹 Overlay behavior
            productSearchEl.addEventListener('focus', () => searchOverlay.classList.add('active'));
            productSearchEl.addEventListener('blur', () => setTimeout(() => searchOverlay.classList.remove('active'), 150));
            // 🔹 Sembunyikan carousel saat search aktif di mobile
            productSearchEl.addEventListener('input', () => {
                const carousel = document.getElementById('carouselExample-cf');
                const keyword = productSearchEl.value.trim();

                // Hanya berlaku untuk layar mobile (<768px)
                const isMobile = window.innerWidth < 768;

                if (isMobile) {
                    if (keyword.length > 0) {
                    // Kalau sedang mengetik → sembunyikan carousel
                    carousel.style.display = 'none';
                    } else {
                    // Kalau sudah kosong → tampilkan lagi carousel
                    carousel.style.display = 'block';
                    }
                }
                filterProducts();
            });

            loadProducts();
            loadCategories();    

        });
    </script>
@endpush
