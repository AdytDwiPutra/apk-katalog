@extends('layouts.master')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold"><span class="text-muted fw-light">Pelanggan /</span> Tambah Pelanggan</h4>
            <div>
                <button type="button" class="btn btn-secondary me-2" onclick="resetForm()">
                    <i class="ti ti-refresh me-1"></i> Reset
                </button>
                <button type="button" class="btn btn-primary" onclick="saveCustomer()">
                    <i class="ti ti-device-floppy me-1"></i> Simpan
                </button>
            </div>
        </div>

        <div class="row">
            <!-- Main Form Section -->
            <div class="col-xl-8 col-lg-7">
                <!-- Customer Form Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Form Tambah Pelanggan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button
                                    type="button"
                                    class="nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#info-pelanggan"
                                    aria-controls="info-pelanggan"
                                    aria-selected="true">
                                    <i class="ti ti-user me-2"></i> Info Pelanggan
                                </button>
                            </li>
                            <li class="nav-item">
                                <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#paket-langganan"
                                    aria-controls="paket-langganan"
                                    aria-selected="false">
                                    <i class="ti ti-package me-2"></i> Paket Langganan
                                </button>
                            </li>
                        </ul>
                        
                        <div class="tab-content pt-4">
                            <!-- Tab 1: Info Pelanggan -->
                            <div class="tab-pane fade show active" id="info-pelanggan" role="tabpanel">
                                <form id="formInfoPelanggan">
                                    <!-- ODP / POP Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">ODP | POP <span class="text-danger">- Optional</span></label>
                                            <div class="input-group">
                                                <select class="form-select" id="odp_pop" name="odp_pop">
                                                    <option value="">- Tanpa ODP | POP -</option>
                                                    <option value="ODP23-JALINAN">ODP23 - JALINAN</option>
                                                    <option value="POP-Bnvs">POP - Bnvs</option>
                                                    <option value="ODP15-CENTER">ODP15 - CENTER</option>
                                                </select>
                                                <button class="btn btn-outline-primary" type="button" onclick="addNewODP()">
                                                    <i class="ti ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Basic Customer Info -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="id_pelanggan" class="form-label">ID Pelanggan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Auto Generated" readonly>
                                            <small class="form-text text-muted">ID akan di-generate otomatis</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan nama lengkap pelanggan">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_kontak" class="form-label">Nama Kontak/Alias</label>
                                            <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Nama kontak atau alias">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="no_ktp" class="form-label">No. KTP <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="16 digit nomor KTP" maxlength="16">
                                        </div>
                                    </div>

                                    <!-- Contact Info -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="no_hp" class="form-label">No. HP <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">+62</span>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="8xxxxxxxxxx">
                                            </div>
                                            <small class="form-text text-primary">
                                                <i class="ti ti-info-circle me-1"></i>DAFTAR KODE NEGARA
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap pelanggan"></textarea>
                                        </div>
                                    </div>

                                    <!-- Coordinates -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="latitude" class="form-label">Latitude <span class="text-danger">- Optional</span></label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-6.900657">
                                            <small class="form-text text-primary">
                                                <i class="ti ti-map-pin me-1"></i>TAMBAH KOORDINAT LOKASI
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude" class="form-label">Longitude <span class="text-danger">- Optional</span></label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="107.846051">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Tab 2: Paket Langganan -->
                            <div class="tab-pane fade" id="paket-langganan" role="tabpanel">
                                <form id="formPaketLangganan">
                                    <!-- Status Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Status Registrasi</label>
                                            <div class="mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_registrasi" id="aktif_sekarang" value="aktif_sekarang" checked>
                                                    <label class="form-check-label fw-medium text-success" for="aktif_sekarang">
                                                        <i class="ti ti-circle-check me-1"></i> AKTIF SEKARANG
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_registrasi" id="on_process" value="on_process">
                                                    <label class="form-check-label fw-medium text-warning" for="on_process">
                                                        <i class="ti ti-clock me-1"></i> ON PROCESS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tipe Pelanggan</label>
                                            <div class="mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_pelanggan" id="regular" value="regular" checked>
                                                    <label class="form-check-label" for="regular">
                                                        <i class="ti ti-user me-1"></i> Regular
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_pelanggan" id="non_regular" value="non_regular">
                                                    <label class="form-check-label" for="non_regular">
                                                        <i class="ti ti-user-star me-1"></i> Non-Regular
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Server Selection -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="server_service" class="form-label">Nama Server / Service</label>
                                            <select class="form-select" id="server_service" name="server_service">
                                                <option value="semua_server">Semua Server & NAS</option>
                                                <option value="service_server">Service Server & NAS</option>
                                                <option value="tambah_server">[*] TAMBAH SERVER</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Payment & Status -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="tipe_pembayaran" class="form-label">Tipe Pembayaran</label>
                                            <select class="form-select" id="tipe_pembayaran" name="tipe_pembayaran">
                                                <option value="PREPAID" selected>PREPAID</option>
                                                <option value="POSTPAID">POSTPAID</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status_bayar" class="form-label">Status Bayar</label>
                                            <select class="form-select" id="status_bayar" name="status_bayar">
                                                <option value="SUDAH_BAYAR" selected>SUDAH BAYAR</option>
                                                <option value="BELUM_BAYAR">BELUM BAYAR</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status_akun" class="form-label">Status Akun</label>
                                            <select class="form-select" id="status_akun" name="status_akun">
                                                <option value="ENABLED" selected>ENABLED</option>
                                                <option value="DISABLED">DISABLED</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Owner & Login Config -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="owner_data" class="form-label">Owner Data</label>
                                            <select class="form-select" id="owner_data" name="owner_data">
                                                <option value="">-- Pilih Owner Data --</option>
                                                <option value="minoradius">Staff ISP - minoradius (Administrator)</option>
                                                <option value="suspend">suspend</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bind_on_login" class="form-label">Bind On Login</label>
                                            <select class="form-select" id="bind_on_login" name="bind_on_login">
                                                <option value="TIDAK" selected>TIDAK</option>
                                                <option value="YA">YA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Service & Package -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tipe_service" class="form-label">Tipe Service</label>
                                            <select class="form-select" id="tipe_service" name="tipe_service">
                                                <option value="">-- Pilih Tipe Service --</option>
                                                <option value="PPPOE">PPPOE</option>
                                                <option value="STATIC_IP">STATIC IP</option>
                                                <option value="DHCP">DHCP</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="paket_langganan" class="form-label">Paket Langganan <span class="text-danger">*</span></label>
                                            <select class="form-select" id="paket_langganan" name="paket_langganan">
                                                <option value="">-- Pilih Paket --</option>
                                                <option value="DW_HOME_10Mbps">DW HOME 10Mbps - Rp. 150.000,00 | 1 Bulan</option>
                                                <option value="DW_HOME_20Mbps">DW HOME 20Mbps - Rp. 250.000,00 | 1 Bulan</option>
                                                <option value="DW_HOME_50Mbps">DW HOME 50Mbps - Rp. 400.000,00 | 1 Bulan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- PPN & Billing -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tagihan_dasar" class="form-label">Tagihan Dasar</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="tagihan_dasar" name="tagihan_dasar" value="150000" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="tagihan_ppn" name="tagihan_ppn">
                                                <label class="form-check-label fw-medium" for="tagihan_ppn">
                                                    <i class="ti ti-receipt me-1"></i> Tagihan PPN
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="persentase_ppn" name="persentase_ppn">
                                                <label class="form-check-label text-danger" for="persentase_ppn">
                                                    / Persentase PPN diambil dari Profit /
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Dates -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="aktivasi" class="form-label">Tanggal Aktivasi</label>
                                            <input type="date" class="form-control" id="aktivasi" name="aktivasi" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                                            <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo">
                                        </div>
                                    </div>

                                    <!-- Action & IP Type -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="aksi_jatuh_tempo" class="form-label">Aksi Jatuh Tempo</label>
                                            <select class="form-select" id="aksi_jatuh_tempo" name="aksi_jatuh_tempo">
                                                <option value="ISOLIR_INTERNET" selected>ISOLIR INTERNET (Suspend)</option>
                                                <option value="HAPUS_AKUN">HAPUS AKUN</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tipe_ip" class="form-label">Tipe IP Address</label>
                                            <select class="form-select" id="tipe_ip" name="tipe_ip">
                                                <option value="IP_DINAMIS" selected>IP DINAMIS</option>
                                                <option value="IP_STATIS">IP STATIS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Login Info Section (Moved from sidebar) -->
                                    <hr class="my-4">
                                    <h6 class="mb-3"><i class="ti ti-key me-2"></i>Informasi Login</h6>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Auto-generated" readonly>
                                            <small class="form-text text-muted">Username akan dibuat otomatis</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Auto-generated" readonly>
                                                <button class="btn btn-outline-primary" type="button" id="togglePassword">
                                                    <i class="ti ti-eye-off"></i>
                                                </button>
                                                <button class="btn btn-outline-success" type="button" onclick="generatePassword()">
                                                    <i class="ti ti-refresh"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="password_clientarea" class="form-label">Password Clientarea</label>
                                            <input type="text" class="form-control" id="password_clientarea" name="password_clientarea" placeholder="Sama dengan No. HP">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="catatan" class="form-label">Catatan <span class="text-danger">- Optional</span></label>
                                            <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan tambahan">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Customer Form Card -->
            </div>
            <!--/ Main Form Section -->

            <!-- Right Sidebar Section -->
            <div class="col-xl-4 col-lg-5">
                <!-- Maps Picker Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-map-pin me-2"></i>Lokasi Pelanggan
                        </h5>
                        <small class="text-muted">Drag marker untuk menentukan lokasi</small>
                    </div> -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">ODP | POP <span class="text-danger">- Optional</span></label>
                                            <div class="input-group">
                                                <select class="form-select" id="odp_pop" name="odp_pop">
                                                    <option value="">- Tanpa ODP | POP -</option>
                                                    <option value="ODP23-JALINAN">ODP23 - JALINAN</option>
                                                    <option value="POP-Bnvs">POP - Bnvs</option>
                                                    <option value="ODP15-CENTER">ODP15 - CENTER</option>
                                                </select>
                                                <button class="btn btn-outline-primary" type="button" onclick="addNewODP()">
                                                    <i class="ti ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Basic Customer Info -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="id_pelanggan" class="form-label">ID Pelanggan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Auto Generated" readonly>
                                            <small class="form-text text-muted">ID akan di-generate otomatis</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan nama lengkap pelanggan">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_kontak" class="form-label">Nama Kontak/Alias</label>
                                            <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Nama kontak atau alias">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="no_ktp" class="form-label">No. KTP <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="16 digit nomor KTP" maxlength="16">
                                        </div>
                                    </div>

                                    <!-- Contact Info -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="no_hp" class="form-label">No. HP <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">+62</span>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="8xxxxxxxxxx">
                                            </div>
                                            <small class="form-text text-primary">
                                                <i class="ti ti-info-circle me-1"></i>DAFTAR KODE NEGARA
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap pelanggan"></textarea>
                                        </div>
                                    </div>

                                    <!-- Coordinates -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="latitude" class="form-label">Latitude <span class="text-danger">- Optional</span></label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-6.900657">
                                            <small class="form-text text-primary">
                                                <i class="ti ti-map-pin me-1"></i>TAMBAH KOORDINAT LOKASI
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude" class="form-label">Longitude <span class="text-danger">- Optional</span></label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="107.846051">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Tab 2: Paket Langganan -->
                            <div class="tab-pane fade" id="paket-langganan" role="tabpanel">
                                <form id="formPaketLangganan">
                                    <!-- Status Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Status Registrasi</label>
                                            <div class="mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_registrasi" id="aktif_sekarang" value="aktif_sekarang" checked>
                                                    <label class="form-check-label fw-medium text-success" for="aktif_sekarang">
                                                        <i class="ti ti-circle-check me-1"></i> AKTIF SEKARANG
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_registrasi" id="on_process" value="on_process">
                                                    <label class="form-check-label fw-medium text-warning" for="on_process">
                                                        <i class="ti ti-clock me-1"></i> ON PROCESS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tipe Pelanggan</label>
                                            <div class="mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_pelanggan" id="regular" value="regular" checked>
                                                    <label class="form-check-label" for="regular">
                                                        <i class="ti ti-user me-1"></i> Regular
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_pelanggan" id="non_regular" value="non_regular">
                                                    <label class="form-check-label" for="non_regular">
                                                        <i class="ti ti-user-star me-1"></i> Non-Regular
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Server Selection -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="server_service" class="form-label">Nama Server / Service</label>
                                            <select class="form-select" id="server_service" name="server_service">
                                                <option value="semua_server">Semua Server & NAS</option>
                                                <option value="service_server">Service Server & NAS</option>
                                                <option value="tambah_server">[*] TAMBAH SERVER</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Payment & Status -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="tipe_pembayaran" class="form-label">Tipe Pembayaran</label>
                                            <select class="form-select" id="tipe_pembayaran" name="tipe_pembayaran">
                                                <option value="PREPAID" selected>PREPAID</option>
                                                <option value="POSTPAID">POSTPAID</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status_bayar" class="form-label">Status Bayar</label>
                                            <select class="form-select" id="status_bayar" name="status_bayar">
                                                <option value="SUDAH_BAYAR" selected>SUDAH BAYAR</option>
                                                <option value="BELUM_BAYAR">BELUM BAYAR</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status_akun" class="form-label">Status Akun</label>
                                            <select class="form-select" id="status_akun" name="status_akun">
                                                <option value="ENABLED" selected>ENABLED</option>
                                                <option value="DISABLED">DISABLED</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Owner & Login Config -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="owner_data" class="form-label">Owner Data</label>
                                            <select class="form-select" id="owner_data" name="owner_data">
                                                <option value="">-- Pilih Owner Data --</option>
                                                <option value="minoradius">Staff ISP - minoradius (Administrator)</option>
                                                <option value="suspend">suspend</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bind_on_login" class="form-label">Bind On Login</label>
                                            <select class="form-select" id="bind_on_login" name="bind_on_login">
                                                <option value="TIDAK" selected>TIDAK</option>
                                                <option value="YA">YA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Service & Package -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tipe_service" class="form-label">Tipe Service</label>
                                            <select class="form-select" id="tipe_service" name="tipe_service">
                                                <option value="">-- Pilih Tipe Service --</option>
                                                <option value="PPPOE">PPPOE</option>
                                                <option value="STATIC_IP">STATIC IP</option>
                                                <option value="DHCP">DHCP</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="paket_langganan" class="form-label">Paket Langganan <span class="text-danger">*</span></label>
                                            <select class="form-select" id="paket_langganan" name="paket_langganan">
                                                <option value="">-- Pilih Paket --</option>
                                                <option value="DW_HOME_10Mbps">DW HOME 10Mbps - Rp. 150.000,00 | 1 Bulan</option>
                                                <option value="DW_HOME_20Mbps">DW HOME 20Mbps - Rp. 250.000,00 | 1 Bulan</option>
                                                <option value="DW_HOME_50Mbps">DW HOME 50Mbps - Rp. 400.000,00 | 1 Bulan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- PPN & Billing -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tagihan_dasar" class="form-label">Tagihan Dasar</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="tagihan_dasar" name="tagihan_dasar" value="150000" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="tagihan_ppn" name="tagihan_ppn">
                                                <label class="form-check-label fw-medium" for="tagihan_ppn">
                                                    <i class="ti ti-receipt me-1"></i> Tagihan PPN
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="persentase_ppn" name="persentase_ppn">
                                                <label class="form-check-label text-danger" for="persentase_ppn">
                                                    / Persentase PPN diambil dari Profit /
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Dates -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="aktivasi" class="form-label">Tanggal Aktivasi</label>
                                            <input type="date" class="form-control" id="aktivasi" name="aktivasi" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                                            <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo">
                                        </div>
                                    </div>

                                    <!-- Action & IP Type -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="aksi_jatuh_tempo" class="form-label">Aksi Jatuh Tempo</label>
                                            <select class="form-select" id="aksi_jatuh_tempo" name="aksi_jatuh_tempo">
                                                <option value="ISOLIR_INTERNET" selected>ISOLIR INTERNET (Suspend)</option>
                                                <option value="HAPUS_AKUN">HAPUS AKUN</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tipe_ip" class="form-label">Tipe IP Address</label>
                                            <select class="form-select" id="tipe_ip" name="tipe_ip">
                                                <option value="IP_DINAMIS" selected>IP DINAMIS</option>
                                                <option value="IP_STATIS">IP STATIS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Login Info Section (Moved from sidebar) -->
                                    <hr class="my-4">
                                    <h6 class="mb-3"><i class="ti ti-key me-2"></i>Informasi Login</h6>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Auto-generated" readonly>
                                            <small class="form-text text-muted">Username akan dibuat otomatis</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Auto-generated" readonly>
                                                <button class="btn btn-outline-primary" type="button" id="togglePassword">
                                                    <i class="ti ti-eye-off"></i>
                                                </button>
                                                <button class="btn btn-outline-success" type="button" onclick="generatePassword()">
                                                    <i class="ti ti-refresh"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="password_clientarea" class="form-label">Password Clientarea</label>
                                            <input type="text" class="form-control" id="password_clientarea" name="password_clientarea" placeholder="Sama dengan No. HP">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="catatan" class="form-label">Catatan <span class="text-danger">- Optional</span></label>
                                            <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan tambahan">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Customer Form Card -->
            </div>
            <!--/ Main Form Section -->

            <!-- Right Sidebar Section -->
            <div class="col-xl-4 col-lg-5">
                <!-- Maps Picker Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-map-pin me-2"></i>Lokasi Pelanggan
                        </h5>
                        <small class="text-muted">Drag marker untuk menentukan lokasi</small>
                    </div>
                    <div class="card-body">
                        <!-- Map Container -->
                        <div id="customer-map" style="height: 300px; border-radius: 8px; background: #e9ecef; position: relative; overflow: hidden;">
                            <!-- Map will be initialized here -->
                        </div>
                        
                        <!-- Coordinates Display -->
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label small">Latitude</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <i class="ti ti-map-pin-2"></i>
                                        </span>
                                        <input type="text" class="form-control" id="display_latitude" placeholder="-6.900657">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label small">Longitude</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <i class="ti ti-map-pin-2"></i>
                                        </span>
                                        <input type="text" class="form-control" id="display_longitude" placeholder="107.846051">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Map Actions -->
                        <div class="mt-3 d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="getCurrentLocation()">
                                <i class="ti ti-current-location me-1"></i>Lokasi Saya
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearLocation()">
                                <i class="ti ti-x me-1"></i>Clear
                            </button>
                        </div>
                        
                        <!-- Address Reverse Geocoding -->
                        <div class="mt-3">
                            <label class="form-label small">Alamat Terdeteksi</label>
                            <div class="p-2 bg-light rounded text-small">
                                <span id="detected-address" class="text-muted">Pilih lokasi di map untuk deteksi alamat</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Maps Picker Card -->

                <!-- Form Guide Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Panduan Pengisian</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info border-0">
                            <h6 class="alert-heading"><i class="ti ti-info-circle me-2"></i>Penutihan Nominal:</h6>
                            <ul class="mb-0 small">
                                <li class="text-success">NAMA PELANGGAN BELUM, GUNAKAN TITIK (.) UNTUK PECAHAN</li>
                                <li class="text-primary">FEE RESELLER : BOLEH DISET MANUAL ATAU SET KE NOL (0)</li>
                            </ul>
                        </div>
                        
                        <div class="alert alert-warning border-0">
                            <h6 class="alert-heading"><i class="ti ti-alert-triangle me-2"></i>Periode & Jatuh Tempo:</h6>
                            <ul class="mb-0 small">
                                <li class="text-dark">JIKA AKTIF TEMPO TIDAK DITENTUKAN, PERHITUNGAN PRIORITAS OTOMATIS AKAN DIABAIKAN</li>
                                <li class="text-primary">PEMBAGIAN AKTIF TEMPO DAN PRIORITAS TIDAK BISA DIJALANKAN UNTUK PAKET UNLIMITED</li>
                            </ul>
                        </div>

                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center px-0">
                                <div class="avatar avatar-xs me-2">
                                    <span class="avatar-initial bg-label-primary rounded-circle">1</span>
                                </div>
                                <small>Isi data pelanggan pada tab Info Pelanggan</small>
                            </div>
                            <div class="list-group-item d-flex align-items-center px-0">
                                <div class="avatar avatar-xs me-2">
                                    <span class="avatar-initial bg-label-primary rounded-circle">2</span>
                                </div>
                                <small>Pilih paket dan konfigurasi pada tab Paket Langganan</small>
                            </div>
                            <div class="list-group-item d-flex align-items-center px-0">
                                <div class="avatar avatar-xs me-2">
                                    <span class="avatar-initial bg-label-primary rounded-circle">3</span>
                                </div>
                                <small>Login credentials akan di-generate otomatis</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Form Guide Card -->
            </div>
            <!--/ Right Sidebar Section -->
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set today's date for activation
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('aktivasi').value = today;
    
    // Calculate due date (1 month from activation)
    const nextMonth = new Date();
    nextMonth.setMonth(nextMonth.getMonth() + 1);
    document.getElementById('jatuh_tempo').value = nextMonth.toISOString().split('T')[0];
    
    // Generate customer ID
    generateCustomerID();
    
    // Initialize form listeners
    initializeFormListeners();
});

