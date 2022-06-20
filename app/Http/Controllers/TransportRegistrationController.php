<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\TransportRegistration;
use App\Models\Vehicle;
use App\Models\Route;
use App\Models\Driver;
use App\Models\Shift;
use App\Models\student;
use App\Models\campus;

class TransportRegistrationController extends Controller
{
    public function listing() {
        $transportRegistration = TransportRegistration::all();
        $data = array(
            'transportRegistration'  =>  $transportRegistration,
            'page'                   =>  'Transport Registration',
            'menu'                   =>  'Manage Registration',
            'title-1'                =>  'Driver Transport Registration',
            'title-2'                =>  'Student Transport Registration'
        );

        return view('transport-registration.listing', compact('data'));
    }

    public function add() {
        $Vehicle   =  Vehicle::get();
        $Route     =  Route::get();
        $Driver    =  Driver::get();
        $Shift     =  Shift::get();
        $campus   =  campus::get();
        $student   =  student::get();

        $data = array(
            'Vehicle'   =>  $Vehicle,
            'Route'     =>  $Route,
            'Driver'    =>  $Driver,
            'Shift'     =>  $Shift,
            'campus'   =>  $campus,
            'student'   =>  $student,
            'page'      =>  'Transport Registration',
            'menu'      =>  'Add Registration'
        );

        return view('transport-registration.add', compact('data'));
    }

    public function store(Request $request) {
    //    dd($request->joining_date);
        $validator = Validator::make($request->all(), [
            'vehicle_id'    =>  'required|numeric|gt:0|digits_between:1,11',
            'driver_id'     =>  'required|numeric|gt:0|digits_between:1,11',
            'shift_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            'route_id'      =>  'required|numeric|gt:0|digits_between:1,11',
<<<<<<< HEAD
            'shift_id'      =>  'required|numeric|gt:0|digits_between:1,11',
=======
>>>>>>> 8bcb86ffb4f293f22ba3c3f3533fa76259fbc357
            'student_id'    =>  'required|numeric|gt:0|digits_between:1,11',
            'fees'          =>  'required|numeric|gt:0|digits_between:1,11',
            'joining_date'  =>  'required|date_format:d-m-Y'
        ]);

<<<<<<< HEAD
=======
        // dd($validator->errors());
>>>>>>> 8bcb86ffb4f293f22ba3c3f3533fa76259fbc357
        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            
            $transportRegistration = new TransportRegistration;

            $transportRegistration->vehicle_id    =  $request->vehicle_id;
            $transportRegistration->route_id      =  $request->route_id;
            $transportRegistration->driver_id     =  $request->driver_id;
            $transportRegistration->shift_id      =  $request->shift_id;
            $transportRegistration->student_id    =  $request->student_id;
            $transportRegistration->fees          =  $request->fees;
            $transportRegistration->joining_date  =  date('Y-m-d', strtotime($request->joining_date));
            
            $query = $transportRegistration->save();
            
            if ($transportRegistration->save()) {
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Transport Registration has been completed successfully.'
                );
            } else {
                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went wrong! please try again letter.'
                );
            }
            return response()->json($response);    
        }
    }

    public function edit($id) {
        $vehicle   =  Vehicle::get();
        $route     =  Route::get();
        $driver    =  Driver::get();
        $shift     =  Shift::get();
        $campus  =  campus::get();
        $student   =  student::get();

        $transportRegistration = TransportRegistration::find($id);

        $data = array(
            'vehicle'                =>  $vehicle,
            'route'                  =>  $route,
            'driver'                 =>  $driver,
            'shift'                  =>  $shift,
            'campus'               =>  $campus,
            'student'                =>  $student,
            'transportRegistration'  =>  $transportRegistration,
            'page'                   =>  'Transport Registration',
            'menu'                   =>  'Edit Transport Registration'
        );

        return view('transport-registration.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'vehicle_id'    =>  'required|numeric|gt:0|digits_between:1,11',
            'driver_id'     =>  'required|numeric|gt:0|digits_between:1,11',
            'shift_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            'route_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            'shift_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            'student_id'    =>  'required|numeric|gt:0|digits_between:1,11',
            'fees'          =>  'required|numeric|gt:0|digits_between:1,11',
            'joining_date'  =>  'required|date_format:d-m-Y'
        ]);

<<<<<<< HEAD
        if (!$validator->passes()) {
=======
        if ($validator->errors()) {
>>>>>>> 8bcb86ffb4f293f22ba3c3f3533fa76259fbc357

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $transportRegistration = TransportRegistration::find($id);

            $transportRegistration->vehicle_id    =  $request->vehicle_id;
            $transportRegistration->route_id      =  $request->route_id;
            $transportRegistration->driver_id     =  $request->driver_id;
            $transportRegistration->shift_id      =  $request->shift_id;
            $transportRegistration->campus_id     =  $request->campus_id;
            $transportRegistration->student_id    =  $request->student_id;
            $transportRegistration->fees          =  $request->fees;
            $transportRegistration->joining_date  =  date('Y-m-d', strtotime($request->joining_date));

            $query = $transportRegistration->update();

            if ($query) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Transport Registration has been updated successfully.'
                );

                return response()->json($response);

            } else {

                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went worng! please try again letter.'
                );

                return response()->json($response);
            }
        }
    }

    public function delete(Request $request) {
        $trans_reg_id  =  $request->trans_reg_id;
        $query         =  TransportRegistration::find($trans_reg_id)->delete();
        
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