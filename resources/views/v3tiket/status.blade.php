@extends('layouts.master')

@section('title', 'V3 Status Real-time')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-activity me-2 text-success"></i>
        Status Real-time V3
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item active">Status Real-time</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <div class="badge bg-success pulse">
        <i class="ti ti-circle-filled me-1" style="font-size: 8px;"></i>
        LIVE
      </div>
      <small class="text-muted">Auto-refresh: <span id="countdown">30</span>s</small>
      <button class="btn btn-outline-success btn-sm" id="toggleAutoRefresh">
        <i class="ti ti-pause me-1"></i>
        Pause
      </button>
    </div>
  </div>

  <!-- Network Health Overview -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-heartbeat me-2"></i>
            Network Health Overview
          </h5>
        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-md-2">
              <div class="border-end">
                <h3 class="text-success mb-1" id="totalOnline">1,282</h3>
                <small class="text-muted">Online</small>
                <div class="progress mt-1" style="height: 4px;">
                  <div class="progress-bar bg-success" style="width: 99.1%"></div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="border-end">
                <h3 class="text-danger mb-1" id="totalOffline">11</h3>
                <small class="text-muted">Offline</small>
                <div class="progress mt-1" style="height: 4px;">
                  <div class="progress-bar bg-danger" style="width: 0.9%"></div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="border-end">
                <h3 class="text-warning mb-1" id="totalWarning">8</h3>
                <small class="text-muted">Warning</small>
                <div class="progress mt-1" style="height: 4px;">
                  <div class="progress-bar bg-warning" style="width: 0.6%"></div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="border-end">
                <h3 class="text-info mb-1" id="networkUptime">99.2%</h3>
                <small class="text-muted">Uptime</small>
                <div class="progress mt-1" style="height: 4px;">
                  <div class="progress-bar bg-info" style="width: 99.2%"></div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="border-end">
                <h3 class="text-primary mb-1" id="avgLatency">2.3ms</h3>
                <small class="text-muted">Avg Latency</small>
                <div class="progress mt-1" style="height: 4px;">
                  <div class="progress-bar bg-primary" style="width: 85%"></div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <h3 class="text-success mb-1" id="throughput">8.5</h3>
              <small class="text-muted">Gbps Total</small>
              <div class="progress mt-1" style="height: 4px;">
                <div class="progress-bar bg-success" style="width: 70%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Infrastructure Status Tabs -->
  <div class="card mb-4">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#wireless-tab" role="tab">
            <i class="ti ti-wifi me-1"></i>
            Wireless <span class="badge bg-success ms-1">242</span>
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#converter-tab" role="tab">
            <i class="ti ti-network me-1"></i>
            Converter FO <span class="badge bg-primary ms-1">155</span>
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ftth-tab" role="tab">
            <i class="ti ti-home me-1"></i>
            FTTH <span class="badge bg-warning ms-1">885</span>
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alerts-tab" role="tab">
            <i class="ti ti-alert-triangle me-1"></i>
            Active Alerts <span class="badge bg-danger ms-1">3</span>
          </button>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        
        <!-- Wireless Tab -->
        <div class="tab-pane fade show active" id="wireless-tab">
          <div class="row mb-3">
            <div class="col-md-3">
              <div class="card bg-success text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">242</h4>
                  <small>Online</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-danger text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">3</h4>
                  <small>Offline</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-warning text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">2</h4>
                  <small>Poor Signal</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">12</h4>
                  <small>POP Sites</small>
                </div>
              </div>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>POP Site</th>
                  <th>Status</th>
                  <th>Clients</th>
                  <th>Avg Signal</th>
                  <th>Throughput</th>
                  <th>Alerts</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="wirelessTable">
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-success me-2"></div>
                      <span>POP Sentral</span>
                    </div>
                  </td>
                  <td><span class="badge bg-success">Online</span></td>
                  <td>45/50</td>
                  <td>-62 dBm</td>
                  <td>2.1 Gbps</td>
                  <td><span class="badge bg-success">0</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-danger me-2"></div>
                      <span>POP Timur</span>
                    </div>
                  </td>
                  <td><span class="badge bg-danger">Down</span></td>
                  <td>0/40</td>
                  <td>N/A</td>
                  <td>0 Mbps</td>
                  <td><span class="badge bg-danger">1</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-danger">
                      <i class="ti ti-alert-triangle"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-warning me-2"></div>
                      <span>POP Barat</span>
                    </div>
                  </td>
                  <td><span class="badge bg-warning">Warning</span></td>
                  <td>52/60</td>
                  <td>-68 dBm</td>
                  <td>1.8 Gbps</td>
                  <td><span class="badge bg-warning">1</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-warning">
                      <i class="ti ti-tool"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-success me-2"></div>
                      <span>POP Utara</span>
                    </div>
                  </td>
                  <td><span class="badge bg-success">Online</span></td>
                  <td>38/45</td>
                  <td>-65 dBm</td>
                  <td>1.9 Gbps</td>
                  <td><span class="badge bg-success">0</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Converter FO Tab -->
        <div class="tab-pane fade" id="converter-tab">
          <div class="row mb-3">
            <div class="col-md-3">
              <div class="card bg-primary text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">155</h4>
                  <small>Online</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-danger text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">1</h4>
                  <small>Offline</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">-15.2</h4>
                  <small>Avg dBm</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-success text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">8</h4>
                  <small>POP Sites</small>
                </div>
              </div>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Converter ID</th>
                  <th>POP</th>
                  <th>Status</th>
                  <th>Optical Power</th>
                  <th>Link Status</th>
                  <th>Error Rate</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CVR-001</td>
                  <td>POP Sentral</td>
                  <td><span class="badge bg-success">Online</span></td>
                  <td>-14.5 dBm</td>
                  <td><span class="badge bg-success">Up</span></td>
                  <td>0.001%</td>
                  <td>
                    <button class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>CVR-045</td>
                  <td>POP Barat</td>
                  <td><span class="badge bg-danger">Offline</span></td>
                  <td>N/A</td>
                  <td><span class="badge bg-danger">Down</span></td>
                  <td>N/A</td>
                  <td>
                    <button class="btn btn-xs btn-outline-danger">
                      <i class="ti ti-alert-triangle"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>CVR-023</td>
                  <td>POP Utara</td>
                  <td><span class="badge bg-success">Online</span></td>
                  <td>-16.2 dBm</td>
                  <td><span class="badge bg-success">Up</span></td>
                  <td>0.002%</td>
                  <td>
                    <button class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- FTTH Tab -->
        <div class="tab-pane fade" id="ftth-tab">
          <div class="row mb-3">
            <div class="col-md-3">
              <div class="card bg-warning text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">885</h4>
                  <small>Online</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-danger text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">7</h4>
                  <small>Offline</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">45</h4>
                  <small>ODP Sites</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-primary text-white">
                <div class="card-body text-center p-3">
                  <h4 class="mb-1">85%</h4>
                  <small>Avg Load</small>
                </div>
              </div>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>ODP</th>
                  <th>Status</th>
                  <th>ONT Online</th>
                  <th>Splitter Load</th>
                  <th>Avg Power</th>
                  <th>Issues</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-success me-2"></div>
                      <span>ODP-001</span>
                    </div>
                  </td>
                  <td><span class="badge bg-success">Healthy</span></td>
                  <td>15/16</td>
                  <td>
                    <div class="progress" style="width: 60px; height: 6px;">
                      <div class="progress-bar bg-success" style="width: 94%"></div>
                    </div>
                    <small>94%</small>
                  </td>
                  <td>-18.5 dBm</td>
                  <td><span class="badge bg-success">0</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-warning me-2"></div>
                      <span>ODP-015</span>
                    </div>
                  </td>
                  <td><span class="badge bg-warning">Issues</span></td>
                  <td>13/16</td>
                  <td>
                    <div class="progress" style="width: 60px; height: 6px;">
                      <div class="progress-bar bg-warning" style="width: 81%"></div>
                    </div>
                    <small>81%</small>
                  </td>
                  <td>-20.1 dBm</td>
                  <td><span class="badge bg-warning">3</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-warning">
                      <i class="ti ti-tool"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="status-dot bg-success me-2"></div>
                      <span>ODP-032</span>
                    </div>
                  </td>
                  <td><span class="badge bg-success">Healthy</span></td>
                  <td>16/16</td>
                  <td>
                    <div class="progress" style="width: 60px; height: 6px;">
                      <div class="progress-bar bg-danger" style="width: 100%"></div>
                    </div>
                    <small>100%</small>
                  </td>
                  <td>-17.8 dBm</td>
                  <td><span class="badge bg-info">Full</span></td>
                  <td>
                    <button class="btn btn-xs btn-outline-info">
                      <i class="ti ti-plus"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Alerts Tab -->
        <div class="tab-pane fade" id="alerts-tab">
          <div class="alert alert-danger">
            <div class="d-flex align-items-center">
              <i class="ti ti-alert-triangle fs-4 me-3"></i>
              <div class="flex-grow-1">
                <h6 class="alert-heading mb-1">Critical Alert: POP Timur Down</h6>
                <p class="mb-2">38 wireless clients affected. Link between core and POP Timur is down.</p>
                <small class="text-muted">Started: 2 minutes ago | Auto-escalated to NOC team</small>
              </div>
              <div>
                <button class="btn btn-sm btn-outline-light me-2">View Details</button>
                <button class="btn btn-sm btn-light">Acknowledge</button>
              </div>
            </div>
          </div>

          <div class="alert alert-warning">
            <div class="d-flex align-items-center">
              <i class="ti ti-exclamation-triangle fs-4 me-3"></i>
              <div class="flex-grow-1">
                <h6 class="alert-heading mb-1">Warning: Converter CVR-045 Offline</h6>
                <p class="mb-2">Optical power loss detected. Customer CV Berkah affected.</p>
                <small class="text-muted">Started: 5 minutes ago | Assigned to Teknisi B</small>
              </div>
              <div>
                <button class="btn btn-sm btn-outline-dark me-2">View Details</button>
                <button class="btn btn-sm btn-dark">Acknowledge</button>
              </div>
            </div>
          </div>

          <div class="alert alert-info">
            <div class="d-flex align-items-center">
              <i class="ti ti-info-circle fs-4 me-3"></i>
              <div class="flex-grow-1">
                <h6 class="alert-heading mb-1">Info: ODP-015 Splitter Issues</h6>
                <p class="mb-2">3 ONT units not responding. Signal degradation detected.</p>
                <small class="text-muted">Started: 12 minutes ago | Creating tickets automatically</small>
              </div>
              <div>
                <button class="btn btn-sm btn-outline-primary me-2">View Details</button>
                <button class="btn btn-sm btn-primary">Acknowledge</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Performance Charts -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-chart-line me-2"></i>
            Network Throughput (Last 24h)
          </h6>
        </div>
        <div class="card-body">
          <canvas id="throughputChart" height="200"></canvas>
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-chart-donut me-2"></i>
            Infrastructure Distribution
          </h6>
        </div>
        <div class="card-body">
          <canvas id="infrastructureChart" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<style>
