<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RoutingPriority1Controller extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard');
    }
    public function user()
    {
        return Inertia::render('Admin/User');
    }
}
