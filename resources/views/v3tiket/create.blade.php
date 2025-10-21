@extends('layouts.master')

@section('title', 'V3 Buat Tiket Baru')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-plus me-2 text-success"></i>
        Buat Tiket Baru V3
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item active">Buat Tiket</li>
        </ol>
      </nav>
    </div>
    <div>
      <a href="{{ route('v3tiket.dashboard') }}" class="btn btn-outline-secondary">
        <i class="ti ti-arrow-left me-1"></i>
        Kembali
      </a>
    </div>
  </div>

  <div class="row">
    <!-- Form Create Ticket -->
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-edit me-2"></i>
            Form Tiket Baru
          </h5>
        </div>
        <div class="card-body">
          <form>
            
            <!-- Step 1: Pilih Infrastruktur -->
            <div class="mb-4">
              <h6 class="fw-bold mb-3">
                <span class="badge bg-primary me-2">1</span>
                Pilih Jenis Infrastruktur
              </h6>
              <div class="row">
                <div class="col-md-4 mb-2">
                  <input type="radio" class="btn-check" name="infrastructure" id="wireless" value="wireless" checked>
                  <label class="btn btn-outline-success w-100 p-3" for="wireless">
                    <i class="ti ti-wifi fs-3 d-block mb-2"></i>
                    <strong>WIRELESS</strong>
                    <br><small>PTP/PTMP → POP</small>
                  </label>
                </div>
                <div class="col-md-4 mb-2">
                  <input type="radio" class="btn-check" name="infrastructure" id="converter" value="converter">
                  <label class="btn btn-outline-primary w-100 p-3" for="converter">
                    <i class="ti ti-network fs-3 d-block mb-2"></i>
                    <strong>CONVERTER FO</strong>
                    <br><small>Fiber → POP</small>
                  </label>
                </div>
                <div class="col-md-4 mb-2">
                  <input type="radio" class="btn-check" name="infrastructure" id="ftth" value="ftth">
                  <label class="btn btn-outline-warning w-100 p-3" for="ftth">
                    <i class="ti ti-home fs-3 d-block mb-2"></i>
                    <strong>FTTH</strong>
                    <br><small>Fiber → ODP</small>
                  </label>
                </div>
              </div>
            </div>

            <!-- Step 2: Data Pelanggan -->
            <div class="mb-4">
              <h6 class="fw-bold mb-3">
                <span class="badge bg-primary me-2">2</span>
                Data Pelanggan
              </h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Cari Pelanggan</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="ID Pelanggan atau Nama" id="customerSearch">
                    <button class="btn btn-outline-secondary" type="button">
                      <i class="ti ti-search"></i>
                    </button>
                  </div>
                  <small class="text-muted">Ketik untuk mencari pelanggan...</small>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">No. Telepon</label>
                  <input type="text" class="form-control" placeholder="08xxxxxxxxxx" id="customerPhone">
                </div>
              </div>
              
              <!-- Customer Info Display -->
              <div class="card bg-light border-0" id="customerInfo" style="display: none;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <strong>Nama:</strong> <span id="custName">-</span><br>
                      <strong>ID:</strong> <span id="custId">-</span><br>
                      <strong>Paket:</strong> <span id="custPackage">-</span>
                    </div>
                    <div class="col-md-6">
                      <strong>Alamat:</strong> <span id="custAddress">-</span><br>
                      <strong>Status:</strong> <span id="custStatus">-</span><br>
                      <strong>Lokasi:</strong> <span id="custLocation">-</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 3: Detail Masalah -->
            <div class="mb-4">
              <h6 class="fw-bold mb-3">
                <span class="badge bg-primary me-2">3</span>
                Detail Masalah
              </h6>
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Kategori Masalah</label>
                  <select class="form-select" id="categorySelect">
                    <option value="">Pilih Kategori...</option>
                    <!-- Wireless Options -->
                    <optgroup label="WIRELESS" id="wirelessOptions">
                      <option value="signal_weak">Signal Lemah</option>
                      <option value="disconnection">Sering Putus</option>
                      <option value="interference">Interference</option>
                      <option value="alignment">Masalah Alignment</option>
                      <option value="weather_impact">Dampak Cuaca</option>
                    </optgroup>
                    <!-- Converter FO Options -->
                    <optgroup label="CONVERTER FO" id="converterOptions" style="display: none;">
                      <option value="optical_power_low">Optical Power Rendah</option>
                      <option value="converter_failure">Converter Rusak</option>
                      <option value="fiber_break">Fiber Putus</option>
                      <option value="connector_dirty">Konektor Kotor</option>
                    </optgroup>
                    <!-- FTTH Options -->
                    <optgroup label="FTTH" id="ftthOptions" style="display: none;">
                      <option value="ont_offline">ONT Offline</option>
                      <option value="low_signal">Signal Rendah</option>
                      <option value="odp_problem">Masalah ODP</option>
                      <option value="splitter_fault">Splitter Bermasalah</option>
                      <option value="fiber_bend">Fiber Bengkok</option>
                    </optgroup>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Prioritas</label>
                  <select class="form-select">
                    <option value="low">Low - Tidak Mengganggu</option>
                    <option value="medium" selected>Medium - Sedikit Terganggu</option>
                    <option value="high">High - Sangat Terganggu</option>
                    <option value="critical">Critical - Total Down</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Deskripsi Masalah</label>
                <textarea class="form-control" rows="4" placeholder="Jelaskan detail masalah yang dialami pelanggan..."></textarea>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Waktu Kejadian</label>
                  <input type="datetime-local" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Upload Foto/Screenshot</label>
                  <input type="file" class="form-control" multiple accept="image/*">
                  <small class="text-muted">Max 5 file, 2MB per file</small>
                </div>
              </div>
            </div>

            <!-- Step 4: Assignment -->
            <div class="mb-4">
              <h6 class="fw-bold mb-3">
                <span class="badge bg-primary me-2">4</span>
                Assignment & Notes
              </h6>
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Assign To</label>
                  <select class="form-select">
                    <option value="auto">Auto Assignment</option>
                    <option value="noc">NOC Team</option>
                    <option value="tech1">Teknisi A</option>
                    <option value="tech2">Teknisi B</option>
                    <option value="supervisor">Supervisor</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">SLA Target</label>
                  <input type="text" class="form-control" value="4 Jam" readonly>
                  <small class="text-muted">Berdasarkan prioritas yang dipilih</small>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Catatan Internal</label>
                <textarea class="form-control" rows="3" placeholder="Catatan untuk tim internal (tidak terlihat oleh pelanggan)"></textarea>
              </div>
            </div>

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-between">
              <button type="button" class="btn btn-outline-secondary">
                <i class="ti ti-device-floppy me-1"></i>
                Simpan Draft
              </button>
              <div>
                <button type="button" class="btn btn-outline-primary me-2">
                  <i class="ti ti-eye me-1"></i>
                  Preview
                </button>
                <button type="submit" class="btn btn-success">
                  <i class="ti ti-check me-1"></i>
                  Buat Tiket
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- Sidebar Info -->
    <div class="col-lg-4">
      
      <!-- Infrastructure Info -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-info-circle me-2"></i>
            Info Infrastruktur
          </h6>
        </div>
        <div class="card-body" id="infrastructureInfo">
          <div class="text-center" id="wirelessInfo">
            <i class="ti ti-wifi text-success fs-1 mb-2"></i>
            <h6>WIRELESS</h6>
            <p class="small text-muted">Point-to-Point atau Point-to-Multipoint menuju POP. Troubleshooting fokus pada signal strength dan alignment.</p>
            <div class="row text-center">
              <div class="col-6">
                <strong>245</strong><br>
                <small>Aktif</small>
              </div>
              <div class="col-6">
                <strong>12</strong><br>
                <small>POP Sites</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Tips -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-bulb me-2"></i>
            Tips Troubleshooting
          </h6>
        </div>
        <div class="card-body">
          <div id="troubleshootingTips">
            <div id="wirelessTips">
              <h6 class="text-success">Wireless Tips:</h6>
              <ul class="small">
                <li>Cek signal strength (-70dBm atau lebih baik)</li>
                <li>Periksa alignment antenna</li>
                <li>Perhatikan kondisi cuaca</li>
                <li>Scan interference di sekitar</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Similar Cases -->
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-history me-2"></i>
            Kasus Serupa
          </h6>
        </div>
        <div class="card-body">
          <div class="small">
            <div class="d-flex justify-content-between mb-2">
              <span>Signal Lemah</span>
              <span class="text-muted">3 kasus</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span>Sering Putus</span>
              <span class="text-muted">1 kasus</span>
            </div>
            <div class="d-flex justify-content-between">
              <span>Interference</span>
              <span class="text-muted">2 kasus</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<script>
