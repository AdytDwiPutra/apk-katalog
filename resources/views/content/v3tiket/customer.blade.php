@extends('layouts.master')

@section('title', 'V3 Customer Information')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-user me-2 text-primary"></i>
        Customer Information
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item active">Customer {{ $customer_id }}</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-success">
        <i class="ti ti-plus me-1"></i>
        Buat Tiket Baru
      </button>
      <button class="btn btn-outline-primary">
        <i class="ti ti-edit me-1"></i>
        Edit Customer
      </button>
    </div>
  </div>

  <div class="row">
    
    <!-- Customer Profile -->
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-xl mx-auto mb-3">
            <div class="avatar-initial bg-primary rounded-circle">
              <i class="ti ti-building fs-2"></i>
            </div>
          </div>
          <h5 class="mb-1">PT Maju Jaya</h5>
          <p class="text-muted mb-3">Corporate Customer</p>
          
          <div class="row text-center mb-3">
            <div class="col-4">
              <h6 class="mb-0">{{ $customer_id }}</h6>
              <small class="text-muted">Customer ID</small>
            </div>
            <div class="col-4">
              <h6 class="mb-0 text-success">Active</h6>
              <small class="text-muted">Status</small>
            </div>
            <div class="col-4">
              <h6 class="mb-0">3 Years</h6>
              <small class="text-muted">Duration</small>
            </div>
          </div>

          <div class="d-flex justify-content-center gap-2">
            <span class="badge bg-label-success">
              <i class="ti ti-wifi me-1"></i>
              Wireless
            </span>
            <span class="badge bg-label-info">
              <i class="ti ti-star me-1"></i>
              Premium
            </span>
          </div>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="card mt-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-zap me-2"></i>
            Quick Actions
          </h6>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-outline-success">
              <i class="ti ti-phone me-1"></i>
              Call Customer
            </button>
            <button class="btn btn-outline-info">
              <i class="ti ti-message me-1"></i>
              Send WhatsApp
            </button>
            <button class="btn btn-outline-warning">
              <i class="ti ti-tool me-1"></i>
              Remote Diagnosis
            </button>
            <button class="btn btn-outline-primary">
              <i class="ti ti-calendar me-1"></i>
              Schedule Visit
            </button>
          </div>
        </div>
      </div>

      <!-- Infrastructure Info -->
      <div class="card mt-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-network me-2"></i>
            Infrastructure Details
          </h6>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <small class="text-muted">Connection Type</small>
            <div class="d-flex align-items-center">
              <i class="ti ti-wifi text-success me-2"></i>
              <span class="fw-medium">Wireless PTP</span>
            </div>
          </div>
          <div class="mb-3">
            <small class="text-muted">Connected to</small>
            <div class="d-flex align-items-center">
              <i class="ti ti-router text-primary me-2"></i>
              <span class="fw-medium">POP Sentral</span>
            </div>
          </div>
          <div class="mb-3">
            <small class="text-muted">Equipment</small>
            <div class="fw-medium">Ubiquiti NanoStation AC5</div>
          </div>
          <div class="mb-3">
            <small class="text-muted">IP Address</small>
            <div class="fw-medium">192.168.100.45</div>
          </div>
          <div>
            <small class="text-muted">MAC Address</small>
            <div class="fw-medium">00:27:22:XX:XX:XX</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-lg-8">
      
      <!-- Customer Details -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-info-circle me-2"></i>
            Customer Details
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Company Name</h6>
              <p class="mb-0">PT Maju Jaya Indonesia</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Contact Person</h6>
              <p class="mb-0">Bapak Joko Santoso (IT Manager)</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Phone Number</h6>
              <p class="mb-0">+62 821-1234-5678</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Email</h6>
              <p class="mb-0">it@majujaya.co.id</p>
            </div>
            <div class="col-12 mb-3">
              <h6 class="text-muted mb-2">Address</h6>
              <p class="mb-0">
                Jl. Merdeka No. 123, Blok A-15<br>
                Jakarta Pusat, DKI Jakarta 10110
              </p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Registration Date</h6>
              <p class="mb-0">15 Januari 2022</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Account Manager</h6>
              <p class="mb-0">Sarah Putri (sarah@isp.co.id)</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Service Package -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-package me-2"></i>
            Service Package & Billing
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Package Name</h6>
              <p class="mb-0 fw-medium">Corporate Premium 50 Mbps</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Bandwidth</h6>
              <p class="mb-0">50 Mbps Dedicated (Up/Down)</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Monthly Fee</h6>
              <p class="mb-0">Rp 3,500,000 / month</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Billing Cycle</h6>
              <p class="mb-0">Monthly (Auto-debit)</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Next Billing</h6>
              <p class="mb-0">15 Oktober 2025</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6 class="text-muted mb-2">Payment Status</h6>
              <span class="badge bg-success">Paid</span>
            </div>
            <div class="col-12">
              <h6 class="text-muted mb-2">SLA Terms</h6>
              <ul class="mb-0">
                <li>99.5% uptime guarantee</li>
                <li>4-hour response time for critical issues</li>
                <li>24/7 technical support</li>
                <li>Free on-site visit for major issues</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Network Statistics -->
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-chart-line me-2"></i>
            Real-time Network Status
          </h5>
          <div class="badge bg-success">
            <i class="ti ti-circle-filled me-1" style="font-size: 8px;"></i>
            ONLINE
          </div>
        </div>
        <div class="card-body">
          <div class="row text-center mb-4">
            <div class="col-md-3">
              <h4 class="text-success mb-1">-62</h4>
              <small class="text-muted">Signal (dBm)</small>
              <div class="progress mt-1" style="height: 4px;">
                <div class="progress-bar bg-success" style="width: 85%"></div>
              </div>
            </div>
            <div class="col-md-3">
              <h4 class="text-success mb-1">0.1%</h4>
              <small class="text-muted">Packet Loss</small>
              <div class="progress mt-1" style="height: 4px;">
                <div class="progress-bar bg-success" style="width: 99%"></div>
              </div>
            </div>
            <div class="col-md-3">
              <h4 class="text-info mb-1">2.1ms</h4>
              <small class="text-muted">Latency</small>
              <div class="progress mt-1" style="height: 4px;">
                <div class="progress-bar bg-info" style="width: 90%"></div>
              </div>
            </div>
            <div class="col-md-3">
              <h4 class="text-primary mb-1">48.2</h4>
              <small class="text-muted">Mbps Used</small>
              <div class="progress mt-1" style="height: 4px;">
                <div class="progress-bar bg-primary" style="width: 96%"></div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <h6 class="mb-3">Bandwidth Usage (Last 24h)</h6>
              <canvas id="bandwidthChart" height="150"></canvas>
            </div>
            <div class="col-md-6">
              <h6 class="mb-3">Connection Quality</h6>
              <canvas id="qualityChart" height="150"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Ticket History -->
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-history me-2"></i>
            Ticket History
          </h5>
          <a href="{{ route('v3tiket.list') }}?customer={{ $customer_id }}" class="btn btn-sm btn-outline-primary">
            View All Tickets
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Ticket ID</th>
                  <th>Issue</th>
                  <th>Status</th>
                  <th>Priority</th>
                  <th>Created</th>
                  <th>Resolved</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-001') }}" class="fw-medium">TKT-001</a>
                  </td>
                  <td>Signal Lemah</td>
                  <td><span class="badge bg-warning">In Progress</span></td>
                  <td><span class="badge bg-danger">Critical</span></td>
                  <td>
                    <small>24 Sep 2025<br>10:30</small>
                  </td>
                  <td>-</td>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-001') }}" class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-045') }}" class="fw-medium">TKT-045</a>
                  </td>
                  <td>Koneksi Lambat</td>
                  <td><span class="badge bg-success">Resolved</span></td>
                  <td><span class="badge bg-warning">Medium</span></td>
                  <td>
                    <small>20 Sep 2025<br>14:15</small>
                  </td>
                  <td>
                    <small>20 Sep 2025<br>16:30</small>
                  </td>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-045') }}" class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-032') }}" class="fw-medium">TKT-032</a>
                  </td>
                  <td>Intermittent Connection</td>
                  <td><span class="badge bg-success">Resolved</span></td>
                  <td><span class="badge bg-warning">High</span></td>
                  <td>
                    <small>18 Sep 2025<br>09:20</small>
                  </td>
                  <td>
                    <small>18 Sep 2025<br>12:45</small>
                  </td>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-032') }}" class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-019') }}" class="fw-medium">TKT-019</a>
                  </td>
                  <td>Antenna Alignment</td>
                  <td><span class="badge bg-success">Resolved</span></td>
                  <td><span class="badge bg-success">Low</span></td>
                  <td>
                    <small>15 Sep 2025<br>11:00</small>
                  </td>
                  <td>
                    <small>15 Sep 2025<br>15:30</small>
                  </td>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-019') }}" class="btn btn-xs btn-outline-primary">
                      <i class="ti ti-eye"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <!-- Ticket Statistics -->
          <div class="row mt-4 text-center">
            <div class="col-md-3">
              <h5 class="text-info mb-1">15</h5>
              <small class="text-muted">Total Tickets</small>
            </div>
            <div class="col-md-3">
              <h5 class="text-success mb-1">13</h5>
              <small class="text-muted">Resolved</small>
            </div>
            <div class="col-md-3">
              <h5 class="text-warning mb-1">1</h5>
              <small class="text-muted">In Progress</small>
            </div>
            <div class="col-md-3">
              <h5 class="text-primary mb-1">2.5h</h5>
              <small class="text-muted">Avg Resolution</small>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<style>
