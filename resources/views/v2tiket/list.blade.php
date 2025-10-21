{{-- FILE: resources/views/v2tiket/list.blade.php --}}
@extends('layouts.master')

@section('title', 'All Tickets - NOC Dashboard V2')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-list text-primary me-2"></i>All Tickets
            </h4>
            <p class="text-muted mb-0">Complete ticket management & tracking system</p>
          </div>
          <div class="d-flex gap-2">
            <a href="{{ route('v2tiket.create') }}" class="btn btn-primary">
              <i class="ti ti-plus me-2"></i>New Ticket
            </a>
            <a href="{{ route('v2tiket.index') }}" class="btn btn-secondary">
              <i class="ti ti-arrow-left me-2"></i>Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Filters & Search -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-filter me-2"></i>Filters & Search
          </h5>
        </div>
        <div class="card-body">
          <form id="filterForm" method="GET">
            <div class="row g-3">
              <!-- Search -->
              <div class="col-lg-3 col-md-6">
                <label class="form-label">Search</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="search" name="search" 
                         placeholder="Ticket #, Customer, Phone..." value="{{ request('search') }}">
                  <button class="btn btn-outline-primary" type="button" onclick="searchTickets()">
                    <i class="ti ti-search"></i>
                  </button>
                </div>
              </div>

              <!-- Status Filter -->
              <div class="col-lg-2 col-md-6">
                <label class="form-label">Status</label>
                <select class="form-select" id="status" name="status" onchange="applyFilters()">
                  <option value="">All Status</option>
                  <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                  <option value="remote_trying" {{ request('status') == 'remote_trying' ? 'selected' : '' }}>Remote Trying</option>
                  <option value="field_assigned" {{ request('status') == 'field_assigned' ? 'selected' : '' }}>Field Assigned</option>
                  <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                  <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                  <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
              </div>

              <!-- Priority Filter -->
              <div class="col-lg-2 col-md-6">
                <label class="form-label">Priority</label>
                <select class="form-select" id="priority" name="priority" onchange="applyFilters()">
                  <option value="">All Priorities</option>
                  <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                  <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                  <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                  <option value="critical" {{ request('priority') == 'critical' ? 'selected' : '' }}>Critical</option>
                </select>
              </div>

              <!-- Category Filter -->
              <div class="col-lg-2 col-md-6">
                <label class="form-label">Category</label>
                <select class="form-select" id="category" name="category" onchange="applyFilters()">
                  <option value="">All Categories</option>
                  <option value="internet_issues" {{ request('category') == 'internet_issues' ? 'selected' : '' }}>Internet Issues</option>
                  <option value="device_issues" {{ request('category') == 'device_issues' ? 'selected' : '' }}>Device Issues</option>
                  <option value="password_access" {{ request('category') == 'password_access' ? 'selected' : '' }}>Password & Access</option>
                  <option value="billing_admin" {{ request('category') == 'billing_admin' ? 'selected' : '' }}>Billing & Admin</option>
                  <option value="infrastructure" {{ request('category') == 'infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                </select>
              </div>

              <!-- Date Range -->
              <div class="col-lg-3 col-md-6">
                <label class="form-label">Date Range</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                  <span class="input-group-text">to</span>
                  <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12">
                <button type="button" class="btn btn-primary me-2" onclick="applyFilters()">
                  <i class="ti ti-filter me-2"></i>Apply Filters
                </button>
                <button type="button" class="btn btn-outline-secondary me-2" onclick="clearFilters()">
                  <i class="ti ti-filter-off me-2"></i>Clear
                </button>
                <button type="button" class="btn btn-outline-success" onclick="exportTickets()">
                  <i class="ti ti-download me-2"></i>Export
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Tickets Statistics -->
  <div class="row mb-4">
    <div class="col-lg-3 col-md-6 col-12 mb-3">
      <div class="card border border-primary">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-2">
            <span class="avatar-initial rounded bg-label-primary">
              <i class="ti ti-ticket"></i>
            </span>
          </div>
          <h4 class="mb-0 text-primary">247</h4>
          <small class="text-muted">Total Tickets</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12 mb-3">
      <div class="card border border-warning">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-2">
            <span class="avatar-initial rounded bg-label-warning">
              <i class="ti ti-clock"></i>
            </span>
          </div>
          <h4 class="mb-0 text-warning">23</h4>
          <small class="text-muted">In Progress</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12 mb-3">
      <div class="card border border-success">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-2">
            <span class="avatar-initial rounded bg-label-success">
              <i class="ti ti-check"></i>
            </span>
          </div>
          <h4 class="mb-0 text-success">198</h4>
          <small class="text-muted">Resolved</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12 mb-3">
      <div class="card border border-info">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-2">
            <span class="avatar-initial rounded bg-label-info">
              <i class="ti ti-chart-line"></i>
            </span>
          </div>
          <h4 class="mb-0 text-info">92%</h4>
          <small class="text-muted">Success Rate</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Tickets Table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-list me-2"></i>Tickets List
          </h5>
          <div class="d-flex gap-2">
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="ti ti-settings me-1"></i>Bulk Actions
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="bulkAction('resolve')">
                  <i class="ti ti-check me-2"></i>Mark as Resolved</a></li>
                <li><a class="dropdown-item" href="#" onclick="bulkAction('close')">
                  <i class="ti ti-x me-2"></i>Close Tickets</a></li>
                <li><a class="dropdown-item" href="#" onclick="bulkAction('escalate')">
                  <i class="ti ti-arrow-up me-2"></i>Escalate to Field</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick="bulkAction('export')">
                  <i class="ti ti-download me-2"></i>Export Selected</a></li>
              </ul>
            </div>
            <button class="btn btn-sm btn-outline-secondary" onclick="refreshTable()">
              <i class="ti ti-refresh"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="ticketsTable">
              <thead>
                <tr>
                  <th>
                    <input type="checkbox" class="form-check-input" id="selectAll" onchange="toggleSelectAll()">
                  </th>
                  <th>Ticket #</th>
                  <th>Customer</th>
                  <th>Problem</th>
                  <th>Category</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Assigned To</th>
                  <th>Created</th>
                  <th>Last Update</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Ticket Row 1 -->
                <tr>
                  <td>
                    <input type="checkbox" class="form-check-input ticket-checkbox" value="TKT-001">
                  </td>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-001') }}" class="fw-bold text-primary">#TKT-001</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">Budi Santoso</span><br>
                      <small class="text-muted">CID-12345 • 081234567890</small>
                    </div>
                  </td>
                  <td>Internet lambat sejak kemarin</td>
                  <td>
                    <span class="badge bg-label-info">Internet Issues</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Medium</span>
                  </td>
                  <td>
                    <span class="badge bg-label-primary">Remote Trying</span>
                  </td>
                  <td>NOC Team</td>
                  <td>
                    <small class="text-muted">2025-09-24<br>10:15</small>
                  </td>
                  <td>
                    <small class="text-muted">2 min ago</small>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v2tiket.handle', 'TKT-001') }}">
                          <i class="ti ti-edit me-2"></i>Handle</a></li>
                        <li><a class="dropdown-item" href="{{ route('v2tiket.detail', 'TKT-001') }}">
                          <i class="ti ti-eye me-2"></i>View Detail</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="resolveTicket('TKT-001')">
                          <i class="ti ti-check me-2"></i>Mark Resolved</a></li>
                        <li><a class="dropdown-item" href="#" onclick="escalateTicket('TKT-001')">
                          <i class="ti ti-arrow-up me-2"></i>Escalate</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <!-- Ticket Row 2 -->
                <tr>
                  <td>
                    <input type="checkbox" class="form-check-input ticket-checkbox" value="TKT-002">
                  </td>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-002') }}" class="fw-bold text-primary">#TKT-002</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">Siti Aminah</span><br>
                      <small class="text-muted">CID-67890 • 081987654321</small>
                    </div>
                  </td>
                  <td>ONT mati total, tidak ada indikator</td>
                  <td>
                    <span class="badge bg-label-warning">Device Issues</span>
                  </td>
                  <td>
                    <span class="badge bg-label-danger">High</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Field Assigned</span>
                  </td>
                  <td>Teknisi Ahmad</td>
                  <td>
                    <small class="text-muted">2025-09-24<br>09:45</small>
                  </td>
                  <td>
                    <small class="text-muted">15 min ago</small>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v2tiket.detail', 'TKT-002') }}">
                          <i class="ti ti-eye me-2"></i>View Detail</a></li>
                        <li><a class="dropdown-item" href="#" onclick="trackTechnician('TKT-002')">
                          <i class="ti ti-map-pin me-2"></i>Track Technician</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="contactCustomer('TKT-002')">
                          <i class="ti ti-phone me-2"></i>Call Customer</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <!-- Ticket Row 3 -->
                <tr>
                  <td>
                    <input type="checkbox" class="form-check-input ticket-checkbox" value="TKT-003">
                  </td>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-003') }}" class="fw-bold text-primary">#TKT-003</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">PT Maju Jaya</span><br>
                      <small class="text-muted">CID-11111 • 021-12345678</small>
                    </div>
                  </td>
                  <td>Request ganti password WiFi</td>
                  <td>
                    <span class="badge bg-label-success">Password & Access</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Low</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>NOC Team</td>
                  <td>
                    <small class="text-muted">2025-09-24<br>08:30</small>
                  </td>
                  <td>
                    <small class="text-muted">1 hour ago</small>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v2tiket.detail', 'TKT-003') }}">
                          <i class="ti ti-eye me-2"></i>View Detail</a></li>
                        <li><a class="dropdown-item" href="#" onclick="closeTicket('TKT-003')">
                          <i class="ti ti-x me-2"></i>Close Ticket</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="reopenTicket('TKT-003')">
                          <i class="ti ti-refresh me-2"></i>Reopen</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <!-- Ticket Row 4 -->
                <tr>
                  <td>
                    <input type="checkbox" class="form-check-input ticket-checkbox" value="TKT-004">
                  </td>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-004') }}" class="fw-bold text-primary">#TKT-004</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">Andi Wijaya</span><br>
                      <small class="text-muted">CID-55555 • 081666777888</small>
                    </div>
                  </td>
                  <td>Billing issue - tagihan dobel bulan ini</td>
                  <td>
                    <span class="badge bg-label-primary">Billing & Admin</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Medium</span>
                  </td>
                  <td>
                    <span class="badge bg-label-info">In Progress</span>
                  </td>
                  <td>Admin Team</td>
                  <td>
                    <small class="text-muted">2025-09-24<br>07:15</small>
                  </td>
                  <td>
                    <small class="text-muted">30 min ago</small>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v2tiket.detail', 'TKT-004') }}">
                          <i class="ti ti-eye me-2"></i>View Detail</a></li>
                        <li><a class="dropdown-item" href="#" onclick="resolveTicket('TKT-004')">
                          <i class="ti ti-check me-2"></i>Mark Resolved</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="contactCustomer('TKT-004')">
                          <i class="ti ti-phone me-2"></i>Call Customer</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <!-- Ticket Row 5 -->
                <tr class="table-danger">
                  <td>
                    <input type="checkbox" class="form-check-input ticket-checkbox" value="TKT-005">
                  </td>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-005') }}" class="fw-bold text-primary">#TKT-005</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">Area Kelapa Gading</span><br>
                      <small class="text-muted">Multiple customers</small>
                    </div>
                  </td>
                  <td>Fiber backbone putus - 150+ customers affected</td>
                  <td>
                    <span class="badge bg-label-danger">Infrastructure</span>
                  </td>
                  <td>
                    <span class="badge bg-danger">Critical</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Field Assigned</span>
                  </td>
                  <td>Team Leader + 3 Teknisi</td>
                  <td>
                    <small class="text-muted">2025-09-24<br>06:00</small>
                  </td>
                  <td>
                    <small class="text-muted">5 min ago</small>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v2tiket.detail', 'TKT-005') }}">
                          <i class="ti ti-eye me-2"></i>View Detail</a></li>
                        <li><a class="dropdown-item" href="#" onclick="trackTechnician('TKT-005')">
                          <i class="ti ti-map-pin me-2"></i>Track Team</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="notifyCustomers('TKT-005')">
                          <i class="ti ti-bell me-2"></i>Notify Affected Customers</a></li>
                        <li><a class="dropdown-item" href="#" onclick="escalateToOwner('TKT-005')">
                          <i class="ti ti-alert-circle me-2"></i>Escalate to Owner</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <nav aria-label="Tickets pagination" class="mt-4">
            <ul class="pagination justify-content-between align-items-center">
              <li class="page-item">
                <span class="page-link">Showing 1 to 5 of 247 tickets</span>
              </li>
              <li class="d-flex">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
                <a class="page-link active" href="#">1</a>
                <a class="page-link" href="#">2</a>
                <a class="page-link" href="#">3</a>
                <a class="page-link" href="#">...</a>
                <a class="page-link" href="#">50</a>
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
// Search and Filter Functions
function searchTickets() {
    applyFilters();
}

function applyFilters() {
    const form = document.getElementById('filterForm');
    const formData = new FormData(form);
    const params = new URLSearchParams(formData);
    
    // Update URL with filters (for Laravel pagination/filtering)
    window.location.href = `{{ route('v2tiket.list') }}?${params.toString()}`;
}

function clearFilters() {
    document.getElementById('filterForm').reset();
    window.location.href = "{{ route('v2tiket.list') }}";
}

function exportTickets() {
    const selectedTickets = getSelectedTickets();
    if (selectedTickets.length > 0) {
        Swal.fire({
            title: 'Export Selected Tickets?',
            text: `Export ${selectedTickets.length} selected tickets`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Export',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Add export logic here
                Swal.fire('Exporting...', 'Download will start shortly', 'success');
            }
        });
    } else {
        Swal.fire({
            title: 'Export All Tickets?',
            text: 'This will export all tickets based on current filters',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Export All',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('/v2tiket/export?' + new URLSearchParams(new FormData(document.getElementById('filterForm'))).toString());
            }
        });
    }
}

