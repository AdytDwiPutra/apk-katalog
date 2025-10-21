@extends('layouts.master')



@section('content')
  

<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold"><span class="text-muted fw-light">Profil Paket /</span> Profil PPP</h4>
              </div>

              <!-- Profil Paket Card -->
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Manajemen Paket</h5>
                    <div class="dropdown">
                      <button
                        class="btn btn-success btn-sm dropdown-toggle"
                        type="button"
                        id="paketActionDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-menu-2 me-1"></i> MANAJEMEN PAKET
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="paketActionDropdown">
                        <li>
                          <a class="dropdown-item" href="profil-paket-add.html">
                            <i class="ti ti-plus me-2"></i>Tambah Profil Paket
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
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="profilPaketTable" class="table table-hover">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="selectAll" class="form-check-input" /></th>
                          <th>Nama Profil</th>
                          <th>Grup Profil</th>
                          <th>Bandwidth</th>
                          <th>Harga Modal</th>
                          <th>Harga Jual</th>
                          <th>Masa Aktif</th>
                          <th>Shared Users</th>
                          <th>Owner Data</th>
                          <th>VCR | Customer</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>NET HOME 40Mbps-P</strong></td>
                          <td>PRIORITAS JDN 2</td>
                          <td><span class="badge bg-label-info">40Mbps</span></td>
                          <td>Rp. 359.459,46</td>
                          <td>Rp. 359.459,46</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 0
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>NET HOME 30Mbps-P</strong></td>
                          <td>PRIORITAS JDN 2</td>
                          <td><span class="badge bg-label-info">30Mbps</span></td>
                          <td>Rp. 269.369,37</td>
                          <td>Rp. 269.369,37</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 0
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>NET HOME 20Mbps-P</strong></td>
                          <td>PRIORITAS JDN 2</td>
                          <td><span class="badge bg-label-info">20Mbps</span></td>
                          <td>Rp. 200.000,00</td>
                          <td>Rp. 200.000,00</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 3
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>NET HOME 10Mbps-P</strong></td>
                          <td>PRIORITAS JDN 2</td>
                          <td><span class="badge bg-label-info">10Mbps</span></td>
                          <td>Rp. 150.000,00</td>
                          <td>Rp. 150.000,00</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 8
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>DW HOME 50Mbps-P</strong></td>
                          <td>PRIORITAS JDN</td>
                          <td><span class="badge bg-label-info">50Mbps</span></td>
                          <td>Rp. 449.549,55</td>
                          <td>Rp. 449.549,55</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 1
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>DW HOME 40Mbps-P</strong></td>
                          <td>PRIORITAS JDN</td>
                          <td><span class="badge bg-label-info">40Mbps</span></td>
                          <td>Rp. 359.459,46</td>
                          <td>Rp. 359.459,46</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 0
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>DW HOME 30Mbps-P</strong></td>
                          <td>PRIORITAS JDN</td>
                          <td><span class="badge bg-label-info">30Mbps</span></td>
                          <td>Rp. 269.369,37</td>
                          <td>Rp. 269.369,37</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 2
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>DW HOME 20Mbps-P</strong></td>
                          <td>PRIORITAS JDN</td>
                          <td><span class="badge bg-label-info">20Mbps</span></td>
                          <td>Rp. 200.000,00</td>
                          <td>Rp. 200.000,00</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 3
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>DW HOME 10Mbps-P</strong></td>
                          <td>PRIORITAS JDN</td>
                          <td><span class="badge bg-label-info">10Mbps</span></td>
                          <td>Rp. 150.000,00</td>
                          <td>Rp. 150.000,00</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 4
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="form-check-input row-checkbox" /></td>
                          <td><i class="ti ti-wifi me-1"></i> <strong>DW HOME 1Gb</strong></td>
                          <td>Durifauli</td>
                          <td><span class="badge bg-label-success">1Gb</span></td>
                          <td>Rp. 8.500.000,00</td>
                          <td>Rp. 8.500.000,00</td>
                          <td><span class="badge bg-label-primary">1 Bulan</span></td>
                          <td>Single Device</td>
                          <td>mixradius</td>
                          <td>
                            <i class="ti ti-layers-subtract me-1"></i> 0 |
                            <i class="ti ti-user me-1"></i> 0
                          </td>
                          <td>
                            <div class="d-flex gap-1">
                              <button type="button" class="btn btn-sm btn-icon btn-primary" title="Edit">
                                <i class="ti ti-edit"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-icon btn-warning" title="Info">
                                <i class="ti ti-info-circle"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Profil Paket Card -->
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