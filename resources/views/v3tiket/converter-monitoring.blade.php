@extends('layouts.master')

@section('title', 'V3 Converter FO Monitoring')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-network me-2 text-primary"></i>
        Converter Fiber Optic Monitoring
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.monitoring') }}">Monitoring</a></li>
          <li class="breadcrumb-item active">Converter FO</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-primary" id="refreshConverter">
        <i class="ti ti-refresh me-1"></i>
        Refresh
      </button>
      <div class="badge bg-success">
        <i class="ti ti-circle-filled me-1" style="font-size: 8px;"></i>
        LIVE
      </div>
    </div>
  </div>

  <!-- Converter Overview Stats -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card bg-primary text-white">
        <div class="card-body text-center">
          <i class="ti ti-network fs-2 mb-2"></i>
          <h3 class="mb-1">155</h3>
          <small>Online Converters</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-danger text-white">
        <div class="card-body text-center">
          <i class="ti ti-network-off fs-2 mb-2"></i>
          <h3 class="mb-1">1</h3>
          <small>Offline Converters</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-info text-white">
        <div class="card-body text-center">
          <i class="ti ti-bolt fs-2 mb-2"></i>
          <h3 class="mb-1">-15.2</h3>
          <small>Avg Optical Power (dBm)</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-success text-white">
        <div class="card-body text-center">
          <i class="ti ti-router fs-2 mb-2"></i>
          <h3 class="mb-1">8</h3>
          <small>POP Sites</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Optical Performance Metrics -->
  <div class="row mb-4">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-line me-2"></i>
            Optical Power Trends (Last 24h)
          </h5>
        </div>
        <div class="card-body">
          <canvas id="opticalPowerChart" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-donut me-2"></i>
            Link Quality Distribution
          </h5>
        </div>
        <div class="card-body">
          <canvas id="linkQualityChart" height="250"></canvas>
          <div class="mt-3">
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-success me-1"></i>Excellent (> -15 dBm)</span>
              <span class="fw-bold">68%</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-info me-1"></i>Good (-15 to -20 dBm)</span>
              <span class="fw-bold">25%</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-warning me-1"></i>Fair (-20 to -25 dBm)</span>
              <span class="fw-bold">6%</span>
            </div>
            <div class="d-flex justify-content-between">
              <span><i class="ti ti-circle-filled text-danger me-1"></i>Poor (< -25 dBm)</span>
              <span class="fw-bold">1%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Converter Status Table -->
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="ti ti-list me-2"></i>
        Converter Status Details
      </h5>
      <div class="d-flex gap-2">
        <select class="form-select form-select-sm" style="width: auto;" id="popFilter">
          <option value="">All POP Sites</option>
          <option value="pop-sentral">POP Sentral</option>
          <option value="pop-timur">POP Timur</option>
          <option value="pop-barat">POP Barat</option>
          <option value="pop-utara">POP Utara</option>
        </select>
        <button class="btn btn-sm btn-outline-primary">
          <i class="ti ti-download me-1"></i>
          Export
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Converter ID</th>
              <th>Customer</th>
              <th>POP Site</th>
              <th>Status</th>
              <th>Optical Power</th>
              <th>Link Status</th>
              <th>Error Rate</th>
              <th>Temperature</th>
              <th>Last Update</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-dot bg-success me-2"></div>
                  <span class="fw-medium">CVR-001</span>
                </div>
              </td>
              <td>
                <div>
                  <div class="fw-medium">PT Maju Jaya</div>
                  <small class="text-muted">CV-2024-001</small>
                </div>
              </td>
              <td>POP Sentral</td>
              <td><span class="badge bg-success">Online</span></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="progress me-2" style="width: 60px; height: 6px;">
                    <div class="progress-bar bg-success" style="width: 85%"></div>
                  </div>
                  <span class="text-success fw-bold">-14.5 dBm</span>
                </div>
              </td>
              <td><span class="badge bg-success">Up</span></td>
              <td>0.001%</td>
              <td>
                <span class="text-success">42°C</span>
              </td>
              <td>
                <small>30s ago</small>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-xs btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="ti ti-eye me-2"></i>Details</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-settings me-2"></i>Configure</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-refresh me-2"></i>Reboot</a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr class="table-danger">
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-dot bg-danger me-2 blink"></div>
                  <span class="fw-medium">CVR-045</span>
                </div>
              </td>
              <td>
                <div>
                  <div class="fw-medium">CV Berkah</div>
                  <small class="text-muted">CV-2024-045</small>
                </div>
              </td>
              <td>POP Barat</td>
              <td><span class="badge bg-danger">Offline</span></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="progress me-2" style="width: 60px; height: 6px;">
                    <div class="progress-bar bg-danger" style="width: 0%"></div>
                  </div>
                  <span class="text-danger fw-bold">N/A</span>
                </div>
              </td>
              <td><span class="badge bg-danger">Down</span></td>
              <td>N/A</td>
              <td>
                <span class="text-danger">N/A</span>
              </td>
              <td>
                <small class="text-danger">5m ago</small>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-xs btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-alert-triangle"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="ti ti-ticket me-2"></i>Create Ticket</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-phone me-2"></i>Call Customer</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-tool me-2"></i>Diagnose</a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-dot bg-success me-2"></div>
                  <span class="fw-medium">CVR-023</span>
                </div>
              </td>
              <td>
                <div>
                  <div class="fw-medium">PT Global Tech</div>
                  <small class="text-muted">CV-2024-023</small>
                </div>
              </td>
              <td>POP Utara</td>
              <td><span class="badge bg-success">Online</span></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="progress me-2" style="width: 60px; height: 6px;">
                    <div class="progress-bar bg-info" style="width: 75%"></div>
                  </div>
                  <span class="text-info fw-bold">-16.2 dBm</span>
                </div>
              </td>
              <td><span class="badge bg-success">Up</span></td>
              <td>0.002%</td>
              <td>
                <span class="text-success">38°C</span>
              </td>
              <td>
                <small>25s ago</small>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-xs btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="ti ti-eye me-2"></i>Details</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-settings me-2"></i>Configure</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-refresh me-2"></i>Reboot</a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr class="table-warning">
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-dot bg-warning me-2"></div>
                  <span class="fw-medium">CVR-087</span>
                </div>
              </td>
              <td>
                <div>
                  <div class="fw-medium">Toko Elektronik Jaya</div>
                  <small class="text-muted">CV-2024-087</small>
                </div>
              </td>
              <td>POP Sentral</td>
              <td><span class="badge bg-warning">Warning</span></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="progress me-2" style="width: 60px; height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 45%"></div>
                  </div>
                  <span class="text-warning fw-bold">-22.1 dBm</span>
                </div>
              </td>
              <td><span class="badge bg-warning">Degraded</span></td>
              <td>0.15%</td>
              <td>
                <span class="text-warning">55°C</span>
              </td>
              <td>
                <small>1m ago</small>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-xs btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-exclamation-triangle"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="ti ti-eye me-2"></i>Monitor</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-tool me-2"></i>Optimize</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-ticket me-2"></i>Create Ticket</a></li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-dot bg-success me-2"></div>
                  <span class="fw-medium">CVR-134</span>
                </div>
              </td>
              <td>
                <div>
                  <div class="fw-medium">Rumah Sakit Medika</div>
                  <small class="text-muted">CV-2024-134</small>
                </div>
              </td>
              <td>POP Timur</td>
              <td><span class="badge bg-success">Online</span></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="progress me-2" style="width: 60px; height: 6px;">
                    <div class="progress-bar bg-success" style="width: 90%"></div>
                  </div>
                  <span class="text-success fw-bold">-13.8 dBm</span>
                </div>
              </td>
              <td><span class="badge bg-success">Up</span></td>
              <td>0.000%</td>
              <td>
                <span class="text-success">40°C</span>
              </td>
              <td>
                <small>20s ago</small>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-xs btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="ti ti-eye me-2"></i>Details</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-settings me-2"></i>Configure</a></li>
                    <li><a class="dropdown-item" href="#"><i class="ti ti-refresh me-2"></i>Reboot</a></li>
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
        <small class="text-muted">Showing 1 to 5 of 156 converters</small>
        <nav>
          <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled">
              <span class="page-link">Previous</span>
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

  <!-- Fiber Health & Alerts -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-activity me-2"></i>
            Fiber Link Health Analysis
          </h5>
        </div>
        <div class="card-body">
          <div class="row mb-3 text-center">
            <div class="col-md-4">
              <h4 class="text-success mb-1">99.4%</h4>
              <small class="text-muted">Link Availability</small>
            </div>
            <div class="col-md-4">
              <h4 class="text-info mb-1">0.01%</h4>
              <small class="text-muted">Avg Error Rate</small>
            </div>
            <div class="col-md-4">
              <h4 class="text-primary mb-1">43°C</h4>
              <small class="text-muted">Avg Temperature</small>
            </div>
          </div>
          
          <canvas id="fiberHealthChart" height="200"></canvas>
          
          <div class="mt-3">
            <h6 class="mb-2">Critical Thresholds</h6>
            <div class="row small">
              <div class="col-md-6">
                <div class="d-flex justify-content-between">
                  <span>Optical Power:</span>
                  <span class="text-danger">< -25 dBm</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Error Rate:</span>
                  <span class="text-warning">> 0.1%</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex justify-content-between">
                  <span>Temperature:</span>
                  <span class="text-danger">> 60°C</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Link Flaps:</span>
                  <span class="text-warning">> 5/hour</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-alert-triangle me-2"></i>
            Active Alerts & Issues
          </h5>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            
            <div class="list-group-item px-0 border-start border-danger border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-danger">CVR-045 Complete Failure</h6>
                  <p class="mb-1 small">No optical signal detected. Customer CV Berkah offline.</p>
                  <small class="text-muted">5 minutes ago</small>
                </div>
                <span class="badge bg-danger">CRITICAL</span>
              </div>
              <div class="mt-2">
                <button class="btn btn-xs btn-danger me-1">Create Ticket</button>
                <button class="btn btn-xs btn-outline-primary">Field Team</button>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-warning border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-warning">CVR-087 High Optical Loss</h6>
                  <p class="mb-1 small">Power level dropped to -22.1 dBm. Connector cleaning needed.</p>
                  <small class="text-muted">12 minutes ago</small>
                </div>
                <span class="badge bg-warning">HIGH</span>
              </div>
              <div class="mt-2">
                <button class="btn btn-xs btn-warning me-1">Schedule Maintenance</button>
                <button class="btn btn-xs btn-outline-info">Monitor</button>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-info border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-info">Preventive Maintenance Due</h6>
                  <p class="mb-1 small">12 converters scheduled for quarterly maintenance this week.</p>
                  <small class="text-muted">1 hour ago</small>
                </div>
                <span class="badge bg-info">MAINTENANCE</span>
              </div>
              <div class="mt-2">
                <button class="btn btn-xs btn-info me-1">View Schedule</button>
                <button class="btn btn-xs btn-outline-secondary">Postpone</button>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-success border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-success">CVR-023 Optimization Complete</h6>
                  <p class="mb-1 small">Power optimization improved link by 2.3 dB.</p>
                  <small class="text-muted">2 hours ago</small>
                </div>
                <span class="badge bg-success">RESOLVED</span>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<style>
