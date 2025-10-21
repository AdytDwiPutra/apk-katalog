    <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bold">Mamateh</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Main Navigation</span>
            </li>
            
            <li class="menu-item">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>

            {{-- <!-- Session User -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Session User">Product</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="session-hotspot.html" class="menu-link">
                    <div data-i18n="Hotspot">Hotspot</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="session-ppp.html" class="menu-link">
                    <div data-i18n="PPP">PPP</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Settings -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Pengaturan</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="settings-general.html" class="menu-link">
                    <div data-i18n="General">Pengaturan Umum</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="settings-users.html" class="menu-link">
                    <div data-i18n="Users">Manajemen User</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="settings-whatsapp.html" class="menu-link">
                    <div data-i18n="WhatsApp">WhatsApp API</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="settings-email.html" class="menu-link">
                    <div data-i18n="Email">Setting Email</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="settings-payment.html" class="menu-link">
                    <div data-i18n="Payment">Payment Gateway</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Router/NAS -->
            <li class="menu-item">
              <a href="{{route('router.nas')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-server"></i>
                <div data-i18n="Router">Router [ NAS ]</div>
              </a>
            </li>

            <!-- OLT Management -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-network"></i>
                <div data-i18n="OLT">Data OLT</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('olt.index')}}" class="menu-link">
                    <i class="ti ti-device-desktop-analytics"></i>
                    <div data-i18n="OLT">OLT</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="odf-list.html" class="menu-link">
                    <i class="ti ti-topology-star"></i>
                    <div data-i18n="ODF">ODF</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="odc-list.html" class="menu-link">
                    <i class="ti ti-building-warehouse"></i>
                    <div data-i18n="ODC">ODC</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="odp-list.html" class="menu-link">
                    <i class="ti ti-map-pin"></i>
                    <div data-i18n="ODP">ODP</div>
                  </a>
                </li>
              </ul>
            </li> --}}


            <!-- Customers -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Product Management</span>
            </li>

            <!-- Product -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Product">Product</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('products.index')}}" class="menu-link">
                    <div data-i18n="List Product">List Product</div>
                  </a>
                </li>
              </ul>
            </li>

            {{-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users-group"></i>
                <div data-i18n="Customers">List Pelanggan</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="customers-hotspot.html" class="menu-link">
                    <div data-i18n="Hotspot Users">User Hotspot</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{route('customer.index')}}" class="menu-link">
                    <div data-i18n="PPP Users">User PPP</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('customer.maps')}}" class="menu-link">
                    <div data-i18n="Map">Peta Pelanggan</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Customer Leads -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user-plus"></i>
                <div data-i18n="Leads">Customer Leads</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('customer.lead')}}" class="menu-link">
                    <div data-i18n="Leads Add">Tambah Calon Pelanggan</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="{{route('customer.lead.list')}}" class="menu-link">
                    <div data-i18n="Leads List">List Calon Pelanggan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('customer.lead.maps')}}" class="menu-link">
                    <div data-i18n="Leads Map">Peta Leads & ODP</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Pengajuan (BARU) -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-clipboard-check"></i>
              <div data-i18n="Submissions">Pengajuan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('finance.addpengajuan')}}" class="menu-link">
                  <div data-i18n="Add Submission">Tambah Pengajuan</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('finance.listpengajuan')}}" class="menu-link">
                  <div data-i18n="Submission List">List Pengajuan</div>
                </a>
              </li>
            </ul>
          </li>

            <!-- Vouchers -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-ticket"></i>
                <div data-i18n="Vouchers">Kartu Voucher</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="voucher-hotspot.html" class="menu-link">
                    <div data-i18n="Hotspot Voucher">Voucher Hotspot</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="voucher-ppp.html" class="menu-link">
                    <div data-i18n="PPP Voucher">Voucher PPP</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Billing -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Financial</span>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                <div data-i18n="Billing">Data Tagihan</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#allInvoiceModal" class="menu-link">
                    <div data-i18n="All Invoices">Semua Tagihan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#periodInvoiceModal" class="menu-link">
                    <div data-i18n="Period Invoices">Tagihan Periode</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-currency-dollar"></i>
                <div data-i18n="Finance">Data Keuangan</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('finance.rab')}}" class="menu-link">
                    <div data-i18n="RAB">RAB Dashboard</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#dailyReportModal" class="menu-link">
                    <div data-i18n="Daily Income">Income Harian</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#periodReportModal" class="menu-link">
                    <div data-i18n="Period Income">Income Periode</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="expense.html" class="menu-link">
                    <div data-i18n="Expense">Pengeluaran</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="profit-loss.html" class="menu-link">
                    <div data-i18n="Profit">Laba Rugi</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Support & Tools -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Support & Tools</span>
            </li>
            <!-- Tiket / Support -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons ti ti-ticket"></i>
    <div data-i18n="Tiket">Tiket Support</div>
  </a>
  <ul class="menu-sub">
    <li class="menu-item">
      <a href="{{ route('tickets.dashboard') }}" class="menu-link">
        <div data-i18n="Dashboard Tiket">Dashboard Tiket</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.index') }}" class="menu-link">
        <div data-i18n="List Tiket">Semua Tiket</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.create') }}" class="menu-link">
        <div data-i18n="Buat Tiket">Buat Tiket Baru</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.my-tickets') }}" class="menu-link">
        <div data-i18n="My Tickets">Tiket Saya</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">By Status</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.by-status', 'open') }}" class="menu-link">
        <div data-i18n="Open">
          <i class="ti ti-circle-filled text-warning ti-xs me-2"></i>Open
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.by-status', 'in-progress') }}" class="menu-link">
        <div data-i18n="In Progress">
          <i class="ti ti-circle-filled text-info ti-xs me-2"></i>In Progress
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.by-status', 'pending') }}" class="menu-link">
        <div data-i18n="Pending">
          <i class="ti ti-circle-filled text-secondary ti-xs me-2"></i>Pending
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.by-status', 'resolved') }}" class="menu-link">
        <div data-i18n="Resolved">
          <i class="ti ti-circle-filled text-success ti-xs me-2"></i>Resolved
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.by-status', 'closed') }}" class="menu-link">
        <div data-i18n="Closed">
          <i class="ti ti-circle-filled text-dark ti-xs me-2"></i>Closed
        </div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Analytics</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('tickets.analytics') }}" class="menu-link">
        <div data-i18n="Analytics">
          <i class="ti ti-chart-bar me-2"></i>Laporan & Analisis
        </div>
      </a>
    </li>
  </ul>