function initializeFormListeners() {
    // Auto-generate username when customer name changes
    document.getElementById('nama_pelanggan').addEventListener('input', function() {
        generateUsername();
    });
    
    // Auto-fill password clientarea with phone number
    document.getElementById('no_hp').addEventListener('input', function() {
        document.getElementById('password_clientarea').value = this.value;
    });
    
    // Package selection updates pricing
    document.getElementById('paket_langganan').addEventListener('change', function() {
        updatePricing();
    });
    
    // PPN checkbox calculation
    document.getElementById('tagihan_ppn').addEventListener('change', function() {
        calculatePPN();
    });
    
    // Password toggle functionality
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.className = 'ti ti-eye';
        } else {
            passwordField.type = 'password';
            icon.className = 'ti ti-eye-off';
        }
    });
}

function generateCustomerID() {
    // Generate random 9-digit customer ID
    const customerID = Math.floor(100000000 + Math.random() * 900000000);
    document.getElementById('id_pelanggan').value = customerID;
    generateUsername();
    generatePassword();
}

function generateUsername() {
    const customerID = document.getElementById('id_pelanggan').value;
    const customerName = document.getElementById('nama_pelanggan').value;
    
    if (customerID && customerName) {
        // Create username format: dw[first4digits]@daret.id
        const shortID = customerID.toString().substring(0, 4);
        const username = `dw${shortID}@daret.id`;
        document.getElementById('username').value = username;
    }
}

