@extends('layouts.master')



@section('content')
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold py-3 mb-0">
                  <span class="text-muted fw-light">Product /</span> List Product
                </h4>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="dropdown">
                    <button
                      class="btn btn-success btn-sm dropdown-toggle"
                      type="button"
                      id="groupActionDropdown"
                      data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="ti ti-menu-2 me-1"></i> MANAJEMEN PRODUCT
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="groupActionDropdown">
                      <li>
                        <a href="{{ route('products.create') }}" class="dropdown-item">
                          <i class="ti ti-plus me-2"></i> Add Product
                        </a>
                      </li>
                      {{-- <li>
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalPengumuman">
                          <i class="fas fa-bullhorn me-3"></i> Pengumuman
                        </a>
                      </li> --}}
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

                <!-- Product Isolir -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="content-left">
                          <span class="text-muted d-block mb-1">Product ISOLIR</span>
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
                    <i class="ti ti-users-group me-2"></i>MANAJEMEN Product
                  </h5>
                  <button type="button" class="btn btn-sm btn-outline-warning">
                    <i class="ti ti-alert-triangle me-1"></i> SUSPEND OR EXPIRE CUSTOMERS
                  </button>
                </div>
                <div class="card-datatable table-responsive">
                  <table id="productTable" class="datatables-customers table border-top">
                    <thead>
                      <tr class="text-center">
                          <th>
                            <input type="checkbox" class="form-check-input" id="selectAll">
                          </th>
                          <th>#</th>
                          <th>Gambar</th>
                          <th>Nama Produk</th>
                          <th>Kategori</th>
                          <th>Brand</th>
                          <th>Harga</th>
                          <th>Stok</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">Memuat data...</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>

@endsection
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", async function () {
      const tableBody = document.querySelector("#productTable tbody");
      tableBody.innerHTML = `<tr><td colspan="9" class="text-center py-4 text-muted">Memuat data...</td></tr>`;
      const baseUrl = "{{ asset('') }}";
      
      try {
          const response = await fetch("/api/products");
          const result = await response.json();

          if (result.success) {
              const products = result.data;

              if (products.length === 0) {
                  tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-muted py-4">Belum ada produk.</td></tr>`;
                  return;
              }

              tableBody.innerHTML = "";
              products.forEach((p, index) => {
                
                  const iUrl = p.images?.path ?? 'https://via.placeholder.com/80x80?text=No+Image';
                  const imageUrl = baseUrl + iUrl;
                  
                  const statusBadge = p.status === 'published'
                      ? `<span class="badge bg-success">Published</span>`
                      : p.status === 'draft'
                          ? `<span class="badge bg-secondary">Draft</span>`
                          : `<span class="badge bg-warning text-dark">Archived</span>`;

                  const row = `
                      <tr>
                          <td>
                              <input type="checkbox" class="form-check-input selectRow" value="${p.id}">
                          </td>
                          <td class="text-center">${index + 1}</td>
                          <td class="text-center"><img src="${imageUrl}" width="70" class="img-thumbnail"></td>
                          <td><strong>${p.name}</strong><br><small class="text-muted">${p.sku}</small></td>
                          <td>${p.category ? p.category.name : '-'}</td>
                          <td>${p.brand ? p.brand.name : '-'}</td>
                          <td class="text-end">Rp${Number(p.price).toLocaleString('id-ID')}</td>
                          <td class="text-center">${p.stock}</td>
                          <td class="text-center">${statusBadge}</td>
                          <td class="text-center">
                              <button class="btn btn-sm btn-outline-info">View</button>
                              <button class="btn btn-sm btn-outline-warning">Edit</button>
                              <button class="btn btn-sm btn-outline-danger">Delete</button>
                          </td>
                      </tr>
                  `;
                  tableBody.insertAdjacentHTML("beforeend", row);
              });
          } else {
              tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-danger py-4">Gagal memuat data.</td></tr>`;
          }
      } catch (err) {
          console.error(err);
          tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-danger py-4">Terjadi kesalahan koneksi.</td></tr>`;
      }
  });
</script>
@endpush