</li>



<!-- ============================================ -->
<!-- NEW: V2 TICKET SYSTEM - NOC SIMPLIFIED -->
<!-- ============================================ -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons ti ti-router"></i>
    <div data-i18n="NOC Tiket V2">NOC Dashboard V2</div>
    <div class="badge badge-center rounded-pill bg-danger ms-auto">NEW</div>
  </a>
  <ul class="menu-sub">
    <!-- Main Dashboard -->
    <li class="menu-item">
      <a href="{{ route('v2tiket.index') }}" class="menu-link">
        <i class="ti ti-dashboard ti-xs me-2"></i>
        <div data-i18n="NOC Dashboard">NOC Dashboard</div>
      </a>
    </li>
    
    <!-- Ticket Management -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Ticket Management</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.create') }}" class="menu-link">
        <i class="ti ti-plus ti-xs me-2"></i>
        <div data-i18n="Buat Tiket V2">Buat Tiket Baru</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.list') }}" class="menu-link">
        <i class="ti ti-list ti-xs me-2"></i>
        <div data-i18n="Semua Tiket V2">Semua Tiket</div>
      </a>
    </li>
    
    <!-- NOC Operations -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">NOC Operations</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.monitoring') }}" class="menu-link">
        <i class="ti ti-activity ti-xs me-2"></i>
        <div data-i18n="Network Monitoring">Network Monitoring</div>
      </a>
    </li>
    
    <!-- Quick Access -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Quick Access</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.handle', 'TKT-001') }}" class="menu-link">
        <i class="ti ti-tools ti-xs me-2"></i>
        <div data-i18n="Remote Troubleshoot">Remote Troubleshooting</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.escalate', 'TKT-001') }}" class="menu-link">
        <i class="ti ti-arrow-up ti-xs me-2"></i>
        <div data-i18n="Escalate Field">Escalate to Field</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.customer-history', 'CID-12345') }}" class="menu-link">
        <i class="ti ti-history ti-xs me-2"></i>
        <div data-i18n="Customer History">Customer History</div>
      </a>
    </li>
    
    <!-- Workflow Status -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">By Workflow Status</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.list') }}?status=new" class="menu-link">
        <div data-i18n="New Tickets">
          <i class="ti ti-circle-filled text-primary ti-xs me-2"></i>New Tickets
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.list') }}?status=remote_trying" class="menu-link">
        <div data-i18n="Remote Trying">
          <i class="ti ti-circle-filled text-warning ti-xs me-2"></i>Remote Trying
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.list') }}?status=field_assigned" class="menu-link">
        <div data-i18n="Field Assigned">
          <i class="ti ti-circle-filled text-info ti-xs me-2"></i>Field Assigned
        </div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.list') }}?status=resolved" class="menu-link">
        <div data-i18n="Resolved V2">
          <i class="ti ti-circle-filled text-success ti-xs me-2"></i>Resolved
        </div>
      </a>
    </li>
    
    <!-- Analytics & Reports -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Analytics</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.monitoring') }}" class="menu-link">
        <i class="ti ti-chart-dots ti-xs me-2"></i>
        <div data-i18n="Performance Analytics">Performance Analytics</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('v2tiket.list') }}" class="menu-link">
        <i class="ti ti-download ti-xs me-2"></i>
        <div data-i18n="Export Reports">Export Reports</div>
      </a>
    </li>
  </ul>
