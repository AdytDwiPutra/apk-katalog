@extends('layouts.master')

@section('title', 'Tambah Customer Lead')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  #leadMap {
    height: 600px;
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
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Tambah Customer Lead</h4>
      <p class="text-muted mb-0">Input data calon pelanggan baru</p>
    </div>
    <a href="/customer/lead/list" class="btn btn-outline-secondary">
      <i class="ti ti-arrow-left me-1"></i> Kembali ke List
    </a>
  </div>

  <form id="leadForm" method="POST" action="/customer/lead/store">
    @csrf
    <div class="row">
      <!-- Left Column - Form -->
      <div class="col-lg-6">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Data Calon Pelanggan</h5>
          </div>
          <div class="card-body">
            <!-- NIK -->
            <div class="mb-3">
              <label class="form-label" for="nik">NIK (Nomor Induk Kependudukan) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="16 digit NIK" maxlength="16" required>
              <small class="text-muted">16 digit sesuai KTP</small>
            </div>

            <!-- Nama -->
            <div class="mb-3">
              <label class="form-label" for="nama">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama sesuai KTP" required>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
              <label class="form-label" for="alamat">Alamat Lengkap <span class="text-danger">*</span></label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="RT/RW, Desa/Kelurahan, Kecamatan" required></textarea>
              <small class="text-muted">Alamat tempat pemasangan internet</small>
            </div>

            <!-- Telepon -->
            <div class="mb-3">
              <label class="form-label" for="telepon">No. Telepon/HP <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" required>
              <small class="text-muted">Nomor yang dapat dihubungi</small>
            </div>

            <!-- Email (Optional) -->
            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
            </div>

            <!-- Marketing -->
            <div class="mb-3">
              <label class="form-label" for="marketing">Marketing/Sales <span class="text-danger">*</span></label>
              <select class="form-select" id="marketing" name="marketing_id" required>
                <option value="">Pilih Marketing</option>
                <option value="1">Ahmad Fauzi - Area Cicalengka</option>
                <option value="2">Dedi Saputra - Area Rancaekek</option>
                <option value="3">Siti Nurhaliza - Area Majalaya</option>
                <option value="4">Budi Santoso - Area Baleendah</option>
                <option value="5">Rizki Wahyudi - Area Soreang</option>
              </select>
              <small class="text-muted">Marketing yang mendata lead ini</small>
            </div>

            <!-- Paket yang Diminati -->
            <div class="mb-3">
              <label class="form-label" for="paket">Paket yang Diminati</label>
              <select class="form-select" id="paket" name="paket_id">
                <option value="">Belum ditentukan</option>
                <option value="1">DW HOME 10 Mbps - Rp 150.000/bulan</option>
                <option value="2">DW HOME 20 Mbps - Rp 250.000/bulan</option>
                <option value="3">DW HOME 50 Mbps - Rp 450.000/bulan</option>
                <option value="4">DW CORPORATE 100 Mbps - Rp 850.000/bulan</option>
              </select>
            </div>

            <!-- Catatan -->
            <div class="mb-3">
              <label class="form-label" for="catatan">Catatan/Keterangan</label>
              <textarea class="form-control" id="catatan" name="catatan" rows="2" placeholder="Catatan tambahan..."></textarea>
            </div>
          </div>
        </div>

        <!-- Koordinat GPS -->
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Koordinat GPS Lokasi</h5>
          </div>
          <div class="card-body">
            <div class="alert alert-warning mb-3">
              <i class="ti ti-info-circle me-2"></i>
              <strong>Penting!</strong> Drag marker di peta untuk menentukan lokasi pelanggan
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="latitude">Latitude <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-6.917464" readonly required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label" for="longitude">Longitude <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="107.619123" readonly required>
              </div>
            </div>

            <div class="coordinates-display">
              <small class="text-muted d-block mb-1">Koordinat Saat Ini:</small>
              <strong id="current-coords">Belum dipilih - Drag marker di peta!</strong>
            </div>

            <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="use-my-location">
              <i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya
            </button>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="card">
          <div class="card-body">
            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy me-1"></i> Simpan Lead
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
        <div class="card sticky-top" style="top: 20px;">
          <div class="card-header">
            <h5 class="mb-0">Peta Lokasi</h5>
          </div>
          <div class="card-body">
            <div class="map-instructions">
              <i class="ti ti-hand-move me-2"></i>
              <strong>Cara Penggunaan:</strong> Klik atau drag marker merah untuk menentukan lokasi pelanggan
            </div>
            <div id="leadMap"></div>
            <div class="mt-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" id="reset-map">
                <i class="ti ti-refresh me-1"></i> Reset ke Pusat
              </button>
              <button type="button" class="btn btn-sm btn-outline-info" id="search-address">
                <i class="ti ti-search me-1"></i> Cari Alamat
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
$(document).ready(function() {
  // Initialize Map (centered on Bandung)
  const map = L.map('leadMap').setView([-6.9175, 107.6191], 13);

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
  }).addTo(map);

  // Custom draggable marker icon
  const markerIcon = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMjAgMEMxMi4yNyAwIDYgNi4yNyA2IDE0YzAgMTAuNSAxNCAxOCAxNCAxOHMxNC03LjUgMTQtMThjMC03LjczLTYuMjctMTQtMTQtMTR6IiBmaWxsPSIjZWE1NDU1Ii8+PGNpcmNsZSBjeD0iMjAiIGN5PSIxNCIgcj0iNyIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==',
    iconSize: [40, 50],
    iconAnchor: [20, 50],
    popupAnchor: [0, -50]
  });

  // Add draggable marker
  let marker = L.marker([-6.9175, 107.6191], {
    icon: markerIcon,
    draggable: true
  }).addTo(map);

  marker.bindPopup('<strong>Drag saya untuk set lokasi!</strong>').openPopup();

  // Update coordinates when marker is dragged
  function updateCoordinates(lat, lng) {
    $('#latitude').val(lat.toFixed(6));
    $('#longitude').val(lng.toFixed(6));
    $('#current-coords').html(`<i class="ti ti-map-pin text-danger"></i> ${lat.toFixed(6)}, ${lng.toFixed(6)}`);
  }

  // On marker drag
  marker.on('dragend', function(e) {
    const position = e.target.getLatLng();
    updateCoordinates(position.lat, position.lng);
    marker.bindPopup(`<strong>Lokasi Dipilih!</strong><br>Lat: ${position.lat.toFixed(6)}<br>Lng: ${position.lng.toFixed(6)}`).openPopup();
  });

  // Click on map to move marker
  map.on('click', function(e) {
    marker.setLatLng(e.latlng);
    updateCoordinates(e.latlng.lat, e.latlng.lng);
    marker.bindPopup(`<strong>Lokasi Dipilih!</strong><br>Lat: ${e.latlng.lat.toFixed(6)}<br>Lng: ${e.latlng.lng.toFixed(6)}`).openPopup();
  });

  // Use my location button
  $('#use-my-location').on('click', function() {
    if (navigator.geolocation) {
      $(this).html('<i class="ti ti-loader me-1"></i> Mencari lokasi...').prop('disabled', true);
      
      navigator.geolocation.getCurrentPosition(
        function(position) {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          
          marker.setLatLng([lat, lng]);
          map.setView([lat, lng], 16);
          updateCoordinates(lat, lng);
          marker.bindPopup('<strong>Lokasi Anda!</strong>').openPopup();
          
          $('#use-my-location').html('<i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya').prop('disabled', false);
        },
        function(error) {
          alert('Tidak dapat mengakses lokasi GPS Anda');
          $('#use-my-location').html('<i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya').prop('disabled', false);
        }
      );
    } else {
      alert('Browser Anda tidak mendukung Geolocation');
    }
  });

  // Reset map
  $('#reset-map').on('click', function() {
    map.setView([-6.9175, 107.6191], 13);
    marker.setLatLng([-6.9175, 107.6191]);
    updateCoordinates(-6.9175, 107.6191);
  });

  // Search address (simplified)
  $('#search-address').on('click', function() {
    const address = $('#alamat').val();
    if (!address) {
      alert('Isi alamat terlebih dahulu');
      return;
    }
    alert('Fitur pencarian alamat akan diintegrasikan dengan Geocoding API (Google/Nominatim)');
    // In production: use Geocoding API to convert address to lat/lng
  });

  // NIK validation (16 digits)
  $('#nik').on('input', function() {
    this.value = this.value.replace(/\D/g, '');
  });

  // Phone validation (numbers only)
  $('#telepon').on('input', function() {
    this.value = this.value.replace(/\D/g, '');
  });

  // Form submit
  $('#leadForm').on('submit', function(e) {
    e.preventDefault();
    
    const lat = $('#latitude').val();
    const lng = $('#longitude').val();
    
    if (!lat || !lng || lat === '-6.917500' && lng === '107.619100') {
      alert('Silakan pilih lokasi di peta terlebih dahulu dengan drag marker!');
      return;
    }

    // Validation passed
    alert('Form valid! Data lead siap disimpan:\n\nNIK: ' + $('#nik').val() + '\nNama: ' + $('#nama').val() + '\nKoordinat: ' + lat + ', ' + lng);
    
    // In production: submit to server
    // this.submit();
  });

  // Form reset
  $('#leadForm').on('reset', function() {
    setTimeout(function() {
      $('#latitude').val('');
      $('#longitude').val('');
      $('#current-coords').html('Belum dipilih - Drag marker di peta!');
      marker.setLatLng([-6.9175, 107.6191]);
      map.setView([-6.9175, 107.6191], 13);
    }, 100);
  });
});
</script>
@endpush