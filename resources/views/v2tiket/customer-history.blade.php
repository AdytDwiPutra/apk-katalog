{{-- FILE: resources/views/v2tiket/customer-history.blade.php --}}
@extends('layouts.master')

@section('title', 'Customer History - ' . $customerId)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-history text-primary me-2"></i>Customer History - {{ $customerId }}
            </h4>
            <p class="text-muted mb-0">Complete ticket history and customer interaction timeline</p>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-primary" onclick="exportHistory()">
              <i class="ti ti-download me-2"></i>Export History
            </button>
            <a href="{{ route('v2tiket.list') }}" class="btn btn-secondary">
              <i class="ti ti-arrow-left me-2"></i>Back to List
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Customer Profile -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xl me-3">
                  <span class="avatar-initial rounded-circle bg-label-primary fs-3">BS</span>
                </div>
                <div>
                  <h5 class="mb-1">Budi Santoso</h5>
                  <p class="text-muted mb-1">{{ $customerId }} • Customer since March 2024</p>
                  <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-label-success">Active Customer</span>
                    <span class="badge bg-label-info">Fiber 20 Mbps</span>
                    <span class="badge bg-label-warning">VIP Support</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row text-center">
                <div class="col-4">
                  <h4 class="text-primary mb-0">15</h4>
                  <small class="text-muted">Total Tickets</small>
                </div>
                <div class="col-4">
                  <h4 class="text-success mb-0">93%</h4>
                  <small class="text-muted">Resolution Rate</small>
                </div>
                <div class="col-4">
                  <h4 class="text-info mb-0">4.8</h4>
                  <small class="text-muted">Satisfaction</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Statistics & Filter -->
  <div class="row mb-4">
    <!-- Quick Stats -->
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-pie me-2"></i>Ticket Statistics
          </h5>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded bg-label-success">
                    <i class="ti ti-check"></i>
                  </span>
                </div>
                <div>
                  <h6 class="mb-0">12</h6>
                  <small class="text-muted">Resolved</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded bg-label-warning">
                    <i class="ti ti-clock"></i>
                  </span>
                </div>
                <div>
                  <h6 class="mb-0">2</h6>
                  <small class="text-muted">In Progress</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded bg-label-danger">
                    <i class="ti ti-x"></i>
                  </span>
                </div>
                <div>
                  <h6 class="mb-0">1</h6>
                  <small class="text-muted">Cancelled</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded bg-label-info">
                    <i class="ti ti-clock-hour-2"></i>
                  </span>
                </div>
                <div>
                  <h6 class="mb-0">2.3h</h6>
                  <small class="text-muted">Avg Resolution</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Filters -->
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-filter me-2"></i>Filter History
          </h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Time Period</label>
            <select class="form-select form-select-sm" id="timePeriod" onchange="filterHistory()">
              <option value="all">All Time</option>
              <option value="30">Last 30 days</option>
              <option value="90">Last 3 months</option>
              <option value="180">Last 6 months</option>
              <option value="365">Last year</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select form-select-sm" id="statusFilter" onchange="filterHistory()">
              <option value="all">All Status</option>
              <option value="resolved">Resolved</option>
              <option value="in_progress">In Progress</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
          <button class="btn btn-outline-secondary btn-sm w-100" onclick="resetFilters()">
            <i class="ti ti-filter-off me-1"></i>Reset Filters
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Ticket History -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-list me-2"></i>Ticket History
          </h5>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-primary" onclick="createNewTicket()">
              <i class="ti ti-plus me-1"></i>New Ticket
            </button>
            <button class="btn btn-sm btn-outline-secondary" onclick="refreshHistory()">
              <i class="ti ti-refresh"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="historyTable">
              <thead>
                <tr>
                  <th>Ticket #</th>
                  <th>Date</th>
                  <th>Problem</th>
                  <th>Category</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Resolution Time</th>
                  <th>Satisfaction</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Current Active Ticket -->
                <tr class="table-warning">
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-001') }}" class="fw-bold text-primary">#TKT-001</a>
                  </td>
                  <td>
                    <small>2025-09-24<br>10:15</small>
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
                  <td>
                    <span class="text-muted">In progress...</span>
                  </td>
                  <td>-</td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary" onclick="viewTicket('TKT-001')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <!-- Recent Tickets -->
                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-087') }}" class="fw-bold text-primary">#TKT-087</a>
                  </td>
                  <td>
                    <small>2025-09-10<br>14:30</small>
                  </td>
                  <td>Internet putus-nyambung</td>
                  <td>
                    <span class="badge bg-label-info">Internet Issues</span>
                  </td>
                  <td>
                    <span class="badge bg-label-danger">High</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">4h 15m</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>5.0</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-087')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-075') }}" class="fw-bold text-primary">#TKT-075</a>
                  </td>
                  <td>
                    <small>2025-08-28<br>09:45</small>
                  </td>
                  <td>Lupa password WiFi</td>
                  <td>
                    <span class="badge bg-label-success">Password & Access</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Low</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">5m</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>5.0</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-075')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-065') }}" class="fw-bold text-primary">#TKT-065</a>
                  </td>
                  <td>
                    <small>2025-08-15<br>16:20</small>
                  </td>
                  <td>ONT tidak menyala</td>
                  <td>
                    <span class="badge bg-label-warning">Device Issues</span>
                  </td>
                  <td>
                    <span class="badge bg-label-danger">High</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">1h 30m</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>4.5</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-065')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-058') }}" class="fw-bold text-primary">#TKT-058</a>
                  </td>
                  <td>
                    <small>2025-07-22<br>11:10</small>
                  </td>
                  <td>Request upgrade paket</td>
                  <td>
                    <span class="badge bg-label-primary">Billing & Admin</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Low</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">2h 45m</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>4.8</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-058')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-045') }}" class="fw-bold text-primary">#TKT-045</a>
                  </td>
                  <td>
                    <small>2025-06-18<br>08:30</small>
                  </td>
                  <td>Ganti lokasi pemasangan</td>
                  <td>
                    <span class="badge bg-label-primary">Billing & Admin</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Medium</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">1 day</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>4.2</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-045')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-032') }}" class="fw-bold text-primary">#TKT-032</a>
                  </td>
                  <td>
                    <small>2025-05-25<br>15:45</small>
                  </td>
                  <td>Speed test tidak sesuai paket</td>
                  <td>
                    <span class="badge bg-label-info">Internet Issues</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Medium</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">3h 20m</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>4.7</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-032')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a href="{{ route('v2tiket.detail', 'TKT-018') }}" class="fw-bold text-primary">#TKT-018</a>
                  </td>
                  <td>
                    <small>2025-04-10<br>13:15</small>
                  </td>
                  <td>Installation - New customer</td>
                  <td>
                    <span class="badge bg-label-primary">Billing & Admin</span>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">Medium</span>
                  </td>
                  <td>
                    <span class="badge bg-label-success">Resolved</span>
                  </td>
                  <td>
                    <span class="text-success">2 days</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="text-warning me-1">⭐</span>
                      <span>5.0</span>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TKT-018')">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <nav aria-label="History pagination" class="mt-4">
            <ul class="pagination justify-content-between align-items-center">
              <li class="page-item">
                <span class="page-link">Showing 1 to 8 of 15 tickets</span>
              </li>
              <li class="d-flex">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
                <a class="page-link active" href="#">1</a>
                <a class="page-link" href="#">2</a>
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
function filterHistory() {
    const timePeriod = document.getElementById('timePeriod').value;
    const statusFilter = document.getElementById('statusFilter').value;
    
    // In real implementation, this would make AJAX call to filter results
    console.log('Filtering:', {timePeriod, statusFilter});
    
    Swal.fire({
        title: 'Filtering...',
        text: 'Loading filtered results',
        icon: 'info',
        showConfirmButton: false,
        timer: 1000
    }).then(() => {
        // Simulate filtered results
        Swal.fire('Filtered!', `Showing results for ${timePeriod === 'all' ? 'all time' : 'last ' + timePeriod + ' days'} with status: ${statusFilter}`, 'success');
    });
}

