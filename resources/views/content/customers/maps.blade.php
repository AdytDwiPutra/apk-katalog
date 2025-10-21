@extends('layouts.master')

@section('title', 'Peta Pelanggan')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  #map {
    height: calc(100vh - 250px);
    min-height: 500px;
    border-radius: 8px;
  }
  .customer-popup {
    min-width: 250px;
  }
  .customer-popup h6 {
    margin-bottom: 8px;
    color: #7367f0;
  }
  .legend {
    background: white;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
  }
  .legend-item {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
  }
  .legend-color {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin-right: 8px;
    border: 2px solid #fff;
    box-shadow: 0 0 3px rgba(0,0,0,0.3);
  }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Peta Pelanggan</h4>
      <p class="text-muted mb-0">Lokasi pelanggan berdasarkan koordinat GPS</p>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-secondary" id="btn-reset-view">
        <i class="ti ti-map-pin me-1"></i> Reset View
      </button>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
        <i class="ti ti-filter me-1"></i> Filter
      </button>
    </div>
  </div>

  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-users ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Total Pelanggan</small>
              <h5 class="mb-0">1,247</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="ti ti-circle-check ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Active</small>
              <h5 class="mb-0 text-success">1,089</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="ti ti-clock ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Isolir</small>
              <h5 class="mb-0 text-warning">127</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6 mb-3">
      <div class="card">
        <div class="card-body py-3">
          <div class="d-flex align-items-center">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-danger">
                <i class="ti ti-user-x ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Inactive</small>
              <h5 class="mb-0 text-danger">31</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Map Card -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Peta Sebaran Pelanggan</h5>
      <div class="d-flex gap-2 align-items-center">
        <input type="text" class="form-control form-control-sm" placeholder="Cari pelanggan..." id="search-customer" style="width: 250px;">
        <button class="btn btn-sm btn-outline-primary" id="btn-locate-me">
          <i class="ti ti-current-location"></i> Lokasi Saya
        </button>
      </div>
    </div>
    <div class="card-body">
      <div id="map"></div>
    </div>
  </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filter Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select" id="filter-status">
            <option value="">Semua Status</option>
            <option value="active">Active</option>
            <option value="isolir">Isolir</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Paket</label>
          <select class="form-select" id="filter-package">
            <option value="">Semua Paket</option>
            <option value="10mbps">10 Mbps</option>
            <option value="20mbps">20 Mbps</option>
            <option value="50mbps">50 Mbps</option>
            <option value="100mbps">100 Mbps</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Area/Wilayah</label>
          <select class="form-select" id="filter-area">
            <option value="">Semua Area</option>
            <option value="cicalengka">Cicalengka</option>
            <option value="rancaekek">Rancaekek</option>
            <option value="majalaya">Majalaya</option>
            <option value="baleendah">Baleendah</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">ODP</label>
          <input type="text" class="form-control" id="filter-odp" placeholder="Contoh: ODP23">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-outline-warning" id="btn-reset-filter">Reset Filter</button>
        <button type="button" class="btn btn-primary" id="btn-apply-filter">Terapkan Filter</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
