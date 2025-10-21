@extends('layouts.master')

@section('title', 'List Customer Lead')

@push('styles')
<link rel="stylesheet" href="{{asset('vuexy')}}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<style>
  /* Table Improvements */
  .table-hover tbody tr {
    transition: all 0.2s ease;
  }
  .table-hover tbody tr:hover {
    background-color: rgba(115, 103, 240, 0.04) !important;
    transform: translateX(2px);
  }
  
  /* Smooth Button Transitions */
  .btn {
    transition: all 0.2s ease;
  }
  .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  }
  
  /* Badge Styling */
  .badge {
    font-weight: 500;
    padding: 0.35rem 0.65rem;
    font-size: 0.75rem;
  }
  
  /* Action Buttons Container */
  .action-buttons {
    display: flex;
    gap: 0.25rem;
    justify-content: flex-start;
  }
  .action-buttons .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
  }
  
  /* Improved Card Spacing */
  .card {
    box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
    transition: box-shadow 0.2s ease;
  }
  .card:hover {
    box-shadow: 0 4px 12px 0 rgba(67, 89, 113, 0.16);
  }
  
  /* Stats Card Polish */
  .stats-card {
    border-radius: 8px;
    overflow: hidden;
  }
  
  /* Table Cell Padding */
  .table td, .table th {
    padding: 1rem 0.75rem;
    vertical-align: middle;
  }
  
  /* GPS Button */
  .btn-gps {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
  
  /* Smooth Scroll */
  * {
    scroll-behavior: smooth;
  }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Customer Lead</h4>
      <p class="text-muted mb-0">Daftar calon pelanggan (prospek)</p>
    </div>
    <div class="d-flex gap-2">
      <a href="/customer/maps" class="btn btn-outline-primary">
        <i class="ti ti-map me-1"></i> Lihat di Peta
      </a>
      <a href="/customer/lead" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i> Tambah Lead Baru
      </a>
    </div>
  </div>

  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1 small">Total Lead</p>
              <h3 class="mb-0 fw-bold">347</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-users ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1 small">Baru</p>
              <h3 class="mb-0 fw-bold text-info">127</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-sparkles ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1 small">Follow Up</p>
              <h3 class="mb-0 fw-bold text-warning">89</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-phone-calling ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1 small">Deal/Terpasang</p>
              <h3 class="mb-0 fw-bold text-success">131</h3>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-check ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter Card -->
  <div class="card mb-4">
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select class="form-select" id="filter-status">
            <option value="">Semua Status</option>
            <option value="baru">Baru</option>
            <option value="follow-up">Follow Up</option>
            <option value="survey">Survey</option>
            <option value="deal">Deal</option>
            <option value="gagal">Gagal</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Marketing</label>
          <select class="form-select" id="filter-marketing">
            <option value="">Semua Marketing</option>
            <option value="1">Ahmad Fauzi</option>
            <option value="2">Dedi Saputra</option>
            <option value="3">Siti Nurhaliza</option>
            <option value="4">Budi Santoso</option>
            <option value="5">Rizki Wahyudi</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Paket</label>
          <select class="form-select" id="filter-paket">
            <option value="">Semua Paket</option>
            <option value="10mbps">10 Mbps</option>
            <option value="20mbps">20 Mbps</option>
            <option value="50mbps">50 Mbps</option>
            <option value="100mbps">100 Mbps</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Periode</label>
          <input type="date" class="form-control" id="filter-date">
        </div>
      </div>
      <div class="mt-3">
        <button class="btn btn-primary btn-sm" id="btn-apply-filter">
          <i class="ti ti-filter me-1"></i> Terapkan
        </button>
        <button class="btn btn-outline-secondary btn-sm" id="btn-reset-filter">
          <i class="ti ti-refresh me-1"></i> Reset
        </button>
      </div>
    </div>
  </div>

  <!-- Table Card -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Lead</h5>
      <div class="d-flex gap-2">
        <button class="btn btn-sm btn-outline-success" id="btn-export">
          <i class="ti ti-file-export me-1"></i> Export Excel
        </button>
      </div>
    </div>
    <div class="card-datatable table-responsive">
      <table class="table table-hover" id="leadTable">
        <thead class="table-light">
          <tr>
            <th>
              <input type="checkbox" class="form-check-input" id="select-all">
            </th>
            <th>ID Lead</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Paket</th>
            <th>Marketing</th>
            <th>Status</th>
            <th>GPS</th>
            <th>Tanggal Input</th>
            <th style="width: 200px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Lead 1 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-check"></td>
            <td><span class="fw-medium">#LEAD-00347</span></td>
            <td>3273012345678901</td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Indah Permatasari</span>
                <small class="text-muted">indah@email.com</small>
              </div>
            </td>
            <td>
              <small>Jl. Raya Cicalengka No. 45<br>RT 002 RW 003</small>
            </td>
            <td>081234567890</td>
            <td><span class="badge bg-label-primary">20 Mbps</span></td>
            <td>Ahmad Fauzi</td>
            <td><span class="badge bg-info">Baru</span></td>
            <td>
              <button class="btn btn-sm btn-outline-secondary btn-gps" onclick="window.open('https://www.google.com/maps?q=-6.917464,107.619123', '_blank')" title="Lihat di Maps">
                <i class="ti ti-map-pin"></i>
              </button>
            </td>
            <td>
              <span>23 Sep 2025</span><br>
              <small class="text-muted">14:30</small>
            </td>
            <td>
              <div class="action-buttons">
                <a href="/customer/lead/detail/347" class="btn btn-sm btn-info" title="Detail">
                  <i class="ti ti-eye"></i>
                </a>
                <button class="btn btn-sm btn-warning" title="Proses Lead" data-bs-toggle="modal" data-bs-target="#prosesModal" onclick="setLeadId(347)">
                  <i class="ti ti-phone"></i>
                </button>
                <a href="/customer/lead/edit/347" class="btn btn-sm btn-primary" title="Edit">
                  <i class="ti ti-edit"></i>
                </a>
                <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteLead(347)">
                  <i class="ti ti-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Lead 2 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-check"></td>
            <td><span class="fw-medium">#LEAD-00346</span></td>
            <td>3273019876543210</td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Rahmat Hidayat</span>
                <small class="text-muted">-</small>
              </div>
            </td>
            <td>
              <small>Perumahan Griya Asri Blok B12<br>Rancaekek</small>
            </td>
            <td>082345678901</td>
            <td><span class="badge bg-label-warning">50 Mbps</span></td>
            <td>Dedi Saputra</td>
            <td><span class="badge bg-warning">Follow Up</span></td>
            <td>
              <button class="btn btn-sm btn-outline-secondary btn-gps" onclick="window.open('https://www.google.com/maps?q=-6.925,107.625', '_blank')" title="Lihat di Maps">
                <i class="ti ti-map-pin"></i>
              </button>
            </td>
            <td>
              <span>22 Sep 2025</span><br>
              <small class="text-muted">10:15</small>
            </td>
            <td>
              <div class="action-buttons">
                <a href="/customer/lead/detail/346" class="btn btn-sm btn-info" title="Detail">
                  <i class="ti ti-eye"></i>
                </a>
                <button class="btn btn-sm btn-warning" title="Proses Lead" data-bs-toggle="modal" data-bs-target="#prosesModal" onclick="setLeadId(346)">
                  <i class="ti ti-phone"></i>
                </button>
                <a href="/customer/lead/edit/346" class="btn btn-sm btn-primary" title="Edit">
                  <i class="ti ti-edit"></i>
                </a>
                <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteLead(346)">
                  <i class="ti ti-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Lead 3 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-check"></td>
            <td><span class="fw-medium">#LEAD-00345</span></td>
            <td>3273015555666677</td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">CV. Berkah Jaya</span>
                <small class="text-muted">info@berkahjaya.com</small>
              </div>
            </td>
            <td>
              <small>Jl. Soreang Raya No. 88<br>Kec. Soreang</small>
            </td>
            <td>081987654321</td>
            <td><span class="badge bg-label-success">100 Mbps</span></td>
            <td>Rizki Wahyudi</td>
            <td><span class="badge bg-secondary">Survey</span></td>
            <td>
              <button class="btn btn-sm btn-outline-secondary btn-gps" onclick="window.open('https://www.google.com/maps?q=-6.928,107.61', '_blank')" title="Lihat di Maps">
                <i class="ti ti-map-pin"></i>
              </button>
            </td>
            <td>
              <span>21 Sep 2025</span><br>
              <small class="text-muted">09:00</small>
            </td>
            <td>
              <div class="action-buttons">
                <a href="/customer/lead/detail/345" class="btn btn-sm btn-info" title="Detail">
                  <i class="ti ti-eye"></i>
                </a>
                <button class="btn btn-sm btn-warning" title="Proses Lead" data-bs-toggle="modal" data-bs-target="#prosesModal" onclick="setLeadId(345)">
                  <i class="ti ti-phone"></i>
                </button>
                <a href="/customer/lead/edit/345" class="btn btn-sm btn-primary" title="Edit">
                  <i class="ti ti-edit"></i>
                </a>
                <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteLead(345)">
                  <i class="ti ti-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Lead 4 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-check"></td>
            <td><span class="fw-medium">#LEAD-00344</span></td>
            <td>3273012222333344</td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Dewi Sartika</span>
                <small class="text-muted">-</small>
              </div>
            </td>
            <td>
              <small>Komplek Villa Indah No. 23<br>Majalaya</small>
            </td>
            <td>085678901234</td>
            <td><span class="badge bg-label-primary">20 Mbps</span></td>
            <td>Siti Nurhaliza</td>
            <td><span class="badge bg-success">Deal</span></td>
            <td>
              <button class="btn btn-sm btn-outline-secondary btn-gps" onclick="window.open('https://www.google.com/maps?q=-6.91,107.63', '_blank')" title="Lihat di Maps">
                <i class="ti ti-map-pin"></i>
              </button>
            </td>
            <td>
              <span>20 Sep 2025</span><br>
              <small class="text-muted">15:45</small>
            </td>
            <td>
              <div class="action-buttons">
                <a href="/customer/lead/detail/344" class="btn btn-sm btn-info" title="Detail">
                  <i class="ti ti-eye"></i>
                </a>
                <button class="btn btn-sm btn-success" title="Konversi ke Pelanggan" data-bs-toggle="modal" data-bs-target="#konversiModal" onclick="setLeadId(344)">
                  <i class="ti ti-user-check"></i>
                </button>
                <a href="/customer/lead/edit/344" class="btn btn-sm btn-primary" title="Edit">
                  <i class="ti ti-edit"></i>
                </a>
                <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteLead(344)">
                  <i class="ti ti-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Lead 5 -->
          <tr>
            <td><input type="checkbox" class="form-check-input row-check"></td>
            <td><span class="fw-medium">#LEAD-00343</span></td>
            <td>3273019999888877</td>
            <td>
              <div class="d-flex flex-column">
                <span class="fw-medium">Ahmad Zainudin</span>
                <small class="text-muted">ahmad.z@gmail.com</small>
              </div>
            </td>
            <td>
              <small>Jl. Baleendah No. 156<br>RT 001 RW 002</small>
            </td>
            <td>087890123456</td>
            <td><span class="badge bg-label-info">10 Mbps</span></td>
            <td>Budi Santoso</td>
            <td><span class="badge bg-danger">Gagal</span></td>
            <td>
              <button class="btn btn-sm btn-outline-secondary btn-gps" onclick="window.open('https://www.google.com/maps?q=-6.905,107.635', '_blank')" title="Lihat di Maps">
                <i class="ti ti-map-pin"></i>
              </button>
            </td>
            <td>
              <span>19 Sep 2025</span><br>
              <small class="text-muted">11:20</small>
            </td>
            <td>
              <div class="action-buttons">
                <a href="/customer/lead/detail/343" class="btn btn-sm btn-info" title="Detail">
                  <i class="ti ti-eye"></i>
                </a>
                <button class="btn btn-sm btn-secondary" title="Reactivate" onclick="reactivateLead(343)">
                  <i class="ti ti-refresh"></i>
                </button>
                <a href="/customer/lead/edit/343" class="btn btn-sm btn-primary" title="Edit">
                  <i class="ti ti-edit"></i>
                </a>
                <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteLead(343)">
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

<!-- Proses Lead Modal -->
<div class="modal fade" id="prosesModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Proses Lead</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="proses-lead-id">
        <div class="mb-3">
          <label class="form-label">Update Status</label>
          <select class="form-select" id="proses-status">
            <option value="baru">Baru</option>
            <option value="follow-up">Follow Up</option>
            <option value="survey">Survey</option>
            <option value="deal">Deal</option>
            <option value="gagal">Gagal</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Catatan/Hasil Follow Up</label>
          <textarea class="form-control" id="proses-notes" rows="4" placeholder="Catat hasil percakapan dengan calon pelanggan..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Next Follow Up Date</label>
          <input type="datetime-local" class="form-control" id="proses-next-date">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="saveProsesLead()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Konversi ke Pelanggan Modal -->
<div class="modal fade" id="konversiModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konversi Lead ke Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="konversi-lead-id">
        <div class="alert alert-info">
          <i class="ti ti-info-circle me-2"></i>
          Lead akan dikonversi menjadi pelanggan aktif dan data akan dipindahkan ke tabel pelanggan
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Paket yang Dipilih <span class="text-danger">*</span></label>
            <select class="form-select" required>
              <option value="">Pilih Paket</option>
              <option value="1">DW HOME 10 Mbps - Rp 150.000/bulan</option>
              <option value="2">DW HOME 20 Mbps - Rp 250.000/bulan</option>
              <option value="3">DW HOME 50 Mbps - Rp 450.000/bulan</option>
              <option value="4">DW CORPORATE 100 Mbps - Rp 850.000/bulan</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Tanggal Instalasi <span class="text-danger">*</span></label>
            <input type="date" class="form-control" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Biaya Pasang (PSB)</label>
            <input type="text" class="form-control" placeholder="Rp 500.000">
          </div>
          <div class="col-md-6">
            <label class="form-label">Status Pembayaran PSB</label>
            <select class="form-select">
              <option>Belum Bayar</option>
              <option>Sudah Bayar</option>
              <option>DP 50%</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Catatan Konversi</label>
          <textarea class="form-control" rows="2" placeholder="Catatan tambahan untuk konversi lead ke pelanggan"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" onclick="saveKonversi()">
          <i class="ti ti-user-check me-1"></i> Konversi ke Pelanggan
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('vuexy')}}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script>
$(document).ready(function() {
  // Initialize DataTable
  const table = $('#leadTable').DataTable({
    responsive: true,
    order: [[10, 'desc']], // Sort by date
    pageLength: 10,
    language: {
      search: "Cari:",
      lengthMenu: "Tampilkan _MENU_ data",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ lead",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya"
      }
    },
    columnDefs: [
      { orderable: false, targets: [0, 11] }
    ]
  });

  // Select all checkboxes
  $('#select-all').on('click', function() {
    $('.row-check').prop('checked', this.checked);
  });

  // Apply filter
  $('#btn-apply-filter').on('click', function() {
    // In real app: reload table with filters
    alert('Filter diterapkan');
  });

  // Reset filter
  $('#btn-reset-filter').on('click', function() {
    $('#filter-status, #filter-marketing, #filter-paket, #filter-date').val('');
    table.search('').draw();
  });

  // Export
  $('#btn-export').on('click', function() {
    alert('Export to Excel - Coming soon!');
  });
});

function deleteLead(id) {
  if(confirm('Hapus lead #LEAD-00' + id + '?')) {
    alert('Lead deleted');
    // In real app: AJAX call to delete
  }
}

function setLeadId(id) {
  $('#proses-lead-id').val(id);
  $('#konversi-lead-id').val(id);
}

function saveProsesLead() {
  const leadId = $('#proses-lead-id').val();
  const status = $('#proses-status').val();
  const notes = $('#proses-notes').val();
  
  alert('Lead #LEAD-00' + leadId + ' updated to: ' + status);
  // In real app: AJAX call to update lead
  $('#prosesModal').modal('hide');
}

function saveKonversi() {
  const leadId = $('#konversi-lead-id').val();
  
  if(confirm('Konversi lead #LEAD-00' + leadId + ' menjadi pelanggan aktif?')) {
    alert('Lead berhasil dikonversi ke pelanggan!');
    // In real app: AJAX call to convert lead to customer
    $('#konversiModal').modal('hide');
  }
}

function reactivateLead(id) {
  if(confirm('Reactivate lead #LEAD-00' + id + '?')) {
    alert('Lead #LEAD-00' + id + ' berhasil direaktivasi');
    // In real app: AJAX call to reactivate
  }
}
</script>
@endpush