.status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  display: inline-block;
}

.blink {
  animation: blink 1s infinite;
}

@keyframes blink {
  0%, 50% { opacity: 1; }
  51%, 100% { opacity: 0.3; }
}

.btn-xs {
  padding: 0.125rem 0.25rem;
  font-size: 0.675rem;
  line-height: 1.2;
  border-radius: 0.15rem;
}

.table th, .table td {
  vertical-align: middle;
  padding: 0.75rem 0.5rem;
}
</style>

<script>
// Optical power trend chart
function drawOpticalPowerChart() {
    const ctx = document.getElementById('opticalPowerChart').getContext('2d');
    const hours = [];
    const avgPower = [];
    const minPower = [];
    const maxPower = [];
    
    // Generate 24 hours of optical power data
    for (let i = 23; i >= 0; i--) {
        const hour = new Date();
        hour.setHours(hour.getHours() - i);
        hours.push(hour.getHours() + ':00');
        
        // Simulate optical power variations
        const baseAvg = -15.2;
        const variation = Math.random() * 2 - 1; // ±1 dB variation
        avgPower.push(baseAvg + variation);
        minPower.push(baseAvg + variation - 2);
        maxPower.push(baseAvg + variation + 1.5);
    }
    
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    // Draw grid
    ctx.strokeStyle = '#e9ecef';
    ctx.lineWidth = 1;
    for (let i = 0; i <= 5; i++) {
        const y = (i / 5) * ctx.canvas.height;
        ctx.beginPath();
        ctx.moveTo(0, y);
        ctx.lineTo(ctx.canvas.width, y);
        ctx.stroke();
    }
    
    // Draw power trend lines
    function drawLine(data, color, lineWidth = 2) {
        ctx.strokeStyle = color;
        ctx.lineWidth = lineWidth;
        ctx.beginPath();
        
        data.forEach((power, index) => {
            const x = (index / (data.length - 1)) * ctx.canvas.width;
            // Normalize power values (-30 to -10 dBm range)
            const y = ctx.canvas.height - ((Math.abs(power) - 10) / 20) * ctx.canvas.height;
            
            if (index === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        });
        
        ctx.stroke();
    }
    
    drawLine(maxPower, '#28a745', 1);    // Max power (light green)
    drawLine(avgPower, '#007bff', 3);    // Average power (blue, thicker)
    drawLine(minPower, '#dc3545', 1);    // Min power (light red)
}

// Link quality distribution chart
function drawLinkQualityChart() {
    const ctx = document.getElementById('linkQualityChart').getContext('2d');
    const centerX = ctx.canvas.width / 2;
    const centerY = ctx.canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 20;
    
    const data = [
        { label: 'Excellent', value: 68, color: '#28a745' },
        { label: 'Good', value: 25, color: '#17a2b8' },
        { label: 'Fair', value: 6, color: '#ffc107' },
        { label: 'Poor', value: 1, color: '#dc3545' }
    ];
    
    const total = data.reduce((sum, item) => sum + item.value, 0);
    
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    let currentAngle = 0;
    data.forEach((item) => {
        const sliceAngle = (item.value / total) * 2 * Math.PI;
        
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + sliceAngle);
        ctx.lineTo(centerX, centerY);
        ctx.fillStyle = item.color;
        ctx.fill();
        
        currentAngle += sliceAngle;
    });
}

