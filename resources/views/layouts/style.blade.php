<style>
    #template-customizer{
  display:none !important;
}


.product-card .card-img-wrapper {
  position: relative; /* penting untuk posisi tooltip */
  flex: 0 0 45%;
  max-width: 45%;
  overflow: hidden;
  border-radius: 8px 0 0 8px;
}

/* gambar produk */
.product-card .card-img-left {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.product-card:hover .card-img-left {
  transform: scale(1.08);
}

/* ✅ tooltip hanya di gambar */
.card-img-wrapper::after {
  content: attr(data-title);
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%) translateY(12px);
  background: rgba(0, 0, 0, 0.85);
  color: #fff;
  font-size: 0.85rem;
  padding: 6px 10px;
  border-radius: 6px;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: all 0.35s ease;
  z-index: 10;
}

/* ✅ tooltip */
.card-img-wrapper::after {
  content: attr(data-title);
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%) translateY(12px);
  background: rgba(0, 0, 0, 0.85);
  color: #fff;
  font-size: 0.85rem;
  padding: 6px 10px;
  border-radius: 6px;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: all 0.35s ease;
  z-index: 10;
}

.card-img-wrapper::before {
  content: "";
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%) translateY(12px);
  border-width: 6px;
  border-style: solid;
  border-color: rgba(0, 0, 0, 0.85) transparent transparent transparent;
  opacity: 0;
  transition: all 0.35s ease;
}

/* ✳️ Trigger dari hover di seluruh .product-card */
.product-card:hover .card-img-wrapper::after,
.product-card:hover .card-img-wrapper::before {
  opacity: 1;
  transform: translateX(-50%) translateY(-6px);
}


/* isi card */
.product-card .card-body {
  flex: 1;
  padding: 1rem;
}

.card-title {
  font-size: 1.1rem;
  color: #222;
}

.card-price {
  font-size: 1rem;
  color: #444;
}

.card-desc {
  font-size: 0.9rem;
  line-height: 1.4;
}

/* responsive */
@media (max-width: 768px) {
  .product-card {
    flex-direction: column;
  }
  .product-card .card-img-wrapper {
    max-width: 100%;
    border-radius: 14px 14px 0 0;
  }
  .product-card .card-img-left {
    height: 200px;
  }
}

@media (max-width: 767.98px) {
  .category-dropdown {
    display: none !important;
  }
}

@media (min-width: 768px) {
  .category-dropdown {
    display: block !important;
  }
}
.card-img-left::after {
  content: attr(data-title);
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%) translateY(12px);
  background: rgba(0, 0, 0, 0.85);
  color: #fff;
  font-size: 0.85rem;
  padding: 6px 10px;
  border-radius: 6px;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: all 0.35s ease;
  z-index: 10;
}

.card-img-left:hover::after {
  opacity: 1;
  transform: translateX(-50%) translateY(-6px);
}

/* Overlay loading: menutupi seluruh halaman */
#loading-overlay {
  position: fixed;
  inset: 0;
  background: #fff; /* tetap putih atau sesuai tema */
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: opacity 0.8s ease, visibility 0.8s ease;
}

#loading-overlay.hidden {
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
}

/* semua CSS animasi huruf kamu tetap dipakai */
.loading-center {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: inherit;
  text-align: center;
  gap: 18px;
}

.loading-center .logo {
  width: 460px;
  height: auto;
  object-fit: contain;
  display: block;
  margin-bottom: 6px;
}

.brand-title {
  margin: 0;
  padding: 0;
  font-family: "Poppins", "Nunito", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  font-weight: 700;
  font-size: 2.2rem;
  letter-spacing: 2px;
  display: inline-block;
  white-space: nowrap;
  overflow: visible;
  color: red;
}

/* animasi huruf per span */
.brand-title span {
  display: inline-block;
  transform: translateY(18px) scale(0.98);
  opacity: 0;
  filter: drop-shadow(0 0 0 rgba(0,0,0,0));
  animation: letterIn 700ms cubic-bezier(.2,.9,.28,1) forwards;
}

.brand-title span:nth-child(1){ animation-delay: 0.06s; }
.brand-title span:nth-child(2){ animation-delay: 0.12s; }
.brand-title span:nth-child(3){ animation-delay: 0.18s; }
.brand-title span:nth-child(4){ animation-delay: 0.24s; }
.brand-title span:nth-child(5){ animation-delay: 0.30s; }
.brand-title span:nth-child(6){ animation-delay: 0.36s; }
.brand-title span:nth-child(7){ animation-delay: 0.42s; }
.brand-title span:nth-child(8){ animation-delay: 0.48s; }
.brand-title span:nth-child(9){ animation-delay: 0.54s; }
.brand-title span:nth-child(10){ animation-delay: 0.60s; }

@keyframes letterIn {
  0% {
    transform: translateY(18px) scale(0.98);
    opacity: 0;
    filter: drop-shadow(0 0 0 rgba(217,30,30,0));
  }
  65% {
    transform: translateY(-6px) scale(1.01);
    opacity: 1;
    filter: drop-shadow(0 6px 18px rgba(0,0,0,0.06));
  }
  100% {
    transform: translateY(0) scale(1);
    opacity: 1;
    filter: drop-shadow(0 8px 22px rgba(0,0,0,0.07));
  }
}

/* efek glow lembut looping */
.brand-title {
  animation: brandPulse 2.8s ease-in-out 1.1s infinite;
}
@keyframes brandPulse {
  0%   { text-shadow: 0 0 0 rgba(217,30,30,0); transform: translateY(0); }
  50%  { text-shadow: 0 6px 18px rgba(217,30,30,0.06); transform: translateY(-2px); }
  100% { text-shadow: 0 0 0 rgba(217,30,30,0); transform: translateY(0); }
}