.pulse {
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}

.status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  display: inline-block;
}

.table th, .table td {
  vertical-align: middle;
  padding: 0.5rem;
}

.btn-xs {
  padding: 0.125rem 0.25rem;
  font-size: 0.675rem;
  line-height: 1.2;
  border-radius: 0.15rem;
}
</style>

<script>
// Auto-refresh functionality
let autoRefreshEnabled = true;
let countdownTimer = 30;

function startCountdown() {
    const countdownElement = document.getElementById('countdown');
    
    const timer = setInterval(() => {
        if (!autoRefreshEnabled) {
            clearInterval(timer);
            return;
        }
        
        countdownTimer--;
        countdownElement.textContent = countdownTimer;
        
        if (countdownTimer <= 0) {
            refreshData();
            countdownTimer = 30;
        }
    }, 1000);
}

function refreshData() {
    console.log('Refreshing real-time data...');
    
    // Simulate data updates
    updateNetworkStats();
    updateInfrastructureTables();
    updateCharts();
}

function updateNetworkStats() {
    // Simulate minor fluctuations in network stats
    const onlineElement = document.getElementById('totalOnline');
    const currentOnline = parseInt(onlineElement.textContent);
    const newOnline = currentOnline + (Math.random() > 0.5 ? 1 : -1);
    onlineElement.textContent = newOnline;
    
    // Update offline count inversely
    const offlineElement = document.getElementById('totalOffline');
    const currentOffline = parseInt(offlineElement.textContent);
    offlineElement.textContent = 1293 - newOnline;
}