// Fiber health analysis chart
function drawFiberHealthChart() {
    const ctx = document.getElementById('fiberHealthChart').getContext('2d');
    
    // Health metrics over time
    const hours = ['00', '04', '08', '12', '16', '20'];
    const availability = [99.2, 99.5, 99.1, 99.6, 99.4, 99.3];
    const temperature = [38, 42, 45, 48, 46, 41];
    
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    // Draw availability line (left axis, 98-100%)
    ctx.strokeStyle = '#007bff';
    ctx.lineWidth = 3;
    ctx.beginPath();
    
    availability.forEach((avail, index) => {
        const x = (index / (availability.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - ((avail - 98) / 2) * ctx.canvas.height;
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
    
    // Draw temperature line (right axis, 30-60°C)
    ctx.strokeStyle = '#ffc107';
    ctx.lineWidth = 2;
    ctx.beginPath();
    
    temperature.forEach((temp, index) => {
        const x = (index / (temperature.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - ((temp - 30) / 30) * ctx.canvas.height;
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
    
    // Draw hour labels
    ctx.fillStyle = '#6c757d';
    ctx.font = '10px Arial';
    ctx.textAlign = 'center';
    hours.forEach((hour, index) => {
        const x = (index / (hours.length - 1)) * ctx.canvas.width;
        ctx.fillText(hour + ':00', x, ctx.canvas.height + 15);
    });
}

// Filter functionality
document.getElementById('popFilter').addEventListener('change', function() {
    const selectedPop = this.value;
    console.log('Filtering by POP:', selectedPop);
    // TODO: Implement table filtering
});

// Auto-refresh functionality
function refreshConverterData() {
    console.log('Refreshing converter monitoring data...');
    drawOpticalPowerChart();
    drawLinkQualityChart();
    drawFiberHealthChart();
}

// Initialize charts
document.addEventListener('DOMContentLoaded', function() {
    drawOpticalPowerChart();
    drawLinkQualityChart();
    drawFiberHealthChart();
});

// Manual refresh
document.getElementById('refreshConverter').addEventListener('click', function() {
    this.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i> Refreshing...';
    this.disabled = true;
    
    setTimeout(() => {
        refreshConverterData();
        this.innerHTML = '<i class="ti ti-refresh me-1"></i> Refresh';
        this.disabled = false;
    }, 2000);
});

// Auto-refresh every 30 seconds
setInterval(refreshConverterData, 30000);
</script>

@endsection