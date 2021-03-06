<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Shift;

class ShiftController extends Controller
{
    public function listing() {
        $Shift = Shift::all();
        $data = array(
            'Shift'  =>  $Shift,
            'page'    =>  'Shift',
            'menu'    =>  'Manage Shift',
        );

        return view('shift.listing', compact('data'));
    }

    public function add() {
        $data = array(
            'page'  =>  'Shift',
            'menu'  =>  'Add Shift',
        );

        return view('shift.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'timings'  =>  'required',
        ]);

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $shift = new Shift;
            $shift->timings  =  $request->timings;
            $query = $shift->save();

            if ($query) {

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
        $shift = Shift::find($id);
        $data = array(
            'shift'  =>  $shift,
            'page'   =>  'Shift',
            'menu'   =>  'Edit Shift',
        );

        return view('shift.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'timings'  =>  'required',
        ]);

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $shift = Shift::find($id);
            $shift->timings  =  $request->timings;
            $query = $shift->update();

            if ($query) {

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
        $shift_id  =  $request->shift_id;
        $query     =  Shift::find($shift_id)->delete();

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
