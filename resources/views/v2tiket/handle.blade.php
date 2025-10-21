{{-- FILE: resources/views/v2tiket/handle.blade.php --}}
@extends('layouts.master')

@section('title', 'Handle Ticket #' . $id . ' - Remote Troubleshooting')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="fw-bold py-3 mb-0">
              <i class="ti ti-settings text-primary me-2"></i>Handle Ticket #{{ $id }}
            </h4>
            <p class="text-muted mb-0">Remote troubleshooting & resolution interface</p>
          </div>
          <div class="d-flex gap-2">
            <a href="{{ route('v2tiket.detail', $id) }}" class="btn btn-outline-secondary">
              <i class="ti ti-eye me-2"></i>View Detail
            </a>
            <a href="{{ route('v2tiket.list') }}" class="btn btn-secondary">
              <i class="ti ti-arrow-left me-2"></i>Back to List
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ticket Info Summary -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-lg me-3">
                  <span class="avatar-initial rounded bg-label-warning">
                    <i class="ti ti-tools fs-4"></i>
                  </span>
                </div>
                <div>
                  <h5 class="mb-1">Budi Santoso - Internet lambat sejak kemarin</h5>
                  <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-label-info">CID-12345</span>
                    <span class="badge bg-label-warning">Medium Priority</span>
                    <span class="badge bg-label-primary">Remote Trying</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="text-lg-end">
                <small class="text-muted d-block">SLA Deadline</small>
                <strong class="text-warning" id="slaCountdown">1h 45m remaining</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Main Troubleshooting Panel -->
    <div class="col-xl-8 col-lg-7">
      <!-- Remote Diagnostic Tools -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-activity me-2"></i>Remote Diagnostic Tools
          </h5>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <button class="btn btn-outline-primary w-100" onclick="runConnectivityTest()">
                <i class="ti ti-wifi me-2"></i>Connectivity Test
              </button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-outline-info w-100" onclick="checkSignalLevel()">
                <i class="ti ti-signal-4g me-2"></i>Signal Level Check
              </button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-outline-warning w-100" onclick="speedTest()">
                <i class="ti ti-gauge me-2"></i>Speed Test
              </button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-outline-success w-100" onclick="portStatusCheck()">
                <i class="ti ti-network me-2"></i>Port Status
              </button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-outline-danger w-100" onclick="rebootDevice()">
                <i class="ti ti-refresh me-2"></i>Reboot ONT
              </button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-outline-dark w-100" onclick="fullDiagnostic()">
                <i class="ti ti-scan me-2"></i>Full Diagnostic
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Test Results -->
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-chart-line me-2"></i>Test Results
          </h5>
          <button class="btn btn-sm btn-outline-secondary" onclick="clearResults()">
            <i class="ti ti-trash me-1"></i>Clear
          </button>
        </div>
        <div class="card-body">
          <div id="testResults">
            <div class="text-center text-muted py-5">
              <i class="ti ti-chart-dots fs-1"></i>
              <p class="mt-3">Run diagnostic tools to see results here</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Action Logs -->
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">
            <i class="ti ti-clock-history me-2"></i>Action Logs
          </h5>
          <button class="btn btn-sm btn-outline-primary" onclick="addManualLog()">
            <i class="ti ti-plus me-1"></i>Add Log
          </button>
        </div>
        <div class="card-body">
          <div class="timeline timeline-advance" id="actionLogs">
            <div class="timeline-item timeline-item-info">
              <span class="timeline-indicator timeline-indicator-info">
                <i class="ti ti-play"></i>
              </span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Troubleshooting session started</h6>
                  <small class="text-muted" id="sessionStart">Just now</small>
                </div>
                <p class="mb-0">Remote troubleshooting interface opened by NOC Team</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-xl-4 col-lg-5">
      <!-- Customer Quick Info -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-user me-2"></i>Customer Info
          </h5>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="avatar me-2">
              <span class="avatar-initial rounded-circle bg-label-primary">BS</span>
            </div>
            <div>
              <h6 class="mb-0">Budi Santoso</h6>
              <small class="text-muted">CID-12345</small>
            </div>
          </div>
          
          <div class="info-list">
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">Package:</span>
              <span>Fiber 20 Mbps</span>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">Phone:</span>
              <span>081234567890</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
              <span class="text-muted">Status:</span>
              <span class="badge bg-label-success">Active</span>
            </div>
          </div>
          
          <div class="d-grid gap-2">
            <button class="btn btn-outline-success btn-sm" onclick="callCustomer()">
              <i class="ti ti-phone me-2"></i>Call Customer
            </button>
            <button class="btn btn-outline-info btn-sm" onclick="sendWhatsApp()">
              <i class="ti ti-brand-whatsapp me-2"></i>WhatsApp
            </button>
          </div>
        </div>
      </div>

      <!-- Equipment Info -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-router me-2"></i>Equipment
          </h5>
        </div>
        <div class="card-body">
          <div class="info-list">
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">ONT:</span>
              <span>ZTE F670L</span>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">IP:</span>
              <span>192.168.1.1</span>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">OLT Port:</span>
              <span>OLT-01/1/1/25</span>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">Status:</span>
              <span class="badge bg-label-success">Online</span>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span class="text-muted">Last Seen:</span>
              <span class="text-success">2 min ago</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Resolution -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-lightning me-2"></i>Quick Resolution
          </h5>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-success" onclick="markResolved()">
              <i class="ti ti-check me-2"></i>Mark as Resolved
            </button>
            <button class="btn btn-warning" onclick="escalateToField()">
              <i class="ti ti-arrow-up me-2"></i>Escalate to Field
            </button>
            <button class="btn btn-outline-secondary" onclick="requestCallback()">
              <i class="ti ti-phone-call me-2"></i>Schedule Callback
            </button>
          </div>
        </div>
      </div>

      <!-- Common Solutions -->
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-bulb me-2"></i>Common Solutions
          </h5>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <button class="list-group-item list-group-item-action border-0 px-0" onclick="applySolution('restart')">
              <i class="ti ti-refresh me-2 text-warning"></i>
              Restart ONT/Router
            </button>
            <button class="list-group-item list-group-item-action border-0 px-0" onclick="applySolution('cable')">
              <i class="ti ti-cable me-2 text-info"></i>
              Check Cable Connections
            </button>
            <button class="list-group-item list-group-item-action border-0 px-0" onclick="applySolution('port')">
              <i class="ti ti-network me-2 text-success"></i>
              Reset OLT Port
            </button>
            <button class="list-group-item list-group-item-action border-0 px-0" onclick="applySolution('config')">
              <i class="ti ti-settings me-2 text-primary"></i>
              Reconfigure Settings
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Manual Log Modal -->
<div class="modal fade" id="manualLogModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Manual Log</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Action Type</label>
            <select class="form-select" id="logType">
              <option value="test">Diagnostic Test</option>
              <option value="fix">Fix Applied</option>
              <option value="communication">Customer Communication</option>
              <option value="escalation">Escalation</option>
              <option value="resolution">Resolution</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="logDescription" rows="3" placeholder="Describe the action taken..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Result</label>
            <select class="form-select" id="logResult">
              <option value="success">Success</option>
              <option value="failed">Failed</option>
              <option value="partial">Partial Success</option>
              <option value="pending">Pending</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="saveManualLog()">Save Log</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
