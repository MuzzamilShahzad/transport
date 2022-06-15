<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesDiscountController extends Controller
{
    public function add() {
        $data = array(
            'page'  =>  'Fees Discount',
            'menu'  =>  'Add Fees Discount'
        );

        return view('fees-discount.add', compact('data'));
    }
}