.btn-xs {
  padding: 0.125rem 0.25rem;
  font-size: 0.675rem;
  line-height: 1.2;
  border-radius: 0.15rem;
}

.avatar-xl {
  width: 80px;
  height: 80px;
}

.avatar-xl .avatar-initial {
  font-size: 2rem;
}
</style>

<script>
// Bandwidth usage chart
function drawBandwidthChart() {
    const ctx = document.getElementById('bandwidthChart').getContext('2d');
    const hours = [];
    const usageData = [];
    
    // Generate 24 hours of sample data
    for (let i = 23; i >= 0; i--) {
        const hour = new Date();
        hour.setHours(hour.getHours() - i);
        hours.push(hour.getHours());
        
        // Simulate business hours usage pattern
        let usage;
        const h = hour.getHours();
        if (h >= 8 && h <= 17) {
            usage = 40 + Math.random() * 10; // Business hours: 40-50 Mbps
        } else if (h >= 18 && h <= 22) {
            usage = 25 + Math.random() * 15; // Evening: 25-40 Mbps
        } else {
            usage = 5 + Math.random() * 10; // Night: 5-15 Mbps
        }
        usageData.push(usage);
    }
    
    // Clear and draw
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
    
    // Draw usage line
    ctx.strokeStyle = '#007bff';
    ctx.lineWidth = 2;
    ctx.beginPath();
    
    usageData.forEach((usage, index) => {
        const x = (index / (usageData.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - (usage / 50) * ctx.canvas.height;
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
}

// Connection quality chart
function drawQualityChart() {
    const ctx = document.getElementById('qualityChart').getContext('2d');
    const centerX = ctx.canvas.width / 2;
    const centerY = ctx.canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 20;
    
    // Quality metrics
    const signalQuality = 85; // 85%
    const connectionStability = 92; // 92%
    const performanceScore = 88; // 88%
    
    // Clear canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
    // Draw overall quality score
    const overallScore = (signalQuality + connectionStability + performanceScore) / 3;
    
    // Background circle
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
    ctx.strokeStyle = '#e9ecef';
    ctx.lineWidth = 10;
    ctx.stroke();
    
    // Quality arc
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, -Math.PI / 2, -Math.PI / 2 + (overallScore / 100) * 2 * Math.PI);
    ctx.strokeStyle = overallScore >= 80 ? '#28a745' : overallScore >= 60 ? '#ffc107' : '#dc3545';
    ctx.lineWidth = 10;
    ctx.stroke();
    
    // Center text
    ctx.font = 'bold 24px Arial';
    ctx.fillStyle = ctx.strokeStyle;
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(Math.round(overallScore) + '%', centerX, centerY);
    
    ctx.font = '12px Arial';
    ctx.fillStyle = '#6c757d';
    ctx.fillText('Quality Score', centerX, centerY + 25);
}

// Initialize charts
document.addEventListener('DOMContentLoaded', function() {
    drawBandwidthChart();
    drawQualityChart();
});

// Auto-refresh charts every 5 minutes
setInterval(() => {
    drawBandwidthChart();
    drawQualityChart();
}, 300000);
</script>

@endsection