<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class OrganizationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('OrganizationSettings/Index');
    }
}