function resetFilters() {
    document.getElementById('timePeriod').value = 'all';
    document.getElementById('statusFilter').value = 'all';
    filterHistory();
}

function exportHistory() {
    Swal.fire({
        title: 'Export Customer History',
        text: 'Select export format',
        input: 'select',
        inputOptions: {
            'pdf': 'PDF Report',
            'excel': 'Excel Spreadsheet', 
            'csv': 'CSV Data'
        },
        showCancelButton: true,
        confirmButtonText: 'Export'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Exporting...', `Generating ${result.value.toUpperCase()} export`, 'success');
            // In real implementation, trigger download
        }
    });
}

function createNewTicket() {
    // Pre-fill customer data and redirect to create ticket
    const url = new URL("{{ route('v2tiket.create') }}");
    url.searchParams.set('customer_id', "{{ $customerId }}");
    window.location.href = url.toString();
}

function refreshHistory() {
    Swal.fire({
        title: 'Refreshing...',
        text: 'Loading latest ticket history',
        icon: 'info',
        showConfirmButton: false,
        timer: 1000
    }).then(() => {
        location.reload();
    });
}

function viewTicket(ticketId) {
    window.location.href = `/v2tiket/detail/${ticketId}`;
}

// Enhanced table interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects and enhanced interactions
    const tableRows = document.querySelectorAll('#historyTable tbody tr');
    
    tableRows.forEach(row => {
        row.addEventListener('click', function(e) {
            // Don't trigger on button clicks
            if (e.target.tagName === 'BUTTON' || e.target.tagName === 'I' || e.target.tagName === 'A') {
                return;
            }
            
            // Get ticket ID from the row
            const ticketLink = row.querySelector('a[href*="detail"]');
            if (ticketLink) {
                window.location.href = ticketLink.href;
            }
        });
        
        // Add cursor pointer to indicate clickable rows
        row.style.cursor = 'pointer';
    });
});

// Real-time updates simulation
setInterval(function() {
    // Check for ticket status updates
    const activeTickets = document.querySelectorAll('.table-warning');
    if (activeTickets.length > 0) {
        console.log('Checking for ticket updates...');
        // In real implementation, make AJAX call to check for updates
    }
}, 30000); // Check every 30 seconds
</script>
@endsection