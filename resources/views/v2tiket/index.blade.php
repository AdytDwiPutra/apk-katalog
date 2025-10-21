
@extends('layouts.master')

@section('title', 'NOC Dashboard V2 - Ticket Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-router text-primary me-2"></i>NOC Dashboard V2
            </h4>
            <p class="text-muted mb-0">Network Operations Center & Ticket Management</p>
          </div>
          <div>
            <a href="{{ route('v2tiket.create') }}" class="btn btn-primary">
              <i class="ti ti-plus me-2"></i>New Ticket
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Network Status & Stats -->
  <div class="row mb-4">
    <!-- Network Status Card -->
    <div class="col-lg-4 col-md-6 col-12 mb-4">
      <div class="card h-100" style="background: linear-gradient(135deg, #28a745, #20c997);">
        <div class="card-body text-white">
          <div class="d-flex justify-content-between">
            <div>
              <h5 class="fw-bold text-white">
                <i class="ti ti-wifi me-2"></i>Network Status
              </h5>
              <p class="mb-0 text-white-50">Real-time monitoring</p>
            </div>
            <div class="text-end">
              <span class="badge bg-light text-success">ALL SYSTEMS OPERATIONAL</span>
            </div>
          </div>
          
          <div class="row text-center mt-4">
            <div class="col-4">
              <h3 class="fw-bold text-white">98.5%</h3>
              <small class="text-white-50">Uptime</small>
            </div>
            <div class="col-4">
              <h3 class="fw-bold text-white">1,247</h3>
              <small class="text-white-50">Active Users</small>
            </div>
            <div class="col-4">
              <h3 class="fw-bold text-white">5</h3>
              <small class="text-white-50">Open Tickets</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="col-lg-8 col-md-6 col-12 mb-4">
      <div class="card h-100">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-dots me-2"></i>Today's Overview
          </h5>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-6 col-lg-3">
              <div class="d-flex align-items-center">
                <div class="avatar me-3">
                  <span class="avatar-initial rounded bg-label-success">
                    <i class="ti ti-check"></i>
                  </span>
                </div>
                <div>
                  <h5 class="mb-0">24</h5>
                  <small class="text-muted">Resolved</small>
                </div>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="d-flex align-items-center">
                <div class="avatar me-3">
                  <span class="avatar-initial rounded bg-label-warning">
                    <i class="ti ti-clock"></i>
                  </span>
                </div>
                <div>
                  <h5 class="mb-0">8</h5>
                  <small class="text-muted">In Progress</small>
                </div>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="d-flex align-items-center">
                <div class="avatar me-3">
                  <span class="avatar-initial rounded bg-label-danger">
                    <i class="ti ti-alert-circle"></i>
                  </span>
                </div>
                <div>
                  <h5 class="mb-0">3</h5>
                  <small class="text-muted">Critical</small>
                </div>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="d-flex align-items-center">
                <div class="avatar me-3">
                  <span class="avatar-initial rounded bg-label-info">
                    <i class="ti ti-users"></i>
                  </span>
                </div>
                <div>
                  <h5 class="mb-0">156</h5>
                  <small class="text-muted">Customers</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-lightning me-2"></i>Quick Actions
          </h5>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-lg-3 col-md-6">
              <div class="card border border-primary" style="cursor: pointer;" onclick="window.location.href='{{ route('v2tiket.create') }}'">
                <div class="card-body text-center py-4">
                  <div class="avatar avatar-lg mx-auto mb-3">
                    <span class="avatar-initial rounded bg-label-primary">
                      <i class="ti ti-plus fs-4"></i>
                    </span>
                  </div>
                  <h6 class="mb-1">New Ticket</h6>
                  <small class="text-muted">Create customer ticket</small>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
              <div class="card border border-info" style="cursor: pointer;" onclick="runDiagnostic()">
                <div class="card-body text-center py-4">
                  <div class="avatar avatar-lg mx-auto mb-3">
                    <span class="avatar-initial rounded bg-label-info">
                      <i class="ti ti-search fs-4"></i>
                    </span>
                  </div>
                  <h6 class="mb-1">Remote Diagnostic</h6>
                  <small class="text-muted">Test customer connection</small>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
              <div class="card border border-warning" style="cursor: pointer;" onclick="showCustomerHistory()">
                <div class="card-body text-center py-4">
                  <div class="avatar avatar-lg mx-auto mb-3">
                    <span class="avatar-initial rounded bg-label-warning">
                      <i class="ti ti-clock-history fs-4"></i>
                    </span>
                  </div>
                  <h6 class="mb-1">Customer History</h6>
                  <small class="text-muted">View past tickets</small>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
              <div class="card border border-success" style="cursor: pointer;" onclick="window.location.href='{{ route('v2tiket.monitoring') }}'">
                <div class="card-body text-center py-4">
                  <div class="avatar avatar-lg mx-auto mb-3">
                    <span class="avatar-initial rounded bg-label-success">
                      <i class="ti ti-graph-up fs-4"></i>
                    </span>
                  </div>
                  <h6 class="mb-1">Network Monitoring</h6>
                  <small class="text-muted">Infrastructure status</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Active Tickets -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-ticket me-2"></i>Active Tickets
          </h5>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-primary" onclick="refreshTickets()">
              <i class="ti ti-refresh me-1"></i>Refresh
            </button>
            <a href="{{ route('v2tiket.list') }}" class="btn btn-sm btn-primary">
              <i class="ti ti-list me-1"></i>View All
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Ticket #</th>
                  <th>Customer</th>
                  <th>Problem</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Assigned</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-001') }}" class="fw-bold text-primary">#TKT-001</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">Budi Santoso</span><br>
                      <small class="text-muted">CID-12345</small>
                    </div>
                  </td>
                  <td>Internet lambat</td>
                  <td>
                    <span class="badge bg-label-warning">Medium</span>
                  </td>
                  <td>
                    <span class="badge bg-label-primary">Remote Trying</span>
                  </td>
                  <td>NOC Team</td>
                  <td>
                    <small class="text-muted">2 min ago</small>
                  </td>
                  <td>
                    <div class="d-flex gap-1">
                      <button class="btn btn-sm btn-outline-primary" onclick="handleTicket('TKT-001')">
                        <i class="ti ti-edit"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-success" onclick="resolveTicket('TKT-001')">
                        <i class="ti ti-check"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-warning" onclick="escalateTicket('TKT-001')">
                        <i class="ti ti-arrow-up"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-002') }}" class="fw-bold text-primary">#TKT-002</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">Siti Aminah</span><br>
                      <small class="text-muted">CID-67890</small>
                    </div>
                  </td>
                  <td>ONT mati total</td>
                  <td>
                    <span class="badge bg-label-danger">High</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Field Assigned</span>
                  </td>
                  <td>Teknisi Ahmad</td>
                  <td>
                    <small class="text-muted">15 min ago</small>
                  </td>
                  <td>
                    <div class="d-flex gap-1">
                      <button class="btn btn-sm btn-outline-primary" onclick="handleTicket('TKT-002')">
                        <i class="ti ti-edit"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-info" onclick="trackTicket('TKT-002')">
                        <i class="ti ti-map-pin"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-003') }}" class="fw-bold text-primary">#TKT-003</a>
                  </td>
                  <td>
                    <div>
                      <span class="fw-medium">PT Maju Jaya</span><br>
                      <small class="text-muted">CID-11111</small>
                    </div>
                  </td>
                  <td>Ganti password WiFi</td>
                  <td>
                    <span class="badge bg-label-success">Low</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>NOC Team</td>
                  <td>
                    <small class="text-muted">1 hour ago</small>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" disabled>
                      <i class="ti ti-check"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
function runDiagnostic() {
    Swal.fire({
        title: 'Remote Diagnostic',
        text: 'Enter Customer ID to run diagnostic test',
        input: 'text',
        inputPlaceholder: 'CID-xxxxx',
        showCancelButton: true,
        confirmButtonText: 'Run Test',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Running...', 'Diagnostic test in progress', 'info');
            // Add AJAX call here
        }
    });
}

function showCustomerHistory() {
    Swal.fire({
        title: 'Customer History',
        text: 'Enter Customer ID to view history',
        input: 'text',
        inputPlaceholder: 'CID-xxxxx',
        showCancelButton: true,
        confirmButtonText: 'View History',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to history page
            window.location.href = `/v2tiket/customer-history/${result.value}`;
        }
    });
}

function handleTicket(ticketId) {
    window.location.href = `{{ route('v2tiket.handle', '') }}/${ticketId}`;
}

function resolveTicket(ticketId) {
    Swal.fire({
        title: 'Resolve Ticket?',
        text: 'Mark this ticket as resolved?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Resolve',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Add AJAX call to resolve ticket
            Swal.fire('Resolved!', 'Ticket has been resolved.', 'success');
        }
    });
}

function escalateTicket(ticketId) {
    window.location.href = `{{ route('v2tiket.escalate', '') }}/${ticketId}`;
}

function refreshTickets() {
    Swal.fire('Refreshing...', 'Loading latest tickets', 'info');
    setTimeout(() => {
        location.reload();
    }, 1000);
}

function trackTicket(ticketId) {
    Swal.fire('Tracking', 'Opening technician location...', 'info');
    // Add tracking functionality
}
</script>
@endsection