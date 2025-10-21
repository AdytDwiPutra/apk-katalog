@extends('layouts.master')

@section('title', 'Dashboard Tiket Support')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Dashboard Tiket Support</h4>

  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Total Tiket</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="mb-0 me-2">1,547</h4>
                <small class="text-success">(+12%)</small>
              </div>
              <small>Bulan ini</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="ti ti-ticket ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Open</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="mb-0 me-2">234</h4>
                <small class="text-danger">(+5%)</small>
              </div>
              <small>Perlu ditangani</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-warning rounded p-2">
                <i class="ti ti-alert-circle ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">In Progress</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="mb-0 me-2">187</h4>
                <small class="text-warning">(-3%)</small>
              </div>
              <small>Sedang ditangani</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-info rounded p-2">
                <i class="ti ti-refresh ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Resolved</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="mb-0 me-2">1,126</h4>
                <small class="text-success">(+8%)</small>
              </div>
              <small>Selesai bulan ini</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-success rounded p-2">
                <i class="ti ti-check ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Tiket Prioritas Tinggi -->
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title mb-0">Tiket Prioritas Tinggi</h5>
          <small class="text-muted">Critical & High</small>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <div class="d-flex align-items-start">
                <div class="badge bg-danger p-2 me-3">
                  <i class="ti ti-alert-triangle"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">
                      <a href="/tickets/detail" class="text-body">#TKT-250923-1042</a>
                    </h6>
                    <small class="text-muted">Internet Mati Total - PT Maju Jaya</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <small class="fw-medium">2 jam lalu</small>
                    <span class="badge bg-label-danger">Critical</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex align-items-start">
                <div class="badge bg-danger p-2 me-3">
                  <i class="ti ti-router"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">
                      <a href="/tickets/detail" class="text-body">#TKT-250923-1038</a>
                    </h6>
                    <small class="text-muted">Fiber Putus - Riki Sopian</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <small class="fw-medium">3 jam lalu</small>
                    <span class="badge bg-label-warning">High</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex align-items-start">
                <div class="badge bg-warning p-2 me-3">
                  <i class="ti ti-wifi-off"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">
                      <a href="/tickets/detail" class="text-body">#TKT-250923-1035</a>
                    </h6>
                    <small class="text-muted">Internet Lambat - Ahmad Yani</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <small class="fw-medium">5 jam lalu</small>
                    <span class="badge bg-label-warning">High</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex align-items-start">
                <div class="badge bg-danger p-2 me-3">
                  <i class="ti ti-alert-circle"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">
                      <a href="/tickets/detail" class="text-body">#TKT-250923-1030</a>
                    </h6>
                    <small class="text-muted">ONT Mati - CV Berkah Jaya</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <small class="fw-medium">6 jam lalu</small>
                    <span class="badge bg-label-danger">Critical</span>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <div class="text-center mt-3">
            <a href="/tickets?priority=high" class="btn btn-sm btn-outline-danger">Lihat Semua Prioritas Tinggi</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Tiket Terbaru -->
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title mb-0">Tiket Terbaru</h5>
          <small class="text-muted">Hari ini</small>
        </div>
        <div class="card-body">
          <ul class="timeline mb-0">
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-warning"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1045</a>
                  </h6>
                  <small class="text-muted">1 menit lalu</small>
                </div>
                <p class="mb-2">Internet Putus-nyambung</p>
                <div class="d-flex flex-wrap">
                  <span class="badge bg-label-info me-2">Budi Santoso</span>
                  <span class="badge bg-label-secondary">Support L1</span>
                </div>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-info"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1044</a>
                  </h6>
                  <small class="text-muted">15 menit lalu</small>
                </div>
                <p class="mb-2">Konfirmasi Pembayaran</p>
                <div class="d-flex flex-wrap">
                  <span class="badge bg-label-info me-2">Siti Nurhaliza</span>
                  <span class="badge bg-label-primary">Tim Billing</span>
                </div>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-success"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1043</a>
                  </h6>
                  <small class="text-muted">30 menit lalu</small>
                </div>
                <p class="mb-2">Request Upgrade Paket</p>
                <div class="d-flex flex-wrap">
                  <span class="badge bg-label-info me-2">Dedi Wijaya</span>
                  <span class="badge bg-label-success">Resolved</span>
                </div>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-danger"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1042</a>
                  </h6>
                  <small class="text-muted">2 jam lalu</small>
                </div>
                <p class="mb-2">Internet Mati Total</p>
                <div class="d-flex flex-wrap">
                  <span class="badge bg-label-info me-2">PT Maju Jaya</span>
                  <span class="badge bg-label-danger">Critical</span>
                </div>
              </div>
            </li>
          </ul>
          <div class="text-center mt-3">
            <a href="/tickets" class="btn btn-sm btn-outline-primary">Lihat Semua Tiket</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Performance Metrics -->
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">SLA Performance</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span>Response Time</span>
              <span class="fw-medium">95%</span>
            </div>
            <div class="progress" style="height: 8px">
              <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">Target: < 15 menit</small>
          </div>
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span>Resolution Time</span>
              <span class="fw-medium">87%</span>
            </div>
            <div class="progress" style="height: 8px">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">Target: < 24 jam</small>
          </div>
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span>First Call Resolution</span>
              <span class="fw-medium">72%</span>
            </div>
            <div class="progress" style="height: 8px">
              <div class="progress-bar bg-info" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">Target: > 70%</small>
          </div>
          <div>
            <div class="d-flex justify-content-between mb-1">
              <span>Customer Satisfaction</span>
              <span class="fw-medium">4.5/5.0</span>
            </div>
            <div class="progress" style="height: 8px">
              <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">Berdasarkan 342 survey</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Kategori Tiket -->
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Kategori Masalah</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <i class="ti ti-wifi-off text-danger me-2"></i>
                  <span>Internet Mati</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge bg-label-danger me-2">423</span>
                  <span class="text-muted">38%</span>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <i class="ti ti-speedboat text-warning me-2"></i>
                  <span>Internet Lambat</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge bg-label-warning me-2">312</span>
                  <span class="text-muted">28%</span>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <i class="ti ti-router text-info me-2"></i>
                  <span>Perangkat Bermasalah</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge bg-label-info me-2">187</span>
                  <span class="text-muted">17%</span>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <i class="ti ti-file-invoice text-primary me-2"></i>
                  <span>Billing/Tagihan</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge bg-label-primary me-2">124</span>
                  <span class="text-muted">11%</span>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <i class="ti ti-dots text-secondary me-2"></i>
                  <span>Lain-lain</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge bg-label-secondary me-2">68</span>
                  <span class="text-muted">6%</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Team Performance -->
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Team Performance</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">Support L1</h6>
                  <small class="text-muted">89 tiket aktif</small>
                </div>
                <div class="text-end">
                  <span class="badge bg-success">85%</span>
                  <small class="d-block text-muted">Avg: 2.3 jam</small>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">Support L2</h6>
                  <small class="text-muted">45 tiket aktif</small>
                </div>
                <div class="text-end">
                  <span class="badge bg-warning">78%</span>
                  <small class="d-block text-muted">Avg: 4.1 jam</small>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">NOC Team</h6>
                  <small class="text-muted">32 tiket aktif</small>
                </div>
                <div class="text-end">
                  <span class="badge bg-info">92%</span>
                  <small class="d-block text-muted">Avg: 1.8 jam</small>
                </div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">Field Technician</h6>
                  <small class="text-muted">21 tiket aktif</small>
                </div>
                <div class="text-end">
                  <span class="badge bg-primary">88%</span>
                  <small class="d-block text-muted">Avg: 6.5 jam</small>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">Billing Team</h6>
                  <small class="text-muted">15 tiket aktif</small>
                </div>
                <div class="text-end">
                  <span class="badge bg-success">95%</span>
                  <small class="d-block text-muted">Avg: 1.2 jam</small>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Quick Actions</h5>
        </div>
        <div class="card-body">
          <div class="d-flex flex-wrap gap-2">
            <a href="/tickets/detailreate" class="btn btn-primary">
              <i class="ti ti-plus me-1"></i> Buat Tiket Baru
            </a>
            <a href="/tickets?status=open" class="btn btn-outline-warning">
              <i class="ti ti-alert-circle me-1"></i> Lihat Open Tiket
            </a>
            <a href="/tickets?priority=critical" class="btn btn-outline-danger">
              <i class="ti ti-alert-triangle me-1"></i> Critical Priority
            </a>
            <a href="/tickets/detaily-tickets" class="btn btn-outline-primary">
              <i class="ti ti-user me-1"></i> Tiket Saya
            </a>
            <a href="/tickets/detailnalytics" class="btn btn-outline-info">
              <i class="ti ti-chart-bar me-1"></i> Analytics & Report
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection