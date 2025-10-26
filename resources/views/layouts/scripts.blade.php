<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    function initImageUpload(previewId, dropAreaId, inputId, initialFiles = []) {
        const preview = document.getElementById(previewId);
        const dropArea = document.getElementById(dropAreaId);
        const fileInput = document.getElementById(inputId);

        // Tampilkan foto lama (jika ada)
        if (initialFiles.length > 0) {
            preview.innerHTML = "";
            initialFiles.forEach(fileUrl => addPreview(preview, fileInput, fileUrl, true));
        }

        // Klik drop area → buka file picker
        dropArea.addEventListener("click", () => fileInput.click());

        // Saat pilih file manual
        fileInput.addEventListener("change", (e) => handleFiles(e.target.files, preview, fileInput));

        // Drag & drop
        ["dragover", "dragleave", "drop"].forEach(evt => {
            dropArea.addEventListener(evt, e => e.preventDefault());
        });

        dropArea.addEventListener("dragover", () => dropArea.classList.add("bg-light"));
        dropArea.addEventListener("dragleave", () => dropArea.classList.remove("bg-light"));
        dropArea.addEventListener("drop", (e) => {
            dropArea.classList.remove("bg-light");
            handleFiles(e.dataTransfer.files, preview, fileInput);
        });
    }

    function handleFiles(files, preview, fileInput) {
        if (!files || !files.length) return;

        const dataTransfer = new DataTransfer();

        // Gabungkan file lama (kalau ada)
        Array.from(fileInput.files).forEach(f => dataTransfer.items.add(f));

        // Tambahkan file baru
        Array.from(files).forEach(file => {
            if (file.type.startsWith("image/")) {
                dataTransfer.items.add(file);
                addPreview(preview, fileInput, file);
            }
        });

        fileInput.files = dataTransfer.files;
    }

    function addPreview(preview, fileInput, fileOrUrl, isOld = false) {
        const col = document.createElement("div");
        col.className = "col-md-6 col-6 d-flex justify-content-center position-relative";

        const imgSrc = isOld ? fileOrUrl : URL.createObjectURL(fileOrUrl);
        const fileName = isOld ? fileOrUrl.split('/').pop() : fileOrUrl.name;

        col.innerHTML = `
            <div class="card shadow-sm overflow-hidden" style="max-width: 300px; position: relative;">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-1" aria-label="Close"></button>
                <img src="${imgSrc}" class="img-fluid" alt="preview">
                <div class="card-body p-2 text-center">
                    <small class="text-truncate d-block" title="${fileName}">
                        ${fileName}
                    </small>
                </div>
            </div>
        `;

        // Tombol hapus
        col.querySelector(".btn-close").addEventListener("click", () => {
            col.remove();

            if (isOld) {
                // tandai file lama dihapus
                const hidden = document.createElement("input");
                hidden.type = "hidden";
                hidden.name = `remove_${fileInput.name}[]`;
                hidden.value = fileName;
                fileInput.form.appendChild(hidden);
            } else {
                // Hapus file baru dari DataTransfer
                const dt = new DataTransfer();
                Array.from(fileInput.files).forEach(f => {
                    if (f.name !== fileOrUrl.name) dt.items.add(f);
                });
                fileInput.files = dt.files;
            }
        });

        preview.appendChild(col);
    }

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const loadingOverlay = document.getElementById('loading-overlay');
    const searchOverlay = document.getElementById('searchOverlay');
    const cartCountEl = document.getElementById('cartCount');
    const cartItemsEl = document.getElementById('cartItems');
    const cartTotalEl = document.getElementById('cartTotal');
    const clearCartBtn = document.getElementById('clearCartBtn');

    // State
    let cart = [];

    // Utilities
    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/[&<>"']/g, function (m) {
            return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[m];
        });
    }





    // Simple escaping helpers for safety



    // 🔹 Format angka ke rupiah
    function formatRupiah(num) {
        return 'Rp ' + num.toLocaleString('id-ID');
    }

    // 🛒 Cart functions
    function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
    }

    function loadCart() {
    const saved = localStorage.getItem('cart');
    return saved ? JSON.parse(saved) : [];
    }

    function updateCartCount() {
    cartCountEl.textContent = cart.length;
    }

    function renderCart() {
    cartItemsEl.innerHTML = '';

    if (cart.length === 0) {
        cartItemsEl.innerHTML = '<li class="text-muted small">Keranjang kosong</li>';
        cartTotalEl.textContent = 'Rp 0';
        saveCart();
        return;
    }

    let total = 0;

    cart.forEach((item, i) => {
        const subtotal = item.price * item.qty;
        total += subtotal;

        const li = document.createElement('li');
        li.className = 'd-flex justify-content-between align-items-start mb-2';
        li.innerHTML = `
        <div class="flex-grow-1 me-2">
            <span class="fw-semibold">${escapeHtml(item.name)}</span><br>
            <small>${item.qty} pcs × Rp ${item.price.toLocaleString()}</small><br>
            <span class="text-success fw-bold">Rp ${subtotal.toLocaleString()}</span>
        </div>
        <div class="d-flex flex-column align-items-end gap-1">
            <div class="btn-group btn-group-sm" role="group">
            <button class="btn btn-outline-secondary decrease-item" data-index="${i}"><i class="fas fa-minus"></i></button>
            <button class="btn btn-outline-secondary increase-item" data-index="${i}"><i class="fas fa-plus"></i></button>
            </div>
            <button class="btn btn-sm btn-outline-danger remove-item mt-1" data-index="${i}">
            <i class="fas fa-times"></i>
            </button>
        </div>
        `;
        cartItemsEl.appendChild(li);
    });

    // total keseluruhan
    cartTotalEl.textContent = 'Rp ' + total.toLocaleString();

    saveCart();
    }

    // 🧠 Load cart dari localStorage saat awal
    cart = loadCart();
    updateCartCount();
    renderCart();

    // 📦 Add event listener
    document.addEventListener('click', function (e) {
    // ➕ Tambah ke cart
    if (e.target.closest('.add-to-cart')) {
        const btn = e.target.closest('.add-to-cart');
        const name = btn.getAttribute('data-name') || 'Produk';
        const price = parseInt(btn.getAttribute('data-price')) || 0;

        const existing = cart.find(item => item.name === name);
        if (existing) {
            existing.qty += 1;
        } else {
            cart.push({ name, price, qty: 1 });
        }

        iziToast.success({
            title: 'Berhasil',
            message: 'Menambahkan '+ name + ' ke keranjang',
            position: 'bottomRight',
            timeout: 2000, // otomatis hilang 2 detik
        });

        updateCartCount();
        renderCart();
        saveCart();
    }

    if (e.target.closest('.increase-item')) {
        const idx = e.target.closest('.increase-item').dataset.index;
        cart[idx].qty++;
        renderCart();
    }

    if (e.target.closest('.decrease-item')) {
        const idx = e.target.closest('.decrease-item').dataset.index;
        if (cart[idx].qty > 1) {
        cart[idx].qty--;
        } else {
        cart.splice(idx, 1);
        }
        renderCart();
    }

    if (e.target.closest('.remove-item')) {
        const idx = e.target.closest('.remove-item').dataset.index;
        cart.splice(idx, 1);
        renderCart();
    }
    });

    // 🧹 Kosongkan semua item pakai iziToast
    clearCartBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    if (cart.length === 0) return;

    iziToast.question({
        timeout: false,
        close: false,
        overlay: true,
        displayMode: 'once',
        title: 'Konfirmasi',
        message: 'Yakin ingin mengosongkan keranjang?',
        position: 'center',
        buttons: [
        ['<button><b>Ya</b></button>', function (instance, toast) {
            cart = [];
            updateCartCount();
            renderCart();
            saveCart();
            instance.hide({ transitionOut: 'fadeOut' }, toast);
        }],
        ['<button>Batal</button>', function (instance, toast) {
            instance.hide({ transitionOut: 'fadeOut' }, toast);
        }]
        ]
    });
    });

    // 💬 WhatsApp send
    document.querySelector('.whatsapp-float').addEventListener('click', function (ev) {
        ev.preventDefault();
        if (cart.length === 0) {
            iziToast.warning({
                title: 'Keranjang kosong',
                message: 'Tambahkan produk dulu sebelum chat admin 😊',
                position: 'topCenter'
            });
            return;
        }

        let message = 'Halo, saya ingin memesan:%0A';
        let total = 0;

        cart.forEach((item, i) => {
            const subtotal = item.price * item.qty;
            total += subtotal;
            message += `${i + 1}. ${item.name} (${item.qty} pcs × Rp ${item.price.toLocaleString('id-ID')}) = Rp ${subtotal.toLocaleString('id-ID')}%0A`;
        });

        message += `%0A🧾 *Total Keseluruhan:* Rp ${total.toLocaleString('id-ID')}`;

        const waUrl = `https://wa.me/6282223244130?text=${message}`;
        window.open(waUrl, '_blank');

    });




    setTimeout(() => loadingOverlay.classList.add('hidden'), 1500);
});

</script>

