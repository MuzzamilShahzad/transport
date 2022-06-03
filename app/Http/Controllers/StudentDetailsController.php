<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDetailsController extends Controller
{
    public function studentDetailsView() {
        $data = array(
            'page'  =>  'Student Details',
            'menu'  =>  'Student Details View',
        );

        return view('student.student-details-view', compact('data'));
    }
}