// Infrastructure selection handler
document.querySelectorAll('input[name="infrastructure"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        updateInfrastructureInfo(this.value);
        updateCategoryOptions(this.value);
        updateTroubleshootingTips(this.value);
    });
});

function updateInfrastructureInfo(type) {
    const info = {
        wireless: {
            icon: 'ti-wifi text-success',
            title: 'WIRELESS',
            description: 'Point-to-Point atau Point-to-Multipoint menuju POP. Troubleshooting fokus pada signal strength dan alignment.',
            stats: {left: '245 Aktif', right: '12 POP Sites'}
        },
        converter: {
            icon: 'ti-network text-primary', 
            title: 'CONVERTER FO',
            description: 'Fiber Optic ke Converter menuju POP. Troubleshooting fokus pada optical power dan hardware.',
            stats: {left: '156 Aktif', right: '8 POP Sites'}
        },
        ftth: {
            icon: 'ti-home text-warning',
            title: 'FTTH', 
            description: 'Fiber to the Home via ODP (jalur terpisah dari POP). Troubleshooting fokus pada ONT dan splitter.',
            stats: {left: '892 Aktif', right: '45 ODP Sites'}
        }
    };
    
    const selected = info[type];
    document.getElementById('infrastructureInfo').innerHTML = `
        <div class="text-center">
            <i class="ti ${selected.icon} fs-1 mb-2"></i>
            <h6>${selected.title}</h6>
            <p class="small text-muted">${selected.description}</p>
            <div class="row text-center">
                <div class="col-6">
                    <strong>${selected.stats.left.split(' ')[0]}</strong><br>
                    <small>${selected.stats.left.split(' ')[1]}</small>
                </div>
                <div class="col-6">
                    <strong>${selected.stats.right.split(' ')[0]}</strong><br>
                    <small>${selected.stats.right.split(' ').slice(1).join(' ')}</small>
                </div>
            </div>
        </div>
    `;
}

