    <header class="app-header shadow-sm">
      <nav class="navbar navbar-expand-lg bg-white px-3 py-2">
        <div class="container-fluid align-items-center justify-content-between">
          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo2.png') }}" alt="Elang Omega" height="42" class="me-2">
            <span class="fw-bold text-danger">Elang Omega</span>
          </a>

          <!-- Search -->
          <div class="search-wrapper flex-grow-1 mx-3 d-flex align-items-center justify-content-center">
            <div class="search-box d-flex flex-wrap align-items-center w-100" style="max-width: 900px;">
              <div class="dropdown me-2 category-dropdown d-none d-md-block">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  All Kategori
                </button>
                <ul class="dropdown-menu" id="categoryList" aria-labelledby="categoryDropdown">
                  <li><a class="dropdown-item" href="#" data-id="">All Kategori</a></li>
                </ul>
              </div>

              <div class="flex-grow-1 position-relative">
                <div class="input-group">
                  <span class="input-group-text"><i class="ti ti-search"></i></span>
                  <input type="text" id="productSearch" class="form-control" placeholder="Cari produk..." autocomplete="off" />
                </div>
              </div>
            </div>
          </div>

          <!-- Cart & Theme -->
          <div class="d-flex align-items-center">
            {{-- <div class="dropdown me-3">
              <a class="nav-link position-relative" href="#" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-shopping-cart fa-lg text-secondary"></i>
                <span id="cartCount" class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle" style="font-size: 10px;">0</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="cartDropdown" style="min-width: 400px;">
                <h6 class="fw-bold mb-2">Keranjang</h6>
                <ul id="cartItems" class="list-unstyled mb-2"></ul>

                <div class="dropdown-divider"></div>
                <div class="px-3 pb-2 text-end">
                  <strong>Total:</strong> <span class="fw-bold" id="cartTotal">Rp 0</span>
                </div>

                <button id="clearCartBtn" class="btn btn-sm btn-outline-danger w-100">Kosongkan</button>
              </ul>
            </div> --}}
            <!-- Tombol icon di navbar -->
            <div class="me-3">
              <a href="#" id="cartDropdown" class="nav-link position-relative">
                <i class="fas fa-shopping-cart fa-lg text-secondary"></i>
                <span id="cartCount"
                  class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle"
                  style="font-size: 10px;">0</span>
              </a>
            </div>

            <!-- Panel keranjang manual -->
            <div id="cartPanel" class="cart-offcanvas">
              <div class="cart-header">
                <h6 class="fw-bold mb-0">Keranjang</h6>
                <button type="button" class="btn-close" id="closeCartBtn">&times;</button>
              </div>

              <div class="cart-body">
                <ul id="cartItems" class="list-unstyled flex-grow-1 overflow-auto mb-3">
                  <li class="text-muted small text-center mt-3">Keranjang kosong</li>
                </ul>

                <div class="cart-footer">
                  <div class="d-flex justify-content-between mb-2">
                    <strong>Total:</strong>
                    <span id="cartTotal" class="fw-bold">Rp 0</span>
                  </div>

                  {{-- <button id="checkoutBtn" class="btn btn-success w-100 fw-semibold mb-2">Checkout</button> --}}
                  <a id="waOrderBtn" href="#" target="_blank" class="btn btn-success w-100 fw-semibold mb-2 whatsapp-float-2">
                    <i class="fab fa-whatsapp me-1"></i> Pesan via WhatsApp
                  </a>
                  <button id="clearCartBtn" class="btn btn-outline-danger w-100 fw-semibold">Kosongkan</button>
                </div>
              </div>
            </div>

            <!-- overlay gelap -->
            <div id="cartOverlay" class="cart-overlay"></div>

            {{-- <div class="dropdown dropdown-style-switcher">
              <a class="nav-link dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown">
                <i class="ti ti-md"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                <li><a class="dropdown-item" href="#" data-theme="light"><i class="ti ti-sun me-2"></i>Light</a></li>
                <li><a class="dropdown-item" href="#" data-theme="dark"><i class="ti ti-moon me-2"></i>Dark</a></li>
              </ul>
            </div> --}}
          </div>
        </div>
      </nav>
    </header>
