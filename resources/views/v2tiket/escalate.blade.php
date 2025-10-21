{{-- FILE: resources/views/v2tiket/escalate.blade.php --}}
@extends('layouts.master')

@section('title', 'Escalate Ticket #' . $id . ' to Field Team')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-arrow-up text-warning me-2"></i>Escalate Ticket #{{ $id }}
            </h4>
            <p class="text-muted mb-0">Assign ticket to field technician for on-site resolution</p>
          </div>
          <div class="d-flex gap-2">
            <a href="{{ route('v2tiket.detail', $id) }}" class="btn btn-outline-secondary">
              <i class="ti ti-eye me-2"></i>View Detail
            </a>
            <a href="{{ route('v2tiket.handle', $id) }}" class="btn btn-outline-primary">
              <i class="ti ti-arrow-left me-2"></i>Back to Handle
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ticket Summary -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-lg me-3">
                  <span class="avatar-initial rounded bg-label-danger">
                    <i class="ti ti-alert-triangle fs-4"></i>
                  </span>
                </div>
                <div>
                  <h5 class="mb-1">Remote troubleshooting unsuccessful</h5>
                  <p class="text-muted mb-1">Ticket #{{ $id }} - Budi Santoso (CID-12345)</p>
                  <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-label-warning">Requires Field Visit</span>
                    <span class="badge bg-label-danger">High Priority</span>
                    <span class="badge bg-label-info">Internet Issues</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="text-lg-end">
                <small class="text-muted d-block">Escalation Reason</small>
                <strong class="text-danger">Remote resolution failed</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Main Escalation Form -->
    <div class="col-xl-8 col-lg-7">
      <!-- Escalation Details -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-file-text me-2"></i>Escalation Details
          </h5>
        </div>
        <div class="card-body">
          <form id="escalationForm">
            @csrf
            
            <!-- Escalation Reason -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Escalation Reason <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <select class="form-select" id="escalation_reason" name="escalation_reason" required>
                  <option value="">Select reason for escalation</option>
                  <option value="remote_failed">Remote troubleshooting failed</option>
                  <option value="hardware_issue">Hardware replacement required</option>
                  <option value="signal_issue">Signal/Fiber issue detected</option>
                  <option value="installation_problem">Installation/Wiring problem</option>
                  <option value="customer_request">Customer requested on-site visit</option>
                  <option value="complex_config">Complex configuration needed</option>
                </select>
              </div>
            </div>

            <!-- Priority Level -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Field Priority <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <select class="form-select" id="field_priority" name="field_priority" required>
                  <option value="urgent">🔴 Urgent - Same day visit required</option>
                  <option value="high">🟠 High - Next business day</option>
                  <option value="normal" selected>🟡 Normal - Within 2-3 days</option>
                  <option value="low">🟢 Low - Within a week</option>
                </select>
              </div>
            </div>

            <!-- Technician Assignment -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Assign Technician</label>
              <div class="col-sm-9">
                <select class="form-select" id="technician" name="technician">
                  <option value="">Auto-assign based on location</option>
                  <option value="tech-001">Ahmad Wijaya - Jakarta Utara (Available)</option>
                  <option value="tech-002">Budi Santoso - Jakarta Pusat (Available)</option>
                  <option value="tech-003">Siti Aminah - Jakarta Selatan (Busy until 15:00)</option>
                  <option value="tech-004">Andi Rahman - Bekasi (Available)</option>
                  <option value="tech-005">Dewi Sari - Tangerang (Off duty)</option>
                </select>
                <div class="form-text">Leave empty for automatic assignment based on customer location</div>
              </div>
            </div>

            <!-- Preferred Visit Time -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Preferred Visit Time</label>
              <div class="col-sm-9">
                <div class="row g-2">
                  <div class="col-md-6">
                    <input type="date" class="form-control" id="visit_date" name="visit_date" 
                           min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                  </div>
                  <div class="col-md-6">
                    <select class="form-select" id="visit_time" name="visit_time">
                      <option value="">Any time</option>
                      <option value="morning">Morning (08:00-12:00)</option>
                      <option value="afternoon">Afternoon (12:00-17:00)</option>
                      <option value="evening">Evening (17:00-20:00)</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <!-- Problem Summary -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Problem Summary <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <textarea class="form-control" id="problem_summary" name="problem_summary" rows="3" required 
                          placeholder="Summarize the problem for field technician...">Customer reporting slow internet speed (5 Mbps vs 20 Mbps package). Remote diagnostic shows signal degradation and high port utilization. Remote restart and configuration adjustments did not resolve the issue.</textarea>
              </div>
            </div>

            <!-- Actions Taken -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Remote Actions Taken</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="actions_taken" name="actions_taken" rows="4" 
                          placeholder="List all remote troubleshooting steps performed...">1. Connectivity test - All passed
