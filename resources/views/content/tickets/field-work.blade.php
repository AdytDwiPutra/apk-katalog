@extends('layouts.master')

@section('title', 'Field Work - Teknisi Lapangan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Field Work Assignment</h4>
      <p class="text-muted mb-0">Penugasan Teknisi Lapangan</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newFieldWorkModal">
      <i class="ti ti-plus me-1"></i> Assign Field Work
    </button>
  </div>

  <!-- Technician Status Overview -->
  <div class="row mb-4">
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Available</small>
              <h4 class="mb-0 text-success">5</h4>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-user-check ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">On Field</small>
              <h4 class="mb-0 text-info">8</h4>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-truck ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Today's Jobs</small>
              <h4 class="mb-0">21</h4>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-calendar-event ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small class="text-muted d-block">Completed</small>
              <h4 class="mb-0 text-success">13</h4>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-checks ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Active Field Works -->
  <div class="card mb-4">
    <div class="card-header">
      <h5 class="mb-0">Active Field Works</h5>
    </div>
    <div class="card-body">
      <!-- Field Work 1 -->
      <div class="border rounded p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <h6 class="mb-1">
              <a href="/tickets/detail" class="text-body">#TKT-250923-1038</a>
              <span class="badge bg-danger ms-2">High Priority</span>
            </h6>
            <p class="mb-1">Kabel Fiber Putus/Rusak - Riki Sopian</p>
            <small class="text-muted">
              <i class="ti ti-map-pin me-1"></i> RT 002 RW 003, Desa Cicalengka Wetan
            </small>
          </div>
          <span class="badge bg-label-info">On Field</span>
        </div>
        
        <div class="row g-2 mb-3">
          <div class="col-md-4">
            <small class="text-muted d-block">Teknisi</small>
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xs me-2">
                <span class="avatar-initial rounded-circle bg-label-primary">AB</span>
              </div>
              <span class="fw-medium">Ahmad Budiman</span>
            </div>
          </div>
          <div class="col-md-4">
            <small class="text-muted d-block">Scheduled</small>
            <span>23 Sep 2025, 14:00</span>
          </div>
          <div class="col-md-4">
            <small class="text-muted d-block">Status</small>
            <span class="text-info fw-medium">
              <i class="ti ti-map-pin-filled"></i> En Route (5 min away)
            </span>
          </div>
        </div>

        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#trackingModal">
            <i class="ti ti-map me-1"></i> Track
          </button>
          <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#updateModal">
            <i class="ti ti-edit me-1"></i> Update
          </button>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ti ti-phone me-1"></i> Call Tech
          </button>
        </div>
      </div>

      <!-- Field Work 2 -->
      <div class="border rounded p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <h6 class="mb-1">
              <a href="/tickets/detail" class="text-body">#TKT-250923-1030</a>
              <span class="badge bg-dark ms-2">Critical</span>
            </h6>
            <p class="mb-1">ONT Mati Total - CV Berkah Jaya</p>
            <small class="text-muted">
              <i class="ti ti-map-pin me-1"></i> Jl. Raya Cicalengka No. 45
            </small>
          </div>
          <span class="badge bg-label-success">In Progress</span>
        </div>
        
        <div class="row g-2 mb-3">
          <div class="col-md-4">
            <small class="text-muted d-block">Teknisi</small>
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xs me-2">
                <span class="avatar-initial rounded-circle bg-label-warning">DS</span>
              </div>
              <span class="fw-medium">Dedi Saputra</span>
            </div>
          </div>
          <div class="col-md-4">
            <small class="text-muted d-block">Check-in</small>
            <span>23 Sep 2025, 13:45</span>
          </div>
          <div class="col-md-4">
            <small class="text-muted d-block">Status</small>
            <span class="text-success fw-medium">
              <i class="ti ti-tools"></i> Working (25 min)
            </span>
          </div>
        </div>

        <div class="alert alert-info mb-2" role="alert">
          <strong>Update Terakhir:</strong> Sedang penggantian ONT. Estimasi selesai 15 menit lagi.
        </div>

        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#trackingModal">
            <i class="ti ti-map me-1"></i> Track
          </button>
          <button class="btn btn-sm btn-outline-success">
            <i class="ti ti-photo me-1"></i> View Photos (2)
          </button>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ti ti-phone me-1"></i> Call Tech
          </button>
        </div>
      </div>

      <!-- Field Work 3 -->
      <div class="border rounded p-3">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <h6 class="mb-1">
              <a href="/tickets/detail" class="text-body">#TKT-250923-1022</a>
              <span class="badge bg-warning ms-2">Medium</span>
            </h6>
            <p class="mb-1">Instalasi Baru - Budi Santoso</p>
            <small class="text-muted">
              <i class="ti ti-map-pin me-1"></i> Perumahan Griya Asri Blok C12
            </small>
          </div>
          <span class="badge bg-label-warning">Scheduled</span>
        </div>
        
        <div class="row g-2 mb-3">
          <div class="col-md-4">
            <small class="text-muted d-block">Teknisi</small>
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xs me-2">
                <span class="avatar-initial rounded-circle bg-label-info">RW</span>
              </div>
              <span class="fw-medium">Rizki Wahyudi</span>
            </div>
          </div>
          <div class="col-md-4">
            <small class="text-muted d-block">Scheduled</small>
            <span>23 Sep 2025, 15:30</span>
          </div>
          <div class="col-md-4">
            <small class="text-muted d-block">Equipment</small>
            <span>ONT + 50m Fiber</span>
          </div>
        </div>

        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-primary">
            <i class="ti ti-clock me-1"></i> Reschedule
          </button>
          <button class="btn btn-sm btn-outline-info">
            <i class="ti ti-edit me-1"></i> Edit Details
          </button>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ti ti-phone me-1"></i> Call Customer
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Available Technicians -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Available Technicians</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="border rounded p-3">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div class="d-flex align-items-center">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-circle bg-label-success">IH</span>
                </div>
                <div>
                  <h6 class="mb-0">Irfan Hakim</h6>
                  <small class="text-muted">Field Technician</small>
                </div>
              </div>
              <span class="badge bg-success">Available</span>
            </div>
            <div class="mb-2">
              <small class="text-muted d-block">Location</small>
              <span>Area Cicalengka</span>
            </div>
            <div class="mb-2">
              <small class="text-muted d-block">Today's Jobs</small>
              <span>2 completed, 0 active</span>
            </div>
            <button class="btn btn-sm btn-primary w-100">
              <i class="ti ti-user-plus me-1"></i> Assign Job
            </button>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
          <div class="border rounded p-3">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div class="d-flex align-items-center">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-circle bg-label-success">FA</span>
                </div>
                <div>
                  <h6 class="mb-0">Faisal Akbar</h6>
                  <small class="text-muted">Field Technician</small>
                </div>
              </div>
              <span class="badge bg-success">Available</span>
            </div>
            <div class="mb-2">
              <small class="text-muted d-block">Location</small>
              <span>Area Rancaekek</span>
            </div>
            <div class="mb-2">
              <small class="text-muted d-block">Today's Jobs</small>
              <span>3 completed, 0 active</span>
            </div>
            <button class="btn btn-sm btn-primary w-100">
              <i class="ti ti-user-plus me-1"></i> Assign Job
            </button>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
          <div class="border rounded p-3">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div class="d-flex align-items-center">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-circle bg-label-success">WS</span>
                </div>
                <div>
                  <h6 class="mb-0">Wawan Setiawan</h6>
                  <small class="text-muted">Senior Technician</small>
                </div>
              </div>
              <span class="badge bg-success">Available</span>
            </div>
            <div class="mb-2">
              <small class="text-muted d-block">Location</small>
              <span>Area Majalaya</span>
            </div>
            <div class="mb-2">
              <small class="text-muted d-block">Today's Jobs</small>
              <span>1 completed, 0 active</span>
            </div>
            <button class="btn btn-sm btn-primary w-100">
              <i class="ti ti-user-plus me-1"></i> Assign Job
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- New Field Work Modal -->
<div class="modal fade" id="newFieldWorkModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign Field Work</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Select Ticket</label>
          <select class="form-select">
            <option>#TKT-250923-1045 - Internet Putus-nyambung</option>
            <option>#TKT-250923-1040 - Kabel Fiber Rusak</option>
            <option>#TKT-250923-1035 - ONT Tidak Menyala</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Assign To</label>
          <select class="form-select">
            <option>Irfan Hakim (Area Cicalengka)</option>
            <option>Faisal Akbar (Area Rancaekek)</option>
            <option>Wawan Setiawan (Area Majalaya)</option>
          </select>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Schedule Date</label>
            <input type="date" class="form-control" value="2025-09-23">
          </div>
          <div class="col-md-6">
            <label class="form-label">Schedule Time</label>
            <input type="time" class="form-control" value="15:00">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Equipment/Tools Needed</label>
          <textarea class="form-control" rows="2" placeholder="ONT, Fiber cable 100m, etc..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Special Instructions</label>
          <textarea class="form-control" rows="3" placeholder="Catatan khusus untuk teknisi..."></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Assign Field Work</button>
      </div>
    </div>
  </div>
</div>

<!-- Tracking Modal -->
<div class="modal fade" id="trackingModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tracking - Ahmad Budiman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info mb-3">
          <i class="ti ti-info-circle me-2"></i>
          <strong>Status:</strong> En Route - ETA 5 minutes
        </div>
        <div class="bg-light rounded p-3 text-center" style="height: 300px;">
          <i class="ti ti-map-2 display-1 text-muted"></i>
          <p class="text-muted mt-3">Google Maps Integration</p>
          <small>Real-time location tracking akan ditampilkan di sini</small>
        </div>
        <div class="mt-3">
          <h6>Timeline:</h6>
          <ul class="timeline mb-0">
            <li class="timeline-item">
              <span class="timeline-point timeline-point-primary"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-0">Assigned</h6>
                  <small>13:30</small>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-0">Departed</h6>
                  <small>13:55</small>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-warning"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-0">En Route</h6>
                  <small>Current</small>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Field Work</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Status Update</label>
          <select class="form-select">
            <option>Scheduled</option>
            <option>En Route</option>
            <option selected>In Progress</option>
            <option>Completed</option>
            <option>Cancelled</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Notes/Progress</label>
          <textarea class="form-control" rows="3" placeholder="Update terbaru dari lapangan..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Upload Photos</label>
          <input type="file" class="form-control" multiple accept="image/*">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
@endsection