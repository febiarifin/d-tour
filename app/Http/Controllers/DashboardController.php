<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.home',[
            'title'=>'Dashboard',
            'active'=>'dashboard',
        ]);
    }

}
