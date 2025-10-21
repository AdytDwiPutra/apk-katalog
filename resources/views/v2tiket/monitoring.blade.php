{{-- FILE: resources/views/v2tiket/monitoring.blade.php --}}
@extends('layouts.master')

@section('title', 'Network Monitoring - NOC Dashboard V2')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-graph-up text-primary me-2"></i>Network Monitoring
            </h4>
            <p class="text-muted mb-0">Real-time infrastructure monitoring & alerting system</p>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-primary" onclick="refreshAll()">
              <i class="ti ti-refresh me-2"></i>Refresh All
            </button>
            <a href="{{ route('v2tiket.index') }}" class="btn btn-secondary">
              <i class="ti ti-arrow-left me-2"></i>Back to Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Network Status Overview -->
  <div class="row mb-4">
    <!-- Overall Status -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="mb-1">Network Status</p>
              <h3 class="fw-bold text-success mb-0">Operational</h3>
              <small class="text-muted">All systems running</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-check fs-4"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Uptime -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="mb-1">Network Uptime</p>
              <h3 class="fw-bold text-info mb-0">99.8%</h3>
              <small class="text-muted">Last 30 days</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-clock fs-4"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Active Users -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="mb-1">Active Users</p>
              <h3 class="fw-bold text-primary mb-0">1,247</h3>
              <small class="text-success">+23 from yesterday</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-users fs-4"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bandwidth Usage -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="mb-1">Bandwidth Usage</p>
              <h3 class="fw-bold text-warning mb-0">67%</h3>
              <small class="text-muted">8.2 Gbps / 12 Gbps</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-chart-line fs-4"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- OLT Status -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-server me-2"></i>OLT Equipment Status
          </h5>
          <button class="btn btn-sm btn-outline-primary" onclick="refreshOLT()">
            <i class="ti ti-refresh"></i>
          </button>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <!-- OLT-01 -->
            <div class="col-lg-4 col-md-6">
              <div class="card border border-success">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">OLT-01 (Central)</h6>
                    <span class="badge bg-success">Online</span>
                  </div>
                  <div class="row text-center">
                    <div class="col-4">
                      <small class="text-muted">Active ONUs</small>
                      <h6 class="mb-0">324/512</h6>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">CPU</small>
                      <h6 class="mb-0">23%</h6>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Temp</small>
                      <h6 class="mb-0">42°C</h6>
                    </div>
                  </div>
                  <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 63%"></div>
                  </div>
                  <small class="text-muted">Port utilization: 63%</small>
                </div>
              </div>
            </div>

            <!-- OLT-02 -->
            <div class="col-lg-4 col-md-6">
              <div class="card border border-warning">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">OLT-02 (East)</h6>
                    <span class="badge bg-warning">Warning</span>
                  </div>
                  <div class="row text-center">
                    <div class="col-4">
                      <small class="text-muted">Active ONUs</small>
                      <h6 class="mb-0">458/512</h6>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">CPU</small>
                      <h6 class="mb-0">78%</h6>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Temp</small>
                      <h6 class="mb-0">58°C</h6>
                    </div>
                  </div>
                  <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 89%"></div>
                  </div>
                  <small class="text-muted">Port utilization: 89%</small>
                </div>
              </div>
            </div>

            <!-- OLT-03 -->
            <div class="col-lg-4 col-md-6">
              <div class="card border border-success">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">OLT-03 (West)</h6>
                    <span class="badge bg-success">Online</span>
                  </div>
                  <div class="row text-center">
                    <div class="col-4">
                      <small class="text-muted">Active ONUs</small>
                      <h6 class="mb-0">267/512</h6>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">CPU</small>
                      <h6 class="mb-0">31%</h6>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Temp</small>
                      <h6 class="mb-0">45°C</h6>
                    </div>
                  </div>
                  <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 52%"></div>
                  </div>
                  <small class="text-muted">Port utilization: 52%</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Live Traffic & Alerts -->
  <div class="row mb-4">
    <!-- Live Traffic -->
    <div class="col-lg-8 col-md-7">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-activity me-2"></i>Live Traffic Monitor
          </h5>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-6">
              <small class="text-muted">Download Traffic</small>
              <h6 class="mb-0 text-primary">4.2 Gbps</h6>
            </div>
            <div class="col-6">
              <small class="text-muted">Upload Traffic</small>
              <h6 class="mb-0 text-info">1.8 Gbps</h6>
            </div>
          </div>
          
          <!-- Mock Traffic Chart -->
          <div class="position-relative" style="height: 200px; background: #f8f9fa; border-radius: 8px;">
            <div class="d-flex align-items-center justify-content-center h-100">
              <div class="text-center">
                <i class="ti ti-chart-line fs-1 text-muted"></i>
                <p class="text-muted mb-0">Real-time traffic chart</p>
                <small class="text-muted">Integration with monitoring tools</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- System Alerts -->
    <div class="col-lg-4 col-md-5">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-bell me-2"></i>System Alerts
          </h5>
          <span class="badge bg-label-warning">3</span>
        </div>
        <div class="card-body">
          <div class="timeline timeline-advance">
            <!-- Alert 1 -->
            <div class="timeline-item timeline-item-warning">
              <span class="timeline-indicator timeline-indicator-warning">
                <i class="ti ti-alert-triangle"></i>
              </span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">High CPU Usage</h6>
                  <small class="text-muted">OLT-02 - 2 min ago</small>
                </div>
                <p class="mb-0 text-muted">CPU usage reached 78%. Consider load balancing.</p>
              </div>
            </div>

            <!-- Alert 2 -->
            <div class="timeline-item timeline-item-info">
              <span class="timeline-indicator timeline-indicator-info">
                <i class="ti ti-info-circle"></i>
              </span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Port Utilization</h6>
                  <small class="text-muted">OLT-02 - 15 min ago</small>
                </div>
                <p class="mb-0 text-muted">Port utilization at 89%. Plan capacity expansion.</p>
              </div>
            </div>

            <!-- Alert 3 -->
            <div class="timeline-item timeline-item-success">
              <span class="timeline-indicator timeline-indicator-success">
                <i class="ti ti-check"></i>
              </span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Service Restored</h6>
                  <small class="text-muted">Area Sunter - 1 hour ago</small>
                </div>
                <p class="mb-0 text-muted">Fiber cut issue resolved. All customers back online.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Infrastructure Status -->
  <div class="row">
    <!-- Core Network -->
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-network me-2"></i>Core Network Status
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Component</th>
                  <th>Status</th>
                  <th>Uptime</th>
                  <th>Load</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <i class="ti ti-router me-2 text-primary"></i>Core Router
                  </td>
                  <td>
                    <span class="badge bg-label-success">Online</span>
                  </td>
                  <td>45d 12h</td>
                  <td>34%</td>
                </tr>
                <tr>
                  <td>
                    <i class="ti ti-server me-2 text-info"></i>RADIUS Server
                  </td>
                  <td>
                    <span class="badge bg-label-success">Online</span>
                  </td>
                  <td>23d 8h</td>
                  <td>12%</td>
                </tr>
                <tr>
                  <td>
                    <i class="ti ti-database me-2 text-warning"></i>Database Server
                  </td>
                  <td>
                    <span class="badge bg-label-success">Online</span>
                  </td>
                  <td>67d 3h</td>
                  <td>28%</td>
                </tr>
                <tr>
                  <td>
                    <i class="ti ti-wifi me-2 text-success"></i>Bandwidth Pool
                  </td>
                  <td>
                    <span class="badge bg-label-warning">High Usage</span>
                  </td>
                  <td>-</td>
                  <td>67%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-tools me-2"></i>NOC Quick Actions
          </h5>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-6">
              <button class="btn btn-outline-primary w-100" onclick="massReboot()">
                <i class="ti ti-refresh me-2"></i>Mass Reboot
              </button>
            </div>
            <div class="col-6">
              <button class="btn btn-outline-info w-100" onclick="trafficAnalysis()">
                <i class="ti ti-chart-dots me-2"></i>Traffic Analysis
              </button>
            </div>
            <div class="col-6">
              <button class="btn btn-outline-warning w-100" onclick="maintenanceMode()">
                <i class="ti ti-settings me-2"></i>Maintenance
              </button>
            </div>
            <div class="col-6">
              <button class="btn btn-outline-success w-100" onclick="exportReport()">
                <i class="ti ti-download me-2"></i>Export Report
              </button>
            </div>
            <div class="col-12">
              <button class="btn btn-outline-danger w-100" onclick="emergencyProcedure()">
                <i class="ti ti-alert-circle me-2"></i>Emergency Procedure
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
// Auto refresh every 30 seconds
setInterval(function() {
    refreshAll();
}, 30000);

