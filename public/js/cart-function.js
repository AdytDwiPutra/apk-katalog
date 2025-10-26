// ----- Cart utilities -----
function formatCurrency(n) {
  return 'Rp ' + Number(n || 0).toLocaleString('id-ID');
}

function loadCart() {
  try {
    return JSON.parse(localStorage.getItem('cart') || '[]');
  } catch (e) {
    return [];
  }
}

function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
}

// initial state
let cart = loadCart();
const cartCountEl = document.getElementById('cartCount');
const cartItemsEl = document.getElementById('cartItems');
const cartTotalEl = document.getElementById('cartTotal');
const clearCartBtn = document.getElementById('clearCartBtn');

// ----- update cart count (total pieces) -----
function updateCartCount() {
  const totalPieces = cart.reduce((sum, it) => sum + (it.qty || 0), 0);
  cartCountEl.textContent = totalPieces;
}

// ----- render cart -----
function renderCart() {
  cartItemsEl.innerHTML = '';

  if (!cart || cart.length === 0) {
    cartItemsEl.innerHTML = '<li class="text-muted small">Keranjang kosong</li>';
    cartTotalEl.textContent = 'Rp 0';
    return;
  }

  let total = 0;
  cart.forEach((item, i) => {
    const price = Number(item.price) || 0;
    const qty = Number(item.qty) || 0;
    total += price * qty;

    const li = document.createElement('li');
    li.className = 'd-flex justify-content-between align-items-center mb-2';

    li.innerHTML = `
      <div class="flex-grow-1">
        <div class="fw-semibold">${escapeHtml(item.name)}</div>
        <small class="text-muted">${qty} pcs × ${formatCurrency(price)}</small>
      </div>
      <div class="d-flex align-items-center gap-1">
        <button class="btn btn-sm btn-outline-secondary decrease-item" data-index="${i}" title="Kurangi"><i class="fas fa-minus"></i></button>
        <span class="mx-1">${qty}</span>
        <button class="btn btn-sm btn-outline-secondary increase-item" data-index="${i}" title="Tambah"><i class="fas fa-plus"></i></button>
        <button class="btn btn-sm btn-outline-danger remove-item ms-2" data-index="${i}" title="Hapus"><i class="fas fa-times"></i></button>
      </div>
    `;
    cartItemsEl.appendChild(li);
  });

  cartTotalEl.textContent = formatCurrency(total);
}

// ----- helper escape (jika belum ada) -----
function escapeHtml(str) {
  if (!str) return '';
  return String(str).replace(/[&<>"']/g, function (m) {
    return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[m];
  });
}

// ----- initial render -----
updateCartCount();
renderCart();

// ----- global click handler untuk add/increase/decrease/remove -----
document.addEventListener('click', function (e) {
  // add to cart (pastikan tombol memiliki data-name & data-price)
  const addBtn = e.target.closest('.add-to-cart');
  if (addBtn) {
    const name = addBtn.getAttribute('data-name') || 'Produk';
    const price = Number(addBtn.getAttribute('data-price')) || 0;

    // cari existing by name (atau pakai id kalau tersedia)
    const existing = cart.find(it => it.id && addBtn.dataset.id ? it.id == addBtn.dataset.id : it.name === name);

    if (existing) {
      existing.qty = (existing.qty || 0) + 1;
    } else {
      // kalau ada id di tombol, simpan juga untuk identifikasi
      const id = addBtn.getAttribute('data-id') || addBtn.dataset.id || null;
      cart.push({ id, name, price, qty: 1 });
    }

    saveCart();
    updateCartCount();
    renderCart();

    // optional: iziToast add notification if iziToast tersedia
    if (window.iziToast) {
      iziToast.success({ title: 'Ditambahkan', message: `${name} ditambahkan ke keranjang`, position: 'topRight', timeout: 1500 });
    }
    return;
  }

  // increase
  const inc = e.target.closest('.increase-item');
  if (inc) {
    e.stopPropagation();
    const idx = Number(inc.dataset.index);
    if (!isNaN(idx) && cart[idx]) {
      cart[idx].qty = (cart[idx].qty || 0) + 1;
      saveCart();
      updateCartCount();
      renderCart();
    }
    return;
  }

  // decrease
  const dec = e.target.closest('.decrease-item');
  if (dec) {
    e.stopPropagation();
    const idx = Number(dec.dataset.index);
    if (!isNaN(idx) && cart[idx]) {
      if ((cart[idx].qty || 0) > 1) {
        cart[idx].qty -= 1;
      } else {
        cart.splice(idx, 1);
      }
      saveCart();
      updateCartCount();
      renderCart();
    }
    return;
  }

  // remove
  const rem = e.target.closest('.remove-item');
  if (rem) {
    e.stopPropagation();
    const idx = Number(rem.dataset.index);
    if (!isNaN(idx) && cart[idx]) {
      cart.splice(idx, 1);
      saveCart();
      updateCartCount();
      renderCart();
    }
    return;
  }
});

// ----- clear cart button (pastikan id="clearCartBtn") -----
if (clearCartBtn) {
  clearCartBtn.addEventListener('click', function (ev) {
    ev.stopPropagation();
    if (!cart.length) return;
    if (window.iziToast) {
      iziToast.question({
        timeout: false, close: false, overlay: true, displayMode: 'once',
        title: 'Konfirmasi', message: 'Kosongkan semua item dari keranjang?', position: 'center',
        buttons: [
          ['<button>Ya</button>', function (instance, toast) {
            cart = [];
            saveCart();
            updateCartCount();
            renderCart();
            instance.hide({ transitionOut: 'fadeOut' }, toast);
          }, true],
          ['<button>Batal</button>', function (instance, toast) { instance.hide({ transitionOut: 'fadeOut' }, toast); }]
        ]
      });
    } else {
      if (confirm('Kosongkan semua item dari keranjang?')) {
        cart = [];
        saveCart();
        updateCartCount();
        renderCart();
      }
    }
  });
}
