<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = array(
            'page'  =>  'Dashboard',
            'menu'  =>  'dashboard',
        );

        return view('dashboard.index', compact('data'));
    }
}