function generatePassword() {
    // Generate random 6-character alphanumeric password
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let password = '';
    for (let i = 0; i < 6; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('password').value = password;
}

function updatePricing() {
    const packageSelect = document.getElementById('paket_langganan');
    const selectedOption = packageSelect.options[packageSelect.selectedIndex];
    
    if (selectedOption.value) {
        // Extract price from option text (e.g., "Rp. 150.000,00")
        const priceMatch = selectedOption.text.match(/Rp\. ([\d.,]+)/);
        if (priceMatch) {
            const price = priceMatch[1].replace(/[.,]/g, '');
            document.getElementById('tagihan_dasar').value = price;
            calculatePPN();
        }
    }
}

function calculatePPN() {
    const basePrice = parseInt(document.getElementById('tagihan_dasar').value) || 0;
    const ppnChecked = document.getElementById('tagihan_ppn').checked;
    
    if (ppnChecked && basePrice > 0) {
        const ppnAmount = Math.round(basePrice * 0.11);
        const totalPrice = basePrice + ppnAmount;
        
        // Show PPN calculation (you can add UI elements for this)
        console.log(`Base: ${basePrice}, PPN: ${ppnAmount}, Total: ${totalPrice}`);
    }
}

function addNewODP() {
    // Modal or form to add new ODP/POP
    alert('Fitur tambah ODP/POP akan dibuka di modal terpisah');
}

function resetForm() {
    if (confirm('Apakah Anda yakin ingin mereset form? Semua data yang sudah diisi akan hilang.')) {
        // Reset all form fields
        document.getElementById('formInfoPelanggan').reset();
        document.getElementById('formPaketLangganan').reset();
        
        // Reset additional fields
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        document.getElementById('password_clientarea').value = '';
        document.getElementById('catatan').value = '';
        
        // Regenerate defaults
        generateCustomerID();
        
        // Switch back to first tab
        const firstTab = document.querySelector('[data-bs-target="#info-pelanggan"]');
        const firstTabPane = document.getElementById('info-pelanggan');
        
        // Remove validation classes
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.is-valid').forEach(el => el.classList.remove('is-valid'));
        
        // Show success message
        showNotification('success', 'Form berhasil direset!');
    }
}

function saveCustomer() {
    // Validate required fields
    if (!validateForm()) {
        showNotification('error', 'Mohon lengkapi semua field yang wajib diisi!');
        return;
    }
    
    // Show loading state
    const btn = document.getElementById('btnSimpan') || event.target;
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="ti ti-loader ti-spin me-2"></i>Menyimpan...';
    
    // Simulate API call
    setTimeout(function() {
        // Reset button
        btn.disabled = false;
        btn.innerHTML = originalText;
        
        // Show success message
        showNotification('success', 'Data pelanggan berhasil disimpan!');
        
        // Optional: Reset form after success
        // resetForm();
    }, 2000);
}

function validateForm() {
    let isValid = true;
    const requiredFields = [
        'nama_pelanggan',
        'no_ktp', 
        'no_hp',
        'email',
        'alamat',
        'paket_langganan'
    ];
    
    // Reset previous validation
    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    
    // Check required fields
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field && (!field.value || field.value.trim() === '')) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });
    
    // Email validation
    const emailField = document.getElementById('email');
    if (emailField.value) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailField.value)) {
            emailField.classList.add('is-invalid');
            isValid = false;
        }
    }
    
    // Phone number validation (Indonesian format)
    const phoneField = document.getElementById('no_hp');
    if (phoneField.value) {
        const phonePattern = /^8[0-9]{8,12}$/;
        if (!phonePattern.test(phoneField.value)) {
            phoneField.classList.add('is-invalid');
            isValid = false;
        }
    }
    
    // KTP validation (16 digits)
    const ktpField = document.getElementById('no_ktp');
    if (ktpField.value) {
        const ktpPattern = /^[0-9]{16}$/;
        if (!ktpPattern.test(ktpField.value)) {
            ktpField.classList.add('is-invalid');
            isValid = false;
        }
    }
    
    return isValid;
}

