@extends('layouts.master')

@section('title', 'V3 Semua Tiket')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-list me-2 text-primary"></i>
        Semua Tiket V3
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item active">Semua Tiket</li>
        </ol>
      </nav>
    </div>
    <div>
      <a href="{{ route('v3tiket.create') }}" class="btn btn-success">
        <i class="ti ti-plus me-1"></i>
        Buat Tiket Baru
      </a>
    </div>
  </div>

  <!-- Filters & Search -->
  <div class="card mb-4">
    <div class="card-body">
      <div class="row">
        
        <!-- Search -->
        <div class="col-md-3 mb-3">
          <label class="form-label">Cari Tiket</label>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="ID Tiket, Pelanggan..." id="searchInput">
            <button class="btn btn-outline-secondary" type="button">
              <i class="ti ti-search"></i>
            </button>
          </div>
        </div>

        <!-- Infrastructure Filter -->
        <div class="col-md-2 mb-3">
          <label class="form-label">Infrastruktur</label>
          <select class="form-select" id="infrastructureFilter">
            <option value="">Semua</option>
            <option value="wireless">Wireless</option>
            <option value="converter">Converter FO</option>
            <option value="ftth">FTTH</option>
          </select>
        </div>

        <!-- Status Filter -->
        <div class="col-md-2 mb-3">
          <label class="form-label">Status</label>
          <select class="form-select" id="statusFilter">
            <option value="">Semua Status</option>
            <option value="new">New</option>
            <option value="in_progress">In Progress</option>
            <option value="pending">Pending</option>
            <option value="resolved">Resolved</option>
            <option value="closed">Closed</option>
          </select>
        </div>

        <!-- Priority Filter -->
        <div class="col-md-2 mb-3">
          <label class="form-label">Prioritas</label>
          <select class="form-select" id="priorityFilter">
            <option value="">Semua Prioritas</option>
            <option value="critical">Critical</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
          </select>
        </div>

        <!-- Date Filter -->
        <div class="col-md-2 mb-3">
          <label class="form-label">Periode</label>
          <select class="form-select" id="dateFilter">
            <option value="today">Hari Ini</option>
            <option value="week">7 Hari Terakhir</option>
            <option value="month">30 Hari Terakhir</option>
            <option value="all">Semua</option>
          </select>
        </div>

        <!-- Actions -->
        <div class="col-md-1 mb-3">
          <label class="form-label">&nbsp;</label>
          <div class="d-flex gap-1">
            <button class="btn btn-outline-primary" title="Export Excel">
              <i class="ti ti-download"></i>
            </button>
            <button class="btn btn-outline-secondary" title="Reset Filter">
              <i class="ti ti-refresh"></i>
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Quick Stats -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="text-info mb-1">24</h3>
          <small class="text-muted">Total Hari Ini</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="text-warning mb-1">8</h3>
          <small class="text-muted">In Progress</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="text-danger mb-1">3</h3>
          <small class="text-muted">Critical</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="text-success mb-1">13</h3>
          <small class="text-muted">Resolved</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Tickets Table -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="ti ti-ticket-perforated me-2"></i>
        Daftar Tiket
      </h5>
      <div class="d-flex align-items-center gap-2">
        <small class="text-muted">Menampilkan 1-15 dari 247 tiket</small>
        <div class="btn-group" role="group">
          <button class="btn btn-sm btn-outline-secondary active">
            <i class="ti ti-list"></i>
          </button>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ti ti-grid-dots"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>
                <input type="checkbox" class="form-check-input">
              </th>
              <th>ID Tiket</th>
              <th>Infrastruktur</th>
              <th>Pelanggan</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Prioritas</th>
              <th>Assigned</th>
              <th>Created</th>
              <th>SLA</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
            <!-- Row 1 -->
            <tr>
              <td>
                <input type="checkbox" class="form-check-input">
              </td>
              <td>
                <a href="{{ route('v3tiket.detail', 'TKT-001') }}" class="fw-bold text-primary">
                  TKT-001
                </a>
              </td>
              <td>
                <span class="badge bg-label-success">
                  <i class="ti ti-wifi me-1"></i>
                  Wireless
                </span>
              </td>
              <td>
                <div>
                  <div class="fw-medium">PT Maju Jaya</div>
                  <small class="text-muted">WL-2024-001</small>
                </div>
              </td>
              <td>
                <span class="badge bg-label-danger">Signal Lemah</span>
              </td>
              <td>
                <span class="badge bg-warning text-dark">In Progress</span>
              </td>
              <td>
                <span class="badge bg-danger">Critical</span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-xs me-2">
                    <div class="avatar-initial bg-primary rounded-circle">
                      TA
                    </div>
                  </div>
                  <small>Teknisi A</small>
                </div>
              </td>
              <td>
                <div>
                  <small>24 Sep 2025</small><br>
                  <small class="text-muted">10:30</small>
                </div>
              </td>
              <td>
                <div class="text-danger">
                  <small><strong>1h 30m</strong></small><br>
                  <small class="text-muted">Overdue</small>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('v3tiket.detail', 'TKT-001') }}">
                      <i class="ti ti-eye me-2"></i>Detail
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('v3tiket.handle', 'TKT-001') }}">
                      <i class="ti ti-tool me-2"></i>Handle
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-success" href="#">
                      <i class="ti ti-check me-2"></i>Resolve
                    </a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <!-- Row 2 -->
            <tr>
              <td>
                <input type="checkbox" class="form-check-input">
              </td>
              <td>
                <a href="{{ route('v3tiket.detail', 'TKT-002') }}" class="fw-bold text-primary">
                  TKT-002
                </a>
              </td>
              <td>
                <span class="badge bg-label-warning">
                  <i class="ti ti-home me-1"></i>
                  FTTH
                </span>
              </td>
              <td>
                <div>
                  <div class="fw-medium">Rumah Pak Budi</div>
                  <small class="text-muted">FT-2024-156</small>
                </div>
              </td>
              <td>
                <span class="badge bg-label-danger">Internet Putus</span>
              </td>
              <td>
                <span class="badge bg-info">New</span>
              </td>
              <td>
                <span class="badge bg-warning text-dark">High</span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-xs me-2">
                    <div class="avatar-initial bg-info rounded-circle">
                      NOC
                    </div>
                  </div>
                  <small>NOC Team</small>
                </div>
              </td>
              <td>
                <div>
                  <small>24 Sep 2025</small><br>
                  <small class="text-muted">12:15</small>
                </div>
              </td>
              <td>
                <div class="text-success">
                  <small><strong>3h 45m</strong></small><br>
                  <small class="text-muted">On Time</small>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('v3tiket.detail', 'TKT-002') }}">
                      <i class="ti ti-eye me-2"></i>Detail
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('v3tiket.handle', 'TKT-002') }}">
                      <i class="ti ti-tool me-2"></i>Handle
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-warning" href="#">
                      <i class="ti ti-user-plus me-2"></i>Assign
                    </a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <!-- Row 3 -->
            <tr>
              <td>
                <input type="checkbox" class="form-check-input">
              </td>
              <td>
                <a href="{{ route('v3tiket.detail', 'TKT-003') }}" class="fw-bold text-primary">
                  TKT-003
                </a>
              </td>
              <td>
                <span class="badge bg-label-primary">
                  <i class="ti ti-network me-1"></i>
                  Converter FO
                </span>
              </td>
              <td>
                <div>
                  <div class="fw-medium">CV Berkah</div>
                  <small class="text-muted">CV-2024-045</small>
                </div>
              </td>
              <td>
                <span class="badge bg-label-warning">Koneksi Tidak Stabil</span>
              </td>
              <td>
                <span class="badge bg-success">Resolved</span>
              </td>
              <td>
                <span class="badge bg-success">Medium</span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-xs me-2">
                    <div class="avatar-initial bg-success rounded-circle">
                      TB
                    </div>
                  </div>
                  <small>Teknisi B</small>
                </div>
              </td>
              <td>
                <div>
                  <small>23 Sep 2025</small><br>
                  <small class="text-muted">14:20</small>
                </div>
              </td>
              <td>
                <div class="text-success">
                  <small><strong>Completed</strong></small><br>
                  <small class="text-muted">2h early</small>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('v3tiket.detail', 'TKT-003') }}">
                      <i class="ti ti-eye me-2"></i>Detail
                    </a></li>
                    <li><a class="dropdown-item" href="#">
                      <i class="ti ti-star me-2"></i>Rate
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-info" href="#">
                      <i class="ti ti-refresh me-2"></i>Reopen
                    </a></li>
                  </ul>
                </div>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    
    <!-- Pagination -->
    <div class="card-footer">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">Showing 1 to 3 of 247 results</small>
        </div>
        <nav>
          <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

  </div>

</div>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    // Infrastructure filter handler
    document.getElementById('infrastructureFilter').addEventListener('change', function() {
        filterTickets();
    });
    
    // Status filter handler
    document.getElementById('statusFilter').addEventListener('change', function() {
        filterTickets();
    });
    
    // Priority filter handler
    document.getElementById('priorityFilter').addEventListener('change', function() {
        filterTickets();
    });
    
    // Search handler
    document.getElementById('searchInput').addEventListener('input', function() {
        searchTickets();
    });
});

function filterTickets() {
    const infrastructure = document.getElementById('infrastructureFilter').value;
    const status = document.getElementById('statusFilter').value;
    const priority = document.getElementById('priorityFilter').value;
    
    console.log('Filtering tickets:', {infrastructure, status, priority});
    // TODO: Implement AJAX filtering
}

function searchTickets() {
    const searchTerm = document.getElementById('searchInput').value;
    console.log('Searching tickets:', searchTerm);
    // TODO: Implement AJAX search
}

// Bulk actions
document.querySelector('input[type="checkbox"]').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>

@endsection