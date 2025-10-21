@extends('layouts.master')

@section('title', 'Daftar Tiket Support')

@push('styles')
<link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
<link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/flatpickr/flatpickr.css" />
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold py-3 mb-0">Daftar Tiket Support</h4>
    <a href="/tickets/create" class="btn btn-primary">
      <i class="ti ti-plus me-1"></i> Buat Tiket Baru
    </a>
  </div>

  <!-- Filter Card -->
  <div class="card mb-4">
    <div class="card-header">
      <h5 class="card-title mb-0">Filter Tiket</h5>
    </div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select class="form-select" id="filter-status">
            <option value="">Semua Status</option>
            <option value="open">Open</option>
            <option value="in-progress">In Progress</option>
            <option value="pending">Pending</option>
            <option value="resolved">Resolved</option>
            <option value="closed">Closed</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Prioritas</label>
          <select class="form-select" id="filter-priority">
            <option value="">Semua Prioritas</option>
            <option value="critical">Critical</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Kategori</label>
          <select class="form-select" id="filter-category">
            <option value="">Semua Kategori</option>
            <option value="inet-down">Internet Mati</option>
            <option value="inet-slow">Internet Lambat</option>
            <option value="device">Perangkat</option>
            <option value="billing">Billing</option>
            <option value="other">Lainnya</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Periode</label>
          <input type="text" class="form-control flatpickr" id="filter-date" placeholder="Pilih Tanggal" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <button type="button" class="btn btn-primary me-2" id="btn-filter">
            <i class="ti ti-filter me-1"></i> Terapkan Filter
          </button>
          <button type="button" class="btn btn-outline-secondary" id="btn-reset">
            <i class="ti ti-refresh me-1"></i> Reset
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Tickets Table Card -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Semua Tiket</h5>
      <div class="d-flex gap-2">
        <button class="btn btn-sm btn-outline-secondary" id="btn-export">
          <i class="ti ti-download me-1"></i> Export
        </button>
        <button class="btn btn-sm btn-outline-primary" id="btn-refresh">
          <i class="ti ti-refresh me-1"></i> Refresh
        </button>
      </div>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-tickets table border-top" id="tickets-table">
        <thead>
          <tr>
            <th>
              <input type="checkbox" class="form-check-input" id="select-all">
            </th>
            <th>Ticket ID</th>
            <th>Pelanggan</th>
            <th>Subject</th>
            <th>Kategori</th>
            <th>Prioritas</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th>Created</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1045</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Budi Santoso</span>
                <small class="text-muted">CID-242501</small>
              </div>
            </td>
            <td>Internet Putus-nyambung</td>
            <td><span class="badge bg-label-warning">Internet Lambat</span></td>
            <td><span class="badge bg-warning">Medium</span></td>
            <td><span class="badge bg-label-warning">Open</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-primary">L1</span>
                </div>
                <span>Support L1</span>
              </div>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">14:30</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/detail">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-user-plus me-1"></i> Assign
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/2" class="fw-medium">#TKT-250923-1044</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Siti Nurhaliza</span>
                <small class="text-muted">CID-242502</small>
              </div>
            </td>
            <td>Konfirmasi Pembayaran</td>
            <td><span class="badge bg-label-primary">Billing</span></td>
            <td><span class="badge bg-success">Low</span></td>
            <td><span class="badge bg-label-info">In Progress</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-success">$</span>
                </div>
                <span>Tim Billing</span>
              </div>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">14:15</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/2">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-user-plus me-1"></i> Assign
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/3" class="fw-medium">#TKT-250923-1043</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Dedi Wijaya</span>
                <small class="text-muted">CID-242503</small>
              </div>
            </td>
            <td>Request Upgrade Paket</td>
            <td><span class="badge bg-label-info">Administrasi</span></td>
            <td><span class="badge bg-success">Low</span></td>
            <td><span class="badge bg-label-success">Resolved</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-primary">L1</span>
                </div>
                <span>Support L1</span>
              </div>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">14:00</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/3">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-user-plus me-1"></i> Assign
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/4" class="fw-medium">#TKT-250923-1042</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">PT Maju Jaya</span>
                <small class="text-muted">CID-242382</small>
              </div>
            </td>
            <td>Internet Mati Total</td>
            <td><span class="badge bg-label-danger">Internet Mati</span></td>
            <td><span class="badge bg-dark">Critical</span></td>
            <td><span class="badge bg-label-info">In Progress</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-warning">L2</span>
                </div>
                <span>Support L2</span>
              </div>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">12:30</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/4">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-user-plus me-1"></i> Assign
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 5 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/5" class="fw-medium">#TKT-250923-1038</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Riki Sopian</span>
                <small class="text-muted">CID-242382</small>
              </div>
            </td>
            <td>Kabel Fiber Putus/Rusak</td>
            <td><span class="badge bg-label-secondary">Perangkat</span></td>
            <td><span class="badge bg-danger">High</span></td>
            <td><span class="badge bg-label-secondary">Pending</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-info">F</span>
                </div>
                <span>Field Tech</span>
              </div>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">11:00</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/5">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-user-plus me-1"></i> Assign
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 6 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/6" class="fw-medium">#TKT-250923-1035</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Ahmad Yani</span>
                <small class="text-muted">CID-242385</small>
              </div>
            </td>
            <td>Internet Lambat Saat Peak Hours</td>
            <td><span class="badge bg-label-warning">Internet Lambat</span></td>
            <td><span class="badge bg-danger">High</span></td>
            <td><span class="badge bg-label-warning">Open</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-dark">NOC</span>
                </div>
                <span>NOC Team</span>
              </div>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">09:15</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/6">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-user-plus me-1"></i> Assign
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 7 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/7" class="fw-medium">#TKT-250923-1030</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">CV Berkah Jaya</span>
                <small class="text-muted">CID-242390</small>
              </div>
            </td>
            <td>ONT Mati Total</td>
            <td><span class="badge bg-label-secondary">Perangkat</span></td>
            <td><span class="badge bg-dark">Critical</span></td>
            <td><span class="badge bg-label-dark">Closed</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-info">F</span>
                </div>
                <span>Field Tech</span>
              </div>
            </td>
            <td>
              <span>22 Sep 2025</span><br>
              <small class="text-muted">16:45</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/7">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-history me-1"></i> Reopen
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 8 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-checkbox"></td>
            <td><a href="/tickets/8" class="fw-medium">#TKT-250923-1025</a></td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Indah Permata</span>
                <small class="text-muted">CID-242395</small>
              </div>
            </td>
            <td>Request Downgrade Paket</td>
            <td><span class="badge bg-label-info">Administrasi</span></td>
            <td><span class="badge bg-warning">Medium</span></td>
            <td><span class="badge bg-label-success">Resolved</span></td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xs me-2">
                  <span class="avatar-initial rounded-circle bg-label-primary">L1</span>
                </div>
                <span>Support L1</span>
              </div>
            </td>
            <td>
              <span>22 Sep 2025</span><br>
              <small class="text-muted">14:20</small>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/tickets/8">
                    <i class="ti ti-eye me-1"></i> Lihat Detail
                  </a>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <i class="ti ti-edit me-1"></i> Update Status
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                    <i class="ti ti-trash me-1"></i> Hapus
                  </a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bulk Actions (shown when checkboxes selected) -->
  <div class="card mt-3" id="bulk-actions" style="display: none;">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <span id="selected-count">0</span> tiket terpilih
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-primary">
            <i class="ti ti-user-plus me-1"></i> Assign
          </button>
          <button class="btn btn-sm btn-outline-info">
            <i class="ti ti-edit me-1"></i> Update Status
          </button>
          <button class="btn btn-sm btn-outline-success">
            <i class="ti ti-check me-1"></i> Mark Resolved
          </button>
          <button class="btn btn-sm btn-outline-danger">
            <i class="ti ti-trash me-1"></i> Hapus
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('vuexy')}}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="{{asset('vuexy')}}/assets/vendor/libs/flatpickr/flatpickr.js"></script>