function showNotification(type, message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        <i class="ti ti-${type === 'success' ? 'check' : 'x'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// Additional utility functions
function formatCurrency(value) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(value);
}

function formatPhoneNumber(value) {
    // Remove non-digits and ensure starts with 8
    let phone = value.replace(/\D/g, '');
    if (phone.startsWith('0')) {
        phone = phone.substring(1);
    }
    if (!phone.startsWith('8')) {
        phone = '8' + phone;
    }
    return phone;
}

function validateKTP(value) {
    // KTP must be 16 digits
    return /^[0-9]{16}$/.test(value);
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Form field event handlers
function handleFieldChange(fieldId, validationFn) {
    const field = document.getElementById(fieldId);
    if (field) {
        field.addEventListener('input', function() {
            if (validationFn && !validationFn(this.value)) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
// Initialize field validation on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set today's date for activation
    const today = new Date().toISOString().split('T')[0];
    const aktivasiField = document.getElementById('aktivasi');
    if (aktivasiField) {
        aktivasiField.value = today;
    }
    
    // Calculate due date (1 month from activation)  
    const nextMonth = new Date();
    nextMonth.setMonth(nextMonth.getMonth() + 1);
    const jatuhTempoField = document.getElementById('jatuh_tempo');
    if (jatuhTempoField) {
        jatuhTempoField.value = nextMonth.toISOString().split('T')[0];
    }
    
    // Generate customer ID and credentials
    generateCustomerID();
    
    // Initialize all form listeners
    initializeFormListeners();
    initFieldValidation();
    
    // Bootstrap tab fix for proper functionality
    const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
    tabLinks.forEach(tabLink => {
        tabLink.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-bs-target');
            
            // Remove active from all tabs and panes
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });
            
            // Add active to clicked tab and target pane
            this.classList.add('active');
            const targetPane = document.querySelector(targetId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
            }
        });
    });
});

