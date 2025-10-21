@extends('layouts.master')

@section('title', 'Analytics & Reports')

@push('styles')
<link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/apex-charts/apex-charts.css" />
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Ticket Analytics & Reports</h4>
      <p class="text-muted mb-0">Performance metrics dan analisis tiket support</p>
    </div>
    <div class="d-flex gap-2">
      <select class="form-select" id="period-filter">
        <option>Last 7 Days</option>
        <option>Last 30 Days</option>
        <option>Last 3 Months</option>
        <option>This Year</option>
      </select>
      <button class="btn btn-primary">
        <i class="ti ti-download me-1"></i> Export Report
      </button>
    </div>
  </div>

  <!-- Key Metrics -->
  <div class="row mb-4">
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="mb-1">Total Tickets</p>
              <h3 class="mb-0">1,547</h3>
              <small class="text-success"><i class="ti ti-arrow-up"></i> +12% from last month</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-ticket ti-lg"></i>
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
            <div>
              <p class="mb-1">Avg Response Time</p>
              <h3 class="mb-0">12m</h3>
              <small class="text-success"><i class="ti ti-arrow-down"></i> -3m faster</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-clock ti-lg"></i>
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
            <div>
              <p class="mb-1">Avg Resolution Time</p>
              <h3 class="mb-0">4.2h</h3>
              <small class="text-danger"><i class="ti ti-arrow-up"></i> +0.5h slower</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-hourglass ti-lg"></i>
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
            <div>
              <p class="mb-1">Customer Satisfaction</p>
              <h3 class="mb-0">4.5/5</h3>
              <small class="text-success"><i class="ti ti-star"></i> 90% positive</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-mood-smile ti-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Row 1 -->
  <div class="row mb-4">
    <div class="col-lg-8 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="mb-0">Ticket Trends</h5>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-primary active">Created</button>
            <button class="btn btn-sm btn-outline-success">Resolved</button>
          </div>
        </div>
        <div class="card-body">
          <div id="ticketTrendsChart"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Ticket by Status</h5>
        </div>
        <div class="card-body">
          <div id="ticketStatusChart"></div>
          <div class="mt-3">
            <div class="d-flex justify-content-between mb-2">
              <span><span class="badge bg-warning me-2"></span> Open</span>
              <span class="fw-medium">234 (15%)</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><span class="badge bg-info me-2"></span> In Progress</span>
              <span class="fw-medium">187 (12%)</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><span class="badge bg-secondary me-2"></span> Pending</span>
              <span class="fw-medium">89 (6%)</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span><span class="badge bg-success me-2"></span> Resolved</span>
              <span class="fw-medium">1,037 (67%)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Row 2 -->
  <div class="row mb-4">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Ticket by Category</h5>
        </div>
        <div class="card-body">
          <div id="categoryChart"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Ticket by Priority</h5>
        </div>
        <div class="card-body">
          <div id="priorityChart"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Team Performance -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Team Performance Comparison</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Team</th>
                  <th>Active Tickets</th>
                  <th>Resolved (This Month)</th>
                  <th>Avg Response Time</th>
                  <th>Avg Resolution Time</th>
                  <th>CSAT</th>
                  <th>SLA Compliance</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="avatar-initial rounded bg-label-primary me-2">L1</span>
                      <span>Support L1</span>
                    </div>
                  </td>
                  <td>89</td>
                  <td>542</td>
                  <td>8 min</td>
                  <td>2.3 hours</td>
                  <td>4.3/5</td>
                  <td>
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">85%</small>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="avatar-initial rounded bg-label-warning me-2">L2</span>
                      <span>Support L2</span>
                    </div>
                  </td>
                  <td>45</td>
                  <td>298</td>
                  <td>15 min</td>
                  <td>4.1 hours</td>
                  <td>4.5/5</td>
                  <td>
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">78%</small>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="avatar-initial rounded bg-label-dark me-2">NOC</span>
                      <span>NOC Team</span>
                    </div>
                  </td>
                  <td>32</td>
                  <td>187</td>
                  <td>5 min</td>
                  <td>1.8 hours</td>
                  <td>4.7/5</td>
                  <td>
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">92%</small>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="avatar-initial rounded bg-label-info me-2">FT</span>
                      <span>Field Technician</span>
                    </div>
                  </td>
                  <td>21</td>
                  <td>156</td>
                  <td>20 min</td>
                  <td>6.5 hours</td>
                  <td>4.6/5</td>
                  <td>
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">88%</small>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="avatar-initial rounded bg-label-success me-2">$</span>
                      <span>Billing Team</span>
                    </div>
                  </td>
                  <td>15</td>
                  <td>364</td>
                  <td>6 min</td>
                  <td>1.2 hours</td>
                  <td>4.8/5</td>
                  <td>
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">95%</small>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Top Issues & Resolution Methods -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Top 5 Issues</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Internet Mati Total</span>
                <span class="fw-medium">423</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 38%"></div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Internet Lambat</span>
                <span class="fw-medium">312</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 28%"></div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>ONT/Router Bermasalah</span>
                <span class="fw-medium">187</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 17%"></div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Kabel Fiber Rusak</span>
                <span class="fw-medium">124</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-secondary" role="progressbar" style="width: 11%"></div>
              </div>
            </li>
            <li>
              <div class="d-flex justify-content-between mb-1">
                <span>Masalah Billing</span>
                <span class="fw-medium">89</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 8%"></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Resolution Methods</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Remote Troubleshooting</span>
                <span class="fw-medium">45%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 45%"></div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Field Visit</span>
                <span class="fw-medium">28%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 28%"></div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Configuration Update</span>
                <span class="fw-medium">15%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"></div>
              </div>
            </li>
            <li class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span>Hardware Replacement</span>
                <span class="fw-medium">8%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 8%"></div>
              </div>
            </li>
            <li>
              <div class="d-flex justify-content-between mb-1">
                <span>Network Upgrade</span>
                <span class="fw-medium">4%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-dark" role="progressbar" style="width: 4%"></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script src="{{asset('vuexy')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script>
$(document).ready(function() {
  // Ticket Trends Chart
  var ticketTrendsOptions = {
    series: [{
      name: 'Created',
      data: [45, 52, 38, 45, 48, 55, 60, 58, 65, 72, 68, 75, 82, 88, 95, 102, 98, 105, 112, 108, 115, 122, 118, 125, 132, 128, 135, 142, 138, 145]
    }, {
      name: 'Resolved',
      data: [35, 41, 36, 42, 40, 48, 52, 50, 58, 62, 60, 68, 72, 78, 82, 88, 85, 92, 95, 98, 102, 108, 105, 112, 115, 118, 122, 128, 125, 135]
    }],
    chart: {
      type: 'area',
      height: 300,
      toolbar: { show: false }
    },
    colors: ['#7367f0', '#28c76f'],
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth', width: 2 },
    fill: {
      type: 'gradient',
      gradient: {
        opacityFrom: 0.6,
        opacityTo: 0.1
      }
    },
    xaxis: {
      categories: Array.from({length: 30}, (_, i) => i + 1)
    }
  };
  var ticketTrendsChart = new ApexCharts(document.querySelector("#ticketTrendsChart"), ticketTrendsOptions);
  ticketTrendsChart.render();

  // Ticket Status Chart
  var statusOptions = {
    series: [234, 187, 89, 1037],
    chart: {
      type: 'donut',
      height: 200
    },
    labels: ['Open', 'In Progress', 'Pending', 'Resolved'],
    colors: ['#ff9f43', '#00cfe8', '#82868b', '#28c76f'],
    legend: { show: false },
    plotOptions: {
      pie: {
        donut: {
          size: '70%',
          labels: {
            show: true,
            name: { show: true },
            value: { show: true },
            total: {
              show: true,
              label: 'Total',
              formatter: () => '1,547'
            }
          }
        }
      }
    }
  };
  var statusChart = new ApexCharts(document.querySelector("#ticketStatusChart"), statusOptions);
  statusChart.render();

  // Category Chart
  var categoryOptions = {
    series: [{
      data: [423, 312, 187, 124, 89, 68]
    }],
    chart: {
      type: 'bar',
      height: 280,
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        distributed: true
      }
    },
    colors: ['#ea5455', '#ff9f43', '#00cfe8', '#82868b', '#7367f0', '#28c76f'],
    dataLabels: { enabled: false },
    xaxis: {
      categories: ['Internet Mati', 'Internet Lambat', 'Perangkat', 'Kabel Fiber', 'Billing', 'Lainnya']
    },
    legend: { show: false }
  };
  var categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryOptions);
  categoryChart.render();

  // Priority Chart
  var priorityOptions = {
    series: [89, 234, 478, 746],
    chart: {
      type: 'pie',
      height: 280
    },
    labels: ['Critical', 'High', 'Medium', 'Low'],
    colors: ['#000', '#ea5455', '#ff9f43', '#28c76f'],
    legend: {
      position: 'bottom'
    }
  };
  var priorityChart = new ApexCharts(document.querySelector("#priorityChart"), priorityOptions);
  priorityChart.render();
});
</script>
@endpush