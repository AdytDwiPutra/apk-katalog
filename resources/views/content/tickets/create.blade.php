@extends('layouts.master')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Tiket /</span> Buat Tiket Baru
  </h4>

  <!-- Alert Info Sumber Tiket -->
  <div class="alert alert-primary alert-dismissible" role="alert">
    <h5 class="alert-heading mb-2">
      <i class="ti ti-info-circle me-2"></i>Sumber Pembuatan Tiket
    </h5>
    <p class="mb-0">
      Tiket dapat dibuat melalui: 
      <strong>Call Center/Hotline</strong>, 
      <strong>Website/Aplikasi Pelanggan</strong>, 
      <strong>Internal Staff/Teknisi</strong>, atau 
      <strong>Sistem Monitoring Otomatis</strong>
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <!-- Create Ticket Card -->
  <div class="row">
    <div class="col-xl-8">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Form Tiket Baru</h5>
          <small class="text-muted">Ticket #TKT-{{ date('ymd') }}-<span id="ticket-number">XXXX</span></small>
        </div>
        <div class="card-body">
          <form id="createTicketForm" method="POST" action="" enctype="multipart/form-data">
            @csrf
            
            <!-- Sumber Tiket -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="ticket-source">Sumber Tiket <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <select id="ticket-source" name="ticket_source" class="form-select" required>
                  <option value="">Pilih Sumber Tiket</option>
                  <option value="call-center">Call Center / Hotline</option>
                  <option value="website">Website / Aplikasi Pelanggan</option>
                  <option value="internal">Internal (Staff/Teknisi)</option>
                  <option value="monitoring">Sistem Monitoring Otomatis</option>
                </select>
              </div>
            </div>

            <!-- ID Pelanggan -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="customer-id">ID Pelanggan / No. Internet <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" id="customer-id" name="customer_id" 
                         placeholder="CID-xxxxxx atau nomor internet" required />
                  <button class="btn btn-outline-primary" type="button" id="search-customer">
                    <i class="ti ti-search"></i> Cari
                  </button>
                </div>
                <div class="form-text">
                  Format: <code>CID-xxxxxx</code> atau <code>nomor internet pelanggan</code>
                </div>
              </div>
            </div>
            
            <!-- Nama Pelanggan -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="customer-name">Nama Pelanggan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="customer-name" name="customer_name" 
                       placeholder="Akan terisi otomatis setelah pencarian" readonly />
              </div>
            </div>
            
            <!-- Informasi Kontak Pelapor -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Kontak Pelapor <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <div class="row g-2">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="reporter-name" name="reporter_name" 
                           placeholder="Nama pelapor" required />
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="reporter-phone" name="reporter_phone" 
                           placeholder="No. HP pelapor" required />
                  </div>
                </div>
                <div class="form-text">
                  Nomor yang dapat dihubungi untuk update progress tiket
                </div>
              </div>
            </div>
            
            <!-- Kategori Masalah -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="ticket-category">Kategori Masalah <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <select id="ticket-category" name="ticket_category" class="form-select" required>
                  <option value="">Pilih Kategori Masalah</option>
                  <optgroup label="Koneksi Internet">
                    <option value="inet-down">Internet Mati Total</option>
                    <option value="inet-slow">Internet Lambat</option>
                    <option value="inet-intermittent">Internet Putus-Nyambung</option>
                    <option value="inet-limited">Tidak Bisa Akses Website Tertentu</option>
                    <option value="inet-browsing">Tidak Bisa Browsing</option>
                  </optgroup>
                  <optgroup label="Perangkat">
                    <option value="device-router">Router/ONT Bermasalah</option>
                    <option value="device-cable">Kabel/Fiber Bermasalah</option>
                    <option value="device-power">Masalah Power Supply</option>
                    <option value="device-lan">Port LAN Tidak Berfungsi</option>
                  </optgroup>
                  <optgroup label="Administrasi">
                    <option value="admin-billing">Masalah Tagihan</option>
                    <option value="admin-payment">Konfirmasi Pembayaran</option>
                    <option value="admin-upgrade">Upgrade Paket</option>
                    <option value="admin-downgrade">Downgrade Paket</option>
                    <option value="admin-relocate">Relokasi Perangkat</option>
                  </optgroup>
                  <optgroup label="Maintenance & Lain-lain">
                    <option value="maintenance-schedule">Maintenance Terjadwal</option>
                    <option value="maintenance-preventive">Preventive Maintenance</option>
                    <option value="other-info">Informasi Umum</option>
                    <option value="other-complaint">Keluhan Layanan</option>
                    <option value="other-terminate">Pemutusan Layanan</option>
                  </optgroup>
                </select>
              </div>
            </div>
            
            <!-- Subject -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="ticket-subject">Subject <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="ticket-subject" name="ticket_subject" 
                       placeholder="Ringkasan singkat masalah (max 100 karakter)" maxlength="100" required />
              </div>
            </div>
            
            <!-- Deskripsi Masalah -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="ticket-description">Deskripsi Masalah <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <textarea id="ticket-description" name="ticket_description" class="form-control"
                          placeholder="Jelaskan detail permasalahan..." rows="5" required></textarea>
                <div class="form-text text-primary">
                  <strong>Sertakan informasi:</strong> 
                  Kapan mulai terjadi, perangkat yang digunakan, error message (jika ada), 
                  dan troubleshooting yang sudah dicoba
                </div>
              </div>
            </div>
            
            <!-- Prioritas -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Prioritas <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <div class="form-check mt-2">
                  <input name="ticket_priority" class="form-check-input" type="radio" value="low" 
                         id="priority-low" checked required />
                  <label class="form-check-label" for="priority-low">
                    <span class="badge bg-success me-2">LOW</span>
                    Tidak mendesak, masih bisa menggunakan layanan
                  </label>
                </div>
                <div class="form-check">
                  <input name="ticket_priority" class="form-check-input" type="radio" value="medium" 
                         id="priority-medium" required />
                  <label class="form-check-label" for="priority-medium">
                    <span class="badge bg-warning me-2">MEDIUM</span>
                    Gangguan terbatas, sebagian layanan bisa digunakan
                  </label>
                </div>
                <div class="form-check">
                  <input name="ticket_priority" class="form-check-input" type="radio" value="high" 
                         id="priority-high" required />
                  <label class="form-check-label" for="priority-high">
                    <span class="badge bg-danger me-2">HIGH</span>
                    Gangguan serius, hampir tidak bisa menggunakan layanan
                  </label>
                </div>
                <div class="form-check">
                  <input name="ticket_priority" class="form-check-input" type="radio" value="critical" 
                         id="priority-critical" required />
                  <label class="form-check-label" for="priority-critical">
                    <span class="badge bg-dark me-2">CRITICAL</span>
                    Layanan mati total / Pelanggan bisnis/corporate
                  </label>
                </div>
              </div>
            </div>
            
            <!-- Screenshot/Bukti Gangguan -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="ticket-attachments">Screenshot/Bukti Gangguan</label>
              <div class="col-sm-9">
                <input class="form-control" type="file" id="ticket-attachments" name="attachments[]" 
                       accept="image/jpeg,image/png,application/pdf" multiple />
                <div class="form-text">
                  Upload screenshot error, foto perangkat, atau bukti lainnya 
                  (JPG, PNG, PDF - maksimal 5MB per file, maksimal 3 file)
                </div>
                
                <!-- Preview Area -->
                <div id="preview-area" class="mt-3" style="display: none;">
                  <label class="form-label">Preview:</label>
                  <div id="preview-container" class="d-flex gap-2 flex-wrap"></div>
                </div>
              </div>
            </div>
            
            <!-- Catatan Internal (Optional) -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="internal-notes">Catatan Internal</label>
              <div class="col-sm-9">
                <textarea id="internal-notes" name="internal_notes" class="form-control"
                          placeholder="Catatan khusus untuk tim support (tidak terlihat oleh pelanggan)" 
                          rows="2"></textarea>
              </div>
            </div>
            
            <!-- Penugasan Awal -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="ticket-assign">Penugasan</label>
              <div class="col-sm-9">
                <select id="ticket-assign" name="assigned_to" class="form-select">
                  <option value="auto" selected>Auto-assign (berdasarkan kategori)</option>
                  <option value="team-l1">Tim Support L1</option>
                  <option value="team-l2">Tim Support L2</option>
                  <option value="team-noc">Tim NOC (Network Operations)</option>
                  <option value="team-field">Tim Teknisi Lapangan</option>
                  <option value="team-billing">Tim Billing</option>
                </select>
                <div class="form-text">
                  Sistem akan otomatis menugaskan ke tim yang sesuai jika memilih "Auto-assign"
                </div>
              </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="row">
              <div class="col-sm-9 offset-sm-3">
                <button type="button" class="btn btn-secondary me-2" onclick="window.history.back();">
                  <i class="ti ti-arrow-left me-1"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary">
                  <i class="ti ti-ticket me-1"></i> Buat Tiket
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Right Sidebar -->
    <div class="col-xl-4">
      <!-- Customer Info Card (akan muncul setelah search) -->
      <div class="card mb-4" id="customer-info-card" style="display: none;">
        <div class="card-header">
          <h5 class="mb-0">Informasi Pelanggan</h5>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-start mb-3">
            <div class="avatar avatar-sm me-2">
              <span class="avatar-initial rounded-circle bg-label-primary">
                <i class="ti ti-user"></i>
              </span>
            </div>
            <div class="flex-grow-1">
              <h6 class="mb-0" id="cust-name">-</h6>
              <small class="text-muted" id="cust-id">ID: -</small>
            </div>
            <span class="badge bg-label-success" id="cust-status">Active</span>
          </div>
          
          <div class="mb-3">
            <small class="text-muted d-block mb-1">Paket Langganan</small>
            <h6 class="mb-0" id="cust-package">-</h6>
          </div>
          
          <div class="mb-3">
            <small class="text-muted d-block mb-1">Alamat</small>
            <p class="mb-0" id="cust-address">-</p>
          </div>
          
          <div class="row g-3">
            <div class="col-6">
              <small class="text-muted d-block mb-1">No. HP</small>
              <h6 class="mb-0" id="cust-phone">-</h6>
            </div>
            <div class="col-6">
              <small class="text-muted d-block mb-1">Status Bayar</small>
              <span class="badge bg-success" id="cust-billing">-</span>
            </div>
          </div>
          
          <hr class="my-3">
          
          <div class="row g-3">
            <div class="col-6">
              <small class="text-muted d-block mb-1">Device</small>
              <h6 class="mb-0" id="cust-device">-</h6>
            </div>
            <div class="col-6">
              <small class="text-muted d-block mb-1">Status Device</small>
              <span class="badge bg-success" id="cust-device-status">-</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Quick Templates Card -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Template Cepat</h5>
        </div>
        <div class="card-body">
          <p class="card-text small">Klik template untuk mengisi form otomatis</p>
          
          <div class="list-group">
            <a href="javascript:void(0);" class="list-group-item list-group-item-action template-item"
               data-category="inet-slow" 
               data-subject="Internet Lambat pada Jam Tertentu" 
               data-description="Pelanggan mengeluhkan internet lambat terutama pada jam sibuk (19.00-22.00 WIB). Speed test menunjukkan kecepatan di bawah 50% dari paket berlangganan. Pelanggan sudah mencoba restart router namun masalah tetap terjadi.">
              <strong class="d-block">Internet Lambat (Peak Hours)</strong>
              <small class="text-muted">Untuk keluhan lambat jam sibuk</small>
            </a>
            
            <a href="javascript:void(0);" class="list-group-item list-group-item-action template-item"
               data-category="inet-down" 
               data-subject="Internet Mati Total" 
               data-description="Layanan internet pelanggan tidak dapat digunakan sama sekali. Semua indikator lampu pada ONT/Router normal (Power, PON, LAN menyala) namun tidak dapat browsing atau mengakses aplikasi apapun.">
              <strong class="d-block">Internet Mati Total</strong>
              <small class="text-muted">Tidak bisa akses internet sama sekali</small>
            </a>
            
            <a href="javascript:void(0);" class="list-group-item list-group-item-action template-item"
               data-category="device-router" 
               data-subject="ONT/Router Tidak Bisa Menyala" 
               data-description="Perangkat ONT/Router pelanggan tidak dapat menyala. Indikator Power tidak menyala sama sekali. Pelanggan sudah mencoba mengganti stop kontak dan memeriksa adaptor namun perangkat tetap mati.">
              <strong class="d-block">Perangkat Mati Total</strong>
              <small class="text-muted">ONT/Router tidak menyala</small>
            </a>
            
            <a href="javascript:void(0);" class="list-group-item list-group-item-action template-item"
               data-category="device-cable" 
               data-subject="Kabel Fiber Putus/Rusak" 
               data-description="Kabel fiber optic pelanggan terindikasi putus atau rusak. Lampu PON pada ONT tidak menyala. Kemungkinan kerusakan di area sekitar rumah pelanggan atau tiang terdekat.">
              <strong class="d-block">Kerusakan Kabel Fiber</strong>
              <small class="text-muted">Kabel rusak/putus</small>
            </a>
            
            <a href="javascript:void(0);" class="list-group-item list-group-item-action template-item"
               data-category="admin-payment" 
               data-subject="Konfirmasi Pembayaran Tagihan" 
               data-description="Pelanggan telah melakukan pembayaran tagihan namun status di sistem masih menunjukkan belum bayar. Pelanggan memiliki bukti transfer/pembayaran yang valid.">
              <strong class="d-block">Konfirmasi Pembayaran</strong>
              <small class="text-muted">Pembayaran belum terupdate</small>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Quick Actions Card -->
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Aksi Cepat</h5>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button type="button" class="btn btn-outline-primary" id="btn-diagnostic" disabled>
              <i class="ti ti-activity me-1"></i> Jalankan Diagnostik
            </button>
            <button type="button" class="btn btn-outline-secondary" id="btn-check-history" disabled>
              <i class="ti ti-history me-1"></i> Cek History Tiket
            </button>
            <button type="button" class="btn btn-outline-info">
              <i class="ti ti-book me-1"></i> Knowledge Base
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Search Customer
  document.getElementById('search-customer').addEventListener('click', function() {
    const customerId = document.getElementById('customer-id').value;
    if (!customerId) {
      alert('Masukkan ID Pelanggan terlebih dahulu');
      return;
    }
    
    // AJAX call untuk search pelanggan
    // Contoh: fetch('/api/customer/search?id=' + customerId)
    //   .then(response => response.json())
    //   .then(data => { /* populate customer info */ });
    
    // Demo: show customer info card
    document.getElementById('customer-info-card').style.display = 'block';
    document.getElementById('btn-diagnostic').disabled = false;
    document.getElementById('btn-check-history').disabled = false;
  });
  
  // Template Click Handler
  document.querySelectorAll('.template-item').forEach(item => {
    item.addEventListener('click', function() {
      document.getElementById('ticket-category').value = this.dataset.category;
      document.getElementById('ticket-subject').value = this.dataset.subject;
      document.getElementById('ticket-description').value = this.dataset.description;
    });
  });
  
  // File Upload Preview
  document.getElementById('ticket-attachments').addEventListener('change', function(e) {
    const files = e.target.files;
    const previewArea = document.getElementById('preview-area');
    const previewContainer = document.getElementById('preview-container');
    
    if (files.length > 0) {
      previewArea.style.display = 'block';
      previewContainer.innerHTML = '';
      
      Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
          const div = document.createElement('div');
          div.className = 'position-relative';
          div.innerHTML = `
            <img src="${e.target.result}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
            <small class="d-block text-center">${file.name}</small>
          `;
          previewContainer.appendChild(div);
        };
        reader.readAsDataURL(file);
      });
    }
  });
  
  // Auto-generate ticket number
  document.getElementById('ticket-number').textContent = Math.floor(1000 + Math.random() * 9000);
});
</script>
@endpush