// Additional helper functions for better UX
function switchToInfoTab() {
    const infoTab = document.querySelector('[data-bs-target="#info-pelanggan"]');
    if (infoTab) {
        infoTab.click();
    }
}

function switchToPaketTab() {
    const paketTab = document.querySelector('[data-bs-target="#paket-langganan"]');
    if (paketTab) {
        paketTab.click();
    }
}

// Real-time field validation feedback
function addValidationFeedback() {
    const style = document.createElement('style');
    style.textContent = `
        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        
        .form-control.is-valid {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }
        
        .valid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #28a745;
        }
        
        /* Tab transition animation */
        .tab-pane {
            transition: opacity 0.15s ease-in-out;
        }
        
        .tab-pane:not(.show) {
            opacity: 0;
        }
        
        .tab-pane.show {
            opacity: 1;
        }
        
        /* Button loading state */
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        /* Form focus improvements */
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        /* Alert animations */
        .alert {
            animation: slideInRight 0.3s ease-out;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Progress indicator for form completion */
        .form-progress {
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .form-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #007bff, #28a745);
            transition: width 0.3s ease;
        }
    `;
    document.head.appendChild(style);
}

// Initialize validation feedback styles
addValidationFeedback();

// Form completion progress tracker
function updateFormProgress() {
    const allFields = document.querySelectorAll('input[required], select[required]');
    const filledFields = Array.from(allFields).filter(field => field.value.trim() !== '');
    const progress = (filledFields.length / allFields.length) * 100;
    
    // Update progress bar if exists
    const progressBar = document.querySelector('.form-progress-bar');
    if (progressBar) {
        progressBar.style.width = progress + '%';
    }
    
    return progress;
}

// Auto-save draft to localStorage (optional feature)
function saveDraft() {
    const formData = {
        // Info Pelanggan
        id_pelanggan: document.getElementById('id_pelanggan')?.value || '',
        nama_pelanggan: document.getElementById('nama_pelanggan')?.value || '',
        nama_kontak: document.getElementById('nama_kontak')?.value || '',
        no_ktp: document.getElementById('no_ktp')?.value || '',
        no_hp: document.getElementById('no_hp')?.value || '',
        email: document.getElementById('email')?.value || '',
        alamat: document.getElementById('alamat')?.value || '',
        latitude: document.getElementById('latitude')?.value || '',
        longitude: document.getElementById('longitude')?.value || '',
        
        // Paket Langganan  
        status_registrasi: document.querySelector('input[name="status_registrasi"]:checked')?.value || '',
        tipe_pelanggan: document.querySelector('input[name="tipe_pelanggan"]:checked')?.value || '',
        server_service: document.getElementById('server_service')?.value || '',
        tipe_pembayaran: document.getElementById('tipe_pembayaran')?.value || '',
        status_bayar: document.getElementById('status_bayar')?.value || '',
        status_akun: document.getElementById('status_akun')?.value || '',
        paket_langganan: document.getElementById('paket_langganan')?.value || '',
        
        // Login Info
        username: document.getElementById('username')?.value || '',
        password: document.getElementById('password')?.value || '',
        catatan: document.getElementById('catatan')?.value || ''
    };
    
    localStorage.setItem('customer_draft', JSON.stringify(formData));
}

// Load draft from localStorage
function loadDraft() {
    const draft = localStorage.getItem('customer_draft');
    if (draft) {
        const formData = JSON.parse(draft);
        
        // Fill form fields
        Object.keys(formData).forEach(key => {
            const field = document.getElementById(key);
            if (field) {
                if (field.type === 'radio') {
                    const radioField = document.querySelector(`input[name="${key}"][value="${formData[key]}"]`);
                    if (radioField) radioField.checked = true;
                } else {
                    field.value = formData[key];
                }
            }
        });
    }
}

// Clear draft
function clearDraft() {
    localStorage.removeItem('customer_draft');
}

// Enhanced form validation with better UX
function enhancedValidation() {
    const requiredFields = document.querySelectorAll('input[required], select[required]');
    
    requiredFields.forEach(field => {
        // Add real-time validation
        field.addEventListener('blur', function() {
            validateSingleField(this);
        });
        
        field.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) {
                validateSingleField(this);
            }
            // Auto-save draft
            saveDraft();
            // Update progress
            updateFormProgress();
        });
    });
}

function validateSingleField(field) {
    let isValid = true;
    let message = '';
    
    // Remove existing feedback
    const existingFeedback = field.parentNode.querySelector('.invalid-feedback, .valid-feedback');
    if (existingFeedback) {
        existingFeedback.remove();
    }
    
    // Check if required field is empty
    if (field.hasAttribute('required') && !field.value.trim()) {
        isValid = false;
        message = 'Field ini wajib diisi';
    }
    
    // Specific validations
    if (field.id === 'email' && field.value) {
        if (!validateEmail(field.value)) {
            isValid = false;
            message = 'Format email tidak valid';
        }
    }
    
    if (field.id === 'no_hp' && field.value) {
        if (!/^8[0-9]{8,12}$/.test(field.value)) {
            isValid = false;
            message = 'Nomor HP harus diawali 8 dan 9-13 digit';
        }
    }
    
    if (field.id === 'no_ktp' && field.value) {
        if (!/^[0-9]{16}$/.test(field.value)) {
            isValid = false;
            message = 'Nomor KTP harus 16 digit';
        }
    }
    
    // Apply validation classes and feedback
    if (isValid) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
        if (field.value.trim()) {
            const feedback = document.createElement('div');
            feedback.className = 'valid-feedback';
            feedback.textContent = 'Valid';
            field.parentNode.appendChild(feedback);
        }
    } else {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        const feedback = document.createElement('div');
        feedback.className = 'invalid-feedback';
        feedback.textContent = message;
        field.parentNode.appendChild(feedback);
    }
    
    return isValid;
}

