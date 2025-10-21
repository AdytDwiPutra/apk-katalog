@extends('layouts.master')



@section('content')
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold py-3 mb-0">
                  <span class="text-muted fw-light">Service Profiles /</span> Profil Bandwidth
                </h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalBuatBandwidth">
                  <i class="ti ti-plus me-1"></i> PROFIL BANDWIDTH +
                </button>
              </div>

              <!-- Bandwidth Table -->
              <div class="card">
                <div class="card-datatable table-responsive">
                  <table id="bandwidthTable" class="datatables-bandwidth table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Nama Bandwidth</th>
                        <th>Upload ( Min | Max )</th>
                        <th>Download ( Min | Max )</th>
                        <th>Owner Data</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>1Gb</td>
                        <td>1000 Mbps | 1000 Mbps</td>
                        <td>1000 Mbps | 1000 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>P10Mbps</td>
                        <td>10 Mbps | 10 Mbps</td>
                        <td>10 Mbps | 10 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>70Mbps</td>
                        <td>5 Mbps | 70 Mbps</td>
                        <td>5 Mbps | 70 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>3Mbps</td>
                        <td>3 Mbps | 3 Mbps</td>
                        <td>3 Mbps | 3 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>DW NETHOME 15Mbps</td>
                        <td>15 Mbps | 15 Mbps</td>
                        <td>15 Mbps | 15 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>10Mbps to 20Mbps</td>
                        <td>20 Mbps | 20 Mbps</td>
                        <td>20 Mbps | 20 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>15Mbps to 20Mbps</td>
                        <td>20 Mbps | 20 Mbps</td>
                        <td>20 Mbps | 20 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>30Mbps Custom</td>
                        <td>30 Mbps | 30 Mbps</td>
                        <td>30 Mbps | 30 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>hotspot</td>
                        <td>5 Mbps | 5 Mbps</td>
                        <td>5 Mbps | 5 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>100Mbps</td>
                        <td>5 Mbps | 100 Mbps</td>
                        <td>5 Mbps | 100 Mbps</td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-warning" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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

            <div class="content-backdrop fade"></div>
          </div>
@endsection