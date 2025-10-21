{{-- FILE: resources/views/v2tiket/create.blade.php --}}
@extends('layouts.master')

@section('title', 'Create New Ticket - NOC Dashboard V2')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-plus text-primary me-2"></i>Create New Ticket
            </h4>
            <p class="text-muted mb-0">NOC simplified workflow - Remote first, then field if needed</p>
          </div>
          <div>
            <a href="{{ route('v2tiket.index') }}" class="btn btn-secondary">
              <i class="ti ti-arrow-left me-2"></i>Back to Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Ticket Form -->
  <div class="row">
    <div class="col-xl-8 col-lg-7 col-md-7">
      <!-- Main Form -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-file-text me-2"></i>Ticket Information
          </h5>
        </div>
        <div class="card-body">
          <form id="createTicketForm" method="POST" action="{{ route('v2tiket.store') }}" enctype="multipart/form-data">
            @csrf
            
            <!-- Customer ID -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="customer-id">Customer ID <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" id="customer-id" name="customer_id" 
                         placeholder="CID-xxxxxx" required />
                  <button class="btn btn-outline-primary" type="button" id="search-customer">
                    <i class="ti ti-search"></i>
                  </button>
                </div>
                <div class="form-text">Search customer by ID or name</div>
              </div>
            </div>
            
            <!-- Customer Name -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="customer-name">Customer Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="customer-name" name="customer_name" 
                       placeholder="Auto-filled after search" readonly />
              </div>
            </div>
            
            <!-- Reporter Info -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Reporter Contact <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <div class="row g-2">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="reporter-name" name="reporter_name" 
                           placeholder="Reporter name" required />
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="reporter-phone" name="reporter_phone" 
                           placeholder="Phone number" required />
                  </div>
                </div>
              </div>
            </div>

            <!-- Problem Category (Simplified) -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="problem-category">Problem Category <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <select id="problem-category" name="problem_category" class="form-select" required>
                  <option value="">Select Problem Type</option>
                  <option value="internet_issues">🌐 Internet Issues (slow, down, intermittent)</option>
                  <option value="device_issues">📱 Device Issues (ONT, router, cable)</option>
                  <option value="password_access">🔐 Password & Access (reset, forgot)</option>
                  <option value="billing_admin">💰 Billing & Admin (payment, upgrade, info)</option>
                  <option value="infrastructure">🏗️ Infrastructure (area down, line cut)</option>
                </select>
              </div>
            </div>

            <!-- Problem Description -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="problem-description">Problem Description <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <textarea class="form-control" id="problem-description" name="problem_description" 
                          rows="4" placeholder="Describe the problem in detail..." required></textarea>
              </div>
            </div>

            <!-- Priority (Auto-set but can override) -->
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="priority">Priority</label>
              <div class="col-sm-9">
                <select id="priority" name="priority" class="form-select">
                  <option value="low">🟢 Low - General inquiry, non-urgent</option>
                  <option value="medium" selected>🟡 Medium - Normal service issue</option>
                  <option value="high">🟠 High - Service affecting single customer</option>
                  <option value="critical">🔴 Critical - Service affecting multiple customers</option>
                </select>
              </div>
            </div>

            <!-- Attachment -->
            <div class="row mb-4">
              <label class="col-sm-3 col-form-label" for="attachment">Attachment</label>
              <div class="col-sm-9">
                <input class="form-control" type="file" id="attachment" name="attachment" 
                       accept="image/*,.pdf,.doc,.docx" />
                <div class="form-text">Upload screenshot or document (max 5MB)</div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="row">
              <div class="col-sm-9 offset-sm-3">
                <button type="button" class="btn btn-primary me-2" onclick="createAndTryRemote()">
                  <i class="ti ti-device-laptop me-2"></i>Create & Try Remote Fix
                </button>
                <button type="button" class="btn btn-warning me-2" onclick="createAndAssignField()">
                  <i class="ti ti-user-cog me-2"></i>Create & Assign to Field
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                  <i class="ti ti-refresh me-2"></i>Reset
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5">
      <!-- Customer Info -->
      <div class="card mb-4" id="customer-info-card" style="display: none;">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-user me-2"></i>Customer Information
          </h6>
        </div>
        <div class="card-body">
          <div id="customer-details">
            <!-- Will be filled by JavaScript -->
          </div>
        </div>
      </div>

      <!-- Quick Diagnostic -->
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-activity me-2"></i>Quick Diagnostic
          </h6>
        </div>
        <div class="card-body">
          <button class="btn btn-outline-info btn-sm w-100 mb-2" onclick="runPingTest()">
            <i class="ti ti-wifi me-2"></i>Ping Test
          </button>
          <button class="btn btn-outline-info btn-sm w-100 mb-2" onclick="checkSignal()">
            <i class="ti ti-signal-4g me-2"></i>Check Signal
          </button>
          <button class="btn btn-outline-info btn-sm w-100 mb-2" onclick="rebootDevice()">
            <i class="ti ti-refresh me-2"></i>Reboot Device
          </button>
          <button class="btn btn-outline-warning btn-sm w-100" onclick="fullDiagnostic()">
            <i class="ti ti-search me-2"></i>Full Diagnostic
          </button>
        </div>
      </div>

      <!-- Templates -->
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-template me-2"></i>Quick Templates
          </h6>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-outline-primary btn-sm" onclick="useTemplate('internet_slow')">
              Internet Slow
            </button>
            <button class="btn btn-outline-primary btn-sm" onclick="useTemplate('internet_down')">
              Internet Down
            </button>
            <button class="btn btn-outline-primary btn-sm" onclick="useTemplate('password_reset')">
              Password Reset
            </button>
            <button class="btn btn-outline-primary btn-sm" onclick="useTemplate('device_offline')">
              Device Offline
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
// Search Customer
document.getElementById('search-customer').addEventListener('click', function() {
    const customerId = document.getElementById('customer-id').value;
    if (!customerId) {
        Swal.fire('Error', 'Please enter Customer ID', 'error');
        return;
    }
    
    // Mock customer search - replace with actual AJAX
    setTimeout(() => {
        document.getElementById('customer-name').value = 'Budi Santoso';
        showCustomerInfo({
            name: 'Budi Santoso',
            id: customerId,
            phone: '081234567890',
            address: 'Jl. Sudirman No. 123',
            package: 'Fiber 20 Mbps',
            status: 'Active',
            last_payment: '2025-09-15'
        });
    }, 500);
});