.subtitle {
  margin: 0;
  font-size: 0.92rem;
  font-weight: 600;
  letter-spacing: 1px;
  color: red;
}

.loading-text {
  color: #222;
  font-size: 0.95rem;
  opacity: 0.85;
  margin-top: 8px;
}

@media (max-width: 576px) {
  .brand-title { font-size: 1.8rem; letter-spacing: 1px; }
  .loading-center .logo { width: 180px !important; }
}

#loading-screen {
  position: fixed;
  inset: 0;
  background: linear-gradient(135deg, #111, #2a0000);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

#loading-screen img {
  width: 180px;
  animation: pulse 1.8s infinite ease-in-out;
}

@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.08); opacity: 0.85; }
}

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

/* Header styling */
.app-header {
  position: sticky;
  top: 0;
  z-index: 1050;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(6px);
}

/* Search box */
.search-box .form-control {
  border-radius: 6px;
}

.search-box .input-group-text {
  background: #fff;
  border-right: none;
}

/* Overlay fokus search */
#searchOverlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(20, 20, 20, 0.13);
  z-index: 1040;
  transition: opacity 0.3s ease;
  opacity: 0;
}

/* Tampil saat aktif */
#searchOverlay.active {
  display: block;
  opacity: 1;
}

/* Responsive tweak */
@media (max-width: 768px) {
  .category-dropdown {
    display: none !important;
  }
  .navbar-brand img {
    height: 36px;
  }
}
/* ===== BODY CONTENT ===== */
.content-wrapper {
  position: relative;
  z-index: 1;
  padding-top: 1rem;
  padding-bottom: 3rem;
}

/* Background lembut di container produk */
.container-p-y {
  background: rgba(255, 255, 255, 0.75);
  border-radius: 16px;
  padding: 1.5rem 1.5rem 2rem;
  box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
  backdrop-filter: blur(8px);
  transition: all 0.3s ease;
}

/* Animasi muncul konten */
#productContainer {
  animation: fadeIn 0.7s ease forwards;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Kartu produk: perbaikan tambahan */
.product-card {
  display: flex;
  flex-direction: row;
  align-items: stretch;
  background: #fff;
  border-radius: 14px;
  border: 1px solid #e5e5e5;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
  overflow: hidden;
  transition: all 0.3s ease;
  height: 100%;
}

.product-card:hover {
  transform: translateY(-4px);
  cursor: pointer;
    box-shadow: 4px 3px 5px 0px rgba(0,0,0,0.15) !important;
    -webkit-box-shadow: 4px 3px 5px 0px rgba(0,0,0,0.15) !important;
    -moz-box-shadow: 4px 3px 5px 0px rgba(0,0,0,0.15) !important;
}

/* Tooltip biar tetap nyatu */
.card-img-wrapper::after {
  background: #240303;
}

/* Efek bayangan lembut antar kartu */
.row.g-3 {
  --bs-gutter-y: 1.8rem;
  --bs-gutter-x: 1.8rem;
}

/* Responsif: tampil bagus juga di mobile */
@media (max-width: 768px) {
  .container-p-y {
    padding: 1.2rem;
  }
}
.product-card {
  opacity: 0;
  transform: translateY(15px);
  animation: slideUp 0.5s ease forwards;
}

.product-card:nth-child(1) { animation-delay: 0.1s; }
.product-card:nth-child(2) { animation-delay: 0.2s; }
.product-card:nth-child(3) { animation-delay: 0.3s; }
/* dan seterusnya */

@keyframes slideUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.card-img-wrapper {
  flex: 0 0 40%;
  max-width: 40%;
  overflow: hidden;
  position: relative;
  background: #f7f7f7;
}
.card-img-left {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.35s ease;
}

.product-card:hover .card-img-left {
  transform: scale(1.05);
}

/* --- Konten teks di kanan --- */
.card-body {
  flex: 1;
  padding: 1rem 1.2rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

/* Nama dan harga di atas */
.card-title {
  font-size: 1rem;
  color: #222;
  margin-bottom: 0.25rem;
  line-height: 1.2;
}

.card-price {
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 0.75rem;
}

/* Deskripsi di tengah */
.card-desc {
  font-size: 0.88rem;
  color: #555;
  line-height: 1.4;
  flex-grow: 1;
}

/* Hover halus */
.product-card:hover .card-title {
  color: #240303;
}

/* Responsif */
@media (max-width: 768px) {
  .product-card {
    flex-direction: column;
  }

  .card-img-wrapper {
    max-width: 100%;
    flex: none;
    height: 180px;
  }

  .card-body {
    padding: 1rem;
  }
}
/* Judul Section */
.section-header {
  text-align: center;
  margin-bottom: 2rem;
}

.section-title {
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  font-size: 2rem;
  color: #292626;
  letter-spacing: 2px;
  text-transform: uppercase;
  position: relative;
  display: inline-block;
  background: linear-gradient(90deg, #3f3a3a, #943c3c);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Garis dekoratif di bawah judul */
.section-underline {
  width: 70px;
  height: 4px;
  background: linear-gradient(90deg, #646464, #464444);
  border-radius: 2px;
  margin: 10px auto 0 auto;
  position: relative;
}

/* Animasi halus saat muncul */
.section-title {
  opacity: 0;
  transform: translateY(15px);
  animation: fadeUp 0.6s ease forwards;
}

.section-underline {
  opacity: 0;
  transform: scaleX(0);
  animation: expand 0.6s ease forwards 0.3s;
}

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes expand {
  to {
    opacity: 1;
    transform: scaleX(1);
  }
}

</style>