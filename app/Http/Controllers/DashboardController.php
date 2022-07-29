<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.dashboard.index');
    }
    public function sales(){
        return view('pages.dashboard.sales');
    }
    public function member(){
        return view('pages.dashboard.member');
    }
}
