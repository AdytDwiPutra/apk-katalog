@extends('layouts.master')

@section('title', 'Tambah OLT')

@push('styles')
<!-- Page CSS -->
    <style>
      .dark-card {
        background-color: #283046;
        color: #fff;
      }
      .deadline-soon {
        background-color: #ffe0db;
      }
      .deadline-today {
        background-color: #ffd1b9;
      }
      .deadline-passed {
        background-color: #ffc2c7;
      }
      .status-badge {
        min-width: 80px;
      }
      .bg-gray-100 {
        background-color: #f5f5f9;
      }
      .total-pembayaran {
        background-color: rgba(115, 103, 240, 0.1);
        border-left: 4px solid #7367f0;
        border-radius: 0.375rem;
        padding: 1rem;
      }
      .action-buttons .btn {
        width: 36px;
        height: 36px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }
    </style>
@endpush
@section('content')

  <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold"><span class="text-muted fw-light">Pengajuan /</span> Penjadwalan Pembayaran</h4>
                <div>
                  <a href="add-pengajuan.html" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Tambah Pengajuan
                  </a>
                </div>
              </div>

              <!-- Header Card -->
              <div class="card mb-4 bg-primary text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h4 class="card-title text-white mb-0">Penjadwalan Pembayaran</h4>
                      <p class="mb-0 mt-1">Daftar semua pengajuan dan pembayaran terjadwal</p>
                    </div>
                    <div class="text-end">
                      <h5 class="text-white mb-1">Update terakhir: 22 Sep 2025, 14:30 WIB</h5>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Header Card -->

              <!-- Pengajuan Table -->
              <div class="card mb-4">
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">NO</th>
                          <th>KETERANGAN</th>
                          <th class="text-end">NOMINAL</th>
                          <th class="text-center">DEADLINE</th>
                          <th>PEMBUAT</th>
                          <th class="text-center">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">1</td>
                          <td>Pembayaran oprasional</td>
                          <td class="text-end">Rp 50.000.000</td>
                          <td class="text-center">
                            <span class="badge bg-danger">22 Sep 2025</span>
                          </td>
                          <td>jehan</td>
                          <td class="text-center">
                            <div class="action-buttons d-flex justify-content-center gap-1">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                <i class="ti ti-eye"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                <i class="ti ti-check"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ti ti-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">2</td>
                          <td>gaji</td>
                          <td class="text-end">Rp 50.000.000</td>
                          <td class="text-center">
                            <span class="badge bg-danger">22 Sep 2025</span>
                          </td>
                          <td>jehan</td>
                          <td class="text-center">
                            <div class="action-buttons d-flex justify-content-center gap-1">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                <i class="ti ti-eye"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                <i class="ti ti-check"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ti ti-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td>pembelan pralatan</td>
                          <td class="text-end">Rp 70.000.000</td>
                          <td class="text-center">
                            <span class="badge bg-warning">24 Sep 2025</span>
                          </td>
                          <td>lufi</td>
                          <td class="text-center">
                            <div class="action-buttons d-flex justify-content-center gap-1">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                <i class="ti ti-eye"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                <i class="ti ti-check"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ti ti-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">4</td>
                          <td>outing</td>
                          <td class="text-end">Rp 3.000.000</td>
                          <td class="text-center">
                            <span class="badge bg-warning">25 Sep 2025</span>
                          </td>
                          <td>jehan</td>
                          <td class="text-center">
                            <div class="action-buttons d-flex justify-content-center gap-1">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                <i class="ti ti-eye"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                <i class="ti ti-check"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ti ti-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">5</td>
                          <td>dinas luar kota CEO</td>
                          <td class="text-end">Rp 10.000.000</td>
                          <td class="text-center">
                            <span class="badge bg-info">26 Sep 2025</span>
                          </td>
                          <td>jehan</td>
                          <td class="text-center">
                            <div class="action-buttons d-flex justify-content-center gap-1">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                <i class="ti ti-eye"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                <i class="ti ti-check"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ti ti-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">6</td>
                          <td>reward</td>
                          <td class="text-end">Rp 10.000.000</td>
                          <td class="text-center">
                            <span class="badge bg-info">27 Sep 2025</span>
                          </td>
                          <td>jehan</td>
                          <td class="text-center">
                            <div class="action-buttons d-flex justify-content-center gap-1">
                              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                <i class="ti ti-eye"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                <i class="ti ti-check"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ti ti-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  
                  <!-- Total Section -->
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="total-pembayaran">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="mb-0 fw-bold">TOTAL PEMBAYARAN TERJADWAL</h5>
                          <h5 class="mb-0 fw-bold text-primary">Rp 193.000.000</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Pengajuan Table -->

              <!-- Filter Options -->
              <div class="card mb-4">
                <div class="card-header">
                  <h5 class="card-title mb-0">Filter & Export</h5>
                </div>
                <div class="card-body">
                  <form class="row g-3">
                    <div class="col-md-3">
                      <label class="form-label" for="filterDate">Tanggal</label>
                      <input type="text" class="form-control flatpickr-date" id="filterDate" placeholder="YYYY-MM-DD" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="filterPembuat">Pembuat</label>
                      <select id="filterPembuat" class="form-select">
                        <option value="">Semua</option>
                        <option value="jehan">jehan</option>
                        <option value="lufi">lufi</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="filterStatus">Status</label>
                      <select id="filterStatus" class="form-select">
                        <option value="">Semua</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="filterExport">Format Export</label>
                      <div class="input-group">
                        <select id="filterExport" class="form-select">
                          <option value="pdf">PDF</option>
                          <option value="excel">Excel</option>
                          <option value="csv">CSV</option>
                        </select>
                        <button class="btn btn-outline-primary" type="button">
                          <i class="ti ti-download me-1"></i> Export
                        </button>
                      </div>
                    </div>
                    <div class="col-12 mt-4">
                      <button type="submit" class="btn btn-primary me-2">
                        <i class="ti ti-filter me-1"></i> Terapkan Filter
                      </button>
                      <button type="reset" class="btn btn-label-secondary">
                        <i class="ti ti-refresh me-1"></i> Reset
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!--/ Filter Options -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="#" target="_blank" class="fw-medium">ISP Manager</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="#" class="footer-link me-4">License</a>
                    <a href="#" target="_blank" class="footer-link me-4">Documentation</a>
                    <a href="#" target="_blank" class="footer-link me-4">Support</a>
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
@endsection