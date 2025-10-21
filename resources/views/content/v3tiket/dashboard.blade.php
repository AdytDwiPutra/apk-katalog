@extends('layouts.master')

@section('title', 'V3 Ticket System - Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-dashboard me-2 text-primary"></i>
        V3 Dashboard Multi-Infrastructure
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">V3 Dashboard</li>
        </ol>
      </nav>
    </div>
    <div>
      <a href="{{ route('v3tiket.create') }}" class="btn btn-success">
        <i class="ti ti-plus me-1"></i>
        Buat Tiket Baru
      </a>
    </div>
  </div>

  <!-- Infrastructure Overview Cards -->
  <div class="row mb-4">
    
    <!-- Wireless Card -->
    <div class="col-md-4 mb-3">
      <div class="card h-100 border-start border-success border-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
              <div class="d-flex align-items-center mb-2">
                <i class="ti ti-wifi text-success fs-2 me-2"></i>
                <h5 class="mb-0">WIRELESS</h5>
              </div>
              <small class="text-muted">PTP/PTMP → POP</small>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('v3tiket.wireless.monitoring') }}">Detail Monitoring</a></li>
                <li><a class="dropdown-item" href="#">Export Report</a></li>
              </ul>
            </div>
          </div>
          
          <div class="row text-center mb-3">
            <div class="col-4">
              <h4 class="text-success mb-0">245</h4>
              <small class="text-muted">Total Aktif</small>
            </div>
            <div class="col-4">
              <h4 class="text-danger mb-0">3</h4>
              <small class="text-muted">Bermasalah</small>
            </div>
            <div class="col-4">
              <h4 class="text-info mb-0">12</h4>
              <small class="text-muted">POP Sites</small>
            </div>
          </div>
          
          <div class="progress mb-2" style="height: 6px;">
            <div class="progress-bar bg-success" style="width: 98.8%"></div>
          </div>
          <small class="text-muted">Uptime: 98.8%</small>
          
          <div class="mt-3">
            <span class="badge bg-label-success me-1">2 Tiket Selesai</span>
            <span class="badge bg-label-warning">1 Pending</span>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Converter FO Card -->
    <div class="col-md-4 mb-3">
      <div class="card h-100 border-start border-primary border-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
              <div class="d-flex align-items-center mb-2">
                <i class="ti ti-network text-primary fs-2 me-2"></i>
                <h5 class="mb-0">CONVERTER FO</h5>
              </div>
              <small class="text-muted">Fiber Optic → POP</small>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('v3tiket.converter.monitoring') }}">Detail Monitoring</a></li>
                <li><a class="dropdown-item" href="#">Export Report</a></li>
              </ul>
            </div>
          </div>
          
          <div class="row text-center mb-3">
            <div class="col-4">
              <h4 class="text-primary mb-0">156</h4>
              <small class="text-muted">Total Aktif</small>
            </div>
            <div class="col-4">
              <h4 class="text-danger mb-0">1</h4>
              <small class="text-muted">Bermasalah</small>
            </div>
            <div class="col-4">
              <h4 class="text-info mb-0">8</h4>
              <small class="text-muted">POP Sites</small>
            </div>
          </div>
          
          <div class="progress mb-2" style="height: 6px;">
            <div class="progress-bar bg-primary" style="width: 99.4%"></div>
          </div>
          <small class="text-muted">Uptime: 99.4%</small>
          
          <div class="mt-3">
            <span class="badge bg-label-success me-1">0 Tiket Baru</span>
            <span class="badge bg-label-info">1 In Progress</span>
          </div>
        </div>
      </div>
    </div>
    
    <!-- FTTH Card -->
    <div class="col-md-4 mb-3">
      <div class="card h-100 border-start border-warning border-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
              <div class="d-flex align-items-center mb-2">
                <i class="ti ti-home text-warning fs-2 me-2"></i>
                <h5 class="mb-0">FTTH</h5>
              </div>
              <small class="text-muted">Fiber → ODP (Jalur Terpisah)</small>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('v3tiket.ftth.monitoring') }}">Detail Monitoring</a></li>
                <li><a class="dropdown-item" href="#">Export Report</a></li>
              </ul>
            </div>
          </div>
          
          <div class="row text-center mb-3">
            <div class="col-4">
              <h4 class="text-warning mb-0">892</h4>
              <small class="text-muted">Total Aktif</small>
            </div>
            <div class="col-4">
              <h4 class="text-danger mb-0">7</h4>
              <small class="text-muted">Bermasalah</small>
            </div>
            <div class="col-4">
              <h4 class="text-info mb-0">45</h4>
              <small class="text-muted">ODP Sites</small>
            </div>
          </div>
          
          <div class="progress mb-2" style="height: 6px;">
            <div class="progress-bar bg-warning" style="width: 92.2%"></div>
          </div>
          <small class="text-muted">Uptime: 92.2%</small>
          
          <div class="mt-3">
            <span class="badge bg-label-success me-1">5 Tiket Selesai</span>
            <span class="badge bg-label-danger">2 Critical</span>
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
            <i class="ti ti-zap me-2"></i>
            Quick Actions
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 mb-2">
              <a href="{{ route('v3tiket.create') }}" class="btn btn-outline-success w-100">
                <i class="ti ti-plus me-1"></i>
                Buat Tiket Baru
              </a>
            </div>
            <div class="col-md-3 mb-2">
              <a href="{{ route('v3tiket.monitoring') }}" class="btn btn-outline-primary w-100">
                <i class="ti ti-eye me-1"></i>
                Live Monitoring
              </a>
            </div>
            <div class="col-md-3 mb-2">
              <a href="{{ route('v3tiket.status') }}" class="btn btn-outline-info w-100">
                <i class="ti ti-activity me-1"></i>
                Status Real-time
              </a>
            </div>
            <div class="col-md-3 mb-2">
              <a href="{{ route('v3tiket.list') }}" class="btn btn-outline-warning w-100">
                <i class="ti ti-list me-1"></i>
                Semua Tiket
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Tickets -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-clock me-2"></i>
            Tiket Terbaru
          </h5>
          <a href="{{ route('v3tiket.list') }}" class="btn btn-sm btn-outline-primary">
            Lihat Semua
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID Tiket</th>
                  <th>Infrastruktur</th>
                  <th>Pelanggan</th>
                  <th>Masalah</th>
                  <th>Status</th>
                  <th>Prioritas</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-001') }}" class="fw-medium">
                      TKT-001
                    </a>
                  </td>
                  <td>
                    <span class="badge bg-label-success">
                      <i class="ti ti-wifi me-1"></i>
                      Wireless
                    </span>
                  </td>
                  <td>
                    <div>
                      <div class="fw-medium">PT Maju Jaya</div>
                      <small class="text-muted">WL-2024-001</small>
                    </div>
                  </td>
                  <td>Signal Lemah</td>
                  <td><span class="badge bg-warning">In Progress</span></td>
                  <td><span class="badge bg-danger">Critical</span></td>
                  <td>
                    <small>2 jam lalu</small>
                  </td>
                  <td>
                    <a href="{{ route('v3tiket.handle', 'TKT-001') }}" class="btn btn-sm btn-primary">
                      Handle
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-002') }}" class="fw-medium">
                      TKT-002
                    </a>
                  </td>
                  <td>
                    <span class="badge bg-label-warning">
                      <i class="ti ti-home me-1"></i>
                      FTTH
                    </span>
                  </td>
                  <td>
                    <div>
                      <div class="fw-medium">Rumah Pak Budi</div>
                      <small class="text-muted">FT-2024-156</small>
                    </div>
                  </td>
                  <td>Internet Putus</td>
                  <td><span class="badge bg-info">New</span></td>
                  <td><span class="badge bg-warning">High</span></td>
                  <td>
                    <small>30 menit lalu</small>
                  </td>
                  <td>
                    <a href="{{ route('v3tiket.handle', 'TKT-002') }}" class="btn btn-sm btn-primary">
                      Handle
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ route('v3tiket.detail', 'TKT-003') }}" class="fw-medium">
                      TKT-003
                    </a>
                  </td>
                  <td>
                    <span class="badge bg-label-primary">
                      <i class="ti ti-network me-1"></i>
                      Converter FO
                    </span>
                  </td>
                  <td>
                    <div>
                      <div class="fw-medium">CV Berkah</div>
                      <small class="text-muted">CV-2024-045</small>
                    </div>
                  </td>
                  <td>Koneksi Tidak Stabil</td>
                  <td><span class="badge bg-success">Resolved</span></td>
                  <td><span class="badge bg-success">Medium</span></td>
                  <td>
                    <small>1 hari lalu</small>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary" disabled>
                      Selesai
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

<script>
// Auto refresh setiap 30 detik
setInterval(function() {
    console.log('Auto refresh dashboard data...');
    // TODO: Implement AJAX refresh for real-time data
}, 30000);
</script>

@endsection