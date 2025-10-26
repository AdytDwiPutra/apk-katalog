<header class="app-header shadow-sm">
    <nav class="navbar navbar-expand-lg bg-white px-3 py-2">
        <div class="container-fluid align-items-center justify-content-between">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="42" class="me-2">
                <span class="fw-bold text-primary">Catalog App</span>
            </a>

            <!-- Search -->
            <div class="search-wrapper flex-grow-1 mx-3">
                <div class="search-box d-flex flex-wrap align-items-center w-100" style="max-width: 900px;">
                    <div class="dropdown me-2 category-dropdown d-none d-md-block">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown">
                            All Kategori
                        </button>
                        <ul class="dropdown-menu" id="categoryList"></ul>
                    </div>

                    <div class="flex-grow-1 position-relative">
                        <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-search"></i></span>
                            <input type="text" id="productSearch" class="form-control" placeholder="Cari produk..." autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart & Theme -->
            <div class="d-flex align-items-center">
                <div class="dropdown me-3" data-bs-auto-close="outside">
                    <a class="nav-link position-relative" href="#" id="cartDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-shopping-cart fa-lg text-secondary"></i>
                        <span id="cartCount" class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 260px;">
                        <h6 class="fw-bold mb-2">Keranjang</h6>
                        <ul id="cartItems" class="list-unstyled mb-2"></ul>
                        <div class="dropdown-divider"></div>
                        <div class="px-3 pb-2 small text-end">
                            <strong>Total:</strong> <span id="cartTotal">Rp 0</span>
                        </div>
                        <button id="clearCartBtn" class="btn btn-sm btn-outline-danger w-100">Kosongkan</button>
                    </ul>
                </div>

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
        </div>
    </nav>
</header>