@extends('layouts.master')

@section('title', 'Detail Tiket #TKT-250923-1042')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Breadcrumb -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h4 class="fw-bold mb-1">Detail Tiket #TKT-250923-1042</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/tickets/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/tickets">List Tiket</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </nav>
    </div>
    <div>
      <button class="btn btn-sm btn-outline-secondary me-2" onclick="window.print();">
        <i class="ti ti-printer me-1"></i> Print
      </button>
      <a href="/tickets" class="btn btn-sm btn-outline-primary">
        <i class="ti ti-arrow-left me-1"></i> Kembali
      </a>
    </div>
  </div>

  <div class="row">
    <!-- Main Content -->
    <div class="col-lg-8">
      <!-- Ticket Info Card -->
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h5 class="mb-0">Informasi Tiket</h5>
            <small class="text-muted">Created: 23 Sep 2025, 12:30</small>
          </div>
          <div class="d-flex gap-2">
            <span class="badge bg-dark">Critical</span>
            <span class="badge bg-label-info">In Progress</span>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Subject</h6>
              <p class="mb-0 fw-medium">Internet Mati Total - PT Maju Jaya</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Kategori</h6>
              <span class="badge bg-label-danger">Internet Mati Total</span>
            </div>
          </div>
          
          <div class="mb-3">
            <h6 class="text-muted mb-2">Deskripsi Masalah</h6>
            <p class="mb-0">Layanan internet pelanggan PT Maju Jaya tidak dapat digunakan sama sekali sejak pukul 11:00 WIB. Semua indikator lampu pada ONT (Power, PON, LAN) menyala normal namun tidak dapat browsing atau mengakses aplikasi apapun. Pelanggan sudah mencoba restart router dan device namun masalah tetap terjadi.</p>
          </div>

          <div class="mb-3">
            <h6 class="text-muted mb-2">Sumber Tiket</h6>
            <span class="badge bg-label-warning">Call Center / Hotline</span>
          </div>

          <div class="row">
            <div class="col-md-6">
              <h6 class="text-muted mb-2">Assigned To</h6>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded-circle bg-label-warning">L2</span>
                </div>
                <div>
                  <p class="mb-0 fw-medium">Tim Support L2</p>
                  <small class="text-muted">Ahmad Fauzi</small>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h6 class="text-muted mb-2">SLA Timer</h6>
              <div class="d-flex align-items-center">
                <i class="ti ti-clock text-warning me-2"></i>
                <span class="fw-medium text-warning">4 jam 15 menit tersisa</span>
              </div>
              <small class="text-muted">Target: < 8 jam (Critical)</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Customer Info Card -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Informasi Pelanggan</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-1">Nama Pelanggan</h6>
              <p class="mb-0 fw-medium">PT Maju Jaya</p>
              <small class="text-muted">ID: CID-242382</small>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-1">Paket</h6>
              <p class="mb-0">DW CORPORATE 100Mbps</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-1">Kontak Pelapor</h6>
              <p class="mb-0">Budi (IT Manager)</p>
              <small class="text-muted">08123456789</small>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-1">Status</h6>
              <span class="badge bg-success me-2">Active</span>
              <span class="badge bg-success">Lunas</span>
            </div>
            <div class="col-12">
              <h6 class="text-muted mb-1">Alamat</h6>
              <p class="mb-0">Jl. Raya Cicalengka No. 123, Bandung, Jawa Barat</p>
              <small class="text-muted">ODP: ODP23-JALINAN | Port: 1/1/1/8</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Remote Diagnostic Tools -->
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
          <h5 class="mb-0">Remote Diagnostic Tools</h5>
          <small class="text-muted">L1 Troubleshooting</small>
        </div>
        <div class="card-body">
          <div class="row g-2 mb-3">
            <div class="col-md-4">
              <button class="btn btn-outline-primary w-100" id="btn-ping">
                <i class="ti ti-antenna-bars-5 me-1"></i> Ping Test
              </button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-info w-100" id="btn-traceroute">
                <i class="ti ti-route me-1"></i> Traceroute
              </button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-warning w-100" id="btn-restart">
                <i class="ti ti-refresh me-1"></i> Restart ONT
              </button>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-md-4">
              <button class="btn btn-outline-success w-100" id="btn-check-signal">
                <i class="ti ti-signal me-1"></i> Check Signal
              </button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-secondary w-100" id="btn-check-port">
                <i class="ti ti-server me-1"></i> Check Port
              </button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-danger w-100" id="btn-isolate">
                <i class="ti ti-lock me-1"></i> Isolate/Block
              </button>
            </div>
          </div>

          <!-- Result Area -->
          <div id="diagnostic-result" class="alert alert-secondary" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <strong>Hasil Diagnostik:</strong>
              <button class="btn-close btn-sm" id="close-result"></button>
            </div>
            <pre id="result-text" class="mb-0" style="font-size: 12px; max-height: 200px; overflow-y: auto;"></pre>
          </div>

          <!-- Device Status -->
          <div class="border rounded p-3 bg-light">
            <h6 class="mb-2">Status Device</h6>
            <div class="row g-2">
              <div class="col-md-3">
                <small class="text-muted d-block">ONT Status</small>
                <span class="badge bg-success">Online</span>
              </div>
              <div class="col-md-3">
                <small class="text-muted d-block">Optical Power</small>
                <span class="text-success fw-medium">-18 dBm</span>
              </div>
              <div class="col-md-3">
                <small class="text-muted d-block">Uptime</small>
                <span>2d 14h 32m</span>
              </div>
              <div class="col-md-3">
                <small class="text-muted d-block">IP Address</small>
                <span>10.10.10.125</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Activity Timeline -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Timeline Aktivitas</h5>
        </div>
        <div class="card-body">
          <ul class="timeline mb-0">
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-info"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Tiket di-assign ke Support L2</h6>
                  <small class="text-muted">23 Sep 2025, 13:45</small>
                </div>
                <p class="mb-0">Ahmad Fauzi mulai menangani tiket ini</p>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-warning"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Escalation dari L1</h6>
                  <small class="text-muted">23 Sep 2025, 13:30</small>
                </div>
                <p class="mb-0">Catatan: Basic troubleshooting sudah dilakukan. Restart ONT tidak berhasil. Signal normal. Perlu analisis lebih lanjut.</p>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-primary"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Remote Diagnostic - Ping Test</h6>
                  <small class="text-muted">23 Sep 2025, 13:15</small>
                </div>
                <p class="mb-0">Result: Reply dari gateway (OK), Reply dari ONT (OK), Reply ke internet (FAILED)</p>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-success"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Konfirmasi dengan Pelanggan</h6>
                  <small class="text-muted">23 Sep 2025, 13:00</small>
                </div>
                <p class="mb-0">Telp ke Budi (IT Manager) - Konfirmasi masalah dan basic troubleshooting</p>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-warning"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Tiket Dibuat</h6>
                  <small class="text-muted">23 Sep 2025, 12:30</small>
                </div>
                <p class="mb-0">Sumber: Call Center - Operator: Siti Nurhaliza</p>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <!-- Communication Log -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Communication Log</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Tambahkan catatan atau update komunikasi dengan pelanggan..."></textarea>
            <button class="btn btn-sm btn-primary mt-2">
              <i class="ti ti-send me-1"></i> Tambah Log
            </button>
          </div>

          <div class="border-top pt-3">
            <div class="d-flex mb-3">
              <div class="avatar avatar-sm me-3">
                <span class="avatar-initial rounded-circle bg-label-primary">AF</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-1">Ahmad Fauzi <small class="text-muted">13:50</small></h6>
                <p class="mb-0">Update ke pelanggan via WA: "Sedang dilakukan pengecekan dari sisi OLT, mohon tunggu 15-30 menit untuk update selanjutnya"</p>
              </div>
            </div>

            <div class="d-flex mb-3">
              <div class="avatar avatar-sm me-3">
                <span class="avatar-initial rounded-circle bg-label-success">SN</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-1">Siti Nurhaliza <small class="text-muted">13:00</small></h6>
                <p class="mb-0">Terima laporan dari Budi (IT Mgr PT Maju Jaya): Internet mati total sejak 11:00. Sudah restart ONT tidak berhasil. Prioritas: CRITICAL (pelanggan corporate).</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Sidebar -->
    <div class="col-lg-4">
      <!-- Quick Actions -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Quick Actions</h5>
        </div>
        <div class="card-body">
          <!-- Update Status -->
          <div class="mb-3">
            <label class="form-label">Update Status</label>
            <select class="form-select" id="ticket-status">
              <option value="open">Open</option>
              <option value="in-progress" selected>In Progress</option>
              <option value="pending">Pending</option>
              <option value="resolved">Resolved</option>
              <option value="closed">Closed</option>
            </select>
          </div>

          <!-- Assign To -->
          <div class="mb-3">
            <label class="form-label">Assign To</label>
            <select class="form-select" id="assign-to">
              <option value="">Pilih Team/Teknisi</option>
              <option value="l1">Support L1</option>
              <option value="l2" selected>Support L2 - Ahmad Fauzi</option>
              <option value="noc">NOC Team</option>
              <option value="field">Field Technician</option>
            </select>
          </div>

          <!-- Priority -->
          <div class="mb-3">
            <label class="form-label">Prioritas</label>
            <select class="form-select" id="priority">
              <option value="low">Low</option>
              <option value="medium">Medium</option>
              <option value="high">High</option>
              <option value="critical" selected>Critical</option>
            </select>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" id="btn-update">
              <i class="ti ti-device-floppy me-1"></i> Update Tiket
            </button>
            <button class="btn btn-warning" id="btn-escalate">
              <i class="ti ti-arrow-up-circle me-1"></i> Escalate ke L3/NOC
            </button>
          </div>
        </div>
      </div>

      <!-- Escalation Options -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Opsi Eskalasi</h5>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#escalateModal">
              <i class="ti ti-upload me-1"></i> Escalate ke NOC
            </button>
            <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#fieldTechModal">
              <i class="ti ti-user-check me-1"></i> Assign Field Tech
            </button>
            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
              <i class="ti ti-calendar me-1"></i> Schedule Visit
            </button>
          </div>
        </div>
      </div>

      <!-- Resolution Options -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Penyelesaian</h5>
        </div>
        <div class="card-body">
          <button class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#resolveModal">
            <i class="ti ti-check-circle me-1"></i> Mark as Resolved
          </button>
          <button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#closeModal">
            <i class="ti ti-circle-check me-1"></i> Close Ticket
          </button>
        </div>
      </div>

      <!-- Related Tickets -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Tiket Terkait</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-2">
              <a href="/tickets/42" class="text-body">
                <div class="d-flex justify-content-between">
                  <span>#TKT-250823-0982</span>
                  <small class="text-muted">1 bulan lalu</small>
                </div>
                <small class="text-muted">Internet Lambat</small>
              </a>
            </li>
            <li class="mb-2">
              <a href="/tickets/38" class="text-body">
                <div class="d-flex justify-content-between">
                  <span>#TKT-240723-0745</span>
                  <small class="text-muted">2 bulan lalu</small>
                </div>
                <small class="text-muted">Upgrade Paket</small>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Attachments -->
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Lampiran</h5>
        </div>
        <div class="card-body">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="ti ti-photo text-primary me-2"></i>
                <span>screenshot-error.png</span>
              </div>
              <small class="text-muted">245 KB</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="ti ti-photo text-primary me-2"></i>
                <span>foto-ont.jpg</span>
              </div>
              <small class="text-muted">1.2 MB</small>
            </a>
          </div>
          <button class="btn btn-sm btn-outline-primary w-100 mt-2">
            <i class="ti ti-upload me-1"></i> Upload File
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Escalate Modal -->
<div class="modal fade" id="escalateModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Escalate ke NOC/L3</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Alasan Eskalasi</label>
          <textarea class="form-control" rows="3" placeholder="Jelaskan mengapa perlu dieskalasi..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Assign To</label>
          <select class="form-select">
            <option>NOC Team</option>
            <option>Support L3</option>
            <option>Network Engineer</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-warning">Escalate</button>
      </div>
    </div>
  </div>
