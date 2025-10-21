@extends('layouts.master')

@section('title', 'RAB')

@section('content')
 <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h4 class="fw-bold py-3 mb-1">
                    <span class="text-muted fw-light">Financial /</span> RAB Dashboard
                  </h4>
                  <p class="text-muted mb-0">Rencana Anggaran Biaya & Monitoring Saldo</p>
                </div>
                <div>
                  <button type="button" class="btn btn-primary">
                    <i class="ti ti-refresh me-1"></i> Refresh Data
                  </button>
                </div>
              </div>

              <!-- Saldo Cards -->
              <div class="row g-4">
                <!-- Total Saldo -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">Total Saldo</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">Rp 487.500.000</h3>
                            <span class="text-success">(+12.5%)</span>
                          </div>
                          <small class="mb-0">Gabungan semua sumber dana</small>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-wallet ti-md"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Bank BRI -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">Bank BRI</span>
                          <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2">Rp 185.000.000</h4>
                          </div>
                          <small class="mb-0 text-success">
                            <i class="ti ti-circle-check me-1"></i>Aktif
                          </small>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-info">
                            <i class="ti ti-building-bank ti-md"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Bank BCA -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">Bank BCA</span>
                          <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2">Rp 142.500.000</h4>
                          </div>
                          <small class="mb-0 text-success">
                            <i class="ti ti-circle-check me-1"></i>Aktif
                          </small>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-building-bank ti-md"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Payment Gateway -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">Payment Gateway</span>
                          <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2">Rp 95.000.000</h4>
                          </div>
                          <small class="mb-0 text-success">
                            <i class="ti ti-circle-check me-1"></i>Online
                          </small>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-success">
                            <i class="ti ti-credit-card ti-md"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Cash -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">Cash (Tunai)</span>
                          <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2">Rp 65.000.000</h4>
                          </div>
                          <small class="mb-0 text-warning">
                            <i class="ti ti-alert-circle me-1"></i>Manual
                          </small>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-cash ti-md"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Penjadwalan Pembayaran -->
              <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">
                        <i class="ti ti-calendar-event me-2"></i>Penjadwalan Pembayaran
                      </h5>
                      <small class="text-muted">Update terakhir: 22 Sep 2025, 14:30 WIB</small>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Keterangan</th>
                              <th class="text-end">Nominal</th>
                              <th class="text-center">Deadline</th>
                              <th>Pembuat</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                <div>
                                  <h6 class="mb-0">Pembayaran oprasional</h6>
                                </div>
                              </td>
                              <td class="text-end">
                                <strong>Rp 50.000.000</strong>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-label-danger">22-Sep 2025</span>
                              </td>
                              <td>jehan</td>
                              <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-primary me-1" title="Detail">
                                  <i class="ti ti-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-success me-1" title="Proses">
                                  <i class="ti ti-check"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-warning me-1" title="Edit">
                                  <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-danger" title="Delete">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>
                                <div>
                                  <h6 class="mb-0">gaji</h6>
                                </div>
                              </td>
                              <td class="text-end">
                                <strong>Rp 50.000.000</strong>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-label-danger">22-Sep 2025</span>
                              </td>
                              <td>jehan</td>
                              <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-primary me-1" title="Detail">
                                  <i class="ti ti-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-success me-1" title="Proses">
                                  <i class="ti ti-check"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-warning me-1" title="Edit">
                                  <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-danger" title="Delete">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>
                                <div>
                                  <h6 class="mb-0">pembelan pralatan</h6>
                                </div>
                              </td>
                              <td class="text-end">
                                <strong>Rp 70.000.000</strong>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-label-warning">24-Sep 2025</span>
                              </td>
                              <td>lufi</td>
                              <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-primary me-1" title="Detail">
                                  <i class="ti ti-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-success me-1" title="Proses">
                                  <i class="ti ti-check"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-warning me-1" title="Edit">
                                  <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-danger" title="Delete">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>
                                <div>
                                  <h6 class="mb-0">outing</h6>
                                </div>
                              </td>
                              <td class="text-end">
                                <strong>Rp 3.000.000</strong>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-label-warning">25-Sep 2025</span>
                              </td>
                              <td>jehan</td>
                              <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-primary me-1" title="Detail">
                                  <i class="ti ti-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-success me-1" title="Proses">
                                  <i class="ti ti-check"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-warning me-1" title="Edit">
                                  <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-danger" title="Delete">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>
                                <div>
                                  <h6 class="mb-0">dinas luar kota CEO</h6>
                                </div>
                              </td>
                              <td class="text-end">
                                <strong>Rp 10.000.000</strong>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-label-info">26-Sep 2025</span>
                              </td>
                              <td>jehan</td>
                              <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-primary me-1" title="Detail">
                                  <i class="ti ti-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-success me-1" title="Proses">
                                  <i class="ti ti-check"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-warning me-1" title="Edit">
                                  <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-danger" title="Delete">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>
                                <div>
                                  <h6 class="mb-0">reward</h6>
                                </div>
                              </td>
                              <td class="text-end">
                                <strong>Rp 10.000.000</strong>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-label-info">27-Sep 2025</span>
                              </td>
                              <td>jehan</td>
                              <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-primary me-1" title="Detail">
                                  <i class="ti ti-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-success me-1" title="Proses">
                                  <i class="ti ti-check"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-warning me-1" title="Edit">
                                  <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-danger" title="Delete">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr class="border-top">
                              <td colspan="2"><strong>TOTAL PEMBAYARAN TERJADWAL</strong></td>
                              <td class="text-end">
                                <h5 class="mb-0 text-danger">Rp 193.000.000</h5>
                              </td>
                              <td colspan="3"></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    © <script>document.write(new Date().getFullYear())</script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="footer-link text-primary fw-medium">Pixinvent</a>
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->

@endsection