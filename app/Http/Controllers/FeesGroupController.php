<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesGroupController extends Controller
{
    public function add() {
        $data = array(
            'page'  =>  'Fees Group',
            'menu'  =>  'Add Fees Group'
        );

        return view('fees-group.add', compact('data'));
    }
}
