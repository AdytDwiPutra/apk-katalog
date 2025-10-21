@extends('layouts.master')

@section('title', 'Tiket - ' . ucwords(str_replace('-', ' ', $status)))

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  @php
    $statusConfig = [
      'open' => ['badge' => 'warning', 'icon' => 'alert-circle', 'color' => 'warning'],
      'in-progress' => ['badge' => 'info', 'icon' => 'refresh', 'color' => 'info'],
      'pending' => ['badge' => 'secondary', 'icon' => 'clock', 'color' => 'secondary'],
      'resolved' => ['badge' => 'success', 'icon' => 'check', 'color' => 'success'],
      'closed' => ['badge' => 'dark', 'icon' => 'circle-check', 'color' => 'dark']
    ];
    $config = $statusConfig[$status] ?? ['badge' => 'primary', 'icon' => 'ticket', 'color' => 'primary'];
  @endphp

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-{{ $config['icon'] }} me-2"></i>
        Tiket {{ ucwords(str_replace('-', ' ', $status)) }}
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/tickets/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/tickets">All Tickets</a></li>
          <li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ', $status)) }}</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-secondary">
        <i class="ti ti-filter me-1"></i> Filter
      </button>
      <a href="/tickets/create" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i> Buat Tiket
      </a>
    </div>
  </div>

  <!-- Stats for This Status -->
  <div class="row mb-4">
    <div class="col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Total</small>
              <h3 class="mb-0">
                @if($status === 'open') 234
                @elseif($status === 'in-progress') 187
                @elseif($status === 'pending') 89
                @elseif($status === 'resolved') 1,037
                @else 425
                @endif
              </h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-{{ $config['color'] }}">
                <i class="ti ti-{{ $config['icon'] }} ti-md"></i>
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
              <small class="text-muted d-block">Critical</small>
              <h3 class="mb-0 text-danger">
                @if($status === 'open') 12
                @elseif($status === 'in-progress') 8
                @else 0
                @endif
              </h3>
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
              <small class="text-muted d-block">High Priority</small>
              <h3 class="mb-0 text-warning">
                @if($status === 'open') 45
                @elseif($status === 'in-progress') 32
                @else 0
                @endif
              </h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-arrow-up ti-md"></i>
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
              <small class="text-muted d-block">Avg Time</small>
              <h3 class="mb-0">
                @if($status === 'resolved') 4.2h
                @elseif($status === 'closed') 5.1h
                @else 2.5h
                @endif
              </h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-clock ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tickets List -->
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h5 class="mb-0">Daftar Tiket</h5>
      <span class="badge bg-{{ $config['badge'] }}">
        @if($status === 'open') 234 Tickets
        @elseif($status === 'in-progress') 187 Tickets
        @elseif($status === 'pending') 89 Tickets
        @elseif($status === 'resolved') 1,037 Tickets
        @else 425 Tickets
        @endif
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Ticket ID</th>
              <th>Subject</th>
              <th>Customer</th>
              <th>Priority</th>
              <th>Category</th>
              <th>Assigned To</th>
              <th>Created</th>
              @if($status === 'resolved' || $status === 'closed')
              <th>Resolved</th>
              @else
              <th>SLA</th>
              @endif
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if($status === 'open')
            <!-- Open Tickets -->
            <tr>
              <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1045</a></td>
              <td>Internet Putus-nyambung</td>
              <td>
                <div class="d-flex flex-column">
                  <span>Budi Santoso</span>
                  <small class="text-muted">CID-242501</small>
                </div>
              </td>
              <td><span class="badge bg-warning">Medium</span></td>
              <td><span class="badge bg-label-warning">Internet Lambat</span></td>
              <td>Support L1</td>
              <td>
                <span>23 Sep 2025</span><br>
                <small class="text-muted">14:30</small>
              </td>
              <td><span class="text-success">18h left</span></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/tickets/detail">
                      <i class="ti ti-eye me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="ti ti-edit me-1"></i> Update
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1038</a></td>
              <td>Kabel Fiber Putus</td>
              <td>
                <div class="d-flex flex-column">
                  <span>Riki Sopian</span>
                  <small class="text-muted">CID-242382</small>
                </div>
              </td>
              <td><span class="badge bg-danger">High</span></td>
              <td><span class="badge bg-label-secondary">Perangkat</span></td>
              <td>Field Tech</td>
              <td>
                <span>23 Sep 2025</span><br>
                <small class="text-muted">11:00</small>
              </td>
              <td><span class="text-warning">6h left</span></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/tickets/detail">
                      <i class="ti ti-eye me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="ti ti-edit me-1"></i> Update
                    </a>
                  </div>
                </div>
              </td>
            </tr>

            @elseif($status === 'in-progress')
            <!-- In Progress Tickets -->
            <tr>
              <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1042</a></td>
              <td>Internet Mati Total</td>
              <td>
                <div class="d-flex flex-column">
                  <span>PT Maju Jaya</span>
                  <small class="text-muted">CID-242382</small>
                </div>
              </td>
              <td><span class="badge bg-dark">Critical</span></td>
              <td><span class="badge bg-label-danger">Internet Mati</span></td>
              <td>Support L2</td>
              <td>
                <span>23 Sep 2025</span><br>
                <small class="text-muted">12:30</small>
              </td>
              <td><span class="text-danger">4h 15m left</span></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/tickets/detail">
                      <i class="ti ti-eye me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="ti ti-check me-1"></i> Mark Resolved
                    </a>
                  </div>
                </div>
              </td>
            </tr>

            @elseif($status === 'pending')
            <!-- Pending Tickets -->
            <tr>
              <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1020</a></td>
              <td>Menunggu Konfirmasi Jadwal</td>
              <td>
                <div class="d-flex flex-column">
                  <span>Dedi Wijaya</span>
                  <small class="text-muted">CID-242395</small>
                </div>
              </td>
              <td><span class="badge bg-warning">Medium</span></td>
              <td><span class="badge bg-label-info">Administrasi</span></td>
              <td>Support L1</td>
              <td>
                <span>22 Sep 2025</span><br>
                <small class="text-muted">16:00</small>
              </td>
              <td><span class="text-secondary">On Hold</span></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/tickets/detail">
                      <i class="ti ti-eye me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="ti ti-arrow-forward me-1"></i> Resume
                    </a>
                  </div>
                </div>
              </td>
            </tr>

            @elseif($status === 'resolved')
            <!-- Resolved Tickets -->
            <tr>
              <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1015</a></td>
              <td>Request Upgrade Paket</td>
              <td>
                <div class="d-flex flex-column">
                  <span>Budi Santoso</span>
                  <small class="text-muted">CID-242398</small>
                </div>
              </td>
              <td><span class="badge bg-success">Low</span></td>
              <td><span class="badge bg-label-info">Administrasi</span></td>
              <td>Support L1</td>
              <td>
                <span>23 Sep 2025</span><br>
                <small class="text-muted">12:30</small>
              </td>
              <td>
                <span>23 Sep 2025</span><br>
                <small class="text-muted">14:45</small>
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/tickets/detail">
                      <i class="ti ti-eye me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="ti ti-circle-check me-1"></i> Close
                    </a>
                  </div>
                </div>
              </td>
            </tr>

            @else
            <!-- Closed Tickets -->
            <tr>
              <td><a href="/tickets/detail" class="fw-medium">#TKT-250923-1010</a></td>
              <td>ONT Mati Total</td>
              <td>
                <div class="d-flex flex-column">
                  <span>CV Berkah Jaya</span>
                  <small class="text-muted">CID-242390</small>
                </div>
              </td>
              <td><span class="badge bg-dark">Critical</span></td>
              <td><span class="badge bg-label-secondary">Perangkat</span></td>
              <td>Field Tech</td>
              <td>
                <span>22 Sep 2025</span><br>
                <small class="text-muted">16:45</small>
              </td>
              <td>
                <span>23 Sep 2025</span><br>
                <small class="text-muted">08:30</small>
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/tickets/detail">
                      <i class="ti ti-eye me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="ti ti-history me-1"></i> Reopen
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
          <small class="text-muted">Showing 1 to 10 of 
            @if($status === 'open') 234
            @elseif($status === 'in-progress') 187
            @elseif($status === 'pending') 89
            @elseif($status === 'resolved') 1,037
            @else 425
            @endif
            results
          </small>
        </div>
        <nav>
          <ul class="pagination mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#">Previous</a>
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

</div>
@endsection