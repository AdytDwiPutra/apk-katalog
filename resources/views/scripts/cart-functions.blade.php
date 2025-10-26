<script>
// Add this helper function
function getDropdownInstance() {
    const dropdownEl = document.getElementById('cartDropdown');
    return dropdownEl ? bootstrap.Dropdown.getInstance(dropdownEl) 
                     : new bootstrap.Dropdown(dropdownEl, { autoClose: 'outside' });
}

// Update your handleCartAction function
function handleCartAction(callback) {
    const dropdown = getDropdownInstance();
    const wasOpen = dropdown?._element.classList.contains('show');
    
    callback();
    
    if (wasOpen && dropdown) {
        setTimeout(() => dropdown.show(), 10);
    }
}

function updateCartCount() {
    const totalQty = state.cart.reduce((sum, item) => sum + item.qty, 0);
    elements.cartCount.textContent = totalQty;
}

function renderCart() {
    elements.cartItems.innerHTML = '';
    let totalHarga = 0;

    if (state.cart.length === 0) {
        elements.cartItems.innerHTML = '<li class="text-muted small">Keranjang kosong</li>';
        elements.cartTotal.textContent = 'Rp 0';
        return;
    }

    state.cart.forEach((item, i) => {
        const subtotal = item.price * item.qty;
        totalHarga += subtotal;

        const li = document.createElement('li');
        li.className = 'd-flex justify-content-between align-items-center mb-2 cart-item';
        li.innerHTML = `
            <div class="d-flex flex-column w-100 me-2">
                <span>${escapeHtml(item.name)}</span>
                <div class="d-flex align-items-center gap-1 small">
                    <button class="btn btn-sm btn-outline-secondary qty-btn dec" data-index="${i}">−</button>
                    <span class="qty-count">${item.qty}</span> pcs
                    <button class="btn btn-sm btn-outline-secondary qty-btn inc" data-index="${i}">+</button>
                    <span class="ms-auto fw-semibold">${formatRupiah(subtotal)}</span>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-danger remove-item" data-index="${i}">
                <i class="fas fa-times"></i>
            </button>
        `;
        elements.cartItems.appendChild(li);
    });

    elements.cartTotal.textContent = formatRupiah(totalHarga);
}

// Save cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(state.cart));
}

// Load cart from localStorage
function loadCart() {
    const saved = localStorage.getItem('cart');
    return saved ? JSON.parse(saved) : [];
}

</script>