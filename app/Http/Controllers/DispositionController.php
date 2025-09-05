<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Dispositions/Index');
    }
}