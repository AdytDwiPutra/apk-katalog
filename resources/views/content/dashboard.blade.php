@extends('layouts.master')



@section('content')
  



<div class="container-xxl flex-grow-1 container-p-y">
    
    <!-- Stats Cards Row -->
    <div class="row mb-4">
      <!-- Income Card -->
      <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card bg-success">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="card-info">
                <p class="card-text text-white mb-1">Income Hari Ini (IDR)</p>
                <div class="d-flex align-items-end mb-2">
                  <h4 class="text-white mb-0 me-2">Rp. 553.520</h4>
                </div>
              </div>
              <div class="card-icon">
                <span class="badge bg-label-light rounded p-2">
                  <i class="ti ti-shopping-bag ti-sm"></i>
                </span>
              </div>
            </div>
            <a href="#" class="btn btn-sm btn-light mt-2 w-100">
              <i class="ti ti-arrow-right me-1"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>

      <!-- Invoice Card -->
      <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card bg-warning">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="card-info">
                <p class="card-text text-white mb-1">Data Tagihan</p>
                <div class="d-flex align-items-end mb-2">
                  <h4 class="text-white mb-0 me-2">36 Invoice</h4>
                </div>
              </div>
              <div class="card-icon">
                <span class="badge bg-label-light rounded p-2">
                  <i class="ti ti-file-invoice ti-sm"></i>
                </span>
              </div>
            </div>
            <a href="#" class="btn btn-sm btn-light mt-2 w-100">
              <i class="ti ti-arrow-right me-1"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>

      <!-- PPP Online Card -->
      <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card bg-info">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="card-info">
                <p class="card-text text-white mb-1">PPP Online</p>
                <div class="d-flex align-items-end mb-2">
                  <h4 class="text-white mb-0 me-2">721 Users</h4>
                </div>
              </div>
              <div class="card-icon">
                <span class="badge bg-label-light rounded p-2">
                  <i class="ti ti-plug ti-sm"></i>
                </span>
              </div>
            </div>
            <a href="#" class="btn btn-sm btn-light mt-2 w-100">
              <i class="ti ti-arrow-right me-1"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>

      <!-- Hotspot Online Card -->
      <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card bg-danger">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="card-info">
                <p class="card-text text-white mb-1">HOTSPOT Online</p>
                <div class="d-flex align-items-end mb-2">
                  <h4 class="text-white mb-0 me-2">0 Users</h4>
                </div>
              </div>
              <div class="card-icon">
                <span class="badge bg-label-light rounded p-2">
                  <i class="ti ti-wifi ti-sm"></i>
                </span>
              </div>
            </div>
            <a href="#" class="btn btn-sm btn-light mt-2 w-100">
              <i class="ti ti-arrow-right me-1"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- System Info Bar -->
    <div class="row mb-4">
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card">
          <div class="card-body p-2">
            <div class="d-flex align-items-center">
              <i class="ti ti-clock me-2"></i>
              <span class="fw-bold me-2">UPTIME:</span>
              <span class="text-muted">492 day 15 hour 15 min</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card">
          <div class="card-body p-2">
            <div class="d-flex align-items-center">
              <i class="ti ti-cpu me-2"></i>
              <span class="fw-bold me-2">RAM:</span>
              <span class="text-muted">32668 MB TOTAL</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card">
          <div class="card-body p-2">
            <div class="d-flex align-items-center">
              <i class="ti ti-cpu me-2"></i>
              <span class="fw-bold me-2">FREE RAM:</span>
              <span class="text-muted">14689 MB FREE</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card">
          <div class="card-body p-2">
            <div class="d-flex align-items-center">
              <i class="ti ti-device-hard-drive me-2"></i>
              <span class="fw-bold me-2">HDD/SSD:</span>
              <span class="text-muted">104.78 GB Free</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="row">
      <!-- Left Column - Tabs -->
      <div class="col-lg-8 mb-4">
        <div class="card">
          <div class="card-body">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#ringkasan">
                  <i class="ti ti-info-circle me-1"></i>Ringkasan
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#aktivitas">
                  <i class="ti ti-file-text me-1"></i>Aktivitas
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#trafik">
                  <i class="ti ti-chart-line me-1"></i>Trafik
                </button>
              </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content pt-3">
              <!-- Ringkasan Tab -->
              <div class="tab-pane fade show active" id="ringkasan">
                <div class="row">
                  <!-- Statistics Cards -->
                  <div class="col-md-4 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary">
                          <i class="ti ti-wifi ti-sm"></i>
                        </span>
                      </div>
                      <div>
                        <small class="text-muted d-block">HOTSPOT USER</small>
                        <h5 class="mb-0">0</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-info">
                          <i class="ti ti-plug ti-sm"></i>
                        </span>
                      </div>
                      <div>
                        <small class="text-muted d-block">PPPOE USER</small>
                        <h5 class="mb-0">866</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-warning">
                          <i class="ti ti-lock ti-sm"></i>
                        </span>
                      </div>
                      <div>
                        <small class="text-muted d-block">VPN USER</small>
                        <h5 class="mb-0">0</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success">
                          <i class="ti ti-ticket ti-sm"></i>
                        </span>
                      </div>
                      <div>
                        <small class="text-muted d-block">TOTAL VOUCHER</small>
                        <h5 class="mb-0">0</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-secondary">
                          <i class="ti ti-printer ti-sm"></i>
                        </span>
                      </div>
                      <div>
                        <small class="text-muted d-block">VC CREATED TODAY</small>
                        <h5 class="mb-0">0</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-danger">
                          <i class="ti ti-calendar-x ti-sm"></i>
                        </span>
                      </div>
                      <div>
                        <small class="text-muted d-block">EXP VOUCHER</small>
                        <h5 class="mb-0">0</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Aktivitas Tab -->
              <div class="tab-pane fade" id="aktivitas">
                <div class="activity-timeline">
                  <p class="text-muted">No recent activity</p>
                </div>
              </div>

              <!-- Trafik Tab -->
              <div class="tab-pane fade" id="trafik">
                <div class="mb-3">
                  <label class="form-label">Select Router</label>
                  <select class="form-select">
                    <option>- Pilih Router -</option>
                  </select>
                </div>
                <div id="trafficChart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column - Service Info -->
      <div class="col-lg-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">
              <i class="ti ti-info-circle me-1"></i>Informasi Layanan
            </h5>
          </div>
          <div class="card-body">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td><i class="ti ti-database me-2"></i>CORE RADIUS</td>
                  <td class="text-end">
                    <span class="badge bg-success">Running</span>
                  </td>
                </tr>
                <tr>
                  <td><i class="ti ti-server me-2"></i>MIKROTIK</td>
                  <td class="text-end">
                    <span class="badge bg-primary">2 Router | 8 Quota</span>
                  </td>
                </tr>
                <tr>
                  <td><i class="ti ti-wifi me-2"></i>SESSION</td>
                  <td class="text-end">
                    <span class="badge bg-info">721 / 473 Quota</span>
                  </td>
                </tr>
                <tr>
                  <td><i class="ti ti-users me-2"></i>Pelanggan</td>
                  <td class="text-end">
                    <span class="badge bg-warning">1134 Quota</span>
                  </td>
                </tr>
                <!-- <tr>
                  <td><i class="ti ti-ticket me-2"></i>VOUCHER</td>
                  <td class="text-end">
                    <span class="badge bg-secondary">100000 Quota</span>
                  </td>
                </tr>
                <tr>
                  <td><i class="ti ti-calendar me-2"></i>Jatuh Tempo</td>
                  <td class="text-end">
                    <span class="badge bg-success">October 01, 2025</span>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Tabs for Reports -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- Report Tabs -->
            <ul class="nav nav-pills mb-3" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#incomeHarian">
                  <i class="ti ti-currency-dollar me-1"></i>Income Harian
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#invoice">
                  <i class="ti ti-file-invoice me-1"></i>Invoice
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#router">
                  <i class="ti ti-server me-1"></i>Router
                </button>
              </li>
            </ul>

            <!-- Report Content -->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="incomeHarian">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Invoice</th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Tipe Service</th>
                        <th>Server</th>
                        <th>Paket</th>
                        <th>Jumlah</th>
                        <th>Periode</th>
                        <th>Owner</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>14654</td>
                        <td>INV-352528719615</td>
                        <td><i class="ti ti-info-circle"></i> 259222477350</td>
                        <td>AFIFAH HIYARIN NISWAH</td>
                        <td><span class="badge bg-success">PRE</span> PPPOE</td>
                        <td>Semua Server & NAS</td>
                        <td>NET HOME 30Mbps</td>
                        <td>Rp. 553.520,37</td>
                        <td class="text-info fw-bold">November 05, 2025</td>
                        <td>jeje</td>
                        <td>
                          <button class="btn btn-sm btn-success">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Showing 1 to 1 of 1 entries</small>
                    <nav>
                      <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                          <a class="page-link" href="#">Next</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="invoice">
                <p class="text-muted">Invoice data will be displayed here</p>
              </div>

              <div class="tab-pane fade" id="router">
                <p class="text-muted">Router status will be displayed here</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection