<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\MailCategoryController;
use App\Http\Controllers\MailTypeController;
use App\Http\Controllers\OrganizationSettingController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\PositionController;
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
    Route::get('/incoming-mails', [IncomingMailController::class, 'index'])->name('incoming-mails.index');
    Route::get('/outgoing-mails', [OutgoingMailController::class, 'index'])->name('outgoing-mails.index');
    Route::get('/dispositions', [DispositionController::class, 'index'])->name('dispositions.index');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/reports', function () {
        return Inertia::render('Reports/Index');
    })->name('reports.index');
    Route::get('/archives', function () {
        return Inertia::render('Archives/Index');
    })->name('archives.index');
    Route::get('/organization-settings', [OrganizationSettingController::class, 'index'])->name('organization-settings.index');
    
    // Settings routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
    Route::get('/mail-categories', [MailCategoryController::class, 'index'])->name('mail-categories.index');
    Route::get('/mail-types', [MailTypeController::class, 'index'])->name('mail-types.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
