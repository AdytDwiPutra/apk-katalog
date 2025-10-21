@extends('layouts.master')

@section('title', 'V3 Handle Tiket #TKT-001')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">
        <i class="ti ti-tool me-2 text-success"></i>
        Handle Tiket #{{ $ticket_id }}
      </h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.dashboard') }}">V3 Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('v3tiket.detail', $ticket_id) }}">Detail Tiket</a></li>
          <li class="breadcrumb-item active">Handle</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex gap-2">
      <span class="badge bg-label-success">
        <i class="ti ti-wifi me-1"></i>
        Wireless PTP
      </span>
      <span class="badge bg-warning">In Progress</span>
    </div>
  </div>

  <div class="row">
    
    <!-- Main Troubleshooting Area -->
    <div class="col-lg-8">
      
      <!-- Quick Info Banner -->
      <div class="alert alert-info d-flex align-items-center mb-4">
        <i class="ti ti-info-circle me-3 fs-4"></i>
        <div>
          <strong>PT Maju Jaya (WL-2024-001)</strong> - Signal Lemah<br>
          <small>Wireless PTP → POP Sentral | Priority: Critical | SLA: 1h 30m overdue</small>
        </div>
      </div>

      <!-- Wireless-Specific Troubleshooting Steps -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-wifi me-2"></i>
            Wireless Troubleshooting Checklist
          </h5>
        </div>
        <div class="card-body">
          
          <!-- Step 1: Remote Diagnosis -->
          <div class="troubleshooting-step">
            <div class="d-flex align-items-center mb-3">
              <div class="step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                <span class="fw-bold">1</span>
              </div>
              <h6 class="mb-0">Remote Diagnosis</h6>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="card bg-light">
                  <div class="card-body p-3">
                    <h6 class="card-title">Ping Test</h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <button class="btn btn-sm btn-outline-primary" id="pingTest">
                        <i class="ti ti-activity me-1"></i>
                        Run Ping
                      </button>
                      <span class="badge bg-danger">Failed</span>
                    </div>
                    <small class="text-muted mt-2 d-block">Last: 75% packet loss</small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card bg-light">
                  <div class="card-body p-3">
                    <h6 class="card-title">Signal Strength</h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <button class="btn btn-sm btn-outline-primary" id="signalTest">
                        <i class="ti ti-radar me-1"></i>
                        Check RSSI
                      </button>
                      <span class="badge bg-warning">Poor</span>
                    </div>
                    <small class="text-muted mt-2 d-block">Current: -75 dBm</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="card bg-light">
                  <div class="card-body p-3">
                    <h6 class="card-title">Interface Status</h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <button class="btn btn-sm btn-outline-primary" id="interfaceCheck">
                        <i class="ti ti-network me-1"></i>
                        Check Interface
                      </button>
                      <span class="badge bg-success">Up</span>
                    </div>
                    <small class="text-muted mt-2 d-block">eth0: UP, wlan0: UP</small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card bg-light">
                  <div class="card-body p-3">
                    <h6 class="card-title">Frequency Scan</h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <button class="btn btn-sm btn-outline-primary" id="frequencyScan">
                        <i class="ti ti-radar-2 me-1"></i>
                        Scan Spectrum
                      </button>
                      <span class="badge bg-warning">Interference</span>
                    </div>
                    <small class="text-muted mt-2 d-block">Channel 149: High noise</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="step1Complete">
              <label class="form-check-label fw-medium text-success" for="step1Complete">
                Remote diagnosis completed
              </label>
            </div>
          </div>

          <hr class="my-4">

          <!-- Step 2: Remote Troubleshooting -->
          <div class="troubleshooting-step">
            <div class="d-flex align-items-center mb-3">
              <div class="step-number bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                <span class="fw-bold">2</span>
              </div>
              <h6 class="mb-0">Remote Troubleshooting</h6>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-4">
                <button class="btn btn-outline-info w-100 mb-2" id="deviceReboot">
                  <i class="ti ti-refresh me-1"></i>
                  Reboot CPE
                </button>
                <small class="text-muted">Last reboot: 2 hours ago</small>
              </div>
              <div class="col-md-4">
                <button class="btn btn-outline-warning w-100 mb-2" id="channelChange">
                  <i class="ti ti-adjustments me-1"></i>
                  Change Channel
                </button>
                <small class="text-muted">Current: Ch 149 (5.745 GHz)</small>
              </div>
              <div class="col-md-4">
                <button class="btn btn-outline-primary w-100 mb-2" id="powerAdjust">
                  <i class="ti ti-bolt me-1"></i>
                  Adjust Power
                </button>
                <small class="text-muted">Current: 20 dBm</small>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Action Taken</label>
              <textarea class="form-control" rows="3" placeholder="Describe the troubleshooting actions performed..."></textarea>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="step2Complete">
              <label class="form-check-label fw-medium text-warning" for="step2Complete">
                Remote troubleshooting attempted
              </label>
            </div>
          </div>

          <hr class="my-4">

          <!-- Step 3: Escalation Decision -->
          <div class="troubleshooting-step">
            <div class="d-flex align-items-center mb-3">
              <div class="step-number bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                <span class="fw-bold">3</span>
              </div>
              <h6 class="mb-0">Escalation Decision</h6>
            </div>
            
            <div class="alert alert-warning">
              <i class="ti ti-alert-triangle me-2"></i>
              <strong>Remote troubleshooting failed.</strong> Physical intervention required.
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="card border-warning">
                  <div class="card-body text-center">
                    <i class="ti ti-user-cog text-warning fs-2 mb-2"></i>
                    <h6>Field Technician</h6>
                    <p class="small text-muted">Antenna alignment, cable check, site visit</p>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#scheduleFieldModal">
                      <i class="ti ti-calendar me-1"></i>
                      Schedule Visit
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card border-info">
                  <div class="card-body text-center">
                    <i class="ti ti-user-star text-info fs-2 mb-2"></i>
                    <h6>Supervisor</h6>
                    <p class="small text-muted">Complex issue, need expert analysis</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#escalateModal">
                      <i class="ti ti-arrow-up me-1"></i>
                      Escalate Now
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="step3Complete">
              <label class="form-check-label fw-medium text-danger" for="step3Complete">
                Escalation path selected
              </label>
            </div>
          </div>

        </div>
      </div>

      <!-- Resolution Actions -->
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="ti ti-check-circle me-2"></i>
            Resolution Actions
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-2">
              <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#resolveModal">
                <i class="ti ti-check me-1"></i>
                Mark as Resolved
              </button>
            </div>
            <div class="col-md-4 mb-2">
              <button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#pendingModal">
                <i class="ti ti-clock me-1"></i>
                Set as Pending
              </button>
            </div>
            <div class="col-md-4 mb-2">
              <button class="btn btn-outline-secondary w-100">
                <i class="ti ti-device-floppy me-1"></i>
                Save Progress
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Sidebar Tools -->
    <div class="col-lg-4">
      
      <!-- Live Monitoring -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-activity me-2"></i>
            Live Monitoring
          </h6>
        </div>
        <div class="card-body">
          <div class="row text-center mb-3">
            <div class="col-6">
              <h5 class="text-danger mb-0">-75</h5>
              <small class="text-muted">RSSI (dBm)</small>
            </div>
            <div class="col-6">
              <h5 class="text-warning mb-0">15%</h5>
              <small class="text-muted">Packet Loss</small>
            </div>
          </div>
          
          <canvas id="signalChart" width="100" height="60"></canvas>
          
          <div class="d-flex justify-content-between mt-2">
            <small class="text-muted">Last 30 min</small>
            <button class="btn btn-xs btn-outline-primary" id="refreshChart">
              <i class="ti ti-refresh"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Quick Tools -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-tools me-2"></i>
            Quick Tools
          </h6>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#remoteAccessModal">
              <i class="ti ti-remote-control me-1"></i>
              Remote Access CPE
            </button>
            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#speedTestModal">
              <i class="ti ti-speedboat me-1"></i>
              Run Speed Test
            </button>
            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#configBackupModal">
              <i class="ti ti-download me-1"></i>
              Backup Config
            </button>
            <button class="btn btn-sm btn-outline-success">
              <i class="ti ti-message me-1"></i>
              Notify Customer
            </button>
          </div>
        </div>
      </div>

      <!-- Knowledge Base -->
      <div class="card mb-3">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-book me-2"></i>
            Knowledge Base
          </h6>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action px-0 py-2">
              <small class="fw-medium">Wireless Signal Troubleshooting</small><br>
              <small class="text-muted">Step-by-step guide for RSSI issues</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action px-0 py-2">
              <small class="fw-medium">Antenna Alignment Procedures</small><br>
              <small class="text-muted">Physical alignment best practices</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action px-0 py-2">
              <small class="fw-medium">Interference Mitigation</small><br>
              <small class="text-muted">Channel planning and frequency management</small>
            </a>
          </div>
        </div>
      </div>

      <!-- Previous Cases -->
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0">
            <i class="ti ti-history me-2"></i>
            Similar Cases
          </h6>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item px-0 py-2">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <small class="fw-medium">TKT-045</small><br>
                  <small class="text-muted">Same customer - Signal weak</small><br>
                  <small class="text-success">Resolved: Antenna realignment</small>
                </div>
                <span class="badge bg-success">3d</span>
              </div>
            </div>
            <div class="list-group-item px-0 py-2">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <small class="fw-medium">TKT-032</small><br>
                  <small class="text-muted">POP Sentral - Multiple clients</small><br>
                  <small class="text-success">Resolved: Channel change</small>
                </div>
                <span class="badge bg-success">1w</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<!-- Schedule Field Visit Modal -->
