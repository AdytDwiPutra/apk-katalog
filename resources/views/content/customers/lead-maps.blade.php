@extends('layouts.master')

@section('title', 'Peta Customer Lead & ODP')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  #map {
    height: calc(100vh - 250px);
    min-height: 500px;
    border-radius: 8px;
  }
  .popup-content {
    min-width: 280px;
  }
  .popup-content h6 {
    margin-bottom: 10px;
    color: #7367f0;
    font-weight: 600;
  }
  .port-progress {
    height: 8px;
    background: #f0f0f0;
    border-radius: 4px;
    overflow: hidden;
    margin: 8px 0;
  }
  .port-progress-bar {
    height: 100%;
    transition: width 0.3s;
  }
  .legend {
    background: white;
    padding: 12px;
    border-radius: 6px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
  }
  .legend-item {
    display: flex;
    align-items: center;
    margin-bottom: 6px;
    font-size: 13px;
  }
  .legend-color {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    margin-right: 8px;
    border: 2px solid #fff;
    box-shadow: 0 0 4px rgba(0,0,0,0.3);
  }
  .info-badge {
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 4px;
    font-weight: 500;
  }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-bold mb-1">Peta Customer Lead & ODP</h4>
      <p class="text-muted mb-0">Monitoring calon pelanggan dan Optical Distribution Point</p>
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
              <span class="avatar-initial rounded bg-label-info">
                <i class="ti ti-layout-grid ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Total ODP</small>
              <h5 class="mb-0" id="stat-total-odp">150</h5>
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
              <span class="avatar-initial rounded bg-label-success">
                <i class="ti ti-plug-connected ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Port Tersedia</small>
              <h5 class="mb-0 text-success" id="stat-available-ports">0</h5>
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
                <i class="ti ti-plug ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Port Terpakai</small>
              <h5 class="mb-0 text-warning" id="stat-used-ports">0</h5>
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
                <i class="ti ti-users ti-sm"></i>
              </span>
            </div>
            <div>
              <small class="text-muted d-block">Customer Leads</small>
              <h5 class="mb-0 text-primary" id="stat-total-leads">20</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Map Card -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Peta Sebaran Lead & ODP</h5>
      <div class="d-flex gap-2 align-items-center">
        <input type="text" class="form-control form-control-sm" placeholder="Cari ODP atau Lead..." id="search-map" style="width: 250px;">
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
        <h5 class="modal-title">Filter Peta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Tampilkan</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="show-odp" checked>
            <label class="form-check-label" for="show-odp">ODP</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="show-leads" checked>
            <label class="form-check-label" for="show-leads">Customer Leads</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Status ODP</label>
          <select class="form-select" id="filter-odp-status">
            <option value="">Semua ODP</option>
            <option value="available">Tersedia</option>
            <option value="full">Penuh</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Kapasitas ODP</label>
          <select class="form-select" id="filter-odp-capacity">
            <option value="">Semua Kapasitas</option>
            <option value="8">8 Port</option>
            <option value="16">16 Port</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Status Lead</label>
          <select class="form-select" id="filter-lead-status">
            <option value="">Semua Lead</option>
            <option value="survey_pending">Survey Pending</option>
            <option value="survey_done">Survey Done</option>
            <option value="waiting_approval">Waiting Approval</option>
          </select>
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
  // Initialize Map (centered on Cicalengka)
  const map = L.map('map').setView([-6.92, 107.6225], 14);

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
  }).addTo(map);

  // Custom icons
  const iconOdpAvailable = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzUiIGhlaWdodD0iNDUiIHZpZXdCb3g9IjAgMCAzNSA0NSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTcuNSAwQzEyIDAgNy41IDQuNSA3LjUgMTBjMCA4LjUgMTAgMjAgMTAgMjBzMTAtMTEuNSAxMC0yMGMwLTUuNS00LjUtMTAtMTAtMTB6IiBmaWxsPSIjMjhjNzZmIi8+PHJlY3QgeD0iMTIiIHk9IjUiIHdpZHRoPSIxMSIgaGVpZ2h0PSIxMCIgcng9IjIiIGZpbGw9IiNmZmYiLz48L3N2Zz4=',
    iconSize: [35, 45],
    iconAnchor: [17.5, 45],
    popupAnchor: [0, -45]
  });

  const iconOdpFull = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzUiIGhlaWdodD0iNDUiIHZpZXdCb3g9IjAgMCAzNSA0NSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTcuNSAwQzEyIDAgNy41IDQuNSA3LjUgMTBjMCA4LjUgMTAgMjAgMTAgMjBzMTAtMTEuNSAxMC0yMGMwLTUuNS00LjUtMTAtMTAtMTB6IiBmaWxsPSIjZWE1NDU1Ii8+PHJlY3QgeD0iMTIiIHk9IjUiIHdpZHRoPSIxMSIgaGVpZ2h0PSIxMCIgcng9IjIiIGZpbGw9IiNmZmYiLz48L3N2Zz4=',
    iconSize: [35, 45],
    iconAnchor: [17.5, 45],
    popupAnchor: [0, -45]
  });

  const iconLead = L.icon({
    iconUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAzMCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTUgMEMxMC4wMyAwIDYgNC4wMyA2IDljMCA3LjUgOSAxOCA5IDE4czktMTAuNSA5LTE4YzAtNC45Ny00LjAzLTktOS05eiIgZmlsbD0iIzdhNWFmOCIvPjxjaXJjbGUgY3g9IjE1IiBjeT0iOSIgcj0iNSIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==',
    iconSize: [30, 40],
    iconAnchor: [15, 40],
    popupAnchor: [0, -40]
  });

  // Generate random ODP data (150 items in Cicalengka area)
  const odpData = [];
  const areas = ['Wetan', 'Kulon', 'Kidul', 'Kaler', 'Tengah', 'Jalinan', 'Panenjoan', 'Nagrog'];
  
  for (let i = 1; i <= 150; i++) {
    const capacity = Math.random() > 0.5 ? 16 : 8;
    const used = Math.floor(Math.random() * (capacity + 1));
    const area = areas[Math.floor(Math.random() * areas.length)];
    
    odpData.push({
      id: `ODP-${String(i).padStart(3, '0')}`,
      name: `ODP Cicalengka ${area} ${String(i).padStart(2, '0')}`,
      location: `RT ${String(Math.floor(Math.random() * 20) + 1).padStart(2, '0')} RW ${String(Math.floor(Math.random() * 10) + 1).padStart(2, '0')} ${area}`,
      lat: -6.95 + (Math.random() * 0.06),
      lng: 107.60 + (Math.random() * 0.05),
      capacity: capacity,
      used: used,
      available: capacity - used,
      status: used >= capacity ? 'full' : 'available',
      type: 'odp'
    });
  }

  // Generate random Customer Lead data (20 items)
  const leadData = [];
  const names = ['Budi Santoso', 'Siti Rahayu', 'Ahmad Yani', 'Dewi Lestari', 'Rudi Hermawan', 
                 'Eka Putri', 'Dani Saputra', 'Fitri Handayani', 'Agus Setiawan', 'Rina Maharani',
                 'Hendra Wijaya', 'Maya Sari', 'Tono Sukirman', 'Indah Permata', 'Joko Susilo',
                 'Lina Marlina', 'Bambang Priyanto', 'Yuli Astuti', 'Wahyu Nugroho', 'Citra Dewi'];
  const packages = ['10 Mbps', '20 Mbps', '30 Mbps', '50 Mbps', '100 Mbps'];
  const statuses = ['survey_pending', 'survey_done', 'waiting_approval'];
  const statusLabels = {
    'survey_pending': 'Survey Pending',
    'survey_done': 'Survey Done', 
    'waiting_approval': 'Waiting Approval'
  };

  for (let i = 1; i <= 20; i++) {
    const lat = -6.95 + (Math.random() * 0.06);
    const lng = 107.60 + (Math.random() * 0.05);
    
    // Find nearest ODP
    let nearestOdp = odpData[0];
    let minDistance = 999;
    odpData.forEach(odp => {
      const distance = Math.sqrt(Math.pow(lat - odp.lat, 2) + Math.pow(lng - odp.lng, 2));
      if (distance < minDistance) {
        minDistance = distance;
        nearestOdp = odp;
      }
    });
    
    const distanceMeters = Math.round(minDistance * 111000); // rough conversion to meters

    leadData.push({
      id: `LEAD-${String(i).padStart(3, '0')}`,
      name: names[i-1],
      phone: `0812${Math.floor(Math.random() * 90000000) + 10000000}`,
      address: `Jl. ${areas[Math.floor(Math.random() * areas.length)]} No. ${Math.floor(Math.random() * 100) + 1}`,
      lat: lat,
      lng: lng,
      package_request: packages[Math.floor(Math.random() * packages.length)],
      nearest_odp: nearestOdp.id,
      odp_distance: `${distanceMeters}m`,
      status: statuses[Math.floor(Math.random() * statuses.length)],
      status_label: statusLabels[statuses[Math.floor(Math.random() * statuses.length)]],
      type: 'lead'
    });
  }

  // Store markers
  let markers = [];
  let markerLayer = L.layerGroup().addTo(map);

  // Calculate and update stats
  function updateStats(odps, leads) {
    const totalPorts = odps.reduce((sum, odp) => sum + odp.capacity, 0);
    const usedPorts = odps.reduce((sum, odp) => sum + odp.used, 0);
    const availablePorts = totalPorts - usedPorts;

    $('#stat-total-odp').text(odps.length);
    $('#stat-available-ports').text(availablePorts);
    $('#stat-used-ports').text(usedPorts);
    $('#stat-total-leads').text(leads.length);
  }

  // Add markers to map
  function addMarkers(odps, leads) {
    markerLayer.clearLayers();
    markers = [];

    // Add ODP markers
    odps.forEach(odp => {
      const icon = odp.status === 'available' ? iconOdpAvailable : iconOdpFull;
      const percentUsed = Math.round((odp.used / odp.capacity) * 100);
      const progressColor = odp.status === 'full' ? '#ea5455' : percentUsed > 70 ? '#ff9f43' : '#28c76f';

      const marker = L.marker([odp.lat, odp.lng], { icon: icon })
        .bindPopup(`
          <div class="popup-content">
            <h6><i class="ti ti-layout-grid me-1"></i>${odp.name}</h6>
            <p class="mb-1"><strong>ID:</strong> ${odp.id}</p>
            <p class="mb-1"><strong>Lokasi:</strong> ${odp.location}</p>
            <p class="mb-1"><strong>Kapasitas:</strong> ${odp.capacity} Port</p>
            <div class="port-progress">
              <div class="port-progress-bar" style="width: ${percentUsed}%; background: ${progressColor};"></div>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted small">Terpakai: ${odp.used}</span>
              <span class="text-muted small">Tersisa: ${odp.available}</span>
            </div>
            <span class="badge bg-${odp.status === 'available' ? 'success' : 'danger'} mb-2">
              ${odp.status === 'available' ? 'Tersedia' : 'Penuh'}
            </span>
            <div class="d-flex gap-1 mt-2">
              <a href="/odp/detail/${odp.id}" class="btn btn-sm btn-primary">Detail ODP</a>
              <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('${odp.lat}, ${odp.lng}')">
                <i class="ti ti-copy"></i>
              </button>
            </div>
          </div>
        `);
      
      marker.itemData = odp;
      markers.push(marker);
      markerLayer.addLayer(marker);
    });

    // Add Lead markers
    leads.forEach(lead => {
      const statusBadge = lead.status === 'survey_pending' ? 'warning' : 
                         lead.status === 'survey_done' ? 'info' : 'primary';

      const marker = L.marker([lead.lat, lead.lng], { icon: iconLead })
        .bindPopup(`
          <div class="popup-content">
            <h6><i class="ti ti-user-plus me-1"></i>${lead.name}</h6>
            <p class="mb-1"><strong>ID:</strong> ${lead.id}</p>
            <p class="mb-1"><strong>No. HP:</strong> ${lead.phone}</p>
            <p class="mb-1"><strong>Alamat:</strong> ${lead.address}</p>
            <p class="mb-1"><strong>Paket Diminta:</strong> ${lead.package_request}</p>
            <p class="mb-1"><strong>ODP Terdekat:</strong> ${lead.nearest_odp} <span class="info-badge bg-light text-dark">${lead.odp_distance}</span></p>
            <span class="badge bg-${statusBadge} mb-2">${lead.status_label}</span>
            <div class="d-flex gap-1 mt-2">
              <a href="/leads/process/${lead.id}" class="btn btn-sm btn-success">Proses Survey</a>
              <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('${lead.lat}, ${lead.lng}')">
                <i class="ti ti-copy"></i>
              </button>
            </div>
          </div>
        `);
      
      marker.itemData = lead;
      markers.push(marker);
      markerLayer.addLayer(marker);
    });

    updateStats(odps, leads);
  }

  // Initial load
  addMarkers(odpData, leadData);

  // Add legend
  const legend = L.control({ position: 'bottomright' });
  legend.onAdd = function(map) {
    const div = L.DomUtil.create('div', 'legend');
    div.innerHTML = `
      <div class="legend-item">
        <div class="legend-color" style="background: #28c76f;"></div>
        <span>ODP Tersedia</span>
      </div>
      <div class="legend-item">
        <div class="legend-color" style="background: #ea5455;"></div>
        <span>ODP Penuh</span>
      </div>
      <div class="legend-item">
        <div class="legend-color" style="background: #7a5af8;"></div>
        <span>Customer Lead</span>
      </div>
    `;
    return div;
  };
  legend.addTo(map);

  // Search functionality
  $('#search-map').on('keyup', function() {
    const query = $(this).val().toLowerCase();
    
    const filteredOdp = odpData.filter(o => 
      o.name.toLowerCase().includes(query) || 
      o.id.toLowerCase().includes(query) ||
      o.location.toLowerCase().includes(query)
    );
    
    const filteredLead = leadData.filter(l => 
      l.name.toLowerCase().includes(query) || 
      l.id.toLowerCase().includes(query) ||
      l.address.toLowerCase().includes(query)
    );
    
    addMarkers(filteredOdp, filteredLead);
  });

  // Reset view
  $('#btn-reset-view').on('click', function() {
    map.setView([-6.92, 107.6225], 14);
    addMarkers(odpData, leadData);
    $('#search-map').val('');
  });

  // Locate me
  $('#btn-locate-me').on('click', function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        map.setView([lat, lng], 16);
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
    const showOdp = $('#show-odp').is(':checked');
    const showLeads = $('#show-leads').is(':checked');
    const odpStatus = $('#filter-odp-status').val();
    const odpCapacity = $('#filter-odp-capacity').val();
    const leadStatus = $('#filter-lead-status').val();

    let filteredOdp = showOdp ? odpData : [];
    let filteredLead = showLeads ? leadData : [];

    if (odpStatus) {
      filteredOdp = filteredOdp.filter(o => o.status === odpStatus);
    }
    if (odpCapacity) {
      filteredOdp = filteredOdp.filter(o => o.capacity == odpCapacity);
    }
    if (leadStatus) {
      filteredLead = filteredLead.filter(l => l.status === leadStatus);
    }

    addMarkers(filteredOdp, filteredLead);
    $('#filterModal').modal('hide');
  });

  // Reset filter
  $('#btn-reset-filter').on('click', function() {
    $('#show-odp, #show-leads').prop('checked', true);
    $('#filter-odp-status, #filter-odp-capacity, #filter-lead-status').val('');
    addMarkers(odpData, leadData);
  });
});
</script>
@endpush