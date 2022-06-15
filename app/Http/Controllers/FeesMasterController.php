<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesMasterController extends Controller
{
    public function add() {
        $data = array(
            'page'  =>  'Fees Master',
            'menu'  =>  'Add Fees Master'
        );

        return view('fees-master.add', compact('data'));
    }
}
