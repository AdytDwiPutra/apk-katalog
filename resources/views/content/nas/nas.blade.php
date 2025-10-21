@extends('layouts.master')

@section('title', 'Router [NAS]')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Router [ NAS ]</h4>
      <div class="alert alert-info py-2 px-3 mb-0 mt-2">
        <small>
          <strong>INFO:</strong><br>
          • Sistem akan mengecek status ping ke router setiap 5 menit<br>
          • Tabel Router akan di refresh otomatis setiap 1 menit
        </small>
      </div>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRouterModal">
      <i class="ti ti-plus me-1"></i> TAMBAH ROUTER [NAS]
    </button>
  </div>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Router/NAS</h5>
      <div class="d-flex gap-2 align-items-center">
        <small class="text-muted">Auto-refresh dalam: <span id="countdown">60</span>s</small>
        <button class="btn btn-sm btn-outline-primary" id="btn-refresh">
          <i class="ti ti-refresh"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-2">
          <label>Show</label>
          <select class="form-select form-select-sm" style="width: auto;">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          <span>entries</span>
        </div>
        <div>
          <input type="text" class="form-control form-control-sm" placeholder="Search..." id="search-input">
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th class="text-center" style="width: 50px;">API</th>
              <th class="text-center" style="width: 100px;">Status Ping</th>
              <th>Nama Router</th>
              <th>IP Address</th>
              <th>Zona Waktu</th>
              <th>Deskripsi</th>
              <th class="text-center">User Online</th>
              <th>Cek Status Terakhir</th>
              <th class="text-center" style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Row 1 -->
            <tr>
              <td class="text-center">
                <button class="btn btn-sm btn-info" title="Test API Connection">
                  <i class="ti ti-api"></i>
                </button>
              </td>
              <td class="text-center">
                <span class="badge bg-success">
                  <i class="ti ti-circle-check-filled"></i> online
                </span>
              </td>
              <td class="fw-medium">NAS-POP-Bima</td>
              <td>172.23.146.246</td>
              <td>+07:00 Asia/Jakarta</td>
              <td>RADIUS Client</td>
              <td class="text-center">
                <span class="badge bg-label-primary">
                  <i class="ti ti-users"></i> active 398
                </span>
              </td>
              <td>2025-09-23 17:05:01</td>
              <td class="text-center">
                <button class="btn btn-sm btn-primary me-1" title="Edit">
                  <i class="ti ti-edit"></i>
                </button>
                <button class="btn btn-sm btn-warning" title="Delete">
                  <i class="ti ti-trash"></i>
                </button>
              </td>
            </tr>

            <!-- Row 2 -->
            <tr>
              <td class="text-center">
                <button class="btn btn-sm btn-info" title="Test API Connection">
                  <i class="ti ti-api"></i>
                </button>
              </td>
              <td class="text-center">
                <span class="badge bg-success">
                  <i class="ti ti-circle-check-filled"></i> online
                </span>
              </td>
              <td class="fw-medium">NAS-RB4011</td>
              <td>172.23.147.252</td>
              <td>+07:00 Asia/Jakarta</td>
              <td>RADIUS Client</td>
              <td class="text-center">
                <span class="badge bg-label-primary">
                  <i class="ti ti-users"></i> active 328
                </span>
              </td>
              <td>2025-09-23 17:05:01</td>
              <td class="text-center">
                <button class="btn btn-sm btn-primary me-1" title="Edit">
                  <i class="ti ti-edit"></i>
                </button>
                <button class="btn btn-sm btn-warning" title="Delete">
                  <i class="ti ti-trash"></i>
                </button>
              </td>
            </tr>

            <!-- Row 3 - Offline Example -->
            <tr>
              <td class="text-center">
                <button class="btn btn-sm btn-info" title="Test API Connection">
                  <i class="ti ti-api"></i>
                </button>
              </td>
              <td class="text-center">
                <span class="badge bg-danger">
                  <i class="ti ti-circle-x-filled"></i> offline
                </span>
              </td>
              <td class="fw-medium">NAS-RB3011</td>
              <td>172.23.148.100</td>
              <td>+07:00 Asia/Jakarta</td>
              <td>RADIUS Client - Backup</td>
              <td class="text-center">
                <span class="badge bg-label-secondary">
                  <i class="ti ti-users"></i> active 0
                </span>
              </td>
              <td>2025-09-23 16:58:42</td>
              <td class="text-center">
                <button class="btn btn-sm btn-primary me-1" title="Edit">
                  <i class="ti ti-edit"></i>
                </button>
                <button class="btn btn-sm btn-warning" title="Delete">
                  <i class="ti ti-trash"></i>
                </button>
              </td>
            </tr>

            <!-- Row 4 -->
            <tr>
              <td class="text-center">
                <button class="btn btn-sm btn-info" title="Test API Connection">
                  <i class="ti ti-api"></i>
                </button>
              </td>
              <td class="text-center">
                <span class="badge bg-success">
                  <i class="ti ti-circle-check-filled"></i> online
                </span>
              </td>
              <td class="fw-medium">NAS-CCR1009</td>
              <td>172.23.149.50</td>
              <td>+07:00 Asia/Jakarta</td>
              <td>RADIUS Client - Core</td>
              <td class="text-center">
                <span class="badge bg-label-primary">
                  <i class="ti ti-users"></i> active 542
                </span>
              </td>
              <td>2025-09-23 17:05:01</td>
              <td class="text-center">
                <button class="btn btn-sm btn-primary me-1" title="Edit">
                  <i class="ti ti-edit"></i>
                </button>
                <button class="btn btn-sm btn-warning" title="Delete">
                  <i class="ti ti-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
          <small class="text-muted">Showing 1 to 4 of 4 entries</small>
        </div>
        <nav>
          <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- Add Router Modal -->
