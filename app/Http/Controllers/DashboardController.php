<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\Disposition;
use App\Models\Employee;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $stats = [
            'incoming_mails_today' => IncomingMail::whereDate('received_date', today())->count(),
            'outgoing_mails_today' => OutgoingMail::whereDate('mail_date', today())->count(),
            'pending_dispositions' => Disposition::where('status', 'pending')->count(),
            'total_employees' => Employee::where('status', 'active')->count(),
            'recent_incoming_mails' => IncomingMail::with(['category', 'type', 'receivedByEmployee'])
                ->latest()
                ->limit(5)
                ->get(),
            'recent_outgoing_mails' => OutgoingMail::with(['category', 'type', 'creator'])
                ->latest()
                ->limit(5)
                ->get(),
            'urgent_dispositions' => Disposition::with(['incomingMail', 'fromEmployee', 'toEmployee'])
                ->where('status', 'pending')
                ->where('priority', 'urgent')
                ->limit(5)
                ->get(),
            'announcements' => Announcement::with('creator')
                ->published()
                ->latest()
                ->limit(3)
                ->get(),
        ];

        return Inertia::render('dashboard', [
            'stats' => $stats
        ]);
    }
}