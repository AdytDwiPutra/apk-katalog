@extends('layouts.master')



@section('content')
  <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold"><span class="text-muted fw-light">Profil Paket /</span> Group Profile</h4>
              </div>

              <!-- Group Profile Card -->
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Manajemen Grup Profil</h5>
                    <div class="dropdown">
                      <button
                        class="btn btn-success btn-sm dropdown-toggle"
                        type="button"
                        id="groupActionDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-menu-2 me-1"></i> MANAJEMEN GRUP
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="groupActionDropdown">
                        <li>
                          <a class="dropdown-item" href="group-profile-add.html">
                            <i class="ti ti-plus me-2"></i>Tambah Group Profil
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="javascript:void(0);" onclick="exportGroupProfile()">
                            <i class="ti ti-download me-2"></i>Ekspor Group Profil
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider" />
                        </li>
                        <li>
                          <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteSelected()">
                            <i class="ti ti-trash me-2"></i>Hapus Yang Dipilih
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="alert alert-info mt-3 mb-0" role="alert">
                    <div class="d-flex align-items-start">
                      <i class="ti ti-info-circle ti-sm me-2"></i>
                      <div>
                        <strong>ADD NEW PROFILE GROUP</strong><br />
                        <small>
                          Paket grup profil yang sama pada router lain yang berbeda.<br />
                          ULANG ke router/nas yang terkait
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="groupProfileTable" class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            <input type="checkbox" id="selectAll" class="form-check-input" />
                          </th>
                          <th>Nama Grup</th>
                          <th>Tipe</th>
                          <th>Parent Pool</th>
                          <th>Modul</th>
                          <th>IP Lokal</th>
                          <th>IP Pertama</th>
                          <th>IP Terakhir</th>
                          <th>Router [NAS]</th>
                          <th>Owner Data</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><strong>Demo</strong></td>
                          <td><span class="badge bg-label-primary">PPP</span></td>
                          <td>NONE</td>
                          <td>mikrotik-ippool</td>
                          <td>10.131.150.1</td>
                          <td>10.131.150.2</td>
                          <td>10.131.150.254</td>
                          <td>NAS-RB4011</td>
                          <td>mixradius</td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><strong>PRIORITAS JDN 2</strong></td>
                          <td><span class="badge bg-label-primary">PPP</span></td>
                          <td>NONE</td>
                          <td>mikrotik-ippool</td>
                          <td>10.200.54.1</td>
                          <td>10.200.54.2</td>
                          <td>10.200.54.254</td>
                          <td>NAS-RB4011</td>
                          <td>mixradius</td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><strong>PRIORITAS JDN</strong></td>
                          <td><span class="badge bg-label-primary">PPP</span></td>
                          <td>NONE</td>
                          <td>mikrotik-ippool</td>
                          <td>10.200.53.1</td>
                          <td>10.200.53.2</td>
                          <td>10.200.53.254</td>
                          <td>NAS POP-Binva</td>
                          <td>mixradius</td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><strong>JDn2</strong></td>
                          <td><span class="badge bg-label-primary">PPP</span></td>
                          <td>NONE</td>
                          <td>mikrotik-ippool</td>
                          <td>10.140.0.1</td>
                          <td>10.140.0.2</td>
                          <td>10.140.0.254</td>
                          <td>NAS-RB4011</td>
                          <td>admin@jeger</td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><strong>Durifauli</strong></td>
                          <td><span class="badge bg-label-primary">PPP</span></td>
                          <td>NONE</td>
                          <td>mikrotik-ippool</td>
                          <td>10.170.0.1</td>
                          <td>10.170.0.2</td>
                          <td>10.170.0.254</td>
                          <td>NAS POP-Binva</td>
                          <td>durifauli</td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><strong>JDN</strong></td>
                          <td><span class="badge bg-label-primary">PPP</span></td>
                          <td>NONE</td>
                          <td>mikrotik-ippool</td>
                          <td>10.160.0.1</td>
                          <td>10.160.0.2</td>
                          <td>10.160.0.254</td>
                          <td>NAS POP-Binva</td>
                          <td>mixradius</td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-danger" title="Delete">
                                <i class="ti ti-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Group Profile Card -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    Copyright © 2025
                    <a href="https://mixradius.com" target="_blank" class="fw-medium">MIXRADIUS MANAGER</a> V3.1
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
@endsection