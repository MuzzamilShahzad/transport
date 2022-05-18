<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Shifts;

class ShiftController extends Controller
{
    public function listing() {
        $shifts = Shifts::all();
        $data = array(
            'shifts'       =>  $shifts,
            'page'         =>  'Shift',
            'menu'         =>  'Manage Shift',
        );

        return view('shift.listing', compact('data'));
    }

    public function add() {
        $data = array(
            'page'         =>  'Shift',
            'menu'         =>  'Add Shift',
        );

        return view('shift.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'timings' => 'required',
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $shift = new Shifts;
            $shift->timings  =  $request->timings;
            $shift->save();

            if ($shift->save()) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Shift has been added successfully'
                );

                return response()->json($response);
            } else {

                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went wrong please try again letter'
                );
                
                return response()->json($response);
            }
        }
    }

    public function edit($id){
        $shift = Shifts::find($id);
        $data = array(
            'shift'        =>  $shift,
            'page'         =>  'Shift',
            'menu'         =>  'Edit Shift',
        );

        return view('shift.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'timings' => 'required',
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $shift = Shifts::find($id);
            $shift->timings = $request->timings;
            $shift->update();

            if ($shift->update()) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Shift has been updated successfully'
                );

                return response()->json($response);

            } else {

                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went worng please try again letter'
                );

                return response()->json($response);
            }
        }
    }

    public function delete(Request $request) {
        $shift_id = $request->shift_id;
        $query = Shifts::find($shift_id)->delete();

        if ($query) {

            $response = array(
                'status'   =>  true, 
                'message'  =>  'Record has been deleted successfully!'
            );
        }

        else {
            $response = array(
                'status'   =>  false,
                'message'  =>  'Some thing went worng try again later!'
            );
        }

        return response()->json($response);
    }
}