<script>
$(document).ready(function() {
  // Initialize DataTable
  var table = $('#tickets-table').DataTable({
    responsive: true,
    order: [[8, 'desc']], // Sort by created date
    pageLength: 10,
    language: {
      search: "Cari:",
      lengthMenu: "Tampilkan _MENU_ tiket",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ tiket",
      infoEmpty: "Tidak ada data",
      infoFiltered: "(difilter dari _MAX_ total tiket)",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya"
      }
    },
    columnDefs: [
      { orderable: false, targets: [0, 9] } // Disable sorting for checkbox and actions
    ]
  });

  // Initialize Flatpickr
  $('.flatpickr').flatpickr({
    mode: "range",
    dateFormat: "Y-m-d"
  });

  // Select All Checkboxes
  $('#select-all').on('click', function() {
    $('.row-checkbox').prop('checked', this.checked);
    updateBulkActions();
  });

  // Individual Checkbox
  $('.row-checkbox').on('change', function() {
    updateBulkActions();
  });

  // Update Bulk Actions Visibility
  function updateBulkActions() {
    var count = $('.row-checkbox:checked').length;
    $('#selected-count').text(count);
    
    if (count > 0) {
      $('#bulk-actions').slideDown();
    } else {
      $('#bulk-actions').slideUp();
      $('#select-all').prop('checked', false);
    }
  }

  // Filter Button
  $('#btn-filter').on('click', function() {
    // In real app, this would filter the DataTable
    var status = $('#filter-status').val();
    var priority = $('#filter-priority').val();
    var category = $('#filter-category').val();
    var date = $('#filter-date').val();
    
    console.log('Filtering:', {status, priority, category, date});
    // table.ajax.reload();
  });

  // Reset Filter
  $('#btn-reset').on('click', function() {
    $('#filter-status, #filter-priority, #filter-category').val('');
    $('#filter-date').val('');
    table.search('').draw();
  });

  // Refresh Table
  $('#btn-refresh').on('click', function() {
    table.ajax.reload();
  });

  // Export Button
  $('#btn-export').on('click', function() {
    alert('Export to Excel/PDF - Coming soon!');
  });
});
</script>
@endpush