<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class IncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('IncomingMails/Index');
    }
}