// Initialize enhanced validation
setTimeout(() => {
    enhancedValidation();
    // Load draft if exists
    loadDraft();
}, 100);

// ============= MAPS FUNCTIONALITY =============
let map;
let marker;
let isMapInitialized = false;

function initializeMap() {
    if (isMapInitialized) return;
    
    const mapContainer = document.getElementById('customer-map');
    const mapCanvas = document.getElementById('map-canvas');
    
    // Show loading
    mapContainer.innerHTML = `
        <div class="d-flex align-items-center justify-content-center h-100 flex-column">
            <div class="spinner-border text-primary mb-2" role="status"></div>
            <p class="text-muted">Memuat maps...</p>
        </div>
    `;
    
    // Simulate map loading (replace with actual map implementation)
    setTimeout(() => {
        // Create interactive map placeholder
        mapContainer.innerHTML = `
            <div id="interactive-map" style="width: 100%; height: 300px; background: linear-gradient(45deg, #e3f2fd, #f3e5f5); border-radius: 8px; position: relative; cursor: crosshair;">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <div id="map-marker" class="text-danger" style="font-size: 24px; cursor: grab;">
                        <i class="ti ti-map-pin"></i>
                    </div>
                </div>
                <div class="position-absolute bottom-0 start-0 p-2">
                    <small class="text-muted bg-white px-2 py-1 rounded">Drag marker atau klik untuk set lokasi</small>
                </div>
            </div>
        `;
        
        setupMapInteractions();
        isMapInitialized = true;
    }, 1500);
}

function setupMapInteractions() {
    const mapElement = document.getElementById('interactive-map');
    const mapMarker = document.getElementById('map-marker');
    let isDragging = false;
    
    // Default location (Indonesia center)
    let currentLat = -2.5489;
    let currentLng = 118.0149;
    
    // Map click handler
    mapElement.addEventListener('click', function(e) {
        if (isDragging) return;
        
        const rect = mapElement.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        // Convert pixel coordinates to lat/lng (simplified calculation)
        const lat = -6.2 + (y / rect.height) * 12.4; // Approximate Indonesia bounds
        const lng = 95.0 + (x / rect.width) * 46.0;
        
        updateMapLocation(lat, lng, x, y);
    });
    
    // Marker drag handlers
    mapMarker.addEventListener('mousedown', function(e) {
        isDragging = true;
        mapMarker.style.cursor = 'grabbing';
        e.preventDefault();
    });
    
    document.addEventListener('mousemove', function(e) {
        if (!isDragging) return;
        
        const mapRect = mapElement.getBoundingClientRect();
        const x = e.clientX - mapRect.left;
        const y = e.clientY - mapRect.top;
        
        // Keep marker within map bounds
        if (x >= 0 && x <= mapRect.width && y >= 0 && y <= mapRect.height) {
            const lat = -6.2 + (y / mapRect.height) * 12.4;
            const lng = 95.0 + (x / mapRect.width) * 46.0;
            
            // Update marker position
            mapMarker.style.left = x - 12 + 'px';
            mapMarker.style.top = y - 24 + 'px';
            mapMarker.style.position = 'absolute';
            
            // Update coordinates
            updateCoordinates(lat, lng);
        }
    });
    
    document.addEventListener('mouseup', function() {
        if (isDragging) {
            isDragging = false;
            mapMarker.style.cursor = 'grab';
        }
    });
}

function updateMapLocation(lat, lng, x, y) {
    const mapMarker = document.getElementById('map-marker');
    
    // Update marker position
    mapMarker.style.left = x - 12 + 'px';
    mapMarker.style.top = y - 24 + 'px';
    mapMarker.style.position = 'absolute';
    
    // Update coordinates
    updateCoordinates(lat, lng);
    
    // Simulate reverse geocoding
    reverseGeocode(lat, lng);
}

function updateCoordinates(lat, lng) {
    // Format coordinates to 6 decimal places
    const formattedLat = lat.toFixed(6);
    const formattedLng = lng.toFixed(6);
    
    // Update display fields
    document.getElementById('display_latitude').value = formattedLat;
    document.getElementById('display_longitude').value = formattedLng;
    
    // Update form fields
    document.getElementById('latitude').value = formattedLat;
    document.getElementById('longitude').value = formattedLng;
}

function reverseGeocode(lat, lng) {
    const addressDisplay = document.getElementById('detected-address');
    addressDisplay.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i>Mencari alamat...';
    
    // Simulate reverse geocoding API call
    setTimeout(() => {
        // Mock address based on coordinates
        const addresses = [
            'Jl. Sudirman No. 123, Jakarta Pusat',
            'Jl. Malioboro No. 45, Yogyakarta',  
            'Jl. Asia Afrika No. 67, Bandung',
            'Jl. Thamrin No. 89, Jakarta Pusat',
            'Jl. Gajah Mada No. 12, Semarang'
        ];
        
        const randomAddress = addresses[Math.floor(Math.random() * addresses.length)];
        addressDisplay.innerHTML = `<i class="ti ti-map-pin me-1 text-success"></i>${randomAddress}`;
        
        // Auto-fill address field if empty
        const addressField = document.getElementById('alamat');
        if (addressField && !addressField.value.trim()) {
            addressField.value = randomAddress;
        }
    }, 2000);
}

function getCurrentLocation() {
    if (navigator.geolocation) {
        const addressDisplay = document.getElementById('detected-address');
        addressDisplay.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i>Mendapatkan lokasi...';
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                // Update map and coordinates
                updateCoordinates(lat, lng);
                
                // Center marker on map
                const mapElement = document.getElementById('interactive-map');
                const mapMarker = document.getElementById('map-marker');
                if (mapElement && mapMarker) {
                    const rect = mapElement.getBoundingClientRect();
                    mapMarker.style.left = (rect.width / 2) - 12 + 'px';
                    mapMarker.style.top = (rect.height / 2) - 24 + 'px';
                    mapMarker.style.position = 'absolute';
                }
                
                reverseGeocode(lat, lng);
                showNotification('success', 'Lokasi berhasil didapatkan!');
            },
            function(error) {
                addressDisplay.innerHTML = '<i class="ti ti-alert-circle me-1 text-warning"></i>Tidak dapat mendapatkan lokasi';
                showNotification('error', 'Gagal mendapatkan lokasi: ' + error.message);
            }
        );
    } else {
        showNotification('error', 'Browser tidak mendukung geolocation');
    }
}

