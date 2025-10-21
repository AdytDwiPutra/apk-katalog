@extends('layouts.master')

@section('title', 'V3 FTTH Monitoring')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-home me-2 text-warning"></i>
        FTTH (Fiber to the Home) Monitoring
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.monitoring') }}">Monitoring</a></li>
          <li class="breadcrumb-item active">FTTH</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-warning" id="refreshFTTH">
        <i class="ti ti-refresh me-1"></i>
        Refresh
      </button>
      <div class="badge bg-success">
        <i class="ti ti-circle-filled me-1" style="font-size: 8px;"></i>
        LIVE
      </div>
    </div>
  </div>

  <!-- FTTH Overview Stats -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card bg-warning text-white">
        <div class="card-body text-center">
          <i class="ti ti-home fs-2 mb-2"></i>
          <h3 class="mb-1">885</h3>
          <small>Online ONT</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-danger text-white">
        <div class="card-body text-center">
          <i class="ti ti-home-off fs-2 mb-2"></i>
          <h3 class="mb-1">7</h3>
          <small>Offline ONT</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-info text-white">
        <div class="card-body text-center">
          <i class="ti ti-share fs-2 mb-2"></i>
          <h3 class="mb-1">45</h3>
          <small>ODP Sites</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-primary text-white">
        <div class="card-body text-center">
          <i class="ti ti-chart-line fs-2 mb-2"></i>
          <h3 class="mb-1">85%</h3>
          <small>Avg Splitter Load</small>
        </div>
      </div>
    </div>
  </div>

  <!-- FTTH Performance Metrics -->
  <div class="row mb-4">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-line me-2"></i>
            ONT Status Trends (Last 24h)
          </h5>
        </div>
        <div class="card-body">
          <canvas id="ontStatusChart" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-donut me-2"></i>
            Service Quality
          </h5>
        </div>
        <div class="card-body">
          <canvas id="serviceQualityChart" height="250"></canvas>
          <div class="mt-3">
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-success me-1"></i>Excellent (> -15 dBm)</span>
              <span class="fw-bold">62%</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-info me-1"></i>Good (-15 to -20 dBm)</span>
              <span class="fw-bold">28%</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-warning me-1"></i>Fair (-20 to -25 dBm)</span>
              <span class="fw-bold">8%</span>
            </div>
            <div class="d-flex justify-content-between">
              <span><i class="ti ti-circle-filled text-danger me-1"></i>Poor (< -25 dBm)</span>
              <span class="fw-bold">2%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ODP Sites Overview -->
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="ti ti-share me-2"></i>
        ODP Sites Status
      </h5>
      <div class="d-flex gap-2">
        <select class="form-select form-select-sm" style="width: auto;" id="areaFilter">
          <option value="">All Areas</option>
          <option value="area-1">Area 1 (Central)</option>
          <option value="area-2">Area 2 (North)</option>
          <option value="area-3">Area 3 (South)</option>
          <option value="area-4">Area 4 (East)</option>
        </select>
        <button class="btn btn-sm btn-outline-warning">
          <i class="ti ti-map me-1"></i>
          Map View
        </button>
      </div>
    </div>
    <div class="card-body">
      
      <!-- ODP Grid -->
      <div class="row">
        
        <!-- ODP-001 (Healthy) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-success">
            <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-success me-2"></div>
                <h6 class="mb-0">ODP-001</h6>
              </div>
              <span class="badge bg-success">Healthy</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-success mb-0">15</h6>
                  <small class="text-muted">Online</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">16</h6>
                  <small class="text-muted">Ports</small>
                </div>
                <div class="col-4">
                  <h6 class="text-info mb-0">94%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Splitter Load:</small>
                  <div class="progress" style="width: 100px; height: 6px;">
                    <div class="progress-bar bg-success" style="width: 94%"></div>
                  </div>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-success">-18.5 dBm</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Area 1 - Perumahan Indah</small>
                <button class="btn btn-xs btn-outline-primary">
                  <i class="ti ti-eye me-1"></i>
                  Details
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ODP-015 (Issues) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-warning">
            <div class="card-header bg-light-warning d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-warning me-2"></div>
                <h6 class="mb-0">ODP-015</h6>
              </div>
              <span class="badge bg-warning">Issues</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-warning mb-0">13</h6>
                  <small class="text-muted">Online</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">16</h6>
                  <small class="text-muted">Ports</small>
                </div>
                <div class="col-4">
                  <h6 class="text-warning mb-0">81%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="alert alert-warning p-2 mb-2">
                <small><i class="ti ti-exclamation-triangle me-1"></i><strong>Warning:</strong> 3 ONT offline</small>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Splitter Load:</small>
                  <div class="progress" style="width: 100px; height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 81%"></div>
                  </div>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-warning">-20.1 dBm</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Area 2 - Komplek Griya</small>
                <button class="btn btn-xs btn-outline-warning">
                  <i class="ti ti-tool me-1"></i>
                  Fix
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ODP-032 (Full Capacity) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-info">
            <div class="card-header bg-light-info d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-info me-2"></div>
                <h6 class="mb-0">ODP-032</h6>
              </div>
              <span class="badge bg-info">Full</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-info mb-0">16</h6>
                  <small class="text-muted">Online</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">16</h6>
                  <small class="text-muted">Ports</small>
                </div>
                <div class="col-4">
                  <h6 class="text-danger mb-0">100%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="alert alert-info p-2 mb-2">
                <small><i class="ti ti-info-circle me-1"></i><strong>Info:</strong> All ports utilized</small>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Splitter Load:</small>
                  <div class="progress" style="width: 100px; height: 6px;">
                    <div class="progress-bar bg-danger" style="width: 100%"></div>
                  </div>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-info">-17.8 dBm</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Area 3 - Villa Harmoni</small>
                <button class="btn btn-xs btn-outline-info">
                  <i class="ti ti-plus me-1"></i>
                  Expand
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ODP-044 (Critical) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-danger">
            <div class="card-header bg-light-danger d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-danger me-2 blink"></div>
                <h6 class="mb-0">ODP-044</h6>
              </div>
              <span class="badge bg-danger">Critical</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-danger mb-0">8</h6>
                  <small class="text-muted">Online</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">16</h6>
                  <small class="text-muted">Ports</small>
                </div>
                <div class="col-4">
                  <h6 class="text-danger mb-0">50%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="alert alert-danger p-2 mb-2">
                <small><i class="ti ti-alert-triangle me-1"></i><strong>Critical:</strong> Splitter failure</small>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Splitter Status:</small>
                  <small class="fw-bold text-danger">Degraded</small>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Signal Range:</small>
                  <small class="fw-bold text-danger">-15 to -28 dBm</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Area 4 - Taman Sari</small>
                <button class="btn btn-xs btn-danger">
                  <i class="ti ti-alert-triangle me-1"></i>
                  Alert
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ODP-057 (Healthy) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-success">
            <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-success me-2"></div>
                <h6 class="mb-0">ODP-057</h6>
              </div>
              <span class="badge bg-success">Healthy</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-success mb-0">12</h6>
                  <small class="text-muted">Online</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">16</h6>
                  <small class="text-muted">Ports</small>
                </div>
                <div class="col-4">
                  <h6 class="text-success mb-0">75%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Splitter Load:</small>
                  <div class="progress" style="width: 100px; height: 6px;">
                    <div class="progress-bar bg-success" style="width: 75%"></div>
                  </div>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-success">-16.2 dBm</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Area 1 - Cluster Melati</small>
                <button class="btn btn-xs btn-outline-primary">
                  <i class="ti ti-eye me-1"></i>
                  Details
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ODP-063 (New Installation) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-primary">
            <div class="card-header bg-light-primary d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-primary me-2"></div>
                <h6 class="mb-0">ODP-063</h6>
              </div>
              <span class="badge bg-primary">New</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-primary mb-0">3</h6>
                  <small class="text-muted">Online</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">16</h6>
                  <small class="text-muted">Ports</small>
                </div>
                <div class="col-4">
                  <h6 class="text-primary mb-0">19%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="alert alert-primary p-2 mb-2">
                <small><i class="ti ti-star me-1"></i><strong>New:</strong> Installed 2 days ago</small>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Available Ports:</small>
                  <small class="fw-bold text-success">13</small>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-primary">-16.8 dBm</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Area 2 - Residence Park</small>
                <button class="btn btn-xs btn-outline-primary">
                  <i class="ti ti-settings me-1"></i>
                  Configure
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- ONT Status & Maintenance -->
  <div class="row">
    <div class="col-lg-8 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-activity me-2"></i>
            ONT Performance Analysis
          </h5>
        </div>
        <div class="card-body">
          <div class="row mb-3 text-center">
            <div class="col-md-3">
              <h4 class="text-success mb-1">92.2%</h4>
              <small class="text-muted">Service Uptime</small>
            </div>
            <div class="col-md-3">
              <h4 class="text-info mb-1">-18.2</h4>
              <small class="text-muted">Avg Signal (dBm)</small>
            </div>
            <div class="col-md-3">
              <h4 class="text-warning mb-1">7</h4>
              <small class="text-muted">Offline Units</small>
            </div>
            <div class="col-md-3">
              <h4 class="text-primary mb-1">85%</h4>
              <small class="text-muted">Network Load</small>
            </div>
          </div>
          
          <canvas id="ontPerformanceChart" height="200"></canvas>
          
          <div class="mt-3">
            <h6 class="mb-2">Key Performance Indicators</h6>
            <div class="row">
              <div class="col-md-6">
                <div class="d-flex justify-content-between mb-1">
                  <small>Signal Quality:</small>
                  <span class="text-success fw-bold">Good</span>
                </div>
                <div class="progress mb-2" style="height: 4px;">
                  <div class="progress-bar bg-success" style="width: 78%"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex justify-content-between mb-1">
                  <small>Port Utilization:</small>
                  <span class="text-warning fw-bold">High</span>
                </div>
                <div class="progress mb-2" style="height: 4px;">
                  <div class="progress-bar bg-warning" style="width: 85%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-alert-triangle me-2"></i>
            FTTH Alerts & Maintenance
          </h5>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            
            <div class="list-group-item px-0 border-start border-danger border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-danger">ODP-044 Splitter Failure</h6>
                  <p class="mb-1 small">8 customers affected. Need immediate replacement.</p>
                  <small class="text-muted">15 minutes ago</small>
                </div>
                <span class="badge bg-danger">URGENT</span>
              </div>
              <div class="mt-2">
                <button class="btn btn-xs btn-danger me-1">Dispatch Team</button>
                <button class="btn btn-xs btn-outline-warning">Contact Customers</button>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-warning border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-warning">ODP-015 Signal Degradation</h6>
                  <p class="mb-1 small">3 ONT units showing poor signal. Cleaning required.</p>
                  <small class="text-muted">45 minutes ago</small>
                </div>
                <span class="badge bg-warning">MAINTENANCE</span>
              </div>
              <div class="mt-2">
                <button class="btn btn-xs btn-warning me-1">Schedule Clean</button>
                <button class="btn btn-xs btn-outline-info">Monitor</button>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-info border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-info">Capacity Planning Alert</h6>
                  <p class="mb-1 small">5 ODP sites approaching 90% utilization.</p>
                  <small class="text-muted">2 hours ago</small>
                </div>
                <span class="badge bg-info">PLANNING</span>
              </div>
              <div class="mt-2">
                <button class="btn btn-xs btn-info me-1">Plan Expansion</button>
                <button class="btn btn-xs btn-outline-secondary">View Report</button>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-success border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-success">ODP-063 Installation Complete</h6>
                  <p class="mb-1 small">New ODP operational. 13 ports available.</p>
                  <small class="text-muted">2 days ago</small>
                </div>
                <span class="badge bg-success">COMPLETED</span>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<style>