$(document).ready(function() {
  // Initialize Map (centered on Bandung)
  const map = L.map('map').setView([-6.9175, 107.6191], 13);

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
  }).addTo(map);

  // Custom icons for different status
  const iconActive = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAzMCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTUgMEMxMC4wMyAwIDYgNC4wMyA2IDljMCA3LjUgOSAxOCA5IDE4czktMTAuNSA5LTE4YzAtNC45Ny00LjAzLTktOS05eiIgZmlsbD0iIzI4Yzc2ZiIvPjxjaXJjbGUgY3g9IjE1IiBjeT0iOSIgcj0iNSIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==',
    iconSize: [30, 40],
    iconAnchor: [15, 40],
    popupAnchor: [0, -40]
  });

  const iconIsolir = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAzMCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTUgMEMxMC4wMyAwIDYgNC4wMyA2IDljMCA3LjUgOSAxOCA5IDE4czktMTAuNSA5LTE4YzAtNC45Ny00LjAzLTktOS05eiIgZmlsbD0iI2ZmOWY0MyIvPjxjaXJjbGUgY3g9IjE1IiBjeT0iOSIgcj0iNSIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==',
    iconSize: [30, 40],
    iconAnchor: [15, 40],
    popupAnchor: [0, -40]
  });

  const iconInactive = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAzMCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTUgMEMxMC4wMyAwIDYgNC4wMyA2IDljMCA3LjUgOSAxOCA5IDE4czktMTAuNSA5LTE4YzAtNC45Ny00LjAzLTktOS05eiIgZmlsbD0iI2VhNTQ1NSIvPjxjaXJjbGUgY3g9IjE1IiBjeT0iOSIgcj0iNSIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==',
    iconSize: [30, 40],
    iconAnchor: [15, 40],
    popupAnchor: [0, -40]
  });

  // Sample customer data
  const customers = [
    {
      id: 'CID-242382',
      name: 'PT Maju Jaya',
      address: 'Jl. Raya Cicalengka No. 123',
      lat: -6.9175,
      lng: 107.6191,
      status: 'active',
      package: '100 Mbps',
      odp: 'ODP23-JALINAN'
    },
    {
      id: 'CID-242501',
      name: 'Riki Sopian',
      address: 'RT 002 RW 003 DESA CICALENGKA WETAN',
      lat: -6.9250,
      lng: 107.6250,
      status: 'active',
      package: '10 Mbps',
      odp: 'ODP23-JALINAN'
    },
    {
      id: 'CID-242385',
      name: 'Ahmad Yani',
      address: 'Perumahan Griya Asri Blok C12',
      lat: -6.9100,
      lng: 107.6300,
      status: 'isolir',
      package: '20 Mbps',
      odp: 'ODP24-ASRI'
    },
    {
      id: 'CID-242390',
      name: 'Siti Nurhaliza',
      address: 'Jl. Raya Majalaya No. 45',
      lat: -6.9280,
      lng: 107.6100,
      status: 'active',
      package: '50 Mbps',
      odp: 'ODP25-MAJALAYA'
    },
    {
      id: 'CID-242395',
      name: 'Budi Santoso',
      address: 'Komplek Bumi Asri No. 78',
      lat: -6.9050,
      lng: 107.6350,
      status: 'inactive',
      package: '10 Mbps',
      odp: 'ODP26-BUMI'
    }
  ];

  // Store markers for filtering
  let markers = [];
  let markerCluster = L.layerGroup().addTo(map);

  // Add markers to map
  function addMarkers(data) {
    // Clear existing markers
    markerCluster.clearLayers();
    markers = [];

    data.forEach(customer => {
      let icon;
      if (customer.status === 'active') icon = iconActive;
      else if (customer.status === 'isolir') icon = iconIsolir;
      else icon = iconInactive;

      const marker = L.marker([customer.lat, customer.lng], { icon: icon })
        .bindPopup(`
          <div class="customer-popup">
            <h6>${customer.name}</h6>
            <p class="mb-1"><strong>ID:</strong> ${customer.id}</p>
            <p class="mb-1"><strong>Alamat:</strong><br>${customer.address}</p>
            <p class="mb-1"><strong>Paket:</strong> ${customer.package}</p>
            <p class="mb-1"><strong>ODP:</strong> ${customer.odp}</p>
            <p class="mb-2"><strong>Status:</strong> <span class="badge bg-${customer.status === 'active' ? 'success' : customer.status === 'isolir' ? 'warning' : 'danger'}">${customer.status}</span></p>
            <div class="d-flex gap-1">
              <a href="/customer/detail/${customer.id}" class="btn btn-sm btn-primary">Detail</a>
              <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('${customer.lat}, ${customer.lng}')">Copy GPS</button>
            </div>
          </div>
        `);
      
      marker.customerData = customer;
      markers.push(marker);
      markerCluster.addLayer(marker);
    });
  }

  // Initial markers
  addMarkers(customers);

  // Add legend
  const legend = L.control({ position: 'bottomright' });
  legend.onAdd = function(map) {
    const div = L.DomUtil.create('div', 'legend');
    div.innerHTML = `
      <div class="legend-item">
        <div class="legend-color" style="background: #28c76f;"></div>
        <span>Active</span>
      </div>
      <div class="legend-item">
        <div class="legend-color" style="background: #ff9f43;"></div>
        <span>Isolir</span>
      </div>
      <div class="legend-item">
        <div class="legend-color" style="background: #ea5455;"></div>
        <span>Inactive</span>
      </div>
    `;
    return div;
  };
  legend.addTo(map);

  // Search functionality
  $('#search-customer').on('keyup', function() {
    const query = $(this).val().toLowerCase();
    const filtered = customers.filter(c => 
      c.name.toLowerCase().includes(query) || 
      c.id.toLowerCase().includes(query) ||
      c.address.toLowerCase().includes(query)
    );
    addMarkers(filtered);
  });

  // Reset view
  $('#btn-reset-view').on('click', function() {
    map.setView([-6.9175, 107.6191], 13);
  });

  // Locate me
  $('#btn-locate-me').on('click', function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        map.setView([lat, lng], 15);
        L.marker([lat, lng]).addTo(map)
          .bindPopup('Lokasi Anda')
          .openPopup();
      });
    } else {
      alert('Geolocation tidak didukung browser Anda');
    }
  });

  // Apply filter
  $('#btn-apply-filter').on('click', function() {
    const status = $('#filter-status').val();
    const filtered = status ? customers.filter(c => c.status === status) : customers;
    addMarkers(filtered);
    $('#filterModal').modal('hide');
  });

  // Reset filter
  $('#btn-reset-filter').on('click', function() {
    $('#filter-status, #filter-package, #filter-area, #filter-odp').val('');
    addMarkers(customers);
  });
});
</script>
@endpush