// SLA Countdown Timer
function startSLACountdown() {
    const deadline = new Date();
    deadline.setHours(deadline.getHours() + 1, deadline.getMinutes() + 45);
    
    setInterval(() => {
        const now = new Date();
        const timeLeft = deadline - now;
        
        if (timeLeft > 0) {
            const hours = Math.floor(timeLeft / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            document.getElementById('slaCountdown').textContent = `${hours}h ${minutes}m remaining`;
        } else {
            document.getElementById('slaCountdown').textContent = 'SLA EXCEEDED';
            document.getElementById('slaCountdown').className = 'text-danger fw-bold';
        }
    }, 60000); // Update every minute
}

// Diagnostic Tools
function runConnectivityTest() {
    addLog('test', 'Running connectivity test...', 'pending');
    
    setTimeout(() => {
        const result = `
            <div class="alert alert-success">
                <h6><i class="ti ti-wifi me-2"></i>Connectivity Test Results</h6>
                <ul class="mb-0">
                    <li>Ping to ONT: 2ms ✓</li>
                    <li>Ping to Gateway: 5ms ✓</li>
                    <li>Ping to DNS: 15ms ✓</li>
                    <li>Internet connectivity: OK ✓</li>
                </ul>
            </div>
        `;
        addTestResult(result);
        updateLog('Connectivity test completed - All checks passed', 'success');
    }, 2000);
}

function checkSignalLevel() {
    addLog('test', 'Checking signal levels...', 'pending');
    
    setTimeout(() => {
        const result = `
            <div class="alert alert-warning">
                <h6><i class="ti ti-signal-4g me-2"></i>Signal Level Results</h6>
                <ul class="mb-0">
                    <li>RX Power: -22.5 dBm (Acceptable)</li>
                    <li>TX Power: 2.8 dBm (Good)</li>
                    <li>Signal degradation detected ⚠️</li>
                </ul>
            </div>
        `;
        addTestResult(result);
        updateLog('Signal check completed - Borderline signal quality', 'partial');
    }, 1500);
}

function speedTest() {
    addLog('test', 'Running speed test...', 'pending');
    
    setTimeout(() => {
        const result = `
            <div class="alert alert-danger">
                <h6><i class="ti ti-gauge me-2"></i>Speed Test Results</h6>
                <ul class="mb-0">
                    <li>Download: 5.2 Mbps (Expected: 20 Mbps) ❌</li>
                    <li>Upload: 8.1 Mbps (Good) ✓</li>
                    <li>Latency: 45ms (High) ⚠️</li>
                </ul>
            </div>
        `;
        addTestResult(result);
        updateLog('Speed test completed - Download speed below package', 'failed');
    }, 3000);
}

function portStatusCheck() {
    addLog('test', 'Checking OLT port status...', 'pending');
    
    setTimeout(() => {
        const result = `
            <div class="alert alert-success">
                <h6><i class="ti ti-network me-2"></i>Port Status Results</h6>
                <ul class="mb-0">
                    <li>OLT Port: Active ✓</li>
                    <li>Port Utilization: 89% ⚠️</li>
                    <li>Error Rate: 0.01% ✓</li>
                </ul>
            </div>
        `;
        addTestResult(result);
        updateLog('Port status check completed - High utilization detected', 'partial');
    }, 1000);
}

function rebootDevice() {
    Swal.fire({
        title: 'Reboot ONT?',
        text: 'This will restart customer ONT device',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reboot'
    }).then((result) => {
        if (result.isConfirmed) {
            addLog('fix', 'Initiating ONT reboot...', 'pending');
            
            setTimeout(() => {
                addTestResult(`
                    <div class="alert alert-info">
                        <h6><i class="ti ti-refresh me-2"></i>Device Reboot</h6>
                        <p class="mb-0">ONT reboot completed successfully. Device back online.</p>
                    </div>
                `);
                updateLog('ONT reboot completed successfully', 'success');
            }, 5000);
        }
    });
}

function fullDiagnostic() {
    addLog('test', 'Running full diagnostic suite...', 'pending');
    
    setTimeout(() => {
        const result = `
            <div class="alert alert-warning">
                <h6><i class="ti ti-scan me-2"></i>Full Diagnostic Summary</h6>
                <div class="row">
                    <div class="col-6">
                        <strong>Issues Found:</strong>
                        <ul class="mb-0">
                            <li>High port utilization (89%)</li>
                            <li>Signal degradation</li>
                            <li>Speed below package</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <strong>Recommendations:</strong>
                        <ul class="mb-0">
                            <li>Load balance port</li>
                            <li>Check fiber connections</li>
                            <li>Consider package adjustment</li>
                        </ul>
                    </div>
                </div>
            </div>
        `;
        addTestResult(result);
        updateLog('Full diagnostic completed - Multiple issues identified', 'partial');
    }, 4000);
}

// Helper Functions
function addTestResult(html) {
    const resultsDiv = document.getElementById('testResults');
    if (resultsDiv.querySelector('.text-muted')) {
        resultsDiv.innerHTML = '';
    }
    resultsDiv.insertAdjacentHTML('beforeend', html);
}

function clearResults() {
    document.getElementById('testResults').innerHTML = `
        <div class="text-center text-muted py-5">
            <i class="ti ti-chart-dots fs-1"></i>
            <p class="mt-3">Run diagnostic tools to see results here</p>
        </div>
    `;
}

function addLog(type, description, result) {
    const timestamp = new Date().toLocaleTimeString();
    const statusClass = {
        'pending': 'timeline-item-warning',
        'success': 'timeline-item-success', 
        'failed': 'timeline-item-danger',
        'partial': 'timeline-item-info'
    };
    
    const icon = {
        'pending': 'ti-clock',
        'success': 'ti-check',
        'failed': 'ti-x',
        'partial': 'ti-info-circle'
    };
    
    const logHtml = `
        <div class="timeline-item ${statusClass[result]}" id="log-${Date.now()}">
            <span class="timeline-indicator timeline-indicator-${result === 'pending' ? 'warning' : result === 'success' ? 'success' : result === 'failed' ? 'danger' : 'info'}">
                <i class="ti ${icon[result]}"></i>
            </span>
            <div class="timeline-event">
                <div class="timeline-header mb-1">
                    <h6 class="mb-0">${description}</h6>
                    <small class="text-muted">${timestamp}</small>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('actionLogs').insertAdjacentHTML('afterbegin', logHtml);
}

function updateLog(newDescription, newResult) {
    const lastLog = document.querySelector('#actionLogs .timeline-item');
    const statusClass = {
        'success': 'timeline-item-success',
        'failed': 'timeline-item-danger', 
        'partial': 'timeline-item-info'
    };
    
    const icon = {
        'success': 'ti-check',
        'failed': 'ti-x',
        'partial': 'ti-info-circle'
    };
    
    if (lastLog) {
        lastLog.className = `timeline-item ${statusClass[newResult]}`;
        lastLog.querySelector('.timeline-indicator').className = `timeline-indicator timeline-indicator-${newResult === 'success' ? 'success' : newResult === 'failed' ? 'danger' : 'info'}`;
        lastLog.querySelector('.timeline-indicator i').className = `ti ${icon[newResult]}`;
        lastLog.querySelector('h6').textContent = newDescription;
    }
}

function addManualLog() {
    const modal = new bootstrap.Modal(document.getElementById('manualLogModal'));
    modal.show();
}

function saveManualLog() {
    const type = document.getElementById('logType').value;
    const description = document.getElementById('logDescription').value;
    const result = document.getElementById('logResult').value;
    
    if (!description.trim()) {
        Swal.fire('Error', 'Please enter description', 'error');
        return;
    }
    
    addLog(type, description, result);
    bootstrap.Modal.getInstance(document.getElementById('manualLogModal')).hide();
    
    // Clear form
    document.getElementById('logDescription').value = '';
}

// Quick Actions
function markResolved() {
    Swal.fire({
        title: 'Mark as Resolved?',
        text: 'This will close the ticket and notify the customer',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Resolve'
    }).then((result) => {
        if (result.isConfirmed) {
            addLog('resolution', 'Ticket marked as resolved', 'success');
            Swal.fire('Resolved!', 'Ticket has been resolved', 'success').then(() => {
                window.location.href = "{{ route('v2tiket.list') }}";
            });
        }
    });
}

function escalateToField() {
    window.location.href = "{{ route('v2tiket.escalate', $id) }}";
}

function requestCallback() {
    Swal.fire({
        title: 'Schedule Callback',
        html: `
            <div class="text-start">
                <div class="mb-3">
                    <label class="form-label">Callback Time</label>
                    <input type="datetime-local" class="form-control" id="callbackTime">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" id="callbackNotes" rows="3"></textarea>
                </div>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Schedule'
    }).then((result) => {
        if (result.isConfirmed) {
            addLog('communication', 'Callback scheduled with customer', 'success');
            Swal.fire('Scheduled!', 'Callback has been scheduled', 'success');
        }
    });
}

// Communication
function callCustomer() {
    window.location.href = 'tel:+6281234567890';
}

function sendWhatsApp() {
    window.open('https://wa.me/6281234567890', '_blank');
}

// Solution Templates
function applySolution(type) {
    const solutions = {
        'restart': 'Restarting ONT device remotely',
        'cable': 'Guiding customer to check cable connections',
        'port': 'Resetting OLT port configuration',
        'config': 'Reconfiguring device settings'
    };
    
    addLog('fix', solutions[type], 'pending');
    
    setTimeout(() => {
        updateLog(solutions[type] + ' - Completed', 'success');
    }, 2000);
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    startSLACountdown();
    
    // Set session start time
    document.getElementById('sessionStart').textContent = new Date().toLocaleTimeString();
});
</script>
@endsection