@extends('layouts.master')

@section('title', 'Tiket Saya')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Tiket Saya</h4>
      <p class="text-muted mb-0">Tiket yang di-assign kepada Anda</p>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-secondary">
        <i class="ti ti-filter me-1"></i> Filter
      </button>
      <button class="btn btn-primary">
        <i class="ti ti-refresh me-1"></i> Refresh
      </button>
    </div>
  </div>

  <!-- Quick Stats -->
  <div class="row mb-4">
    <div class="col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Active Tickets</small>
              <h3 class="mb-0">12</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-tickets ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">High Priority</small>
              <h3 class="mb-0">3</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-danger">
                <i class="ti ti-alert-triangle ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Overdue</small>
              <h3 class="mb-0">1</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-clock-exclamation ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Resolved Today</small>
              <h3 class="mb-0">5</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-check ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabs -->
  <ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item">
      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#active-tickets">
        Active (12)
      </button>
    </li>
    <li class="nav-item">
      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#pending-tickets">
        Pending (4)
      </button>
    </li>
    <li class="nav-item">
      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#resolved-tickets">
        Resolved (23)
      </button>
    </li>
  </ul>

  <div class="tab-content">
    <!-- Active Tickets -->
    <div class="tab-pane fade show active" id="active-tickets" role="tabpanel">
      <div class="card">
        <div class="card-body">
          <div class="list-group list-group-flush">
            <!-- Ticket 1 -->
            <div class="list-group-item list-group-item-action p-3 border-bottom">
              <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                <div>
                  <h6 class="mb-1">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1042</a>
                    <span class="badge bg-dark ms-2">Critical</span>
                  </h6>
                  <p class="mb-1">Internet Mati Total - PT Maju Jaya</p>
                  <small class="text-muted">
                    <i class="ti ti-user me-1"></i> PT Maju Jaya (CID-242382)
                  </small>
                </div>
                <div class="text-end">
                  <small class="text-danger d-block">
                    <i class="ti ti-clock me-1"></i> 4h 15m tersisa
                  </small>
                  <span class="badge bg-label-info mt-1">In Progress</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-label-danger me-1">Internet Mati</span>
                  <small class="text-muted">2 jam lalu</small>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="/tickets/detail" class="btn btn-outline-primary">
                    <i class="ti ti-eye"></i>
                  </a>
                  <button class="btn btn-outline-success">
                    <i class="ti ti-check"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Ticket 2 -->
            <div class="list-group-item list-group-item-action p-3 border-bottom">
              <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                <div>
                  <h6 class="mb-1">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1038</a>
                    <span class="badge bg-danger ms-2">High</span>
                  </h6>
                  <p class="mb-1">Kabel Fiber Putus/Rusak</p>
                  <small class="text-muted">
                    <i class="ti ti-user me-1"></i> Riki Sopian (CID-242382)
                  </small>
                </div>
                <div class="text-end">
                  <small class="text-warning d-block">
                    <i class="ti ti-clock me-1"></i> 8h 20m tersisa
                  </small>
                  <span class="badge bg-label-warning mt-1">Open</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-label-secondary me-1">Perangkat</span>
                  <small class="text-muted">3 jam lalu</small>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="/tickets/detail" class="btn btn-outline-primary">
                    <i class="ti ti-eye"></i>
                  </a>
                  <button class="btn btn-outline-success">
                    <i class="ti ti-check"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Ticket 3 -->
            <div class="list-group-item list-group-item-action p-3 border-bottom">
              <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                <div>
                  <h6 class="mb-1">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1035</a>
                    <span class="badge bg-danger ms-2">High</span>
                  </h6>
                  <p class="mb-1">Internet Lambat Saat Peak Hours</p>
                  <small class="text-muted">
                    <i class="ti ti-user me-1"></i> Ahmad Yani (CID-242385)
                  </small>
                </div>
                <div class="text-end">
                  <small class="text-success d-block">
                    <i class="ti ti-clock me-1"></i> 12h 45m tersisa
                  </small>
                  <span class="badge bg-label-info mt-1">In Progress</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-label-warning me-1">Internet Lambat</span>
                  <small class="text-muted">5 jam lalu</small>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="/tickets/detail" class="btn btn-outline-primary">
                    <i class="ti ti-eye"></i>
                  </a>
                  <button class="btn btn-outline-success">
                    <i class="ti ti-check"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Ticket 4 -->
            <div class="list-group-item list-group-item-action p-3">
              <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                <div>
                  <h6 class="mb-1">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1025</a>
                    <span class="badge bg-warning ms-2">Medium</span>
                  </h6>
                  <p class="mb-1">Router WiFi Tidak Berfungsi</p>
                  <small class="text-muted">
                    <i class="ti ti-user me-1"></i> Siti Nurhaliza (CID-242390)
                  </small>
                </div>
                <div class="text-end">
                  <small class="text-success d-block">
                    <i class="ti ti-clock me-1"></i> 18h tersisa
                  </small>
                  <span class="badge bg-label-warning mt-1">Open</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-label-secondary me-1">Perangkat</span>
                  <small class="text-muted">6 jam lalu</small>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="/tickets/detail" class="btn btn-outline-primary">
                    <i class="ti ti-eye"></i>
                  </a>
                  <button class="btn btn-outline-success">
                    <i class="ti ti-check"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Tickets -->
    <div class="tab-pane fade" id="pending-tickets" role="tabpanel">
      <div class="card">
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item p-3">
              <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                <div>
                  <h6 class="mb-1">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1020</a>
                    <span class="badge bg-warning ms-2">Medium</span>
                  </h6>
                  <p class="mb-1">Menunggu Konfirmasi Jadwal Kunjungan</p>
                  <small class="text-muted">
                    <i class="ti ti-user me-1"></i> Dedi Wijaya (CID-242395)
                  </small>
                </div>
                <div class="text-end">
                  <span class="badge bg-label-secondary">Pending</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-label-info me-1">Administrasi</span>
                  <small class="text-muted">1 hari lalu</small>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="/tickets/detail" class="btn btn-outline-primary">
                    <i class="ti ti-eye"></i>
                  </a>
                  <button class="btn btn-outline-warning">
                    <i class="ti ti-arrow-forward"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Resolved Tickets -->
    <div class="tab-pane fade" id="resolved-tickets" role="tabpanel">
      <div class="card">
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item p-3">
              <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                <div>
                  <h6 class="mb-1">
                    <a href="/tickets/detail" class="text-body">#TKT-250923-1015</a>
                    <span class="badge bg-success ms-2">Low</span>
                  </h6>
                  <p class="mb-1">Request Upgrade Paket</p>
                  <small class="text-muted">
                    <i class="ti ti-user me-1"></i> Budi Santoso (CID-242398)
                  </small>
                </div>
                <div class="text-end">
                  <span class="badge bg-label-success">Resolved</span>
                  <small class="d-block text-muted mt-1">Resolved: 2h ago</small>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-label-info me-1">Administrasi</span>
                  <small class="text-muted">Today, 12:30</small>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="/tickets/detail" class="btn btn-outline-primary">
                    <i class="ti ti-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  // Auto refresh every 30 seconds
  // setInterval(function() {
  //   location.reload();
  // }, 30000);
});
</script>
@endpush