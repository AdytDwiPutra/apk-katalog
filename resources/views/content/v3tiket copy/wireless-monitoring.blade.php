@extends('layouts.master')

@section('title', 'V3 Wireless Monitoring')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-wifi me-2 text-success"></i>
        Wireless Infrastructure Monitoring
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.monitoring') }}">Monitoring</a></li>
          <li class="breadcrumb-item active">Wireless</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-success" id="refreshWireless">
        <i class="ti ti-refresh me-1"></i>
        Refresh
      </button>
      <div class="badge bg-success">
        <i class="ti ti-circle-filled me-1" style="font-size: 8px;"></i>
        LIVE
      </div>
    </div>
  </div>

  <!-- Wireless Overview Stats -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card bg-success text-white">
        <div class="card-body text-center">
          <i class="ti ti-wifi fs-2 mb-2"></i>
          <h3 class="mb-1">242</h3>
          <small>Online Links</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-danger text-white">
        <div class="card-body text-center">
          <i class="ti ti-wifi-off fs-2 mb-2"></i>
          <h3 class="mb-1">3</h3>
          <small>Offline Links</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-warning text-white">
        <div class="card-body text-center">
          <i class="ti ti-alert-triangle fs-2 mb-2"></i>
          <h3 class="mb-1">2</h3>
          <small>Poor Signal</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-info text-white">
        <div class="card-body text-center">
          <i class="ti ti-router fs-2 mb-2"></i>
          <h3 class="mb-1">12</h3>
          <small>POP Sites</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Wireless Performance Metrics -->
  <div class="row mb-4">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-line me-2"></i>
            Signal Quality Trends (Last 24h)
          </h5>
        </div>
        <div class="card-body">
          <canvas id="signalTrendChart" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-chart-donut me-2"></i>
            Signal Distribution
          </h5>
        </div>
        <div class="card-body">
          <canvas id="signalDistributionChart" height="250"></canvas>
          <div class="mt-3">
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-success me-1"></i>Excellent (-50 to -60 dBm)</span>
              <span class="fw-bold">65%</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-info me-1"></i>Good (-60 to -70 dBm)</span>
              <span class="fw-bold">28%</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><i class="ti ti-circle-filled text-warning me-1"></i>Fair (-70 to -80 dBm)</span>
              <span class="fw-bold">5%</span>
            </div>
            <div class="d-flex justify-content-between">
              <span><i class="ti ti-circle-filled text-danger me-1"></i>Poor (< -80 dBm)</span>
              <span class="fw-bold">2%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- POP Sites Status -->
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="ti ti-router me-2"></i>
        POP Sites Status
      </h5>
      <div class="btn-group" role="group">
        <button class="btn btn-sm btn-outline-secondary active" data-view="grid">
          <i class="ti ti-grid-dots"></i>
        </button>
        <button class="btn btn-sm btn-outline-secondary" data-view="list">
          <i class="ti ti-list"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      
      <!-- Grid View -->
      <div id="popGridView" class="row">
        
        <!-- POP Sentral -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-success">
            <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-success me-2"></div>
                <h6 class="mb-0">POP Sentral</h6>
              </div>
              <span class="badge bg-success">Online</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-success mb-0">45</h6>
                  <small class="text-muted">Active</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">50</h6>
                  <small class="text-muted">Capacity</small>
                </div>
                <div class="col-4">
                  <h6 class="text-info mb-0">90%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-success">-62 dBm</small>
                </div>
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-success" style="width: 85%"></div>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Throughput:</small>
                  <small class="fw-bold">2.1 Gbps</small>
                </div>
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-info" style="width: 70%"></div>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Last Update: 30s ago</small>
                <button class="btn btn-xs btn-outline-primary">
                  <i class="ti ti-eye me-1"></i>
                  Details
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- POP Timur (Down) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-danger">
            <div class="card-header bg-light-danger d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-danger me-2 blink"></div>
                <h6 class="mb-0">POP Timur</h6>
              </div>
              <span class="badge bg-danger">Down</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-danger mb-0">0</h6>
                  <small class="text-muted">Active</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">40</h6>
                  <small class="text-muted">Capacity</small>
                </div>
                <div class="col-4">
                  <h6 class="text-danger mb-0">0%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="alert alert-danger p-2 mb-2">
                <small><i class="ti ti-alert-triangle me-1"></i><strong>CRITICAL:</strong> Main link down</small>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Last Signal:</small>
                  <small class="text-muted">N/A</small>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-danger">Down since: 2m ago</small>
                <button class="btn btn-xs btn-danger">
                  <i class="ti ti-alert-triangle me-1"></i>
                  Alert
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- POP Barat (Warning) -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-warning">
            <div class="card-header bg-light-warning d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-warning me-2"></div>
                <h6 class="mb-0">POP Barat</h6>
              </div>
              <span class="badge bg-warning">Warning</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-warning mb-0">52</h6>
                  <small class="text-muted">Active</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">60</h6>
                  <small class="text-muted">Capacity</small>
                </div>
                <div class="col-4">
                  <h6 class="text-warning mb-0">87%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="alert alert-warning p-2 mb-2">
                <small><i class="ti ti-exclamation-triangle me-1"></i><strong>Warning:</strong> High interference</small>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-warning">-68 dBm</small>
                </div>
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-warning" style="width: 60%"></div>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Last Update: 45s ago</small>
                <button class="btn btn-xs btn-outline-warning">
                  <i class="ti ti-tool me-1"></i>
                  Fix
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- POP Utara -->
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card border-success">
            <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="status-indicator bg-success me-2"></div>
                <h6 class="mb-0">POP Utara</h6>
              </div>
              <span class="badge bg-success">Online</span>
            </div>
            <div class="card-body">
              <div class="row text-center mb-3">
                <div class="col-4">
                  <h6 class="text-success mb-0">38</h6>
                  <small class="text-muted">Active</small>
                </div>
                <div class="col-4">
                  <h6 class="text-muted mb-0">45</h6>
                  <small class="text-muted">Capacity</small>
                </div>
                <div class="col-4">
                  <h6 class="text-info mb-0">84%</h6>
                  <small class="text-muted">Load</small>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Avg Signal:</small>
                  <small class="fw-bold text-success">-65 dBm</small>
                </div>
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-success" style="width: 80%"></div>
                </div>
              </div>
              
              <div class="mb-2">
                <div class="d-flex justify-content-between">
                  <small>Throughput:</small>
                  <small class="fw-bold">1.9 Gbps</small>
                </div>
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-info" style="width: 65%"></div>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Last Update: 25s ago</small>
                <button class="btn btn-xs btn-outline-primary">
                  <i class="ti ti-eye me-1"></i>
                  Details
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
      
      <!-- List View (Hidden by default) -->
      <div id="popListView" class="table-responsive" style="display: none;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>POP Site</th>
              <th>Status</th>
              <th>Active Links</th>
              <th>Capacity</th>
              <th>Load</th>
              <th>Avg Signal</th>
              <th>Throughput</th>
              <th>Issues</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-indicator bg-success me-2"></div>
                  <span class="fw-medium">POP Sentral</span>
                </div>
              </td>
              <td><span class="badge bg-success">Online</span></td>
              <td>45/50</td>
              <td>50 links</td>
              <td>
                <div class="progress" style="width: 60px; height: 6px;">
                  <div class="progress-bar bg-success" style="width: 90%"></div>
                </div>
                90%
              </td>
              <td>-62 dBm</td>
              <td>2.1 Gbps</td>
              <td><span class="badge bg-success">0</span></td>
              <td>
                <button class="btn btn-xs btn-outline-primary me-1">
                  <i class="ti ti-eye"></i>
                </button>
                <button class="btn btn-xs btn-outline-info">
                  <i class="ti ti-settings"></i>
                </button>
              </td>
            </tr>
            <tr class="table-danger">
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-indicator bg-danger me-2 blink"></div>
                  <span class="fw-medium">POP Timur</span>
                </div>
              </td>
              <td><span class="badge bg-danger">Down</span></td>
              <td>0/40</td>
              <td>40 links</td>
              <td>
                <div class="progress" style="width: 60px; height: 6px;">
                  <div class="progress-bar bg-danger" style="width: 0%"></div>
                </div>
                0%
              </td>
              <td>N/A</td>
              <td>0 Mbps</td>
              <td><span class="badge bg-danger">1</span></td>
              <td>
                <button class="btn btn-xs btn-danger me-1">
                  <i class="ti ti-alert-triangle"></i>
                </button>
                <button class="btn btn-xs btn-outline-warning">
                  <i class="ti ti-tool"></i>
                </button>
              </td>
            </tr>
            <tr class="table-warning">
              <td>
                <div class="d-flex align-items-center">
                  <div class="status-indicator bg-warning me-2"></div>
                  <span class="fw-medium">POP Barat</span>
                </div>
              </td>
              <td><span class="badge bg-warning">Warning</span></td>
              <td>52/60</td>
              <td>60 links</td>
              <td>
                <div class="progress" style="width: 60px; height: 6px;">
                  <div class="progress-bar bg-warning" style="width: 87%"></div>
                </div>
                87%
              </td>
              <td>-68 dBm</td>
              <td>1.8 Gbps</td>
              <td><span class="badge bg-warning">1</span></td>
              <td>
                <button class="btn btn-xs btn-outline-primary me-1">
                  <i class="ti ti-eye"></i>
                </button>
                <button class="btn btn-xs btn-outline-warning">
                  <i class="ti ti-tool"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>

  <!-- Frequency Analysis -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-radar me-2"></i>
            Frequency Utilization
          </h5>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <h6 class="mb-2">2.4 GHz Band</h6>
              <div class="progress mb-2" style="height: 8px;">
                <div class="progress-bar bg-danger" style="width: 85%"></div>
              </div>
              <small class="text-danger">85% Utilized (High Congestion)</small>
            </div>
            <div class="col-md-6">
              <h6 class="mb-2">5.8 GHz Band</h6>
              <div class="progress mb-2" style="height: 8px;">
                <div class="progress-bar bg-success" style="width: 45%"></div>
              </div>
              <small class="text-success">45% Utilized (Optimal)</small>
            </div>
          </div>
          
          <canvas id="frequencyChart" height="200"></canvas>
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
                  <h6 class="mb-1 text-danger">POP Timur Main Link Down</h6>
                  <p class="mb-1 small">40 customers affected. Core-to-POP connection lost.</p>
                  <small class="text-muted">2 minutes ago</small>
                </div>
                <span class="badge bg-danger">CRITICAL</span>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-warning border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-warning">High Interference at POP Barat</h6>
                  <p class="mb-1 small">Channel 149 experiencing 15dB interference.</p>
                  <small class="text-muted">5 minutes ago</small>
                </div>
                <span class="badge bg-warning">HIGH</span>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-info border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-info">Weather Alert</h6>
                  <p class="mb-1 small">Heavy rain forecast. Monitor signal quality.</p>
                  <small class="text-muted">12 minutes ago</small>
                </div>
                <span class="badge bg-info">INFO</span>
              </div>
            </div>
            
            <div class="list-group-item px-0 border-start border-success border-4">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 text-success">POP Utara Maintenance Complete</h6>
                  <p class="mb-1 small">Antenna alignment successfully completed.</p>
                  <small class="text-muted">1 hour ago</small>
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

.btn-xs {
  padding: 0.125rem 0.25rem;
  font-size: 0.675rem;
  line-height: 1.2;
  border-radius: 0.15rem;
}
</style>

<script>
// View toggle functionality
document.querySelectorAll('[data-view]').forEach(button => {
    button.addEventListener('click', function() {
        const view = this.getAttribute('data-view');
        
        // Update active button
        document.querySelectorAll('[data-view]').forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        
        // Toggle views
        if (view === 'grid') {
            document.getElementById('popGridView').style.display = 'block';
            document.getElementById('popListView').style.display = 'none';
        } else {
            document.getElementById('popGridView').style.display = 'none';
            document.getElementById('popListView').style.display = 'block';
        }
    });
});

// Signal trend chart
function drawSignalTrendChart() {
    const ctx = document.getElementById('signalTrendChart').getContext('2d');
    const hours = [];
    const popSentral = [];
    const popBarat = [];
    const popUtara = [];
    
    // Generate 24 hours of signal data
    for (let i = 23; i >= 0; i--) {
        const hour = new Date();
        hour.setHours(hour.getHours() - i);
        hours.push(hour.getHours() + ':00');
        
        // Simulate signal variations
        popSentral.push(-60 + Math.random() * 4 - 2); // -58 to -62
        popBarat.push(-66 + Math.random() * 6 - 3);   // -63 to -69 (degraded)
        popUtara.push(-63 + Math.random() * 4 - 2);   // -61 to -65
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
    
    // Draw signal lines
    function drawLine(data, color, lineWidth = 2) {
        ctx.strokeStyle = color;
        ctx.lineWidth = lineWidth;
        ctx.beginPath();
        
        data.forEach((signal, index) => {
            const x = (index / (data.length - 1)) * ctx.canvas.width;
            const y = ctx.canvas.height - ((Math.abs(signal) - 50) / 30) * ctx.canvas.height;
            
            if (index === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        });
        
        ctx.stroke();
    }
    
    drawLine(popSentral, '#28a745');  // Green for POP Sentral
    drawLine(popBarat, '#ffc107');    // Yellow for POP Barat
    drawLine(popUtara, '#007bff');    // Blue for POP Utara
}

// Signal distribution pie chart
function drawSignalDistributionChart() {
    const ctx = document.getElementById('signalDistributionChart').getContext('2d');
    const centerX = ctx.canvas.width / 2;
    const centerY = ctx.canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 20;
    
    const data = [
        { label: 'Excellent', value: 65, color: '#28a745' },
        { label: 'Good', value: 28, color: '#17a2b8' },
        { label: 'Fair', value: 5, color: '#ffc107' },
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

// Frequency utilization chart
function drawFrequencyChart() {
    const ctx = document.getElementById('frequencyChart').getContext('2d');
    
    // Sample frequency data
    const channels = ['Ch 1', 'Ch 6', 'Ch 11', 'Ch 36', 'Ch 149', 'Ch 165'];
    const utilization = [85, 78, 82, 35, 45, 38]; // Percentage
    const colors = ['#dc3545', '#dc3545', '#dc3545', '#28a745', '#28a745', '#28a745'];
    
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    const barWidth = ctx.canvas.width / channels.length * 0.8;
    const spacing = ctx.canvas.width / channels.length * 0.2;
    
    channels.forEach((channel, index) => {
        const barHeight = (utilization[index] / 100) * ctx.canvas.height;
        const x = index * (barWidth + spacing) + spacing / 2;
        const y = ctx.canvas.height - barHeight;
        
        // Draw bar
        ctx.fillStyle = colors[index];
        ctx.fillRect(x, y, barWidth, barHeight);
        
        // Draw percentage text
        ctx.fillStyle = '#000';
        ctx.font = '12px Arial';
        ctx.textAlign = 'center';
        ctx.fillText(utilization[index] + '%', x + barWidth / 2, y - 5);
        
        // Draw channel label
        ctx.fillText(channel, x + barWidth / 2, ctx.canvas.height + 15);
    });
}

// Auto-refresh functionality
function refreshWirelessData() {
    console.log('Refreshing wireless monitoring data...');
    drawSignalTrendChart();
    drawSignalDistributionChart();
    drawFrequencyChart();
}

// Initialize charts
document.addEventListener('DOMContentLoaded', function() {
    drawSignalTrendChart();
    drawSignalDistributionChart();
    drawFrequencyChart();
});

// Manual refresh
document.getElementById('refreshWireless').addEventListener('click', function() {
    this.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i> Refreshing...';
    this.disabled = true;
    
    setTimeout(() => {
        refreshWirelessData();
        this.innerHTML = '<i class="ti ti-refresh me-1"></i> Refresh';
        this.disabled = false;
    }, 2000);
});

// Auto-refresh every 30 seconds
setInterval(refreshWirelessData, 30000);
</script>

@endsection