function refreshAll() {
    // Add AJAX calls to refresh monitoring data
    console.log('Refreshing all monitoring data...');
}

function refreshOLT() {
    Swal.fire({
        title: 'Refreshing OLT Status...',
        text: 'Please wait',
        icon: 'info',
        showConfirmButton: false,
        timer: 2000
    });
}

function massReboot() {
    Swal.fire({
        title: 'Mass ONU Reboot',
        text: 'Select area or specific ONUs to reboot',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Continue',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show area selection or specific ONU selection
            Swal.fire('Feature Coming Soon', 'Mass reboot interface under development', 'info');
        }
    });
}

function trafficAnalysis() {
    Swal.fire({
        title: 'Traffic Analysis',
        html: `
            <div class="text-start">
                <p><strong>Current Analysis:</strong></p>
                <ul>
                    <li>Peak hours: 19:00-23:00</li>
                    <li>Average usage: 67%</li>
                    <li>Top consumers: Video streaming (45%)</li>
                    <li>Congestion: OLT-02 East area</li>
                </ul>
            </div>
        `,
        icon: 'info',
        confirmButtonText: 'Detailed Report'
    });
}

function maintenanceMode() {
    Swal.fire({
        title: 'Maintenance Mode',
        text: 'Put system in maintenance mode?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Enable Maintenance',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Maintenance Mode', 'System maintenance mode activated', 'success');
        }
    });
}