</li>





<!-- Add this to your main sidebar navigation -->

<!-- V3 Ticket System Menu -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons ti ti-ticket"></i>
    <div data-i18n="V3 Ticket System">V3 Ticket System</div>
    <span class="badge badge-center rounded-pill bg-danger ms-auto">NEW</span>
  </a>
  <ul class="menu-sub">
    
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="{{ route('v3tiket.dashboard') }}" class="menu-link">
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    
    <!-- Create Ticket -->
    <li class="menu-item">
      <a href="{{ route('v3tiket.create') }}" class="menu-link">
        <div data-i18n="Buat Tiket">Buat Tiket</div>
      </a>
    </li>
    
    <!-- List Tickets -->
    <li class="menu-item">
      <a href="{{ route('v3tiket.list') }}" class="menu-link">
        <div data-i18n="Semua Tiket">Semua Tiket</div>
      </a>
    </li>
    
    <!-- Infrastructure Monitoring -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <div data-i18n="Monitoring">Monitoring</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('v3tiket.monitoring') }}" class="menu-link">
            <div data-i18n="Overview">Overview</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('v3tiket.wireless.monitoring') }}" class="menu-link">
            <div data-i18n="Wireless">
              <i class="ti ti-wifi text-success me-1"></i>
              Wireless
            </div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('v3tiket.converter.monitoring') }}" class="menu-link">
            <div data-i18n="Converter FO">
              <i class="ti ti-network text-primary me-1"></i>
              Converter FO
            </div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('v3tiket.ftth.monitoring') }}" class="menu-link">
            <div data-i18n="FTTH">
              <i class="ti ti-home text-warning me-1"></i>
              FTTH
            </div>
          </a>
        </li>
      </ul>
    </li>
    
    <!-- Status Real-time -->
    <li class="menu-item">
      <a href="{{ route('v3tiket.status') }}" class="menu-link">
        <div data-i18n="Status Real-time">Status Real-time</div>
        <span class="badge rounded-pill bg-success ms-auto">LIVE</span>
      </a>
    </li>
    
  </ul>
</li>

<!-- Infrastructure Quick Access (Optional) -->
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Quick Access</span>
</li>

<li class="menu-item">
  <a href="{{ route('v3tiket.wireless.monitoring') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-wifi text-success"></i>
    <div data-i18n="Wireless POP">Wireless POP</div>
    <span class="badge rounded-pill bg-success ms-auto">245</span>
  </a>
</li>

<li class="menu-item">
  <a href="{{ route('v3tiket.converter.monitoring') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-network text-primary"></i>
    <div data-i18n="Converter POP">Converter POP</div>
    <span class="badge rounded-pill bg-primary ms-auto">156</span>
  </a>
</li>

<li class="menu-item">
  <a href="{{ route('v3tiket.ftth.monitoring') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-home text-warning"></i>
    <div data-i18n="FTTH ODP">FTTH ODP</div>
    <span class="badge rounded-pill bg-warning ms-auto">892</span>
  </a>
</li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-headset"></i>
                <div data-i18n="Tickets">Tiket Laporan</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="tickets-all.html" class="menu-link">
                    <div data-i18n="All Tickets">Semua Tiket</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="tickets-open.html" class="menu-link">
                    <div data-i18n="Open">Tiket Aktif</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="tickets-closed.html" class="menu-link">
                    <div data-i18n="Closed">Tiket Ditutup</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-tools"></i>
                <div data-i18n="Tools">Tool Sistem</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#usageCheckModal" class="menu-link">
                    <div data-i18n="Usage Check">Cek Pemakaian</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="import-users.html" class="menu-link">
                    <div data-i18n="Import">Impor User</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exportModal" class="menu-link">
                    <div data-i18n="Export">Ekspor User</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- System Logs -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-text"></i>
                <div data-i18n="Logs">Log Aplikasi</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="logs-login.html" class="menu-link">
                    <div data-i18n="Login">Log Login</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="logs-activity.html" class="menu-link">
                    <div data-i18n="Activity">Log Aktivitas</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="logs-radius.html" class="menu-link">
                    <div data-i18n="Radius">Log Auth Radius</div>
                  </a>
                </li>
              </ul>
            </li> --}}
          </ul>
        </aside>
        <!-- / Menu -->