.status-indicator {
  width: 10px;
  height: 10px;
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

.bg-light-success {
  background-color: rgba(40, 167, 69, 0.1) !important;
}

.bg-light-danger {
  background-color: rgba(220, 53, 69, 0.1) !important;
}

.bg-light-warning {
  background-color: rgba(255, 193, 7, 0.1) !important;
}

.bg-light-info {
  background-color: rgba(23, 162, 184, 0.1) !important;
}

.bg-light-primary {
  background-color: rgba(0, 123, 255, 0.1) !important;
}

.btn-xs {
  padding: 0.125rem 0.25rem;
  font-size: 0.675rem;
  line-height: 1.2;
  border-radius: 0.15rem;
}
</style>

<script>
// ONT status trend chart
function drawONTStatusChart() {
    const ctx = document.getElementById('ontStatusChart').getContext('2d');
    const hours = [];
    const onlineONT = [];
    const offlineONT = [];
    
    // Generate 24 hours of ONT status data
    for (let i = 23; i >= 0; i--) {
        const hour = new Date();
        hour.setHours(hour.getHours() - i);
        hours.push(hour.getHours() + ':00');
        
        // Simulate ONT status variations
        const baseOnline = 885;
        const variation = Math.floor(Math.random() * 10 - 5); // ±5 variation
        const online = Math.max(875, Math.min(892, baseOnline + variation));
        onlineONT.push(online);
        offlineONT.push(892 - online);
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
    
    // Draw area chart for online ONT
    ctx.fillStyle = 'rgba(255, 193, 7, 0.3)'; // Warning color with transparency
    ctx.beginPath();
    ctx.moveTo(0, ctx.canvas.height);
    
    onlineONT.forEach((count, index) => {
        const x = (index / (onlineONT.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - (count / 900) * ctx.canvas.height;
        ctx.lineTo(x, y);
    });
    
    ctx.lineTo(ctx.canvas.width, ctx.canvas.height);
    ctx.closePath();
    ctx.fill();
    
    // Draw online ONT line
    ctx.strokeStyle = '#ffc107';
    ctx.lineWidth = 3;
    ctx.beginPath();
    
    onlineONT.forEach((count, index) => {
        const x = (index / (onlineONT.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - (count / 900) * ctx.canvas.height;
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
    
    // Draw offline ONT line
    ctx.strokeStyle = '#dc3545';
    ctx.lineWidth = 2;
    ctx.beginPath();
    
    offlineONT.forEach((count, index) => {
        const x = (index / (offlineONT.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - (count / 15) * (ctx.canvas.height * 0.2); // Scale for visibility
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
}

// Service quality distribution chart
function drawServiceQualityChart() {
    const ctx = document.getElementById('serviceQualityChart').getContext('2d');
    const centerX = ctx.canvas.width / 2;
    const centerY = ctx.canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 20;
    
    const data = [
        { label: 'Excellent', value: 62, color: '#28a745' },
        { label: 'Good', value: 28, color: '#17a2b8' },
        { label: 'Fair', value: 8, color: '#ffc107' },
        { label: 'Poor', value: 2, color: '#dc3545' }
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

// ONT performance analysis chart
function drawONTPerformanceChart() {
    const ctx = document.getElementById('ontPerformanceChart').getContext('2d');
    
    // Performance metrics over the day
    const hours = ['00', '03', '06', '09', '12', '15', '18', '21'];
    const signalQuality = [85, 87, 82, 78, 80, 85, 88, 86]; // Percentage
    const portUtilization = [70, 75, 85, 90, 88, 85, 82, 78]; // Percentage
    
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    // Draw signal quality bars
    const barWidth = ctx.canvas.width / hours.length * 0.35;
    const spacing = ctx.canvas.width / hours.length;
    
    hours.forEach((hour, index) => {
        const x = index * spacing + spacing * 0.15;
        
        // Signal quality bar (green)
        const signalHeight = (signalQuality[index] / 100) * ctx.canvas.height;
        ctx.fillStyle = '#28a745';
        ctx.fillRect(x, ctx.canvas.height - signalHeight, barWidth, signalHeight);
        
        // Port utilization bar (orange, offset)
        const utilizationHeight = (portUtilization[index] / 100) * ctx.canvas.height;
        ctx.fillStyle = '#ffc107';
        ctx.fillRect(x + barWidth + 5, ctx.canvas.height - utilizationHeight, barWidth, utilizationHeight);
        
        // Hour labels
        ctx.fillStyle = '#6c757d';
        ctx.font = '10px Arial';
        ctx.textAlign = 'center';
        ctx.fillText(hour + ':00', x + barWidth, ctx.canvas.height + 15);
    });
}

// Area filter functionality
document.getElementById('areaFilter').addEventListener('change', function() {
    const selectedArea = this.value;
    console.log('Filtering by area:', selectedArea);
    // TODO: Implement ODP filtering by area
});

// Auto-refresh functionality
function refreshFTTHData() {
    console.log('Refreshing FTTH monitoring data...');
    drawONTStatusChart();
    drawServiceQualityChart();
    drawONTPerformanceChart();
}

// Initialize charts
document.addEventListener('DOMContentLoaded', function() {
    drawONTStatusChart();
    drawServiceQualityChart();
    drawONTPerformanceChart();
});

// Manual refresh
document.getElementById('refreshFTTH').addEventListener('click', function() {
    this.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i> Refreshing...';
    this.disabled = true;
    
    setTimeout(() => {
        refreshFTTHData();
        this.innerHTML = '<i class="ti ti-refresh me-1"></i> Refresh';
        this.disabled = false;
    }, 2000);
});

// Auto-refresh every 30 seconds
setInterval(refreshFTTHData, 30000);
</script>

@endsection