2. Signal level check - RX: -22.5 dBm (borderline)
3. Speed test - Download only 5.2 Mbps (expected 20 Mbps)
4. Port status check - 89% utilization detected
5. ONT reboot performed - No improvement
6. Configuration reset attempted - Issue persists</textarea>
              </div>
            </div>

            <!-- Suspected Cause -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Suspected Cause</label>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="cause_signal">
                      <label class="form-check-label" for="cause_signal">
                        Signal/Fiber issue
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="cause_hardware">
                      <label class="form-check-label" for="cause_hardware">
                        Hardware malfunction
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="cause_cable">
                      <label class="form-check-label" for="cause_cable">
                        Cable/Connector issue
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="cause_port" checked>
                      <label class="form-check-label" for="cause_port">
                        OLT port congestion
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="cause_config">
                      <label class="form-check-label" for="cause_config">
                        Configuration issue
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="cause_environment">
                      <label class="form-check-label" for="cause_environment">
                        Environmental factors
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Required Tools/Parts -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Required Tools/Parts</label>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="tool_power_meter">
                      <label class="form-check-label" for="tool_power_meter">
                        Optical Power Meter
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="tool_ont_replacement" checked>
                      <label class="form-check-label" for="tool_ont_replacement">
                        Replacement ONT
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="tool_cables">
                      <label class="form-check-label" for="tool_cables">
                        Fiber/Ethernet cables
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="tool_connectors">
                      <label class="form-check-label" for="tool_connectors">
                        Fiber connectors
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="tool_laptop">
                      <label class="form-check-label" for="tool_laptop">
                        Testing laptop
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="tool_crimping">
                      <label class="form-check-label" for="tool_crimping">
                        Crimping tools
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Special Instructions -->
            <div class="row mb-4">
              <label class="col-sm-3 col-form-label">Special Instructions</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="special_instructions" name="special_instructions" rows="3" 
                          placeholder="Any special notes for the field technician...">Customer is available during business hours only. Please call 30 minutes before arrival. Access to equipment is through the back entrance.</textarea>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="row">
              <div class="col-sm-9 offset-sm-3">
                <button type="button" class="btn btn-warning me-2" onclick="escalateTicket()">
                  <i class="ti ti-arrow-up me-2"></i>Escalate to Field Team
                </button>
                <button type="button" class="btn btn-success me-2" onclick="scheduleVisit()">
                  <i class="ti ti-calendar me-2"></i>Schedule Visit
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                  <i class="ti ti-refresh me-2"></i>Reset Form
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-xl-4 col-lg-5">
      <!-- Customer Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-user me-2"></i>Customer Information
          </h5>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="avatar avatar-lg me-3">
              <span class="avatar-initial rounded-circle bg-label-primary fs-4">BS</span>
            </div>
            <div>
              <h6 class="mb-1">Budi Santoso</h6>
              <p class="text-muted mb-0">CID-12345</p>
            </div>
          </div>
          
          <div class="info-list">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Phone:</span>
              <span>081234567890</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Package:</span>
              <span>Fiber 20 Mbps</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Address:</span>
              <span>Jl. Sudirman No. 123</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Area:</span>
              <span>Jakarta Pusat</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
              <span class="text-muted">Building Type:</span>
              <span>Residential</span>
            </div>
          </div>
          
          <div class="d-grid gap-2">
            <button class="btn btn-outline-success btn-sm" onclick="contactCustomer()">
              <i class="ti ti-phone me-2"></i>Call Customer
            </button>
            <button class="btn btn-outline-info btn-sm" onclick="viewLocation()">
              <i class="ti ti-map-pin me-2"></i>View Location
            </button>
          </div>
        </div>
      </div>

      <!-- Available Technicians -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-users me-2"></i>Available Technicians
          </h5>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Ahmad Wijaya</h6>
                <small class="text-muted">Jakarta Utara • 5.2 km away</small>
              </div>
              <span class="badge bg-label-success">Available</span>
            </div>
            
            <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Budi Santoso</h6>
                <small class="text-muted">Jakarta Pusat • 2.1 km away</small>
              </div>
              <span class="badge bg-label-success">Available</span>
            </div>
            
            <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Siti Aminah</h6>
                <small class="text-muted">Jakarta Selatan • 8.3 km away</small>
              </div>
              <span class="badge bg-label-warning">Busy until 15:00</span>
            </div>
            
            <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Andi Rahman</h6>
                <small class="text-muted">Bekasi • 12.5 km away</small>
              </div>
              <span class="badge bg-label-success">Available</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Escalation History -->
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-history me-2"></i>Previous Escalations
          </h5>
        </div>
        <div class="card-body">
          <div class="timeline timeline-advance">
            <div class="timeline-item timeline-item-success">
              <span class="timeline-indicator timeline-indicator-success">
                <i class="ti ti-check"></i>
              </span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">#TKT-087</h6>
                  <small class="text-muted">2 weeks ago</small>
                </div>
                <p class="mb-0 small">Internet putus-nyambung - Resolved by Ahmad</p>
              </div>
            </div>
            
            <div class="timeline-item timeline-item-success">
              <span class="timeline-indicator timeline-indicator-success">
                <i class="ti ti-check"></i>
              </span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">#TKT-065</h6>
                  <small class="text-muted">1 month ago</small>
                </div>
                <p class="mb-0 small">ONT replacement - Resolved by Budi</p>
              </div>
            </div>
          </div>
          
          <div class="text-center mt-3">
            <small class="text-success">
              <i class="ti ti-check me-1"></i>100% field resolution rate
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
function escalateTicket() {
    // Validate required fields
    const reason = document.getElementById('escalation_reason').value;
    const priority = document.getElementById('field_priority').value;
    const summary = document.getElementById('problem_summary').value;
    
    if (!reason || !priority || !summary.trim()) {
        Swal.fire('Validation Error', 'Please fill in all required fields', 'error');
        return;
    }
    
    Swal.fire({
        title: 'Escalate to Field Team?',
        html: `
            <div class="text-start">
                <p><strong>Reason:</strong> ${document.querySelector('#escalation_reason option:checked').text}</p>
                <p><strong>Priority:</strong> ${document.querySelector('#field_priority option:checked').text}</p>
                <p><strong>Technician:</strong> ${document.querySelector('#technician option:checked').text || 'Auto-assign'}</p>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Escalate',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Simulate escalation process
            Swal.fire({
                title: 'Escalating...',
                html: 'Creating field assignment and notifying technician',
                icon: 'info',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                Swal.fire({
                    title: 'Escalated Successfully!',
                    html: `
                        <div class="text-start">
                            <p>✅ Ticket assigned to field team</p>
                            <p>✅ Technician notified</p>
                            <p>✅ Customer notification sent</p>
                            <p>📱 SMS sent to customer with visit schedule</p>
                        </div>
                    `,
                    icon: 'success',
                    confirmButtonText: 'View Ticket Details'
                }).then(() => {
                    window.location.href = "{{ route('v2tiket.detail', $id) }}";
                });
            });
        }
    });
}

function scheduleVisit() {
    const visitDate = document.getElementById('visit_date').value;
    const visitTime = document.getElementById('visit_time').value;
    
    if (!visitDate) {
        Swal.fire('Error', 'Please select visit date', 'error');
        return;
    }
    
    Swal.fire({
        title: 'Schedule Field Visit?',
        html: `
            <div class="text-start">
                <p><strong>Date:</strong> ${visitDate}</p>
                <p><strong>Time:</strong> ${visitTime || 'Any time'}</p>
                <p><strong>Customer will be notified via SMS</strong></p>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Schedule Visit'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Visit Scheduled!', 'Customer has been notified of the scheduled visit', 'success');
        }
    });
}

