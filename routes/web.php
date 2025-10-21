<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/profiles/ppp', function () {
    return view('content.profil-ppp');
})->name('profiles.ppp');
Route::get('/profiles/group', function () {
    return view('content.profiles-group');
})->name('profiles.group');
Route::get('/profiles/bandwith', function () {
    return view('content.profiles-bandwith');
})->name('profiles.bandwith');


Route::get('/tickets/create', function () {
    return view('content.tickets.create');
})->name('tickets.create');

Route::get('/tickets/dashboard', function () {
    return view('content.tickets.dashboard');
})->name('tickets.dashboard');

Route::get('/tickets', function () {
    return view('content.tickets.index');
})->name('tickets.index');

Route::get('/tickets/detail', function () {
    return view('content.tickets.detail');
})->name('tickets.detail');

Route::get('/tickets/my-tickets', function () {
    return view('content.tickets.my-tickets');
})->name('tickets.my-tickets');

Route::get('/tickets/analytics', function () {
    return view('content.tickets.analytics');
})->name('tickets.analytics');

Route::get('/tickets/field-work', function () {
    return view('content.tickets.field-work');
})->name('tickets.field-work');

Route::get('/tickets/by-status/{status}', function ($status) {
    return view('content.tickets.by-status', compact('status'));
})->name('tickets.by-status');


// Route::get('/v2tiket', function () {
//     return view('v2tiket.index');
// })->name('v2tiket.index');

// // Create New Ticket
// Route::get('/v2tiket/create', function () {
//     return view('v2tiket.create');
// })->name('v2tiket.create');

// // Network Monitoring
// Route::get('/v2tiket/monitoring', function () {
//     return view('v2tiket.monitoring');
// })->name('v2tiket.monitoring');



// // List All Tickets
// Route::get('/v2tiket/list', function () {
//     return view('v2tiket.list');
// })->name('v2tiket.list');


Route::prefix('v2tiket')->name('v2tiket.')->group(function () {
    // Dashboard NOC
    Route::get('/', function () {
        return view('v2tiket.index');
    })->name('index');
    
    // Create & Store Ticket
    Route::get('/create', function () {
        return view('v2tiket.create');
    })->name('create');
    Route::post('/store', function () {
        return redirect()->route('v2tiket.index')->with('success', 'Ticket created successfully! (Demo mode)');
    })->name('store');
    
    // Ticket Management
    Route::get('/list', function () {
        return view('v2tiket.list');
    })->name('list');
    Route::get('/detail/{id}', function ($id) {
        $allowedIds = ['TKT-001', 'TKT-002', 'TKT-003', 'TKT-004', 'TKT-005', '1', '2', '3', '4', '5'];
        if (!in_array($id, $allowedIds)) {
            abort(404, 'Ticket not found. Try: TKT-001, TKT-002, TKT-003, TKT-004, TKT-005');
        }
        $ticketData = [
            'TKT-001' => [
                'number' => 'TKT-001', 'customer' => 'Budi Santoso', 'customer_id' => 'CID-12345',
                'phone' => '081234567890', 'problem' => 'Internet lambat sejak kemarin',
                'category' => 'Internet Issues', 'priority' => 'Medium', 'status' => 'Remote Trying', 'assigned' => 'NOC Team'
            ],
            'TKT-002' => [
                'number' => 'TKT-002', 'customer' => 'Siti Aminah', 'customer_id' => 'CID-67890',
                'phone' => '081987654321', 'problem' => 'ONT mati total',
                'category' => 'Device Issues', 'priority' => 'High', 'status' => 'Field Assigned', 'assigned' => 'Teknisi Ahmad'
            ]
        ];
        $ticket = $ticketData[$id] ?? $ticketData['TKT-001'];
        return view('v2tiket.detail', compact('id', 'ticket'));
    })->name('detail');
    Route::get('/handle/{id}', function ($id) {
        $allowedIds = ['TKT-001', 'TKT-002', 'TKT-003', 'TKT-004', 'TKT-005'];
        if (!in_array($id, $allowedIds)) abort(404, 'Ticket not found');
        return view('v2tiket.handle', compact('id'));
    })->name('handle');
    Route::get('/escalate/{id}', function ($id) {
        $allowedIds = ['TKT-001', 'TKT-002', 'TKT-003', 'TKT-004', 'TKT-005'];
        if (!in_array($id, $allowedIds)) abort(404, 'Ticket not found');
        return view('v2tiket.escalate', compact('id'));
    })->name('escalate');
    
    // Customer & Monitoring
    Route::get('/customer-history/{customerId}', function ($customerId) {
        $allowedCustomers = ['CID-12345', 'CID-67890', 'CID-11111', 'CID-55555'];
        if (!in_array($customerId, $allowedCustomers)) abort(404, 'Customer not found');
        return view('v2tiket.customer-history', compact('customerId'));
    })->name('customer-history');
    Route::get('/monitoring', function () {
        return view('v2tiket.monitoring');
    })->name('monitoring');
    
    // AJAX/API endpoints
    Route::post('/update-status/{id}', function ($id) {
        return response()->json(['status' => 'success', 'message' => 'Status updated (Demo)', 'ticket_id' => $id]);
    })->name('update-status');
    Route::post('/add-note/{id}', function ($id) {
        return response()->json(['status' => 'success', 'message' => 'Note added (Demo)', 'ticket_id' => $id]);
    })->name('add-note');
});