function clearLocation() {
    // Clear coordinates
    document.getElementById('display_latitude').value = '';
    document.getElementById('display_longitude').value = '';
    document.getElementById('latitude').value = '';
    document.getElementById('longitude').value = '';
    
    // Clear detected address
    document.getElementById('detected-address').innerHTML = 'Pilih lokasi di map untuk deteksi alamat';
    
    // Reset marker to center
    const mapMarker = document.getElementById('map-marker');
    if (mapMarker) {
        mapMarker.style.left = '';
        mapMarker.style.top = '';
        mapMarker.style.position = '';
    }
    
    showNotification('success', 'Lokasi berhasil dihapus');
}

// Auto-sync coordinates between display and form fields
function syncCoordinates() {
    const displayLat = document.getElementById('display_latitude');
    const displayLng = document.getElementById('display_longitude');
    const formLat = document.getElementById('latitude');
    const formLng = document.getElementById('longitude');
    
    if (displayLat && formLat) {
        displayLat.addEventListener('input', () => formLat.value = displayLat.value);
        formLat.addEventListener('input', () => displayLat.value = formLat.value);
    }
    
    if (displayLng && formLng) {
        displayLng.addEventListener('input', () => formLng.value = displayLng.value);
        formLng.addEventListener('input', () => displayLng.value = formLng.value);
    }
}

    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->

<!-- Include Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
// ============= GLOBAL VARIABLES =============
let map;
let marker;
let isMapInitialized = false;

document.addEventListener('DOMContentLoaded', function() {
    // Set today's date for activation
    const today = new Date().toISOString().split('T')[0];
    const aktivasiField = document.getElementById('aktivasi');
    if (aktivasiField) {
        aktivasiField.value = today;
    }
    
    // Calculate due date (1 month from activation)  
    const nextMonth = new Date();
    nextMonth.setMonth(nextMonth.getMonth() + 1);
    const jatuhTempoField = document.getElementById('jatuh_tempo');
    if (jatuhTempoField) {
        jatuhTempoField.value = nextMonth.toISOString().split('T')[0];
    }
    
    // Generate customer ID and credentials
    generateCustomerID();
    
    // Initialize all form listeners
    initializeFormListeners();
    
    // Initialize maps immediately
    setTimeout(initializeMap, 500);
    
    // Bootstrap tab fix for proper functionality
    const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
    tabLinks.forEach(tabLink => {
        tabLink.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-bs-target');
            
            // Remove active from all tabs and panes
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });
            
            // Add active to clicked tab and target pane
            this.classList.add('active');
            const targetPane = document.querySelector(targetId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
            }
        });
    });
});

function initializeFormListeners() {
    // Auto-generate username when customer name changes
    document.getElementById('nama_pelanggan').addEventListener('input', function() {
        generateUsername();
    });
    
    // Auto-fill password clientarea with phone number
    document.getElementById('no_hp').addEventListener('input', function() {
        document.getElementById('password_clientarea').value = '+62' + this.value;
    });
    
    // Package selection updates pricing
    document.getElementById('paket_langganan').addEventListener('change', function() {
        updatePricing();
    });
    
    // PPN checkbox calculation
    document.getElementById('tagihan_ppn').addEventListener('change', function() {
        calculatePPN();
    });
    
    // Password toggle functionality
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.className = 'ti ti-eye';
        } else {
            passwordField.type = 'password';
            icon.className = 'ti ti-eye-off';
        }
    });
    
    // Coordinate field synchronization
    syncCoordinateFields();
}

function generateCustomerID() {
    const customerID = Math.floor(100000000 + Math.random() * 900000000);
    document.getElementById('id_pelanggan').value = customerID;
    generateUsername();
    generatePassword();
}

function generateUsername() {
    const customerID = document.getElementById('id_pelanggan').value;
    const customerName = document.getElementById('nama_pelanggan').value;
    
    if (customerID && customerName) {
        const shortID = customerID.toString().substring(0, 4);
        const username = `dw${shortID}@daret.id`;
        document.getElementById('username').value = username;
    }
}

function generatePassword() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let password = '';
    for (let i = 0; i < 6; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('password').value = password;
}

function updatePricing() {
    const packageSelect = document.getElementById('paket_langganan');
    const selectedOption = packageSelect.options[packageSelect.selectedIndex];
    
    if (selectedOption.value) {
        const priceMatch = selectedOption.text.match(/Rp\. ([\d.,]+)/);
        if (priceMatch) {
            const price = priceMatch[1].replace(/[.,]/g, '');
            document.getElementById('tagihan_dasar').value = price;
            calculatePPN();
        }
    }
}

function calculatePPN() {
    const basePrice = parseInt(document.getElementById('tagihan_dasar').value) || 0;
    const ppnChecked = document.getElementById('tagihan_ppn').checked;
    
    if (ppnChecked && basePrice > 0) {
        const ppnAmount = Math.round(basePrice * 0.11);
        const totalPrice = basePrice + ppnAmount;
        console.log(`Base: ${basePrice}, PPN: ${ppnAmount}, Total: ${totalPrice}`);
    }
}

// ============= MAPS FUNCTIONALITY =============
function initializeMap() {
    if (isMapInitialized) return;
    
    try {
        // Default coordinates (Bandung, Indonesia)
        const defaultLat = -6.9175;
        const defaultLng = 107.6191;
        
        // Initialize Leaflet map
        map = L.map('customer-map').setView([defaultLat, defaultLng], 13);
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Add draggable marker
        marker = L.marker([defaultLat, defaultLng], {
            draggable: true
        }).addTo(map);
        
        // Update coordinates when marker is dragged
        marker.on('dragend', function(e) {
            const position = e.target.getLatLng();
            updateCoordinates(position.lat, position.lng);
            reverseGeocode(position.lat, position.lng);
        });
        
        // Add click event to map
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;
            
            // Move marker to clicked position
            marker.setLatLng([lat, lng]);
            updateCoordinates(lat, lng);
            reverseGeocode(lat, lng);
        });
        
        // Set initial coordinates
        updateCoordinates(defaultLat, defaultLng);
        
        isMapInitialized = true;
        console.log('Map initialized successfully');
        
    } catch (error) {
        console.error('Error initializing map:', error);
        // Fallback if Leaflet fails
        document.getElementById('customer-map').innerHTML = `
            <div class="d-flex align-items-center justify-content-center h-100 flex-column text-danger">
                <i class="ti ti-map-off display-1 mb-3"></i>
                <p>Maps tidak dapat dimuat</p>
                <small>Silakan isi koordinat manual</small>
            </div>
        `;
    }
}

function updateCoordinates(lat, lng) {
    const formattedLat = lat.toFixed(6);
    const formattedLng = lng.toFixed(6);
    
    // Update display fields
    document.getElementById('display_latitude').value = formattedLat;
    document.getElementById('display_longitude').value = formattedLng;
    
    // Update form fields
    document.getElementById('latitude').value = formattedLat;
    document.getElementById('longitude').value = formattedLng;
}