function contactCustomer() {
    Swal.fire({
        title: 'Contact Customer',
        html: `
            <div class="d-grid gap-2">
                <button class="btn btn-success" onclick="window.location.href='tel:+6281234567890'">
                    <i class="ti ti-phone me-2"></i>Call: 081234567890
                </button>
                <button class="btn btn-info" onclick="window.open('https://wa.me/6281234567890', '_blank')">
                    <i class="ti ti-brand-whatsapp me-2"></i>WhatsApp
                </button>
                <button class="btn btn-primary" onclick="window.location.href='sms:+6281234567890'">
                    <i class="ti ti-message me-2"></i>Send SMS
                </button>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true
    });
}

function viewLocation() {
    Swal.fire({
        title: 'Customer Location',
        html: `
            <div class="text-start">
                <p><strong>Address:</strong><br>Jl. Sudirman No. 123<br>Jakarta Pusat 10110</p>
                <p><strong>Coordinates:</strong><br>-6.2088, 106.8456</p>
                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary" onclick="window.open('https://maps.google.com/?q=-6.2088,106.8456', '_blank')">
                        <i class="ti ti-map me-2"></i>Open in Google Maps
                    </button>
                    <button class="btn btn-success" onclick="window.open('https://waze.com/ul?ll=-6.2088,106.8456', '_blank')">
                        <i class="ti ti-route me-2"></i>Open in Waze
                    </button>
                </div>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true
    });
}

// Form enhancements
document.getElementById('escalation_reason').addEventListener('change', function() {
    const reason = this.value;
    const prioritySelect = document.getElementById('field_priority');
    
    // Auto-adjust priority based on reason
    if (reason === 'hardware_issue' || reason === 'signal_issue') {
        prioritySelect.value = 'high';
    } else if (reason === 'remote_failed') {
        prioritySelect.value = 'normal';
    }
});

document.getElementById('field_priority').addEventListener('change', function() {
    const priority = this.value;
    const visitDate = document.getElementById('visit_date');
    const today = new Date();
    
    // Auto-adjust visit date based on priority
    if (priority === 'urgent') {
        visitDate.value = today.toISOString().split('T')[0];
    } else if (priority === 'high') {
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        visitDate.value = tomorrow.toISOString().split('T')[0];
    }
});
</script>
@endsection