<div class="modal fade" id="addRouterModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Router [NAS]</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addRouterForm">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nama Router <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Contoh: NAS-POP-Bima" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">IP Address <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="172.23.146.246" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">API Port</label>
              <input type="number" class="form-control" placeholder="8728" value="8728">
            </div>
            <div class="col-md-6">
              <label class="form-label">API Username <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="admin" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">API Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Zona Waktu</label>
              <select class="form-select">
                <option value="+07:00">+07:00 Asia/Jakarta (WIB)</option>
                <option value="+08:00">+08:00 Asia/Makassar (WITA)</option>
                <option value="+09:00">+09:00 Asia/Jayapura (WIT)</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">RADIUS Secret <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="shared-secret-key" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" rows="2" placeholder="RADIUS Client - POP Bima"></textarea>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Lokasi</label>
              <input type="text" class="form-control" placeholder="POP Bima - Jl. Raya No. 123">
            </div>
            <div class="col-md-6">
              <label class="form-label">Type Router</label>
              <select class="form-select">
                <option>Mikrotik</option>
                <option>Cisco</option>
                <option>Juniper</option>
                <option>Other</option>
              </select>
            </div>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="enable-monitoring" checked>
            <label class="form-check-label" for="enable-monitoring">
              Enable Monitoring & Auto Ping Check (setiap 5 menit)
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">
          <i class="ti ti-device-floppy me-1"></i> Simpan Router
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  // Auto refresh countdown
  let countdown = 60;
  let countdownInterval = setInterval(function() {
    countdown--;
    $('#countdown').text(countdown);
    
    if (countdown <= 0) {
      // Refresh page or reload data via AJAX
      location.reload();
    }
  }, 1000);

  // Manual refresh button
  $('#btn-refresh').on('click', function() {
    clearInterval(countdownInterval);
    location.reload();
  });

  // Search functionality
  $('#search-input').on('keyup', function() {
    var value = $(this).val().toLowerCase();
    $('tbody tr').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  // Test API Connection
  $('.btn-info').on('click', function() {
    alert('Testing API connection...');
    // In real app: AJAX call to test router API
  });

  // Edit button
  $('.btn-primary').on('click', function() {
    if(!$(this).closest('.modal-footer').length) {
      alert('Edit router - ID: ' + $(this).closest('tr').find('td:eq(2)').text());
    }
  });

  // Delete button
  $('.btn-warning').on('click', function() {
    if(confirm('Hapus router ini?')) {
      alert('Router deleted');
      $(this).closest('tr').fadeOut();
    }
  });
});
</script>
@endpush