function updateCategoryOptions(type) {
    // Hide all optgroups
    document.getElementById('wirelessOptions').style.display = 'none';
    document.getElementById('converterOptions').style.display = 'none'; 
    document.getElementById('ftthOptions').style.display = 'none';
    
    // Show selected optgroup
    document.getElementById(type + 'Options').style.display = 'block';
    if (type === 'converter') {
        document.getElementById('converterOptions').style.display = 'block';
    }
    
    // Reset selection
    document.getElementById('categorySelect').value = '';
}

function updateTroubleshootingTips(type) {
    const tips = {
        wireless: `
            <h6 class="text-success">Wireless Tips:</h6>
            <ul class="small">
                <li>Cek signal strength (-70dBm atau lebih baik)</li>
                <li>Periksa alignment antenna</li>
                <li>Perhatikan kondisi cuaca</li>
                <li>Scan interference di sekitar</li>
            </ul>
        `,
        converter: `
            <h6 class="text-primary">Converter FO Tips:</h6>
            <ul class="small">
                <li>Cek optical power level</li>
                <li>Periksa konektor fiber</li>
                <li>Test converter hardware</li>
                <li>Cek switch port di POP</li>
            </ul>
        `,
        ftth: `
            <h6 class="text-warning">FTTH Tips:</h6>
            <ul class="small">
                <li>Cek status ONT</li>
                <li>Test signal dari ODP</li>
                <li>Periksa splitter ratio</li>
                <li>Cek fiber bend radius</li>
            </ul>
        `
    };
    
    document.getElementById('troubleshootingTips').innerHTML = tips[type];
}

// Customer search simulation
document.getElementById('customerSearch').addEventListener('input', function() {
    if (this.value.length > 2) {
        // Simulate customer found
        setTimeout(() => {
            document.getElementById('customerInfo').style.display = 'block';
            document.getElementById('custName').textContent = 'PT Maju Jaya';
            document.getElementById('custId').textContent = 'WL-2024-001';
            document.getElementById('custPackage').textContent = '50 Mbps Dedicated';
            document.getElementById('custAddress').textContent = 'Jl. Merdeka No. 123';
            document.getElementById('custStatus').textContent = 'Aktif';
            document.getElementById('custLocation').textContent = 'POP Sentral';
        }, 500);
    } else {
        document.getElementById('customerInfo').style.display = 'none';
    }
});
</script>

@endsection