function exportReport() {
    Swal.fire({
        title: 'Export Report',
        text: 'Generate monitoring report for selected period',
        input: 'select',
        inputOptions: {
            'today': 'Today',
            'week': 'This Week',
            'month': 'This Month',
            'custom': 'Custom Range'
        },
        showCancelButton: true,
        confirmButtonText: 'Generate Report'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Generating...', 'Report will be downloaded shortly', 'success');
        }
    });
}

function emergencyProcedure() {
    Swal.fire({
        title: 'Emergency Procedure',
        html: `
            <div class="text-start">
                <p><strong>Emergency Contacts:</strong></p>
                <ul>
                    <li>Owner: +62812-3456-7890</li>
                    <li>Vendor Support: +62811-1111-1111</li>
                    <li>ISP Upstream: +62822-2222-2222</li>
                </ul>
                <p><strong>Emergency Actions:</strong></p>
                <button class="btn btn-sm btn-danger me-2" onclick="callOwner()">Call Owner</button>
                <button class="btn btn-sm btn-warning me-2" onclick="contactVendor()">Contact Vendor</button>
            </div>
        `,
        icon: 'error',
        showConfirmButton: false,
        showCloseButton: true
    });
}

function callOwner() {
    window.location.href = 'tel:+6281234567890';
}

function contactVendor() {
    window.open('https://wa.me/6281111111111', '_blank');
}

// Real-time clock
function updateClock() {
    const now = new Date();
    const clock = now.toLocaleTimeString('id-ID');
    const date = now.toLocaleDateString('id-ID');
    
    // Update if clock element exists
    const clockElement = document.getElementById('live-clock');
    if (clockElement) {
        clockElement.textContent = `${date} ${clock}`;
    }
}

setInterval(updateClock, 1000);
updateClock();
</script>
@endsection