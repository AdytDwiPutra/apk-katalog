<script>
async function loadProducts() {
    try {
        const response = await fetch('/api/products');
        const data = await response.json();
        state.products = data.data || [];
        renderProducts(state.products);
    } catch (error) {
        console.error('Failed to load products:', error);
        elements.productContainer.innerHTML = '<p class="text-center text-muted mt-4">Failed to load products.</p>';
    }
}

async function loadCategories() {
    try {
        const response = await fetch('/api/categories');
        const data = await response.json();
        renderCategories(data.data || []);
    } catch (error) {
        console.error('Failed to load categories:', error);
    }
}

function renderProducts(products) {
    elements.productContainer.innerHTML = '';
    
    if (!products || products.length === 0) {
        elements.productContainer.innerHTML = '<p class="text-center text-muted mt-4">No products found.</p>';
        return;
    }

    products.forEach((product, index) => {
        const card = document.createElement('div');
        card.className = 'col-12 col-md-6 col-lg-4 mb-4 product-card';
        card.style.animationDelay = `${index * 0.1}s`;

        const imageSrc = product.images?.path || defaultImage;
        const shortDesc = product.description 
            ? (product.description.length > 60 ? product.description.substring(0, 60) + '...' : product.description)
            : 'No description available';

        card.innerHTML = `
            <div class="card shadow-sm border-0 h-100">
                <div class="card-img-wrapper" data-title="${escapeHtml(product.name)}">
                    <img src="${imageSrc}" class="card-img-top" alt="${escapeHtml(product.name)}">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-2">${escapeHtml(product.name)}</h5>
                    <p class="card-text text-muted mb-2">${escapeHtml(shortDesc)}</p>
                    <div class="mt-auto">
                        <p class="card-price mb-2 fw-bold">${formatRupiah(product.price)}</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary btn-details" 
                                    data-id="${product.id}">View Details</button>
                            <button class="btn btn-sm btn-outline-success add-to-cart" 
                                    data-name="${escapeAttr(product.name)}" 
                                    data-price="${product.price}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        elements.productContainer.appendChild(card);
    });
}

function renderCategories(categories) {
    const categoryList = document.getElementById('categoryList');
    categoryList.innerHTML = '<li><a class="dropdown-item" href="#" data-id="">All Categories</a></li>';
    
    categories.forEach(category => {
        const li = document.createElement('li');
        li.innerHTML = `<a class="dropdown-item" href="#" data-id="${category.id}">${escapeHtml(category.name)}</a>`;
        categoryList.appendChild(li);
    });
}

function filterProducts() {
    const searchTerm = elements.productSearch.value.toLowerCase().trim();
    let filtered = state.products;

    if (state.selectedCategory) {
        filtered = filtered.filter(p => p.category_id == state.selectedCategory);
    }

    if (searchTerm) {
        filtered = filtered.filter(p => 
            p.name.toLowerCase().includes(searchTerm) || 
            p.description?.toLowerCase().includes(searchTerm)
        );
    }

    renderProducts(filtered);
}
</script>