// Selection Functions
function toggleSelectAll() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.ticket-checkbox');
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAll.checked;
    });
}

function getSelectedTickets() {
    const checkboxes = document.querySelectorAll('.ticket-checkbox:checked');
    return Array.from(checkboxes).map(cb => cb.value);
}

// Bulk Actions
function bulkAction(action) {
    const selectedTickets = getSelectedTickets();
    
    if (selectedTickets.length === 0) {
        Swal.fire('No Selection', 'Please select tickets first', 'warning');
        return;
    }
    
    switch(action) {
        case 'resolve':
            Swal.fire({
                title: 'Mark as Resolved?',
                text: `Mark ${selectedTickets.length} tickets as resolved`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Resolve'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Add bulk resolve logic
                    Swal.fire('Resolved!', 'Selected tickets marked as resolved', 'success');
                }
            });
            break;
            
        case 'close':
            Swal.fire({
                title: 'Close Tickets?',
                text: `Close ${selectedTickets.length} tickets`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Add bulk close logic
                    Swal.fire('Closed!', 'Selected tickets have been closed', 'success');
                }
            });
            break;
            
        case 'escalate':
            Swal.fire({
                title: 'Escalate to Field?',
                text: `Escalate ${selectedTickets.length} tickets to field technicians`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes, Escalate'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Add bulk escalate logic
                    Swal.fire('Escalated!', 'Selected tickets escalated to field team', 'success');
                }
            });
            break;
            
        case 'export':
            exportTickets();
            break;
    }
}