<div class="modal fade" id="scheduleFieldModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Schedule Field Visit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Assign to Technician</label>
            <select class="form-select">
              <option>Teknisi A - Available</option>
              <option>Teknisi B - Available</option>
              <option>Teknisi C - Busy until 15:00</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Scheduled Date & Time</label>
            <input type="datetime-local" class="form-control" value="2025-09-24T14:00">
          </div>
          <div class="mb-3">
            <label class="form-label">Expected Work</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" checked>
              <label class="form-check-label">Antenna alignment</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox">
              <label class="form-check-label">Cable replacement</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox">
              <label class="form-check-label">Site survey</label>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Notes for Technician</label>
            <textarea class="form-control" rows="3" placeholder="Special instructions or findings..."></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-warning">Schedule Visit</button>
      </div>
    </div>
  </div>
</div>

<!-- Resolve Ticket Modal -->
<div class="modal fade" id="resolveModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Resolve Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Resolution Method</label>
            <select class="form-select">
              <option>Remote configuration change</option>
              <option>Antenna realignment</option>
              <option>Channel/frequency change</option>
              <option>Hardware replacement</option>
              <option>Network optimization</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Resolution Description</label>
            <textarea class="form-control" rows="4" placeholder="Describe what was done to resolve the issue..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Root Cause</label>
            <select class="form-select">
              <option>Antenna misalignment</option>
              <option>Interference from nearby devices</option>
              <option>Weather-related issues</option>
              <option>Hardware failure</option>
              <option>Configuration error</option>
            </select>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">
              Notify customer of resolution
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Mark as Resolved</button>
      </div>
    </div>
  </div>
