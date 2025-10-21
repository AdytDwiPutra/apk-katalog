@extends('layouts.master')

@section('title', 'Tambah OLT')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  #map {
    height: 600px;
    border-radius: 8px;
  }
  .map-info {
    position: absolute;
    top: 10px;
    right: 10px;
    background: white;
    padding: 10px 15px;
    border-radius: 6px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 1000;
    font-size: 12px;
  }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Breadcrumb -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Tambah OLT</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mb-0">
          <li class="breadcrumb-item">
            <a href="/dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="/olt">OLT</a>
          </li>
          <li class="breadcrumb-item active">Tambah OLT</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Form Card with 2 Columns -->
  <div class="row">
    <!-- Left Column - Form -->
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header">
          <h5 class="mb-0">Informasi OLT</h5>
        </div>
        <div class="card-body">
          <form id="formAddOlt">
            
            <!-- Name -->
            <div class="mb-3">
              <label class="form-label" for="olt-name">
                Name <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="olt-name" name="name" placeholder="Masukkan nama OLT" required>
            </div>

            <!-- OLT IP or FQDN -->
            <div class="mb-3">
              <label class="form-label" for="olt-ip">
                OLT IP or FQDN <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="olt-ip" name="ip_address" placeholder="192.168.1.1 atau olt.domain.com" required>
            </div>

            <!-- Latitude & Longitude -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="latitude">
                  Latitude <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-6.9175" readonly>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label" for="longitude">
                  Longitude <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="107.6191" readonly>
              </div>
            </div>

            <!-- Telnet TCP port -->
            <div class="mb-3">
              <label class="form-label" for="telnet-port">
                Telnet TCP port <span class="text-danger">*</span>
              </label>
              <input type="number" class="form-control" id="telnet-port" name="telnet_port" value="2333" required>
            </div>

            <!-- OLT telnet username -->
            <div class="mb-3">
              <label class="form-label" for="telnet-username">
                OLT telnet username <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="telnet-username" name="telnet_username" placeholder="Username telnet" required>
            </div>

            <!-- OLT telnet password -->
            <div class="mb-3">
              <label class="form-label" for="telnet-password">
                OLT telnet password <span class="text-danger">*</span>
              </label>
              <div class="input-group input-group-merge">
                <input type="password" class="form-control" id="telnet-password" name="telnet_password" placeholder="Password telnet" required>
                <span class="input-group-text cursor-pointer" id="toggle-telnet-password">
                  <i class="ti ti-eye-off"></i>
                </span>
              </div>
            </div>

            <!-- SNMP read-only community -->
            <div class="mb-3">
              <label class="form-label" for="snmp-read">
                SNMP read-only community <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="snmp-read" name="snmp_read" value="" required>
              <small class="text-muted">Will be automatically created on the OLT</small>
            </div>

            <!-- SNMP read-write community -->
            <div class="mb-3">
              <label class="form-label" for="snmp-write">
                SNMP read-write community <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="snmp-write" name="snmp_write" value="" required>
              <small class="text-muted">Will be automatically created on the OLT</small>
            </div>

            <!-- SNMP UDP port -->
            <div class="mb-3">
              <label class="form-label" for="snmp-port">
                SNMP UDP port <span class="text-danger">*</span>
              </label>
              <input type="number" class="form-control" id="snmp-port" name="snmp_port" value="2161" required>
            </div>

            <!-- OLT manufacturer -->
            <div class="mb-3">
              <label class="form-label" for="manufacturer">
                OLT manufacturer <span class="text-danger">*</span>
              </label>
              <select class="form-select" id="manufacturer" name="manufacturer" required>
                <option value="">Pilih Manufacturer</option>
                <option value="ZTE" selected>ZTE</option>
                <option value="Huawei">Huawei</option>
                <option value="Fiberhome">Fiberhome</option>
                <option value="Nokia">Nokia</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <!-- OLT hardware version -->
            <div class="mb-3">
              <label class="form-label" for="hardware-version">
                OLT hardware version <span class="text-danger">*</span>
              </label>
              <select class="form-select" id="hardware-version" name="hardware_version" required>
                <option value="">Pilih Hardware Version</option>
                <option value="ZTE-C220" selected>ZTE-C220</option>
                <option value="ZTE-C300">ZTE-C300</option>
                <option value="ZTE-C320">ZTE-C320</option>
                <option value="ZTE-C600">ZTE-C600</option>
              </select>
            </div>

            <!-- Supported PON types -->
            <div class="mb-4">
              <label class="form-label">
                Supported PON types <span class="text-danger">*</span>
              </label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pon_type" id="pon-gpon" value="GPON" checked>
                  <label class="form-check-label" for="pon-gpon">GPON</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pon_type" id="pon-epon" value="EPON">
                  <label class="form-check-label" for="pon-epon">EPON</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pon_type" id="pon-both" value="GPON+EPON">
                  <label class="form-check-label" for="pon-both">GPON+EPON</label>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-success">
                <i class="ti ti-device-floppy me-1"></i> Save
              </button>
              <a href="/olt" class="btn btn-outline-secondary">Cancel</a>
              <button type="button" class="btn btn-primary ms-auto" id="btn-test-connection">
                <i class="ti ti-plug-connected me-1"></i> Test connection
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- Right Column - Map -->
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header">
          <h5 class="mb-0">Lokasi OLT</h5>
        </div>
        <div class="card-body position-relative">
          <div class="map-info">
            <i class="ti ti-info-circle me-1"></i> Drag marker untuk set lokasi
          </div>
          <div id="map"></div>
          <div class="mt-3">
            <button type="button" class="btn btn-sm btn-outline-primary" id="btn-my-location">
              <i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-search-location">
              <i class="ti ti-search me-1"></i> Cari Lokasi
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Search Location Modal -->
<div class="modal fade" id="searchLocationModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cari Lokasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Alamat atau Nama Tempat</label>
          <input type="text" class="form-control" id="search-address" placeholder="Contoh: Jl. Raya Cicalengka, Bandung">
        </div>
        <button type="button" class="btn btn-primary" id="btn-do-search">
          <i class="ti ti-search me-1"></i> Cari
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
$(document).ready(function() {
  // Initialize Map (centered on Bandung)
  const map = L.map('map').setView([-6.9175, 107.6191], 13);

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
  }).addTo(map);

  // Custom marker icon
  const oltIcon = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMjAgMEMxMi4yNyAwIDYgNi4yNyA2IDE0YzAgMTAuNSAxNCAxNyAxNCAxN3MxNC02LjUgMTQtMTdjMC03LjczLTYuMjctMTQtMTQtMTR6IiBmaWxsPSIjNzM2N2YwIi8+PHJlY3QgeD0iMTUiIHk9IjkiIHdpZHRoPSIxMCIgaGVpZ2h0PSIxMCIgcng9IjIiIGZpbGw9IiNmZmYiLz48L3N2Zz4=',
    iconSize: [40, 50],
    iconAnchor: [20, 50],
    popupAnchor: [0, -50]
  });

  // Add draggable marker
  let marker = L.marker([-6.9175, 107.6191], {
    icon: oltIcon,
    draggable: true
  }).addTo(map);

  // Update coordinates when marker is dragged
  marker.on('dragend', function(e) {
    const position = marker.getLatLng();
    $('#latitude').val(position.lat.toFixed(6));
    $('#longitude').val(position.lng.toFixed(6));
    
    // Update popup
    marker.bindPopup(`
      <strong>Lokasi OLT</strong><br>
      Lat: ${position.lat.toFixed(6)}<br>
      Lng: ${position.lng.toFixed(6)}
    `).openPopup();
  });

  // Initial coordinates
  $('#latitude').val('-6.917500');
  $('#longitude').val('107.619100');

  // Use My Location
  $('#btn-my-location').on('click', function() {
    if (navigator.geolocation) {
      const btn = $(this);
      btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Getting location...');
      
      navigator.geolocation.getCurrentPosition(function(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        
        map.setView([lat, lng], 16);
        marker.setLatLng([lat, lng]);
        $('#latitude').val(lat.toFixed(6));
        $('#longitude').val(lng.toFixed(6));
        
        marker.bindPopup(`
          <strong>Lokasi Anda</strong><br>
          Lat: ${lat.toFixed(6)}<br>
          Lng: ${lng.toFixed(6)}
        `).openPopup();
        
        btn.prop('disabled', false).html('<i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya');
      }, function() {
        btn.prop('disabled', false).html('<i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya');
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Tidak dapat mengakses lokasi Anda',
          confirmButtonColor: '#ea5455'
        });
      });
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Tidak Didukung',
        text: 'Browser Anda tidak mendukung geolocation',
        confirmButtonColor: '#ff9f43'
      });
    }
  });

  // Search Location (simplified - in production use Nominatim or Google Geocoding API)
  $('#btn-search-location').on('click', function() {
    $('#searchLocationModal').modal('show');
  });

  $('#btn-do-search').on('click', function() {
    const address = $('#search-address').val();
    if (!address) {
      Swal.fire({
        icon: 'warning',
        title: 'Perhatian',
        text: 'Mohon masukkan alamat terlebih dahulu',
        confirmButtonColor: '#ff9f43'
      });
      return;
    }

    // Simple demo - in production use proper geocoding service
    Swal.fire({
      icon: 'info',
      title: 'Demo Mode',
      text: 'Fitur pencarian lokasi memerlukan integrasi dengan geocoding API (Google Maps/Nominatim)',
      confirmButtonColor: '#7367f0'
    });
    $('#searchLocationModal').modal('hide');
  });

  // Generate random SNMP community strings
  function generateRandomString(length) {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
      result += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return result;
  }

  $('#snmp-read').val(generateRandomString(12));
  $('#snmp-write').val(generateRandomString(12));

  // Toggle password visibility
  $('#toggle-telnet-password').on('click', function() {
    const input = $('#telnet-password');
    const icon = $(this).find('i');
    
    if (input.attr('type') === 'password') {
      input.attr('type', 'text');
      icon.removeClass('ti-eye-off').addClass('ti-eye');
    } else {
      input.attr('type', 'password');
      icon.removeClass('ti-eye').addClass('ti-eye-off');
    }
  });

  // Update hardware version based on manufacturer
  $('#manufacturer').on('change', function() {
    const manufacturer = $(this).val();
    const hardwareSelect = $('#hardware-version');
    
    hardwareSelect.empty().append('<option value="">Pilih Hardware Version</option>');
    
    if (manufacturer === 'ZTE') {
      hardwareSelect.append(`
        <option value="ZTE-C220">ZTE-C220</option>
        <option value="ZTE-C300">ZTE-C300</option>
        <option value="ZTE-C320">ZTE-C320</option>
        <option value="ZTE-C600">ZTE-C600</option>
      `);
    } else if (manufacturer === 'Huawei') {
      hardwareSelect.append(`
        <option value="MA5608T">MA5608T</option>
        <option value="MA5680T">MA5680T</option>
        <option value="MA5800">MA5800</option>
      `);
    } else if (manufacturer === 'Fiberhome') {
      hardwareSelect.append(`
        <option value="AN5516-01">AN5516-01</option>
        <option value="AN5516-06">AN5516-06</option>
        <option value="AN5506-04">AN5506-04</option>
      `);
    } else if (manufacturer === 'Nokia') {
      hardwareSelect.append(`
        <option value="7360 ISAM FX-4">7360 ISAM FX-4</option>
        <option value="7360 ISAM FX-8">7360 ISAM FX-8</option>
      `);
    }
  });

  // Test Connection
  $('#btn-test-connection').on('click', function() {
    const btn = $(this);
    const ip = $('#olt-ip').val();
    const port = $('#telnet-port').val();
    
    if (!ip || !port) {
      Swal.fire({
        icon: 'warning',
        title: 'Perhatian',
        text: 'Mohon isi IP Address dan Telnet Port terlebih dahulu',
        confirmButtonColor: '#7367f0'
      });
      return;
    }

    btn.prop('disabled', true);
    btn.html('<span class="spinner-border spinner-border-sm me-1"></span> Testing...');

    setTimeout(function() {
      btn.prop('disabled', false);
      btn.html('<i class="ti ti-plug-connected me-1"></i> Test connection');
      
      const isSuccess = Math.random() > 0.3;
      
      if (isSuccess) {
        Swal.fire({
          icon: 'success',
          title: 'Connection Successful',
          text: 'OLT connection test berhasil!',
          confirmButtonColor: '#28c76f'
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Connection Failed',
          text: 'Tidak dapat terhubung ke OLT. Periksa IP, Port, dan kredensial.',
          confirmButtonColor: '#ea5455'
        });
      }
    }, 2000);
  });

  // Form Submit
  $('#formAddOlt').on('submit', function(e) {
    e.preventDefault();
    
    const formData = {
      name: $('#olt-name').val(),
      ip_address: $('#olt-ip').val(),
      latitude: $('#latitude').val(),
      longitude: $('#longitude').val(),
      telnet_port: $('#telnet-port').val(),
      telnet_username: $('#telnet-username').val(),
      telnet_password: $('#telnet-password').val(),
      snmp_read: $('#snmp-read').val(),
      snmp_write: $('#snmp-write').val(),
      snmp_port: $('#snmp-port').val(),
      manufacturer: $('#manufacturer').val(),
      hardware_version: $('#hardware-version').val(),
      pon_type: $('input[name="pon_type"]:checked').val()
    };

    if (!formData.name || !formData.ip_address || !formData.latitude || !formData.longitude || !formData.manufacturer || !formData.hardware_version) {
      Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: 'Mohon lengkapi semua field yang wajib diisi',
        confirmButtonColor: '#ea5455'
      });
      return;
    }

    Swal.fire({
      title: 'Menyimpan data...',
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      }
    });

    setTimeout(function() {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data OLT berhasil disimpan',
        confirmButtonColor: '#28c76f'
      }).then(() => {
        window.location.href = '/olt';
      });
    }, 1500);
  });
});
</script>
@endpush