</div>

<!-- Resolve Modal -->
<div class="modal fade" id="resolveModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mark as Resolved</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Root Cause</label>
          <select class="form-select">
            <option>Config Error</option>
            <option>Hardware Issue</option>
            <option>Network Issue</option>
            <option>Software Bug</option>
            <option>User Error</option>
            <option>Other</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Solusi yang Diterapkan</label>
          <textarea class="form-control" rows="3" placeholder="Jelaskan solusi yang berhasil mengatasi masalah..."></textarea>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="send-notification">
          <label class="form-check-label" for="send-notification">
            Kirim notifikasi ke pelanggan
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success">Resolve Ticket</button>
      </div>
    </div>
  </div>
</div>

<!-- Close Modal -->
<div class="modal fade" id="closeModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Close Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <i class="ti ti-info-circle me-2"></i>
          Tiket akan ditutup dan tidak dapat dibuka kembali. Pastikan semua penanganan sudah selesai.
        </div>
        <div class="mb-3">
          <label class="form-label">Customer Satisfaction</label>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary" data-rating="1">😞</button>
            <button class="btn btn-outline-secondary" data-rating="2">😐</button>
            <button class="btn btn-outline-secondary" data-rating="3">😊</button>
            <button class="btn btn-outline-secondary" data-rating="4">😁</button>
            <button class="btn btn-outline-secondary" data-rating="5">🤩</button>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Catatan Penutupan</label>
          <textarea class="form-control" rows="2" placeholder="Catatan akhir (opsional)..."></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-dark">Close Ticket</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  // Diagnostic Tools
  $('#btn-ping').on('click', function() {
    showDiagnosticResult('Ping Test Results:\n\nPinging 10.10.10.125 with 32 bytes of data:\nReply from 10.10.10.125: bytes=32 time=1ms TTL=64\nReply from 10.10.10.125: bytes=32 time=1ms TTL=64\n\nPing statistics:\n    Packets: Sent = 4, Received = 4, Lost = 0 (0% loss)');
  });

  $('#btn-traceroute').on('click', function() {
    showDiagnosticResult('Traceroute Results:\n\n1    1 ms    <1 ms    <1 ms  192.168.1.1\n2    2 ms     2 ms     2 ms  10.10.10.1 (Gateway)\n3    5 ms     5 ms     5 ms  10.10.10.125 (ONT)\n4    *        *        *     Request timed out\n\nTrace complete.');
  });

  $('#btn-restart').on('click', function() {
    if(confirm('Restart ONT? Koneksi akan terputus sementara (30-60 detik)')) {
      showDiagnosticResult('Sending restart command to ONT...\nONT is rebooting...\nPlease wait 30-60 seconds.\n\nRestart command sent successfully.');
    }
  });

  $('#btn-check-signal').on('click', function() {
    showDiagnosticResult('Signal Check:\n\nOptical Power (RX): -18.5 dBm [NORMAL]\nOptical Power (TX): 2.3 dBm [NORMAL]\nSNR: 35 dB [EXCELLENT]\nPON Status: Online\nOLT Port: 1/1/1/8 [ACTIVE]\n\nSignal quality: GOOD');
  });

  function showDiagnosticResult(text) {
    $('#result-text').text(text);
    $('#diagnostic-result').slideDown();
  }

  $('#close-result').on('click', function() {
    $('#diagnostic-result').slideUp();
  });

  // Update Button
  $('#btn-update').on('click', function() {
    alert('Tiket berhasil diupdate!');
  });

  // Escalate Button
  $('#btn-escalate').on('click', function() {
    $('#escalateModal').modal('show');
  });

  // Rating buttons
  $('[data-rating]').on('click', function() {
    $('[data-rating]').removeClass('btn-primary').addClass('btn-outline-secondary');
    $(this).removeClass('btn-outline-secondary').addClass('btn-primary');
  });
});
</script>
@endpush