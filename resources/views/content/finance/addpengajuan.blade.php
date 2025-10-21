@extends('layouts.master')

@section('title', 'Tambah OLT')

@push('styles')
<!-- Page CSS -->
    <!-- Page CSS -->
    <style>
      .form-label {
        font-weight: 500;
      }
      
      .items-section {
        border: 1px solid #d9dee3;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
      }
      
      .divider {
        border-top: 1px solid #d9dee3;
        margin: 20px 0;
      }
      
      .item-row {
        margin-bottom: 15px;
      }
      
      .add-item-btn {
        margin-top: 15px;
      }
      
      .total-section {
        background-color: rgba(115, 103, 240, 0.08);
        border-radius: 5px;
        padding: 15px;
        margin-top: 20px;
        border-left: 4px solid #7367f0;
      }
    </style>
@endpush
@section('content')



  <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengajuan /</span> Tambah Pengajuan</h4>

              <!-- Form Pengajuan -->
              <div class="row">
                <div class="col-xl-12">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form id="formPengajuan">
                        <!-- Basic Info -->
                        <div class="row mb-3">
                          <div class="col-12 mb-3">
                            <label class="form-label" for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required />
                          </div>
                          
                          <div class="col-12 mb-3">
                            <label class="form-label" for="deskripsi">deksripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                          </div>
                          
                          <div class="col-12 mb-3">
                            <label class="form-label" for="tanggalPengajuan">Tanggal pengajuan</label>
                            <input type="text" class="form-control flatpickr-date" id="tanggalPengajuan" name="tanggalPengajuan" placeholder="YYYY-MM-DD" required />
                          </div>

                          <div class="col-12 mb-3">
                            <label class="form-label" for="dokumenPendukung">Dokumen Pendukung</label>
                            <input class="form-control" type="file" id="dokumenPendukung" name="dokumenPendukung" multiple />
                            <div class="form-text">Upload bukti pendukung atau dokumen lainnya (PDF, JPEG, PNG)</div>
                          </div>
                        </div>

                        <div class="divider"></div>
                        
                        <!-- Items Table -->
                        <div class="items-section">
                          <div class="row mb-2">
                            <div class="col-md-4">
                              <label class="form-label">Nama barang</label>
                            </div>
                            <div class="col-md-2 text-center">
                              <label class="form-label">Qty</label>
                            </div>
                            <div class="col-md-3 text-center">
                              <label class="form-label">Harga</label>
                            </div>
                            <div class="col-md-3 text-center">
                              <label class="form-label">jumlah</label>
                            </div>
                          </div>
                          
                          <div id="itemContainer">
                            <!-- Initial Item Row -->
                            <div class="item-row" id="item-1">
                              <div class="row g-3 align-items-center">
                                <div class="col-md-4">
                                  <select class="form-select item-name" id="itemName-1" name="items[0][name]" required>
                                    <option value="Kabel">Kabel</option>
                                    <option value="Router">Router</option>
                                    <option value="Switch">Switch</option>
                                    <option value="ODP">ODP</option>
                                    <option value="ONT">ONT</option>
                                  </select>
                                </div>
                                <div class="col-md-2">
                                  <input type="number" class="form-control item-qty text-center" id="itemQty-1" name="items[0][qty]" min="1" value="5" required />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control item-price text-center" id="itemPrice-1" name="items[0][price]" value="Rp. 100.000" required />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control item-total text-center" id="itemTotal-1" name="items[0][total]" value="Rp. 500.000" readonly />
                                </div>
                              </div>
                            </div>

                            <!-- Second Item Row (for demonstration) -->
                            <div class="item-row" id="item-2" style="margin-top: 10px;">
                              <div class="row g-3 align-items-center">
                                <div class="col-md-4">
                                  <select class="form-select item-name" id="itemName-2" name="items[1][name]" required>
                                    <option value="Kabel">Kabel</option>
                                    <option value="Router">Router</option>
                                    <option value="Switch">Switch</option>
                                    <option value="ODP">ODP</option>
                                    <option value="ONT">ONT</option>
                                  </select>
                                </div>
                                <div class="col-md-2">
                                  <input type="number" class="form-control item-qty text-center" id="itemQty-2" name="items[1][qty]" min="1" value="5" required />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control item-price text-center" id="itemPrice-2" name="items[1][price]" value="Rp. 100.000" required />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control item-total text-center" id="itemTotal-2" name="items[1][total]" value="Rp. 500.000" readonly />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Total Section -->
                        <div class="total-section mt-3">
                          <div class="row">
                            <div class="col-md-9 text-end">
                              <h6 class="mb-0 fw-semibold">Total:</h6>
                            </div>
                            <div class="col-md-3">
                              <h6 class="mb-0 fw-bold text-primary text-center" id="grandTotalDisplay">Rp. 1.000.000</h6>
                              <input type="hidden" id="grandTotal" name="grandTotal" value="1000000">
                            </div>
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                              simpan
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Form Pengajuan -->
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
@endsection

@push('scripts')
    <script>
    $(function() {
      // Initialize date picker
      if($('.flatpickr-date').length) {
        $('.flatpickr-date').flatpickr({
          defaultDate: 'today'
        });
      }

      // Calculate item total on price/qty change
      $(document).on('input', '.item-price, .item-qty', function() {
        let row = $(this).closest('.item-row');
        let qty = parseInt(row.find('.item-qty').val()) || 0;
        let priceText = row.find('.item-price').val();
        let price = parseInt(priceText.replace(/[^0-9]/g, '')) || 0;
        let total = qty * price;
        
        // Update total field
        row.find('.item-total').val('Rp. ' + total.toLocaleString('id-ID'));
        
        // Calculate grand total
        calculateGrandTotal();
      });
      
      // Calculate grand total
      function calculateGrandTotal() {
        let grandTotal = 0;
        
        $('.item-total').each(function() {
          let totalText = $(this).val();
          let total = parseInt(totalText.replace(/[^0-9]/g, '')) || 0;
          grandTotal += total;
        });
        
        $('#grandTotalDisplay').text('Rp. ' + grandTotal.toLocaleString('id-ID'));
        $('#grandTotal').val(grandTotal);
      }

      // Form submission
      $('#formPengajuan').submit(function(e) {
        e.preventDefault();
        
        // Here you would normally send the form data to the server
        // For demonstration, we'll show a success message
        
        alert('Pengajuan berhasil disimpan!');
        // Redirect to list page
        window.location.href = 'pengajuan-list.html';
      });
    });
    </script>
@endpush