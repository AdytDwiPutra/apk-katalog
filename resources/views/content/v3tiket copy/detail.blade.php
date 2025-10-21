@extends('layouts.master')

@section('title', 'V3 Detail Tiket #TKT-001')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-ticket me-2 text-primary"></i>
        Detail Tiket #{{ $ticket_id }}
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.list') }}">Semua Tiket</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('v3tiket.handle', $ticket_id) }}" class="btn btn-success">
        <i class="ti ti-tool me-1"></i>
        Handle Tiket
      </a>
      <button class="btn btn-outline-secondary" onclick="window.print()">
        <i class="ti ti-printer me-1"></i>
        Print
      </button>
      <a href="{{ route('v3tiket.list') }}" class="btn btn-outline-primary">
        <i class="ti ti-arrow-left me-1"></i>
        Kembali
      </a>
    </div>
  </div>

  <div class="row">
    
    <!-- Main Content -->
    <div class="col-lg-8">
      
      <!-- Ticket Information -->
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-info-circle me-2"></i>
            Informasi Tiket
          </h5>
          <div class="d-flex gap-2">
            <span class="badge bg-label-success">
              <i class="ti ti-wifi me-1"></i>
              Wireless
            </span>
            <span class="badge bg-warning">In Progress</span>
            <span class="badge bg-danger">Critical</span>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Subject</h6>
              <p class="mb-0 fw-medium">Signal Lemah - Koneksi Sering Putus</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Kategori</h6>
              <span class="badge bg-label-danger">Signal Lemah</span>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Waktu Dibuat</h6>
              <p class="mb-0">24 September 2025, 10:30 WIB</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">SLA Target</h6>
              <p class="mb-0">4 Jam (Berakhir: 14:30 WIB)</p>
            </div>
          </div>
          
          <div class="mb-3">
            <h6 class="text-muted mb-2">Deskripsi Masalah</h6>
            <p class="mb-0">
              Pelanggan melaporkan koneksi internet sering putus sejak kemarin sore. 
              Signal strength terdeteksi lemah (-75 dBm) dan packet loss mencapai 15%. 
              Kondisi cuaca normal, kemungkinan ada masalah alignment atau interference.
            </p>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Reported By</h6>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <div class="avatar-initial bg-primary rounded-circle">CS</div>
                </div>
                <div>
                  <div class="fw-medium">Customer Service</div>
                  <small class="text-muted">Via Telepon</small>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Assigned To</h6>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <div class="avatar-initial bg-success rounded-circle">TA</div>
                </div>
                <div>
                  <div class="fw-medium">Teknisi A</div>
                  <small class="text-muted">Wireless Specialist</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Customer Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-user me-2"></i>
            Informasi Pelanggan
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Nama Pelanggan</h6>
              <p class="mb-0 fw-medium">PT Maju Jaya</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">ID Pelanggan</h6>
              <p class="mb-0">WL-2024-001</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Paket Layanan</h6>
              <p class="mb-0">50 Mbps Dedicated Wireless</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">No. Telepon</h6>
              <p class="mb-0">+62 821-1234-5678</p>
            </div>
            <div class="col-12 mb-3">
              <h6 class="text-muted mb-2">Alamat</h6>
              <p class="mb-0">Jl. Merdeka No. 123, Blok A-15, Jakarta Pusat</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Infrastruktur</h6>
              <span class="badge bg-label-success">
                <i class="ti ti-wifi me-1"></i>
                Wireless PTP → POP Sentral
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Status Akun</h6>
              <span class="badge bg-success">Aktif</span>
            </div>
          </div>
          
          <div class="mt-3">
            <a href="{{ route('v3tiket.customer', 'WL-2024-001') }}" class="btn btn-sm btn-outline-info">
              <i class="ti ti-eye me-1"></i>
              Lihat Detail Customer
            </a>
          </div>
        </div>
      </div>

      <!-- Technical Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-settings me-2"></i>
            Informasi Teknis
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Signal Strength (RSSI)</h6>
              <div class="d-flex align-items-center">
                <div class="progress flex-grow-1 me-2" style="height: 8px;">
                  <div class="progress-bar bg-danger" style="width: 30%"></div>
                </div>
                <span class="text-danger fw-bold">-75 dBm</span>
              </div>
              <small class="text-muted">Threshold: -70 dBm</small>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Packet Loss</h6>
              <div class="d-flex align-items-center">
                <div class="progress flex-grow-1 me-2" style="height: 8px;">
                  <div class="progress-bar bg-warning" style="width: 15%"></div>
                </div>
                <span class="text-warning fw-bold">15%</span>
              </div>
              <small class="text-muted">Normal: < 1%</small>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Latency</h6>
              <p class="mb-0">8.5 ms <small class="text-muted">(Normal: < 5ms)</small></p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Last Seen</h6>
              <p class="mb-0">24 Sep 2025, 12:45 WIB</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">CPE Model</h6>
              <p class="mb-0">Ubiquiti NanoStation AC5</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Frequency</h6>
              <p class="mb-0">5.8 GHz (Channel 149)</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Attachments -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-paperclip me-2"></i>
            Lampiran & Screenshot
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="https://via.placeholder.com/300x200/6c757d/fff?text=Speed+Test" class="card-img-top" alt="Speed Test">
                <div class="card-body p-2">
                  <small class="fw-medium">speedtest-result.png</small><br>
                  <small class="text-muted">24 Sep 2025, 10:35</small>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="https://via.placeholder.com/300x200/007bff/fff?text=Signal+Graph" class="card-img-top" alt="Signal Graph">
                <div class="card-body p-2">
                  <small class="fw-medium">signal-monitoring.png</small><br>
                  <small class="text-muted">24 Sep 2025, 10:40</small>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="list-group">
                <div class="list-group-item d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-file-text text-primary me-2"></i>
                    <small>network-analysis.pdf</small>
                  </div>
                  <button class="btn btn-sm btn-outline-primary">
                    <i class="ti ti-download"></i>
                  </button>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-file-spreadsheet text-success me-2"></i>
                    <small>signal-log.xlsx</small>
                  </div>
                  <button class="btn btn-sm btn-outline-primary">
                    <i class="ti ti-download"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
      
      <!-- Quick Actions -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-zap me-2"></i>
            Quick Actions
          </h6>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="{{ route('v3tiket.handle', $ticket_id) }}" class="btn btn-success">
              <i class="ti ti-tool me-1"></i>
              Handle Tiket
            </a>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateStatusModal">
              <i class="ti ti-edit me-1"></i>
              Update Status
            </button>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#assignModal">
              <i class="ti ti-user-plus me-1"></i>
              Reassign
            </button>
            <button class="btn btn-outline-danger">
              <i class="ti ti-flag me-1"></i>
              Escalate
            </button>
          </div>
        </div>
      </div>

      <!-- Status Timeline -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-clock me-2"></i>
            Timeline Status
          </h6>
        </div>
        <div class="card-body">
          <div class="timeline">
            
            <div class="timeline-item">
              <div class="timeline-marker bg-success"></div>
              <div class="timeline-content">
                <h6 class="timeline-title">Tiket Dibuat</h6>
                <p class="timeline-text">Reported oleh Customer Service</p>
                <small class="text-muted">24 Sep 2025, 10:30</small>
              </div>
            </div>
            
            <div class="timeline-item">
              <div class="timeline-marker bg-info"></div>
              <div class="timeline-content">
                <h6 class="timeline-title">Assigned to Teknisi A</h6>
                <p class="timeline-text">Auto-assignment berdasarkan expertise</p>
                <small class="text-muted">24 Sep 2025, 10:32</small>
              </div>
            </div>
            
            <div class="timeline-item">
              <div class="timeline-marker bg-warning"></div>
              <div class="timeline-content">
                <h6 class="timeline-title">In Progress</h6>
                <p class="timeline-text">Teknisi mulai remote diagnosis</p>
                <small class="text-muted">24 Sep 2025, 11:15</small>
              </div>
            </div>
            
            <div class="timeline-item">
              <div class="timeline-marker bg-primary"></div>
              <div class="timeline-content">
                <h6 class="timeline-title">Update Progress</h6>
                <p class="timeline-text">Signal monitoring menunjukkan alignment issue</p>
                <small class="text-muted">24 Sep 2025, 12:00</small>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <!-- SLA Monitoring -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-hourglass me-2"></i>
            SLA Monitoring
          </h6>
        </div>
        <div class="card-body">
          <div class="text-center mb-3">
            <div class="display-6 text-danger fw-bold">1h 30m</div>
            <small class="text-muted">Overdue</small>
          </div>
          
          <div class="progress mb-2" style="height: 8px;">
            <div class="progress-bar bg-danger" style="width: 137.5%"></div>
          </div>
          
          <div class="d-flex justify-content-between small text-muted">
            <span>Target: 4 Jam</span>
            <span>Elapsed: 5h 30m</span>
          </div>
          
          <div class="alert alert-danger mt-3 p-2">
            <small>
              <i class="ti ti-alert-triangle me-1"></i>
              <strong>SLA Breach!</strong> Segera escalate ke supervisor.
            </small>
          </div>
        </div>
      </div>

      <!-- Related Tickets -->
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-link me-2"></i>
            Tiket Terkait
          </h6>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item px-0 py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <small class="fw-medium">TKT-045</small><br>
                  <small class="text-muted">Signal issue - Same customer</small>
                </div>
                <span class="badge bg-success">Resolved</span>
              </div>
            </div>
            <div class="list-group-item px-0 py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <small class="fw-medium">TKT-067</small><br>
                  <small class="text-muted">POP Sentral maintenance</small>
                </div>
                <span class="badge bg-info">Scheduled</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<!-- Update Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Status Tiket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Status Baru</label>
            <select class="form-select">
              <option value="in_progress" selected>In Progress</option>
              <option value="pending">Pending</option>
              <option value="resolved">Resolved</option>
              <option value="closed">Closed</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Catatan Update</label>
            <textarea class="form-control" rows="3" placeholder="Jelaskan progress atau alasan perubahan status..."></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Update Status</button>
      </div>
    </div>
  </div>
</div>

<style>
.timeline {
  position: relative;
  padding-left: 20px;
}

.timeline-item {
  position: relative;
  margin-bottom: 20px;
}

.timeline-item:not(:last-child)::before {
  content: '';
  position: absolute;
  left: -16px;
  top: 20px;
  width: 2px;
  height: calc(100% + 10px);
  background-color: #dee2e6;
}

.timeline-marker {
  position: absolute;
  left: -20px;
  top: 4px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  border: 2px solid #fff;
  box-shadow: 0 0 0 2px #dee2e6;
}

.timeline-content {
  margin-left: 10px;
}

.timeline-title {
  font-size: 0.875rem;
  margin-bottom: 5px;
}

.timeline-text {
  font-size: 0.75rem;
  margin-bottom: 5px;
  color: #6c757d;
}
</style>

@endsection