function reverseGeocode(lat, lng) {
    const addressDisplay = document.getElementById('detected-address');
    addressDisplay.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i>Mencari alamat...';
    
    // Use Nominatim reverse geocoding (free)
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`)
        .then(response => response.json())
        .then(data => {
            if (data.display_name) {
                addressDisplay.innerHTML = `<i class="ti ti-map-pin me-1 text-success"></i>${data.display_name}`;
                
                // Auto-fill address field if empty
                const addressField = document.getElementById('alamat');
                if (addressField && !addressField.value.trim()) {
                    addressField.value = data.display_name;
                }
            } else {
                addressDisplay.innerHTML = '<i class="ti ti-alert-circle me-1 text-warning"></i>Alamat tidak ditemukan';
            }
        })
        .catch(error => {
            console.error('Reverse geocoding error:', error);
            addressDisplay.innerHTML = '<i class="ti ti-alert-circle me-1 text-warning"></i>Gagal mendapatkan alamat';
        });
}

function getCurrentLocation() {
    if (!navigator.geolocation) {
        showNotification('error', 'Browser tidak mendukung geolocation');
        return;
    }
    
    const addressDisplay = document.getElementById('detected-address');
    addressDisplay.innerHTML = '<i class="ti ti-loader ti-spin me-1"></i>Mendapatkan lokasi...';
    
    navigator.geolocation.getCurrentPosition(
        function(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            
            if (map && marker) {
                // Center map and move marker
                map.setView([lat, lng], 15);
                marker.setLatLng([lat, lng]);
            }
            
            updateCoordinates(lat, lng);
            reverseGeocode(lat, lng);
            showNotification('success', 'Lokasi berhasil didapatkan!');
        },
        function(error) {
            addressDisplay.innerHTML = '<i class="ti ti-alert-circle me-1 text-warning"></i>Tidak dapat mendapatkan lokasi';
            showNotification('error', 'Gagal mendapatkan lokasi: ' + error.message);
        },
        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 60000
        }
    );
}

function clearLocation() {
    // Clear coordinates
    document.getElementById('display_latitude').value = '';
    document.getElementById('display_longitude').value = '';
    document.getElementById('latitude').value = '';
    document.getElementById('longitude').value = '';
    
    // Clear detected address
    document.getElementById('detected-address').innerHTML = 'Pilih lokasi di map untuk deteksi alamat';
    
    // Reset marker to default position if map exists
    if (map && marker) {
        const defaultLat = -6.9175;
        const defaultLng = 107.6191;
        map.setView([defaultLat, defaultLng], 13);
        marker.setLatLng([defaultLat, defaultLng]);
    }
    
    showNotification('success', 'Lokasi berhasil dihapus');
}

function syncCoordinateFields() {
    const displayLat = document.getElementById('display_latitude');
    const displayLng = document.getElementById('display_longitude');
    const formLat = document.getElementById('latitude');
    const formLng = document.getElementById('longitude');
    
    // Sync display to form
    displayLat.addEventListener('input', function() {
        formLat.value = this.value;
        updateMapFromCoordinates();
    });
    
    displayLng.addEventListener('input', function() {
        formLng.value = this.value;
        updateMapFromCoordinates();
    });
    
    // Sync form to display
    formLat.addEventListener('input', function() {
        displayLat.value = this.value;
        updateMapFromCoordinates();
    });
    
    formLng.addEventListener('input', function() {
        displayLng.value = this.value;
        updateMapFromCoordinates();
    });
}

function updateMapFromCoordinates() {
    const lat = parseFloat(document.getElementById('latitude').value);
    const lng = parseFloat(document.getElementById('longitude').value);
    
    if (!isNaN(lat) && !isNaN(lng) && map && marker) {
        map.setView([lat, lng], 15);
        marker.setLatLng([lat, lng]);
    }
}

// ============= FORM VALIDATION & SUBMISSION =============
function resetForm() {
    if (confirm('Apakah Anda yakin ingin mereset form? Semua data yang sudah diisi akan hilang.')) {
        document.getElementById('formInfoPelanggan').reset();
        document.getElementById('formPaketLangganan').reset();
        
        // Clear additional fields
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        document.getElementById('password_clientarea').value = '';
        document.getElementById('display_latitude').value = '';
        document.getElementById('display_longitude').value = '';
        
        // Clear detected address
        document.getElementById('detected-address').innerHTML = 'Pilih lokasi di map untuk deteksi alamat';
        
        // Reset map
        if (map && marker) {
            const defaultLat = -6.9175;
            const defaultLng = 107.6191;
            map.setView([defaultLat, defaultLng], 13);
            marker.setLatLng([defaultLat, defaultLng]);
        }
        
        // Regenerate defaults
        generateCustomerID();
        
        // Remove validation classes
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.is-valid').forEach(el => el.classList.remove('is-valid'));
        
        // Switch back to first tab
        document.querySelector('[data-bs-target="#info-pelanggan"]').click();
        
        showNotification('success', 'Form berhasil direset!');
    }
}

function saveCustomer() {
    // Validate required fields
    if (!validateForm()) {
        showNotification('error', 'Mohon lengkapi semua field yang wajib diisi!');
        return;
    }
    
    // Show loading state
    const btn = event.target;
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="ti ti-loader ti-spin me-2"></i>Menyimpan...';
    
    // Simulate API call
    setTimeout(function() {
        // Reset button
        btn.disabled = false;
        btn.innerHTML = originalText;
        
        // Show success message
        showNotification('success', 'Data pelanggan berhasil disimpan!');
    }, 2000);
}

function validateForm() {
    let isValid = true;
    const requiredFields = [
        'nama_pelanggan',
        'no_ktp', 
        'no_hp',
        'email',
        'alamat',
        'paket_langganan'
    ];
    
    // Reset previous validation
    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    
    // Check required fields
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field && (!field.value || field.value.trim() === '')) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });
    
    return isValid;
}

function showNotification(type, message) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        <i class="ti ti-${type === 'success' ? 'check' : 'x'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

function addNewODP() {
    alert('Fitur tambah ODP/POP akan dibuka di modal terpisah');
}

</script>

@endsection

// Initialize field validation
function initFieldValidation() {
    handleFieldChange('email', validateEmail);
    handleFieldChange('no_ktp', validateKTP);
    handleFieldChange('no_hp', (value) => /^8[0-9]{8,12}$/.test(value));
    
    // Auto-format phone number
    const phoneField = document.getElementById('no_hp');
    if (phoneField) {
        phoneField.addEventListener('input', function() {
            this.value = formatPhoneNumber(this.value);
        });
    }
    
    // Auto-fill password clientarea with phone
    if (phoneField) {
        phoneField.addEventListener('input', function() {
            const clientareaField = document.getElementById('password_clientarea');
            if (clientareaField) {
                clientareaField.value = '+62' + this.value;
            }
        });
    }
}