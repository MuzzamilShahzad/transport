<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesTypeController extends Controller
{
    public function add() {
        $data = array(
            'page'  =>  'Fees Type',
            'menu'  =>  'Add Fees Type'
        );

        return view('fees-type.add', compact('data'));
    }
}