</div>

<style>
.troubleshooting-step {
  margin-bottom: 2rem;
}

.step-number {
  font-size: 14px;
  min-width: 32px;
  min-height: 32px;
}

#signalChart {
  width: 100%;
  height: 60px;
}
</style>

<script>
// Simulate troubleshooting actions
document.getElementById('pingTest').addEventListener('click', function() {
    this.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i> Testing...';
    this.disabled = true;
    
    setTimeout(() => {
        this.innerHTML = '<i class="ti ti-activity me-1"></i> Run Ping';
        this.disabled = false;
        // Update result
    }, 2000);
});

document.getElementById('signalTest').addEventListener('click', function() {
    this.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i> Checking...';
    this.disabled = true;
    
    setTimeout(() => {
        this.innerHTML = '<i class="ti ti-radar me-1"></i> Check RSSI';
        this.disabled = false;
        // Update signal strength display
    }, 3000);
});

// Simple signal chart simulation
const ctx = document.getElementById('signalChart').getContext('2d');
const signalData = [-75, -73, -76, -78, -75, -74, -77, -75];

function drawSignalChart() {
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    ctx.strokeStyle = '#ff6b6b';
    ctx.lineWidth = 2;
    ctx.beginPath();
    
    signalData.forEach((value, index) => {
        const x = (index / (signalData.length - 1)) * ctx.canvas.width;
        const y = ctx.canvas.height - ((Math.abs(value) - 60) / 20) * ctx.canvas.height;
        
        if (index === 0) {
            ctx.moveTo(x, y);
        } else {
            ctx.lineTo(x, y);
        }
    });
    
    ctx.stroke();
}

drawSignalChart();

// Auto-refresh chart every 30 seconds
setInterval(() => {
    // Add new data point
    signalData.shift();
    signalData.push(-75 + (Math.random() * 6 - 3)); // Simulate signal variation
    drawSignalChart();
}, 30000);
</script>

@endsection