// Individual Ticket Actions
function resolveTicket(ticketId) {
    Swal.fire({
        title: 'Mark as Resolved?',
        text: `Mark ticket ${ticketId} as resolved`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Resolve'
    }).then((result) => {
        if (result.isConfirmed) {
            // Add resolve logic
            Swal.fire('Resolved!', 'Ticket marked as resolved', 'success');
        }
    });
}

function escalateTicket(ticketId) {
    window.location.href = `{{ route('v2tiket.escalate', '') }}/${ticketId}`;
}

function closeTicket(ticketId) {
    Swal.fire({
        title: 'Close Ticket?',
        text: 'This action cannot be undone',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Close'
    }).then((result) => {
        if (result.isConfirmed) {
            // Add close logic
            Swal.fire('Closed!', 'Ticket has been closed', 'success');
        }
    });
}

function reopenTicket(ticketId) {
    Swal.fire({
        title: 'Reopen Ticket?',
        text: 'Ticket will be reopened and assigned for handling',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reopen'
    }).then((result) => {
        if (result.isConfirmed) {
            // Add reopen logic
            Swal.fire('Reopened!', 'Ticket has been reopened', 'success');
        }
    });
}

function trackTechnician(ticketId) {
    Swal.fire('Opening Map...', 'Loading technician location', 'info');
    // Add tracking logic
}

