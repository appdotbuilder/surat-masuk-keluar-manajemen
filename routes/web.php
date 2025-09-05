<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Mail management routes
    Route::get('/incoming-mails', function () {
        return Inertia::render('IncomingMails/Index');
    })->name('incoming-mails.index');
    
    Route::get('/outgoing-mails', function () {
        return Inertia::render('OutgoingMails/Index');
    })->name('outgoing-mails.index');
    
    Route::get('/dispositions', function () {
        return Inertia::render('Dispositions/Index');
    })->name('dispositions.index');
    
    Route::get('/employees', function () {
        return Inertia::render('Employees/Index');
    })->name('employees.index');
    
    Route::get('/announcements', function () {
        return Inertia::render('Announcements/Index');
    })->name('announcements.index');
    
    Route::get('/reports', function () {
        return Inertia::render('Reports/Index');
    })->name('reports.index');
    
    Route::get('/archives', function () {
        return Inertia::render('Archives/Index');
    })->name('archives.index');
    
    Route::get('/organization-settings', function () {
        return Inertia::render('OrganizationSettings/Index');
    })->name('organization-settings.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
