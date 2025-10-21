@extends('layouts.master')



@section('content')
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold py-3 mb-0">
                  <span class="text-muted fw-light">List Pelanggan /</span> User PPP
                </h4>
                <a href="add-customer-ppp.html" class="btn btn-primary">
                  <i class="ti ti-plus me-1"></i> Tambah Pelanggan
                </a>
              </div>

              <!-- Stats Cards -->
              <div class="row mb-4">
                <!-- Registrasi Bulan Ini -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">REGISTRASI BULAN INI</span>
                          <div class="d-flex align-items-center">
                            <h3 class="mb-0 me-2">8</h3>
                          </div>
                        </div>
                        <div class="avatar flex-shrink-0">
                          <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Renewal Bulan Ini -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">RENEWAL BULAN INI</span>
                          <div class="d-flex align-items-center">
                            <h3 class="mb-0 me-2">731</h3>
                          </div>
                        </div>
                        <div class="avatar flex-shrink-0">
                          <span class="avatar-initial rounded bg-label-success">
                            <i class="ti ti-refresh ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pelanggan Isolir -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">PELANGGAN ISOLIR</span>
                          <div class="d-flex align-items-center">
                            <h3 class="mb-0 me-2">124</h3>
                          </div>
                        </div>
                        <div class="avatar flex-shrink-0">
                          <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-alert-triangle ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Akun Disable -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">AKUN DISABLE</span>
                          <div class="d-flex align-items-center">
                            <h3 class="mb-0 me-2">124</h3>
                          </div>
                        </div>
                        <div class="avatar flex-shrink-0">
                          <span class="avatar-initial rounded bg-label-danger">
                            <i class="ti ti-ban ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Customer List Card -->
              <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">
                    <i class="ti ti-users-group me-2"></i>MANAJEMEN PELANGGAN
                  </h5>
                  <button type="button" class="btn btn-sm btn-outline-warning">
                    <i class="ti ti-alert-triangle me-1"></i> SUSPEND OR EXPIRE CUSTOMERS
                  </button>
                </div>
                <div class="card-datatable table-responsive">
                  <table id="customerTable" class="datatables-customers table border-top">
                    <thead>
                      <tr>
                        <th>
                          <input type="checkbox" class="form-check-input" id="selectAll">
                        </th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Tipe Service</th>
                        <th>Paket Langganan</th>
                        <th>IP Address</th>
                        <th>Diperpanjang</th>
                        <th>Jatuh Tempo</th>
                        <th>Owner Data</th>
                        <th>Renew | Print</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>259222477350
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>AFIFAH HIYARIN NISWAH
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>NET HOME 30Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-22 15:35:41</td>
                        <td><span class="text-info fw-bold">2025-11-05 23:59:59</span></td>
                        <td>jeje</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>256266516430
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>DANI SAEFUL ROHMAN
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>NET HOME 10Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-15 19:50:46</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>259197955731
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>ELIS SUNARTI
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>DW HOME 10Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-19 09:36:51</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>jeje</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>2312511234
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>nazad nuria akromallah
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>DW HOME 10Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-16 15:38:05</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>259185274939
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>PUJIYANTI
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>NET HOME 10Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-15 12:01:44</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>jeje</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-tooltip title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>252200578222
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>USEP SUHENDAR.
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>DW HOME 20Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-15 10:06:01</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>2362470461
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>ASEP PURNAMA
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>DW HOME 30Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-15 06:52:59</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>22102799726
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>DIAN RAHADIAN
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>DW HOME 20Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-13 19:46:09</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>2461239606
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>DERIN ANDRIANA
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>NET HOME 10Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-12 14:39:23</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
                            <i class="ti ti-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>
                          <a href="#" class="text-primary">
                            <i class="ti ti-link me-1"></i>2452852143
                          </a>
                        </td>
                        <td>
                          <i class="ti ti-user me-1"></i>PANI SOPIANI
                        </td>
                        <td>
                          <span class="badge bg-label-success me-1">PRE</span>
                          PPPOE
                        </td>
                        <td>DW HOME 10Mbps</td>
                        <td><span class="badge bg-label-secondary">Automatic</span></td>
                        <td>2025-09-12 07:07:02</td>
                        <td><span class="text-info fw-bold">2025-10-05 23:59:59</span></td>
                        <td>mixradius</td>
                        <td>
                          <button class="btn btn-sm btn-icon btn-primary me-1" data-bs-toggle="tooltip" title="Renew">
                            <i class="ti ti-refresh"></i>
                          </button>
                          <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Print">
                            <i class="ti ti-printer"></i>
                          </button>
                        </td>
                        <td>
                            <a href="{{route('customer.detail')}}"> <button class="btn btn-sm btn-icon btn-warning me-1" data-bs-toggle="tooltip" title="Edit">
                            <i class="ti ti-edit"></i>
                          </button></a>
                          <button class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete">
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
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>

@endsection