function contactCustomer(ticketId) {
    Swal.fire({
        title: 'Contact Customer',
        html: `
            <div class="text-start">
                <button class="btn btn-success w-100 mb-2" onclick="window.location.href='tel:+6281234567890'">
                    <i class="ti ti-phone me-2"></i>Call Customer
                </button>
                <button class="btn btn-info w-100 mb-2" onclick="window.open('https://wa.me/6281234567890', '_blank')">
                    <i class="ti ti-brand-whatsapp me-2"></i>WhatsApp
                </button>
                <button class="btn btn-primary w-100" onclick="window.location.href='sms:+6281234567890'">
                    <i class="ti ti-message me-2"></i>Send SMS
                </button>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true
    });
}

function notifyCustomers(ticketId) {
    Swal.fire({
        title: 'Notify Affected Customers',
        text: 'Send notification to all affected customers about the outage',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Send Notification'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Sending...', 'Notifications being sent to customers', 'success');
        }
    });
}

function escalateToOwner(ticketId) {
    Swal.fire({
        title: 'Escalate to Owner',
        text: 'This will immediately notify the owner about this critical issue',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Escalate'
    }).then((result) => {
        if (result.isConfirmed) {
            // Call owner immediately
            window.location.href = 'tel:+6281234567890';
        }
    });
}

function refreshTable() {
    Swal.fire('Refreshing...', 'Loading latest ticket data', 'info');
    setTimeout(() => {
        location.reload();
    }, 1000);
}

// Auto-refresh every 2 minutes for active tickets
setInterval(() => {
    const hasActiveTickets = document.querySelectorAll('.badge.bg-label-primary, .badge.bg-label-warning').length > 0;
    if (hasActiveTickets) {
        console.log('Auto-refreshing active tickets...');
        // Add AJAX refresh logic here
    }
}, 120000); // 2 minutes
</script>
@endsection