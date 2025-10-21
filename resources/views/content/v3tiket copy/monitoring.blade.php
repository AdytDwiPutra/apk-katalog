@extends('layouts.master')

@section('title', 'V3 Monitoring Overview')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-activity me-2 text-success"></i>
        Monitoring Overview V3
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item active">Monitoring</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-success" id="refreshBtn">
        <i class="ti ti-refresh me-1"></i>
        Refresh
      </button>
      <div class="badge bg-success">
        <i class="ti ti-circle-filled me-1" style="font-size: 8px;"></i>
        LIVE
      </div>
    </div>
  </div>

  <!-- Real-time Stats -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-pulse me-2"></i>
            Status Real-time
          </h5>
        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-md-2">
              <h3 class="text-success mb-1">1,293</h3>
              <small class="text-muted">Total Pelanggan</small>
            </div>
            <div class="col-md-2">
              <h3 class="text-success mb-1">1,282</h3>
              <small class="text-muted">Online</small>
            </div>
            <div class="col-md-2">
              <h3 class="text-danger mb-1">11</h3>
              <small class="text-muted">Bermasalah</small>
            </div>
            <div class="col-md-2">
              <h3 class="text-warning mb-1">8</h3>
              <small class="text-muted">Tiket Aktif</small>
            </div>
            <div class="col-md-2">
              <h3 class="text-info mb-1">99.2%</h3>
              <small class="text-muted">Network Uptime</small>
            </div>
            <div class="col-md-2">
              <h3 class="text-primary mb-1">2.3 ms</h3>
              <small class="text-muted">Avg Latency</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Infrastructure Monitoring -->
  <div class="row mb-4">
    
    <!-- Wireless Monitoring -->
    <div class="col-lg-4 mb-3">
      <div class="card h-100 border-start border-success border-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0">
            <i class="ti ti-wifi text-success me-2"></i>
            WIRELESS POP
          </h6>
          <a href="{{ route('v3tiket.wireless.monitoring') }}" class="btn btn-sm btn-outline-success">
            Detail
          </a>
        </div>
        <div class="card-body">
          <div class="row text-center mb-3">
            <div class="col-4">
              <h5 class="text-success mb-0">242</h5>
              <small class="text-muted">Online</small>
            </div>
            <div class="col-4">
              <h5 class="text-danger mb-0">3</h5>
              <small class="text-muted">Down</small>
            </div>
            <div class="col-4">
              <h5 class="text-info mb-0">12</h5>
              <small class="text-muted">POP Sites</small>
            </div>
          </div>
          
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <small>Signal Quality</small>
              <small>98.8%</small>
            </div>
            <div class="progress" style="height: 6px;">
              <div class="progress-bar bg-success" style="width: 98.8%"></div>
            </div>
          </div>

          <div class="list-group list-group-flush">
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">POP Sentral</small><br>
                <small class="text-muted">45 clients</small>
              </div>
              <span class="badge bg-success">OK</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">POP Timur</small><br>
                <small class="text-muted">38 clients</small>
              </div>
              <span class="badge bg-danger">DOWN</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">POP Barat</small><br>
                <small class="text-muted">52 clients</small>
              </div>
              <span class="badge bg-warning">WARNING</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Converter FO Monitoring -->
    <div class="col-lg-4 mb-3">
      <div class="card h-100 border-start border-primary border-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0">
            <i class="ti ti-network text-primary me-2"></i>
            CONVERTER FO POP
          </h6>
          <a href="{{ route('v3tiket.converter.monitoring') }}" class="btn btn-sm btn-outline-primary">
            Detail
          </a>
        </div>
        <div class="card-body">
          <div class="row text-center mb-3">
            <div class="col-4">
              <h5 class="text-primary mb-0">155</h5>
              <small class="text-muted">Online</small>
            </div>
            <div class="col-4">
              <h5 class="text-danger mb-0">1</h5>
              <small class="text-muted">Down</small>
            </div>
            <div class="col-4">
              <h5 class="text-info mb-0">8</h5>
              <small class="text-muted">POP Sites</small>
            </div>
          </div>
          
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <small>Optical Health</small>
              <small>99.4%</small>
            </div>
            <div class="progress" style="height: 6px;">
              <div class="progress-bar bg-primary" style="width: 99.4%"></div>
            </div>
          </div>

          <div class="list-group list-group-flush">
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">Optical Power</small><br>
                <small class="text-muted">Avg: -15.2 dBm</small>
              </div>
              <span class="badge bg-success">GOOD</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">Link Errors</small><br>
                <small class="text-muted">0.01% error rate</small>
              </div>
              <span class="badge bg-success">LOW</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">Converter Status</small><br>
                <small class="text-muted">1 offline</small>
              </div>
              <span class="badge bg-warning">ALERT</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FTTH Monitoring -->
    <div class="col-lg-4 mb-3">
      <div class="card h-100 border-start border-warning border-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0">
            <i class="ti ti-home text-warning me-2"></i>
            FTTH ODP
          </h6>
          <a href="{{ route('v3tiket.ftth.monitoring') }}" class="btn btn-sm btn-outline-warning">
            Detail
          </a>
        </div>
        <div class="card-body">
          <div class="row text-center mb-3">
            <div class="col-4">
              <h5 class="text-warning mb-0">885</h5>
              <small class="text-muted">Online</small>
            </div>
            <div class="col-4">
              <h5 class="text-danger mb-0">7</h5>
              <small class="text-muted">Down</small>
            </div>
            <div class="col-4">
              <h5 class="text-info mb-0">45</h5>
              <small class="text-muted">ODP Sites</small>
            </div>
          </div>
          
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <small>Service Quality</small>
              <small>92.2%</small>
            </div>
            <div class="progress" style="height: 6px;">
              <div class="progress-bar bg-warning" style="width: 92.2%"></div>
            </div>
          </div>

          <div class="list-group list-group-flush">
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">ONT Status</small><br>
                <small class="text-muted">885/892 online</small>
              </div>
              <span class="badge bg-warning">ISSUES</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">ODP Health</small><br>
                <small class="text-muted">3 with problems</small>
              </div>
              <span class="badge bg-danger">ALERT</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
              <div>
                <small class="fw-medium">Splitter Load</small><br>
                <small class="text-muted">Avg: 85%</small>
              </div>
              <span class="badge bg-warning">HIGH</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Network Map & Alerts -->
  <div class="row">
    
    <!-- Network Topology -->
    <div class="col-lg-8 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-topology-ring me-2"></i>
            Network Topology
          </h5>
          <div class="btn-group" role="group">
            <button class="btn btn-sm btn-outline-secondary active">Map</button>
            <button class="btn btn-sm btn-outline-secondary">List</button>
            <button class="btn btn-sm btn-outline-secondary">Chart</button>
          </div>
        </div>
        <div class="card-body">
          <div class="network-map" style="height: 400px; background: #f8f9fa; border-radius: 8px; position: relative; overflow: hidden;">
            
            <!-- Core Infrastructure -->
            <div class="position-absolute top-50 start-50 translate-middle">
              <div class="text-center">
                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="ti ti-server text-white fs-4"></i>
                </div>
                <div class="small fw-bold mt-1">CORE</div>
              </div>
            </div>

            <!-- POP Sites (Wireless + Converter) -->
            <div class="position-absolute" style="top: 20%; left: 20%;">
              <div class="text-center">
                <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                  <i class="ti ti-wifi text-white"></i>
                </div>
                <div class="small mt-1">POP-1</div>
                <div class="small text-muted">Wireless</div>
              </div>
            </div>

            <div class="position-absolute" style="top: 20%; right: 20%;">
              <div class="text-center">
                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                  <i class="ti ti-network text-white"></i>
                </div>
                <div class="small mt-1">POP-2</div>
                <div class="small text-muted">Converter</div>
              </div>
            </div>

            <div class="position-absolute" style="bottom: 30%; left: 15%;">
              <div class="text-center">
                <div class="bg-danger rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                  <i class="ti ti-wifi text-white"></i>
                </div>
                <div class="small mt-1">POP-3</div>
                <div class="small text-danger">DOWN</div>
              </div>
            </div>

            <!-- ODP Sites (FTTH - Separate Path) -->
            <div class="position-absolute" style="bottom: 20%; right: 25%;">
              <div class="text-center">
                <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                  <i class="ti ti-home text-white"></i>
                </div>
                <div class="small mt-1">ODP-1</div>
                <div class="small text-muted">FTTH</div>
              </div>
            </div>

            <div class="position-absolute" style="top: 30%; right: 10%;">
              <div class="text-center">
                <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                  <i class="ti ti-home text-white"></i>
                </div>
                <div class="small mt-1">ODP-2</div>
                <div class="small text-muted">FTTH</div>
              </div>
            </div>

            <!-- Connection Lines -->
            <svg class="position-absolute top-0 start-0 w-100 h-100" style="z-index: -1;">
              <!-- Core to POP connections -->
              <line x1="50%" y1="50%" x2="20%" y2="20%" stroke="#28a745" stroke-width="2" stroke-dasharray="none"/>
              <line x1="50%" y1="50%" x2="80%" y2="20%" stroke="#007bff" stroke-width="2"/>
              <line x1="50%" y1="50%" x2="15%" y2="70%" stroke="#dc3545" stroke-width="3" stroke-dasharray="5,5"/>
              
              <!-- Core to ODP connections (separate path) -->
              <line x1="50%" y1="50%" x2="75%" y2="80%" stroke="#ffc107" stroke-width="2"/>
              <line x1="50%" y1="50%" x2="90%" y2="30%" stroke="#ffc107" stroke-width="2"/>
            </svg>

            <!-- Legend -->
            <div class="position-absolute bottom-0 start-0 p-3">
              <div class="d-flex gap-3 small">
                <div><span class="badge bg-success"></span> POP Wireless</div>
                <div><span class="badge bg-primary"></span> POP Converter</div>
                <div><span class="badge bg-warning"></span> ODP FTTH</div>
                <div><span class="badge bg-danger"></span> Down</div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Live Alerts -->
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-alert-triangle me-2"></i>
            Live Alerts
          </h5>
          <span class="badge bg-danger">3</span>
        </div>
        <div class="card-body p-0">
          <div class="list-group list-group-flush">
            
            <div class="list-group-item">
              <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                  <div class="d-flex align-items-center mb-1">
                    <i class="ti ti-wifi text-danger me-2"></i>
                    <small class="fw-bold">POP Timur Down</small>
                  </div>
                  <small class="text-muted">38 pelanggan terputus</small><br>
                  <small class="text-muted">2 menit lalu</small>
                </div>
                <span class="badge bg-danger">CRITICAL</span>
              </div>
            </div>

            <div class="list-group-item">
              <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                  <div class="d-flex align-items-center mb-1">
                    <i class="ti ti-network text-warning me-2"></i>
                    <small class="fw-bold">Converter CVR-045 Offline</small>
                  </div>
                  <small class="text-muted">High optical power loss</small><br>
                  <small class="text-muted">5 menit lalu</small>
                </div>
                <span class="badge bg-warning">HIGH</span>
              </div>
            </div>

            <div class="list-group-item">
              <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                  <div class="d-flex align-items-center mb-1">
                    <i class="ti ti-home text-warning me-2"></i>
                    <small class="fw-bold">ODP-15 Splitter Issue</small>
                  </div>
                  <small class="text-muted">3 ONT tidak terdeteksi</small><br>
                  <small class="text-muted">12 menit lalu</small>
                </div>
                <span class="badge bg-warning">MEDIUM</span>
              </div>
            </div>

            <div class="list-group-item">
              <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                  <div class="d-flex align-items-center mb-1">
                    <i class="ti ti-wifi text-info me-2"></i>
                    <small class="fw-bold">Signal Quality Degraded</small>
                  </div>
                  <small class="text-muted">POP Barat - RSSI below threshold</small><br>
                  <small class="text-muted">18 menit lalu</small>
                </div>
                <span class="badge bg-info">LOW</span>
              </div>
            </div>

          </div>
        </div>
        <div class="card-footer">
          <a href="{{ route('v3tiket.status') }}" class="btn btn-sm btn-outline-primary w-100">
            <i class="ti ti-eye me-1"></i>
            Lihat Semua Alert
          </a>
        </div>
      </div>
    </div>

  </div>

</div>

<script>
// Auto refresh every 30 seconds
setInterval(function() {
    console.log('Refreshing monitoring data...');
    updateMonitoringData();
}, 30000);

// Manual refresh button
document.getElementById('refreshBtn').addEventListener('click', function() {
    this.innerHTML = '<i class="ti ti-refresh me-1"></i> Refreshing...';
    this.disabled = true;
    
    setTimeout(() => {
        this.innerHTML = '<i class="ti ti-refresh me-1"></i> Refresh';
        this.disabled = false;
        updateMonitoringData();
    }, 2000);
});

function updateMonitoringData() {
    // TODO: Implement AJAX call to update monitoring data
    console.log('Updating monitoring data via AJAX...');
}

// Network map interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add click handlers for network map elements
    const networkElements = document.querySelectorAll('.network-map .position-absolute');
    networkElements.forEach(element => {
        element.style.cursor = 'pointer';
        element.addEventListener('click', function() {
            console.log('Clicked network element:', this);
            // TODO: Show detailed popup for clicked element
        });
    });
});
</script>

@endsection