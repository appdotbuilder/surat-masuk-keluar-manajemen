<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class MailTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('MailTypes/Index');
    }
}