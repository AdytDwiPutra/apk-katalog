@extends('layouts.master')



@section('content')
 <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="row">
                            <!-- Left Column - Form -->
                            <div class="col-lg-7 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="mb-0"><i class="ti ti-user-plus me-2"></i>Form Tambah Pelanggan</h4>
                                    </div>
                                    <div class="card-body">

                                        <!-- Tab Navigation -->
                                        <ul class="nav nav-tabs mb-4" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#paket-tab">
                                                    <i class="ti ti-package me-1"></i>Paket Langganan
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#info-tab">
                                                    <i class="ti ti-user me-1"></i>Info Pelanggan
                                                </button>
                                            </li>
                                        </ul>

                                        <form id="customerForm">
                                            <div class="tab-content">

                                                <!-- Tab 1: Paket Langganan -->
                                                <div class="tab-pane fade show active" id="paket-tab">

                                                    <div class="row mb-3">
                                                        <label class="col-sm-4 col-form-label">Status Registrasi <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="reg_status" id="aktif_sekarang" value="1" checked>
                                                                <label class="form-check-label" for="aktif_sekarang">Aktif Sekarang</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="reg_status" id="on_process" value="0">
                                                                <label class="form-check-label" for="on_process">On Process</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-sm-4 col-form-label">Tipe Pelanggan <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="subscription_type" id="regular" value="regular" checked>
                                                                <label class="form-check-label" for="regular">Reguler</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="subscription_type" id="non_regular" value="non_regular">
                                                                <label class="form-check-label" for="non_regular">Non-Reguler</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Tipe Service <span class="text-danger">*</span></label>
                                                        <select class="form-select" id="service_type" name="service_type" required>
                                                            <option value="">- Pilih Tipe Service -</option>
                                                            <option value="PPPOE">PPPOE</option>
                                                            <option value="PPTP">PPTP/L2TP</option>
                                                            <option value="HOTSPOT">HOTSPOT</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Paket Langganan <span class="text-danger">*</span></label>
                                                        <select class="form-select" id="plan" name="plan" required>
                                                            <option value="">- Pilih Paket -</option>
                                                            <option value="10mbps">NET HOME 10Mbps - Rp 150.000</option>
                                                            <option value="20mbps">NET HOME 20Mbps - Rp 250.000</option>
                                                            <option value="30mbps">NET HOME 30Mbps - Rp 350.000</option>
                                                            <option value="50mbps">NET HOME 50Mbps - Rp 500.000</option>
                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Tipe Pembayaran <span class="text-danger">*</span></label>
                                                            <select class="form-select" name="payment_type" required>
                                                                <option value="PREPAID">PREPAID</option>
                                                                <option value="POSTPAID">POSTPAID</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Status Bayar <span class="text-danger">*</span></label>
                                                            <select class="form-select" name="payment_status" required>
                                                                <option value="PAID">Sudah Bayar</option>
                                                                <option value="UNPAID">Belum Bayar</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Diskon (Rp)</label>
                                                            <input type="number" class="form-control" name="discount" placeholder="0" value="0">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Biaya Instalasi (Rp)</label>
                                                            <input type="number" class="form-control" name="setup_fee" placeholder="0" value="0">
                                                        </div>
                                                    </div>

                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="enable_tax" name="enable_tax" checked>
                                                        <label class="form-check-label" for="enable_tax">
                                                            Tagihkan PPN (Persentase diambil dari Profil)
                                                        </label>
                                                    </div>

                                                </div>

                                                <!-- Tab 2: Info Pelanggan -->
                                                <div class="tab-pane fade" id="info-tab">

                                                    <div class="mb-3">
                                                        <label class="form-label">ODP | POP</label>
                                                        <select class="form-select" name="odp_id">
                                                            <option value="0">- Tanpa ODP | POP -</option>
                                                            <option value="23">ODP73 - GPON CISALADAH</option>
                                                            <option value="25">ODP35 - GPON KACA - KACA</option>
                                                            <option value="27">ODP48 - GPON CISALADAH</option>
                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">ID Pelanggan <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="customer_id" name="customer_id" placeholder="AUTO GENERATE" required>
                                                            <small class="text-muted">Hanya huruf dan angka</small>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">No. HP <span class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control" name="phone" placeholder="628123456789" required>
                                                            <small class="text-muted">Format: 628xxxxxxxxx</small>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" name="email" placeholder="email@example.com" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">No. KTP/SIM <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="id_number" placeholder="16 digit KTP" maxlength="16" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="address" rows="3" placeholder="Alamat lengkap pelanggan" required></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Latitude</label>
                                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-6.123456" readonly>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Longitude</label>
                                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="106.123456" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="alert alert-info">
                                                        <i class="ti ti-info-circle me-2"></i>
                                                        <strong>Petunjuk:</strong> Klik pada peta di sebelah kanan untuk menentukan lokasi pelanggan
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Username <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Catatan</label>
                                                        <textarea class="form-control" name="notes" rows="2" placeholder="Catatan tambahan (opsional)"></textarea>
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Form Actions -->
                                            <div class="mt-4 pt-3 border-top">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti ti-device-floppy me-1"></i>Simpan Pelanggan
                                                </button>
                                                <button type="reset" class="btn btn-label-secondary">
                                                    <i class="ti ti-refresh me-1"></i>Reset Form
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Maps -->
                            <div class="col-lg-5 mb-4">
                                <div class="card sticky-map">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="ti ti-map-pin me-2"></i>Lokasi Pelanggan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="map"></div>
                                        <div class="coordinate-display mt-3">
                                            <div><strong>Koordinat Terpilih:</strong></div>
                                            <div id="selected-coords">Klik pada peta untuk memilih lokasi</div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary mt-2" onclick="getCurrentLocation()">
                                            <i class="ti ti-current-location me-1"></i>Gunakan Lokasi Saat Ini
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- / Content wrapper -->
@endsection