function showCustomerInfo(customer) {
    const customerDetails = `
        <div class="d-flex align-items-center mb-3">
            <div class="avatar avatar-sm me-2">
                <span class="avatar-initial rounded-circle bg-label-primary">${customer.name.charAt(0)}</span>
            </div>
            <div>
                <h6 class="mb-0">${customer.name}</h6>
                <small class="text-muted">${customer.id}</small>
            </div>
        </div>
        <hr>
        <div class="info-list">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Package:</span>
                <span class="fw-medium">${customer.package}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Status:</span>
                <span class="badge bg-label-success">${customer.status}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Phone:</span>
                <span>${customer.phone}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Last Payment:</span>
                <span>${customer.last_payment}</span>
            </div>
        </div>
    `;
    
    document.getElementById('customer-details').innerHTML = customerDetails;
    document.getElementById('customer-info-card').style.display = 'block';
}

// Create ticket actions
function createAndTryRemote() {
    const form = document.getElementById('createTicketForm');
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    Swal.fire({
        title: 'Creating Ticket...',
        text: 'Will try remote resolution first',
        icon: 'info',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        // Submit form with action=remote
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'action';
        hiddenInput.value = 'remote';
        form.appendChild(hiddenInput);
        form.submit();
    });
}

function createAndAssignField() {
    const form = document.getElementById('createTicketForm');
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    Swal.fire({
        title: 'Assign to Field Technician?',
        text: 'Skip remote troubleshooting and assign directly to field team',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Assign to Field',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'action';
            hiddenInput.value = 'field';
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
}

// Quick diagnostic functions
function runPingTest() {
    const customerId = document.getElementById('customer-id').value;
    if (!customerId) {
        Swal.fire('Error', 'Please search customer first', 'error');
        return;
    }
    
    Swal.fire('Running Ping Test...', 'Testing connectivity', 'info');
    // Add actual ping test logic
}

function checkSignal() {
    Swal.fire('Checking Signal...', 'Reading ONT signal level', 'info');
    // Add signal check logic
}

function rebootDevice() {
    Swal.fire({
        title: 'Reboot Device?',
        text: 'This will restart customer ONT/Router',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reboot'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Rebooting...', 'Device restart initiated', 'success');
        }
    });
}

function fullDiagnostic() {
    Swal.fire('Running Full Diagnostic...', 'This may take a few minutes', 'info');
    // Add full diagnostic logic
}

// Template functions
function useTemplate(type) {
    const templates = {
        'internet_slow': {
            category: 'internet_issues',
            description: 'Customer complaining about slow internet speed. Need to check bandwidth and signal quality.'
        },
        'internet_down': {
            category: 'internet_issues', 
            description: 'Customer reports no internet connection. Need to check ONT status and connectivity.'
        },
        'password_reset': {
            category: 'password_access',
            description: 'Customer requesting WiFi password reset. Lost/forgot current password.'
        },
        'device_offline': {
            category: 'device_issues',
            description: 'Customer device (ONT/Router) appears to be offline. May need power cycle or replacement.'
        }
    };
    
    const template = templates[type];
    if (template) {
        document.getElementById('problem-category').value = template.category;
        document.getElementById('problem-description').value = template.description;
    }
}
</script>
@endsection