<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showStaffDashboard()
    {
        return view('staff.dashboard.index');
    }
}
