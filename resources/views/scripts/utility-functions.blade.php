<script>
function formatRupiah(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

function escapeHtml(str) {
    if (!str) return '';
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

function escapeAttr(str) {
    return str ? str.replace(/"/g, '&quot;') : '';
}

function debounce(func, wait) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast-message toast-${type}`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    requestAnimationFrame(() => toast.classList.add('show'));
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

function initializeApp() {
    // Setup search debouncing
    elements.productSearch.addEventListener('input', debounce(() => {
        filterProducts();
    }, 300));

    // Setup category selection
    document.getElementById('categoryList').addEventListener('click', e => {
        if (e.target.classList.contains('dropdown-item')) {
            e.preventDefault();
            state.selectedCategory = e.target.dataset.id;
            elements.categoryDropdown.textContent = e.target.textContent;
            filterProducts();
        }
    });

    // Setup theme switcher
    document.querySelectorAll('.dropdown-styles .dropdown-item').forEach(item => {
        item.addEventListener('click', e => {
            e.preventDefault();
            const theme = e.target.closest('[data-theme]').dataset.theme;
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        });
    });

    // Load saved theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
}

// Add loading animation
function showLoading() {
    elements.loadingOverlay.classList.remove('hidden');
}

function hideLoading() {
    elements.loadingOverlay.classList.add('hidden');
}

// Handle search overlay
function setupSearchOverlay() {
    elements.productSearch.addEventListener('focus', () => {
        elements.searchOverlay.classList.add('active');
    });

    elements.productSearch.addEventListener('blur', () => {
        setTimeout(() => elements.searchOverlay.classList.remove('active'), 150);
    });
}
</script>