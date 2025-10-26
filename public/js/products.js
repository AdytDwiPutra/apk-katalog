async function loadProducts() {
  const res = await fetch('/api/products');
  const json = await res.json();
  const products = json.data || [];
  renderProducts(products);
}

function renderProducts(list) {  
  const productContainer = document.getElementById('productContainer');
  productContainer.innerHTML = '';
  if (!list.length) {
    productContainer.innerHTML = '<p class="text-center text-muted mt-4">Produk tidak ditemukan.</p>';
    return;
  }
  list.forEach(p => {
    const col = document.createElement('div');
    col.className = 'col-12 col-md-6 col-lg-4 mb-4';
    col.innerHTML = `
      <div class="card p-2 shadow-sm">
        <img src="${p.images?.path || '/assets/images/no-product.png'}" class="card-img-top rounded">
        <div class="card-body">
          <h6 class="fw-semibold">${p.name}</h6>
          <p>${formatCurrency(p.price)}</p>
          <button class="btn btn-primary btn-sm" onclick="loadDetailProduct(${p.id})">Lihat</button>
        </div>
      </div>
    `;
    productContainer.appendChild(col);
  });
}

async function loadDetailProduct(id) {
  const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));
  const modalContent = document.getElementById('productDetailContent');
  modalContent.innerHTML = '<div class="text-muted py-3">Memuat...</div>';
  modal.show();

  const res = await fetch(`/api/products/${id}`);
  const json = await res.json();
  const p = json.data;

  modalContent.innerHTML = `
    <img src="${p.images?.path || '/assets/images/no-product.png'}" class="img-fluid mb-3 rounded">
    <h5>${p.name}</h5>
    <p>${formatCurrency(p.price)}</p>
    <p>${p.description || 'Tidak ada deskripsi.'}</p>
  `;
}

loadProducts();
