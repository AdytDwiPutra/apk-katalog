@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  .mapboxgl-marker {
    z-index: 9999 !important;
  }

  #customerMap {
    height: 400px;
    border-radius: 8px;
    border: 2px solid #e7e7e7;
  }
  .map-instructions {
    background: #7367f0;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    margin-bottom: 10px;
    font-size: 14px;
  }
  .coordinates-display {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    border-left: 3px solid #7367f0;
  }
  .promo-section {
    background: #e8f4f8;
    border-left: 4px solid #17a2b8;
    padding: 15px;
    margin-bottom: 20px;
  }
  .warning-text {
    color: #dc3545;
    font-weight: 500;
  }
  .info-text {
    color: #17a2b8;
    font-weight: 500;
  }
  .nav-tabs .nav-link.active {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
  }
  
  /* Improved sticky positioning - tidak sticky untuk mencegah menutupi konten */
  @media (min-width: 992px) {
    .map-card {
      position: static !important;
      /* Removed sticky positioning to prevent covering content */
    }
  }
  
  /* Ensure map container height is fixed */
  #customerMap {
    height: 400px !important;
    min-height: 400px;
  }
  .card-body, #map {
    transform: none !important;
  }
  #preview-product img {
        max-width: 240px;
        margin: 0.5rem;
        border-radius: 8px;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1"><span class="judul"></span> Pelanggan</h4>
      <p class="text-muted mb-0">Input data pelanggan baru lengkap</p>
    </div>
    <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary">
      <i class="ti ti-arrow-left me-1"></i> Kembali ke List
    </a>
  </div>

    <form id="productForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <!-- Left Column - Form -->
        <div class="col-lg-6">
            
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs mb-2" id="customerTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-pelanggan" type="button" role="tab">
                Info Produk
                </button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link " id="paket-tab" data-bs-toggle="tab" data-bs-target="#paket-langganan" type="button" role="tab">
                Paket Langganan
                </button>
            </li> --}}

            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="customerTabsContent">
            
            <!-- Tab Info Pelanggan -->
            <div class="tab-pane fade  show active" id="info-pelanggan" role="tabpanel">
                <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Data Produk</h5>
                </div>
                    <div class="card-body">
                                            {{-- Nama Produk --}}
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
                        </div>

                        {{-- SKU --}}
                        <div class="mb-3">
                            <label class="form-label" for="sku">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="Kode unik produk">
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label" for="category_id">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Brand --}}
                        <div class="mb-3">
                            <label class="form-label" for="brand_id">Brand</label>
                            <select class="form-select" id="brand_id" name="brand_id">
                                <option value="">-- Pilih Brand --</option>
                                @foreach ($brands as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label class="form-label" for="price">Harga (Rp)</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Rp. 0" required>
                        </div>

                        {{-- Stok --}}
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stok</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Jumlah stok" required>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi produk..."></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Tab Paket Langganan -->
            {{-- <div class="tab-pane fade" id="paket-langganan" role="tabpanel">
                <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Paket Langganan</h5>
                </div>
                <div class="card-body">
                    <!-- Status Registrasi & Tipe Pelanggan -->
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Status Registrasi</label>
                        <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_registrasi" id="aktif_sekarang" value="1" checked>
                            <label class="form-check-label" for="aktif_sekarang">AKTIF SEKARANG</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_registrasi" id="on_process" value="2">
                            <label class="form-check-label" for="on_process">ON PROCESS</label>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tipe Pelanggan</label>
                        <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipe_langganan" id="reguler" value="reguler" checked>
                            <label class="form-check-label" for="reguler">Reguler</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipe_langganan" id="non_reguler" value="non_reguler">
                            <label class="form-check-label" for="non_reguler">Non Reguler</label>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Nama Providers -->
                    <div class="mb-3">
                    <label class="form-label" for="providers">Paket Providers</label>
                    <select class="form-select" id="providers" name="providers">
                        <option value="bluefiber">Bluefiber</option>
                        <option value="dwnet">DWNET</option>
                    </select>
                    </div>

                    <!-- Paket Langganan -->
                    <div class="mb-3">
                    <label class="form-label" for="paket_id">Paket Langganan</label>
                    <select class="form-select" id="paket_id" name="paket_id">
                        <option value="">- Pilih Paket -</option>
                    </select>
                    </div>
                    
                    <!-- Nama Server/Service -->
                    <div class="mb-3">
                    <label class="form-label" for="nama_server">Nama Server | Service</label>
                    <select class="form-select" id="nama_server" name="nama_server">
                        <option value="semua_server">Semua Server & NAS</option>
                        <option value="server1">Server 1</option>
                        <option value="server2">Server 2</option>
                    </select>
                    <small class="text-info">* DENGAN SERVER</small>
                    </div>

                    <!-- Tipe Pembayaran & Status Bayar -->
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="tipe_pembayaran">Tipe Pembayaran</label>
                        <select class="form-select" id="tipe_pembayaran" name="tipe_pembayaran">
                        <option value="1">PREPAID</option>
                        <option value="2">POSTPAID</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="status_bayar">Status Bayar</label>
                        <select class="form-select" id="status_bayar" name="status_bayar">
                        <option value="0">SUDAH BAYAR</option>
                        <option value="2">BELUM BAYAR</option>
                        </select>
                    </div>
                    </div>

                    <!-- Status Akun & Owner Data -->
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="status_akun">Status Akun</label>
                        <select class="form-select" id="status_akun" name="status_akun">
                        <option value="1">ENABLED</option>
                        <option value="2">DISABLED</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="owner_data">Owner Data</label>
                        <input type="text" class="form-control" id="owner_data" name="owner_data" placeholder="- Pilih Owner Data -">
                    </div>
                    </div>

                    <!-- Bind On Login -->
                    <div class="mb-3">
                    <label class="form-label" for="bind_on_login">Bind On Login</label>
                    <select class="form-select" id="bind_on_login" name="bind_on_login">
                        <option value="tidak">TIDAK</option>
                        <option value="ya">YA</option>
                    </select>
                    </div>

                    <!-- Tipe Service -->
                    <div class="mb-3">
                    <label class="form-label" for="tipe_service">Tipe Service</label>
                    <select class="form-select" id="tipe_service" name="tipe_service">
                        <option value="">- Pilih Tipe Service -</option>
                        <option value="pppoe">PPPOE</option>
                        <option value="hotspot">HOTSPOT</option>
                        <option value="static ip">STATIC IP</option>
                    </select>
                    </div>


                    <!-- Tagihan PPN -->
                    <div class="mb-3">
                    <label class="form-label">Tagihan PPN</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tagihan_ppn" name="tagihan_ppn" checked>
                        <label class="form-check-label" for="tagihan_ppn">
                        Persentase PPN diambil dari Profil
                        </label>
                    </div>
                    </div>

                    <!-- Tipe IP Address -->
                    <div class="mb-3">
                    <label class="form-label" for="tipe_ip_address">Tipe IP Address</label>
                    <select class="form-select" id="tipe_ip_address" name="tipe_ip_address">
                        <option value="0">IP DINAMIS</option>
                        <option value="1">IP STATIC</option>
                    </select>
                    </div>

                </div>
                </div>

                <!-- Promo Section -->
                <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Promo & Biaya</h5>
                </div>
                <div class="card-body">
                    <!-- Removed promo-section background class -->
                    <div class="mb-4">
                    <div class="row mb-3">
                        <div class="col-md-6">
                        <label class="form-label">Prioritas Otomatis <span class="warning-text">— Optional</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="prioritas_otomatis" name="prioritas_otomatis">
                            <label class="form-check-label warning-text" for="prioritas_otomatis">
                            ( Hitung Prioritas | Pelanggan Bulanan )
                            </label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Promo <span class="warning-text">— Optional</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="addon_promo" name="addon_promo">
                            <label class="form-check-label warning-text" for="addon_promo">
                            ( Addon Promo | Pelanggan Bulanan )
                            </label>
                        </div>
                        </div>
                    </div>

                    <!-- Durasi Promo -->
                    <div class="mb-3">
                        <label class="form-label" for="durasi_promo">Durasi Promo</label>
                        <select class="form-select" id="durasi_promo" name="durasi_promo">
                        <option value="1_bulan">1 BULAN</option>
                        <option value="2_bulan">2 BULAN</option>
                        <option value="3_bulan">3 BULAN</option>
                        <option value="6_bulan">6 BULAN</option>
                        <option value="12_bulan">12 BULAN</option>
                        </select>
                    </div>

                    <!-- Diskon & Fee Seller -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                        <label class="form-label" for="diskon">Diskon ( 1x Waktu )</label>
                        <input type="number" class="form-control" id="diskon" name="diskon" value="0">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label" for="fee_seller">Fee Seller</label>
                        <input type="number" class="form-control" id="fee_seller" name="fee_seller" value="0">
                        </div>
                    </div>

                    <!-- Biaya Instalasi & Sewa Perangkat -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                        <label class="form-label" for="biaya_instalasi">Biaya Instalasi</label>
                        <input type="number" class="form-control" id="biaya_instalasi" name="biaya_instalasi" value="0">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label" for="sewa_perangkat">Sewa Perangkat</label>
                        <input type="number" class="form-control" id="sewa_perangkat" name="sewa_perangkat" value="0">
                        </div>
                    </div>

                    <!-- Ubah Jatuh Tempo -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                        <label class="form-label" for="ubah_jatuh_tempo">Ubah Jatuh Tempo <span class="warning-text">— Optional</span></label>
                        <input type="date" class="form-control" id="ubah_jatuh_tempo" name="ubah_jatuh_tempo">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label" for="aksi_jatuh_tempo">Aksi Jatuh Tempo</label>
                        <select class="form-select" id="aksi_jatuh_tempo" name="aksi_jatuh_tempo">
                            <option value="isolir_internet">ISOLIR INTERNET ( Suspend )</option>
                            <option value="putus_total">PUTUS TOTAL</option>
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div> --}}

            </div>

            <!-- Submit Buttons (Mobile) -->
            <div class="card d-lg-none">
            <div class="card-body">
                <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-1"></i> <span class="judul"></span> Pelanggan
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                    <i class="ti ti-refresh me-1"></i> Reset Form
                </button>
                </div>
            </div>
            </div>

        </div>

        <!-- Right Column - Map -->
        <div class="col-lg-6">
            <!-- File Upload -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Upload Gambar Produk</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <div id="preview-product" class="d-flex justify-content-center align-items-center mb-2 flex-wrap"></div>
        
                        <div id="drop-product" 
                            class="form-control h-100 text-center position-relative p-4 p-lg-5 border-dashed rounded" 
                            style="cursor: pointer;">
                            <div class="product-upload">
                                <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                <span class="d-block fw-semibold text-body">Drop file di sini atau klik untuk upload.</span>
                                <input id="image-product" name="image[]" type="file" accept="image/*" hidden multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="card mt-4 d-none d-lg-block" id="div-simpan">
                <div class="card-header">
                    <h5 class="mb-0">
                    <i class="ti ti-check me-2"></i>Aksi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="ti ti-refresh me-1"></i> Reset Form
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-danger">
                        <i class="ti ti-x me-1"></i> Batal
                    </a>
                    </div>
                            
                </div>
            </div>
        </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    initImageUpload("preview-product", "drop-product", "image-product");

    document.querySelectorAll('#price').forEach(input => {
        input.addEventListener('input', e => {
        let value = e.target.value.replace(/[^\d]/g, '');
        e.target.value = value ? 'Rp. ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '';
        });
    });

    // Reset form
    $('#productForm').on('reset', function() {
        preview.empty(); // hapus preview image yang lama
        $('#category_id, #brand_id').val('').trigger('change');
        $('#status').val('published');
        $('.is-invalid, .invalid-feedback').remove();
        $('#name').focus();
    });

    // Submit form
    $('#productForm').on('submit', function (e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);
        let priceInput = $('#price').val().replace(/Rp\.|\./g, '');
        formData.set('price', priceInput);
        
        // Bersihkan error lama
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        $.ajax({
            url: "{{ route('products.store') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#btnSubmit').prop('disabled', true).text('Menyimpan...');
            },
            success: function (res) {
                if (res.success) {
                    // Tampilkan iziToast sukses
                    iziToast.success({
                        title: 'Berhasil',
                        message: 'Produk berhasil ditambahkan',
                        position: 'topRight',
                        timeout: 2000
                    });

                    // Redirect ke halaman product.index setelah 2 detik
                    setTimeout(function() {
                        window.location.href = "{{ route('products.index') }}";
                    }, 2000);
                } else {
                    iziToast.error({
                        title: 'Gagal',
                        message: 'Gagal menambahkan produk',
                        position: 'topRight'
                    });
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        let input = $('[name="' + key + '"]');
                        input.addClass('is-invalid');
                        input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    });
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: 'Terjadi kesalahan pada server',
                        position: 'topRight'
                    });
                    console.error(xhr.responseText);
                }
            },
            complete: function () {
                $('#btnSubmit').prop('disabled', false).text('Simpan');
            }
        });
    });

});

</script>
@endpush