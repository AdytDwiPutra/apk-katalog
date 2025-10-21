@extends('layouts.master')

@section('title', 'List OLT')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<style>
  .status-badge {
    font-size: 11px;
    padding: 4px 10px;
    font-weight: 500;
  }
  .action-buttons .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
  }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">List OLT</h4>
      <p class="text-muted mb-0">Manajemen perangkat OLT (Optical Line Terminal)</p>
    </div>
    <div>
      <a href="{{ route('olt.add') }}" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i> Tambah OLT
      </a>
    </div>
  </div>

  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-server ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Total OLT</small>
              <h5 class="mb-0" id="stat-total">0</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-circle-check ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Online</small>
              <h5 class="mb-0 text-success" id="stat-online">0</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-danger">
                <i class="ti ti-circle-x ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Offline</small>
              <h5 class="mb-0 text-danger" id="stat-offline">0</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-users ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Total ONT</small>
              <h5 class="mb-0 text-info" id="stat-ont">0</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Table Card -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar OLT</h5>
      <div class="d-flex gap-2">
        <button class="btn btn-sm btn-outline-primary" id="btn-refresh">
          <i class="ti ti-refresh"></i> Refresh
        </button>
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#filterModal">
          <i class="ti ti-filter"></i> Filter
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover" id="tableOlt">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>IP Address</th>
              <th>Manufacturer</th>
              <th>Hardware</th>
              <th>PON Type</th>
              <th>Total ONT</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data will be loaded via DataTables -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filter OLT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Manufacturer</label>
          <select class="form-select" id="filter-manufacturer">
            <option value="">Semua Manufacturer</option>
            <option value="ZTE">ZTE</option>
            <option value="Huawei">Huawei</option>
            <option value="Fiberhome">Fiberhome</option>
            <option value="Nokia">Nokia</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select" id="filter-status">
            <option value="">Semua Status</option>
            <option value="online">Online</option>
            <option value="offline">Offline</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">PON Type</label>
          <select class="form-select" id="filter-pon">
            <option value="">Semua PON Type</option>
            <option value="GPON">GPON</option>
            <option value="EPON">EPON</option>
            <option value="GPON+EPON">GPON+EPON</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-outline-warning" id="btn-reset-filter">Reset</button>
        <button type="button" class="btn btn-primary" id="btn-apply-filter">Terapkan</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus OLT <strong id="delete-olt-name"></strong>?</p>
        <p class="text-danger mb-0"><small>Data yang sudah dihapus tidak dapat dikembalikan.</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btn-confirm-delete">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
  // Sample data (replace with actual API call)
  const oltData = [
    {
      id: 1,
      name: 'OLT-CICALENGKA-01',
      ip: '192.168.10.1',
      manufacturer: 'ZTE',
      hardware: 'ZTE-C320',
      pon_type: 'GPON',
      total_ont: 245,
      status: 'online',
      uptime: '45d 12h 30m'
    },
    {
      id: 2,
      name: 'OLT-RANCAEKEK-01',
      ip: '192.168.10.2',
      manufacturer: 'ZTE',
      hardware: 'ZTE-C300',
      pon_type: 'GPON',
      total_ont: 189,
      status: 'online',
      uptime: '30d 8h 15m'
    },
    {
      id: 3,
      name: 'OLT-MAJALAYA-01',
      ip: '192.168.10.3',
      manufacturer: 'Huawei',
      hardware: 'MA5680T',
      pon_type: 'GPON+EPON',
      total_ont: 312,
      status: 'offline',
      uptime: '-'
    },
    {
      id: 4,
      name: 'OLT-BALEENDAH-01',
      ip: '192.168.10.4',
      manufacturer: 'ZTE',
      hardware: 'ZTE-C220',
      pon_type: 'GPON',
      total_ont: 156,
      status: 'online',
      uptime: '15d 4h 20m'
    },
    {
      id: 5,
      name: 'OLT-SOREANG-01',
      ip: '192.168.10.5',
      manufacturer: 'Fiberhome',
      hardware: 'AN5516-06',
      pon_type: 'EPON',
      total_ont: 98,
      status: 'online',
      uptime: '22d 16h 45m'
    }
  ];

  // Update stats
  function updateStats(data) {
    const total = data.length;
    const online = data.filter(d => d.status === 'online').length;
    const offline = data.filter(d => d.status === 'offline').length;
    const totalOnt = data.reduce((sum, d) => sum + d.total_ont, 0);

    $('#stat-total').text(total);
    $('#stat-online').text(online);
    $('#stat-offline').text(offline);
    $('#stat-ont').text(totalOnt);
  }

  // Initialize DataTable
  let table = $('#tableOlt').DataTable({
    data: oltData,
    responsive: true,
    columns: [
      { 
        data: null,
        render: (data, type, row, meta) => meta.row + 1
      },
      { data: 'name' },
      { data: 'ip' },
      { data: 'manufacturer' },
      { data: 'hardware' },
      { data: 'pon_type' },
      { 
        data: 'total_ont',
        render: data => `<span class="badge bg-label-info">${data} ONT</span>`
      },
      { 
        data: 'status',
        render: data => {
          const badge = data === 'online' ? 'success' : 'danger';
          const text = data === 'online' ? 'Online' : 'Offline';
          return `<span class="status-badge badge bg-${badge}">${text}</span>`;
        }
      },
      {
        data: null,
        render: (data, type, row) => `
          <div class="action-buttons d-flex gap-1">
            <a href="/olt/detail/${row.id}" class="btn btn-sm btn-info" title="Detail">
              <i class="ti ti-eye"></i>
            </a>
            <a href="/olt/edit/${row.id}" class="btn btn-sm btn-warning" title="Edit">
              <i class="ti ti-edit"></i>
            </a>
            <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}" data-name="${row.name}" title="Hapus">
              <i class="ti ti-trash"></i>
            </button>
          </div>
        `
      }
    ],
    language: {
      search: "Cari:",
      lengthMenu: "Tampilkan _MENU_ data",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
      infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
      infoFiltered: "(difilter dari _MAX_ total data)",
      zeroRecords: "Tidak ada data yang ditemukan",
      emptyTable: "Tidak ada data OLT",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya"
      }
    },
    order: [[1, 'asc']]
  });

  // Update stats on load
  updateStats(oltData);

  // Refresh button
  $('#btn-refresh').on('click', function() {
    const btn = $(this);
    btn.prop('disabled', true);
    btn.html('<span class="spinner-border spinner-border-sm"></span>');
    
    // Simulate refresh (replace with actual API call)
    setTimeout(() => {
      table.ajax.reload();
      btn.prop('disabled', false);
      btn.html('<i class="ti ti-refresh"></i> Refresh');
      
      Swal.fire({
        icon: 'success',
        title: 'Data Diperbarui',
        text: 'Data OLT berhasil direfresh',
        timer: 1500,
        showConfirmButton: false
      });
    }, 1000);
  });

  // Apply filter
  $('#btn-apply-filter').on('click', function() {
    const manufacturer = $('#filter-manufacturer').val();
    const status = $('#filter-status').val();
    const pon = $('#filter-pon').val();

    let filtered = oltData;

    if (manufacturer) {
      filtered = filtered.filter(d => d.manufacturer === manufacturer);
    }
    if (status) {
      filtered = filtered.filter(d => d.status === status);
    }
    if (pon) {
      filtered = filtered.filter(d => d.pon_type === pon);
    }

    table.clear().rows.add(filtered).draw();
    updateStats(filtered);
    $('#filterModal').modal('hide');
  });

  // Reset filter
  $('#btn-reset-filter').on('click', function() {
    $('#filter-manufacturer, #filter-status, #filter-pon').val('');
    table.clear().rows.add(oltData).draw();
    updateStats(oltData);
  });

  // Delete OLT
  let deleteOltId = null;
  
  $(document).on('click', '.btn-delete', function() {
    deleteOltId = $(this).data('id');
    const oltName = $(this).data('name');
    $('#delete-olt-name').text(oltName);
    $('#deleteModal').modal('show');
  });

  $('#btn-confirm-delete').on('click', function() {
    if (deleteOltId) {
      $('#deleteModal').modal('hide');
      
      Swal.fire({
        title: 'Menghapus...',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });

      // Simulate delete (replace with actual API call)
      setTimeout(() => {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil Dihapus',
          text: 'OLT berhasil dihapus dari sistem',
          timer: 1500,
          showConfirmButton: false
        });

        // Remove from table
        const index = oltData.findIndex(d => d.id === deleteOltId);
        if (index > -1) {
          oltData.splice(index, 1);
          table.clear().rows.add(oltData).draw();
          updateStats(oltData);
        }
        
        deleteOltId = null;
      }, 1000);
    }
  });
});
</script>
@endpush