function updateInfrastructureTables() {
    // Update wireless table signal strengths
    const wirelessRows = document.querySelectorAll('#wirelessTable tr');
    wirelessRows.forEach(row => {
        const signalCell = row.cells[3];
        if (signalCell && signalCell.textContent.includes('dBm')) {
            const currentSignal = parseInt(signalCell.textContent);
            const newSignal = currentSignal + (Math.random() * 4 - 2); // ±2 dBm variation
            signalCell.textContent = Math.round(newSignal) + ' dBm';
        }
    });
}

function updateCharts() {
    // Update charts with new data points
    drawThroughputChart();
    drawInfrastructureChart();
}

// Toggle auto-refresh
document.getElementById('toggleAutoRefresh').addEventListener('click', function() {
    autoRefreshEnabled = !autoRefreshEnabled;
    
    if (autoRefreshEnabled) {
        this.innerHTML = '<i class="ti ti-pause me-1"></i> Pause';
        this.className = 'btn btn-outline-success btn-sm';
        countdownTimer = 30;
        startCountdown();
    } else {
        this.innerHTML = '<i class="ti ti-play me-1"></i> Resume';
        this.className = 'btn btn-outline-warning btn-sm';
        document.getElementById('countdown').textContent = '--';
    }
});

// Chart implementations
function drawThroughputChart() {
    const ctx = document.getElementById('throughputChart').getContext('2d');
    
    // Simulate throughput data for last 24 hours
    const hours = [];
    const throughputData = [];
    
    for (let i = 23; i >= 0; i--) {
        const hour = new Date();
        hour.setHours(hour.getHours() - i);
        hours.push(hour.getHours() + ':00');
        
        // Simulate traffic pattern (higher during day, lower at night)
        const baseTraffic = 5.0; // Base 5 Gbps
        const timeMultiplier = hour.getHours() >= 8 && hour.getHours() <= 22 ? 1.5 : 0.6;
        const randomVariation = Math.random() * 2 - 1; // ±1 Gbps
        throughputData.push(Math.max(0, baseTraffic * timeMultiplier + randomVariation));
    }
    
    // Clear canvas and draw simple line chart
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    ctx.strokeStyle = '#28a745';
    ctx.lineWidth = 2;
    ctx.beginPath();
    
    throughputData.forEach((value, index) => {
        const x = (index / (throughputData.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - (value / 10) * ctx.canvas.height;
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
}

function drawInfrastructureChart() {
    const ctx = document.getElementById('infrastructureChart').getContext('2d');
    const centerX = ctx.canvas.width / 2;
    const centerY = ctx.canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 20;
    
    const data = [
        { label: 'FTTH', value: 885, color: '#ffc107' },
        { label: 'Wireless', value: 245, color: '#28a745' },
        { label: 'Converter FO', value: 156, color: '#007bff' }
    ];
    
    const total = data.reduce((sum, item) => sum + item.value, 0);
    
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    let currentAngle = 0;
    data.forEach((item, index) => {
        const sliceAngle = (item.value / total) * 2 * Math.PI;
        
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + sliceAngle);
        ctx.lineTo(centerX, centerY);
        ctx.fillStyle = item.color;
        ctx.fill();
        
        currentAngle += sliceAngle;
    });
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    startCountdown();
    drawThroughputChart();
    drawInfrastructureChart();
});

// Update charts every refresh cycle
setInterval(() => {
    if (autoRefreshEnabled) {
        updateCharts();
    }
}, 30000);
</script>

@endsection