Route::prefix('v3tiket')->group(function () {
    
    // 1. Dashboard - Multi Infrastructure Overview
    Route::get('/', function () {
        return view('v3tiket.dashboard');
    })->name('v3tiket.dashboard');
    
    // 2. Create Ticket - Simplified form with infrastructure selection
    Route::get('/create', function () {
        return view('v3tiket.create');
    })->name('v3tiket.create');
    
    // 3. List All Tickets - With infrastructure filter
    Route::get('/list', function () {
        return view('v3tiket.list');
    })->name('v3tiket.list');
    
    // 4. Infrastructure Monitoring - Separate for each type
    Route::get('/monitoring', function () {
        return view('v3tiket.monitoring');
    })->name('v3tiket.monitoring');
    
    // 5. Ticket Detail - Simplified detail view
    Route::get('/detail/{ticket_id}', function ($ticket_id) {
        return view('v3tiket.detail', compact('ticket_id'));
    })->name('v3tiket.detail');
    
    // 6. Handle Ticket - Infrastructure-specific troubleshooting
    Route::get('/handle/{ticket_id}', function ($ticket_id) {
        return view('v3tiket.handle', compact('ticket_id'));
    })->name('v3tiket.handle');
    
    // 7. Infrastructure Status - Real-time status monitoring
    Route::get('/status', function () {
        return view('v3tiket.status');
    })->name('v3tiket.status');
    
    // 8. Customer Info - Customer details with infrastructure type
    Route::get('/customer/{customer_id}', function ($customer_id) {
        return view('v3tiket.customer', compact('customer_id'));
    })->name('v3tiket.customer');
    
    // Additional Infrastructure-specific routes
    
    // Wireless specific
    Route::get('/wireless/monitoring', function () {
        return view('v3tiket.wireless-monitoring');
    })->name('v3tiket.wireless.monitoring');
    
    // Converter FO specific  
    Route::get('/converter/monitoring', function () {
        return view('v3tiket.converter-monitoring');
    })->name('v3tiket.converter.monitoring');
    
    // FTTH specific
    Route::get('/ftth/monitoring', function () {
        return view('v3tiket.ftth-monitoring');
    })->name('v3tiket.ftth.monitoring');
});

Route::get('/finance/rab', function () {
    return view('content.finance.rab');
})->name('finance.rab');


Route::get('/finance/addpengajuan', function () {
    return view('content.finance.addpengajuan');
})->name('finance.addpengajuan');

Route::get('/finance/listpengajuan', function () {
    return view('content.finance.listpengajuan');
})->name('finance.listpengajuan');



// Route::get('/customer/lead', function () {
//     return view('content.customer-lead');
// })->name('customer.lead');

Route::get('/customer', function () {
    return view('content.customers.index');
})->name('customer.index');

Route::get('/customer/detail', function () {
    return view('content.customers.detail');
})->name('customer.detail');

Route::get('/customer/maps', function () {
    return view('content.customers.maps');
})->name('customer.maps');
Route::get('/customer/add', function () {
    return view('content.customers.add');
})->name('customer.add');




Route::get('/customer/lead', function () {
    return view('content.customers.lead');
})->name('customer.lead');
Route::get('/customer/lead/list', function () {
    return view('content.customers.lead-list');
})->name('customer.lead.list');
Route::get('/customer/lead/maps', function () {
    return view('content.customers.lead-maps');
})->name('customer.lead.maps');



Route::get('/olt/add', function () {
    return view('content.olt.add-olt');
})->name('olt.add');

Route::get('/olt/index', function () {
    return view('content.olt.index');
})->name('olt.index');



Route::get('/router/nas', function () {
    return view('content.nas.nas');
})->name('router.nas');





Route::get('/dashboard', function () {
    return view('content.dashboard');
})->name('dashboard');
Route::get('/login', function () {
    return view('login');
});
Route::get('/', function () {
    return view('auth.login');
});

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('content.home.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
