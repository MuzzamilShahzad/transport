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
use App\Models\Student;

class TransportRegistrationController extends Controller
{
    public function listing() {
        $transReg = TransportRegistration::all();
        $data = array(
            'transReg'     => $transReg,
            'page'         => 'Transport Registration',
            'menu'         => 'Manage Registration'
        );

        return view('transport-registration.listing', compact('data'));
    }

    public function add() {
        $vehicle = Vehicle::get();
        $route = Route::get();
        $driver = Driver::get();
        $shift = Shift::get();
        $student = Student::get();

        $data = array(
            'vehicle'   => $vehicle,
            'route'     => $route,
            'driver'    => $driver,
            'shift'     => $shift,
            'student'   => $student,
            'page'      => 'Transport Registration',
            'menu'      => 'Add Registration'
        );

        return view('transport-registration.add', compact('data'));
    }

    public function store(Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(), [
            // 'ref_number' => 'required',
            'vehicle_id' => 'required',
            // 'route_id' => 'required',
            'driver_id' => 'required',
            // 'total_cap' => 'required',
            'shift_id' => 'required',
            'student_id' => 'required',
            'joining_date' => 'required'
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status' => false, 
                'error' => $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $regTrans = new TransportRegistration;

            // $regTrans->ref_number = $request->ref_number;
            $regTrans->vehicle_id = $request->vehicle_id;
            $regTrans->route_id = $request->route_id;
            $regTrans->driver_id = $request->driver_id;
            // $regTrans->total_cap = $request->total_cap;
            $regTrans->shift_id = $request->shift_id;
            $regTrans->student_id = $request->student_id;
            $regTrans->joining_date = $request->joining_date;

            $regTrans->save();

            if ($regTrans->save()) {
                $response = array(
                    'status' => true, 
                    'message' => 'Transport Registration has been completed successfully'
                );
                return response()->json($response);
            } else {
                $response = array(
                    'status' => false, 
                    'message' => 'Some thing went wrong please try again letter'
                );
                return response()->json($response);
            }
        }
    }

    public function edit($id) {
        $vehicle = Vehicle::get();
        $route = Route::get();
        $driver = Driver::get();
        $shift = Shift::get();
        $student = Student::get();

        $regTrans = TransportRegistration::find($id);

        $data = array(
            'regTrans'  => $regTrans,
            'vehicle'   => $vehicle,
            'route'     => $route,
            'driver'    => $driver,
            'shift'     => $shift,
            'student'   => $student,
            'page'      => 'Transport Registration',
            'menu'      => 'Edit Transport Registration',
        );

        return view('transport-registration.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            // 'ref_number' => 'required',
            'vehicle_id' => 'required',
            'route_id' => 'required',
            'driver_id' => 'required',
            // 'total_cap' => 'required',
            'shift_id' => 'required',
            'student_id' => 'required',
            'joining_date' => 'required'
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status' => false, 
                'error' => $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $regTrans = TransportRegistration::find($id);

            // $regTrans->ref_number = $request->ref_number;
            $regTrans->vehicle_id = $request->vehicle_id;
            $regTrans->route_id = $request->route_id;
            $regTrans->driver_id = $request->driver_id;
            // $regTrans->total_cap = $request->total_cap;
            $regTrans->shift_id = $request->shift_id;
            $regTrans->student_id = $request->student_id;
            $regTrans->joining_date = $request->joining_date;

            $regTrans->update();

            if ($regTrans->update()) {

                $response = array(
                    'status' => true, 
                    'message' => 'Transport Registration has been updated successfully'
                );

                return response()->json($response);

            } else {

                $response = array(
                    'status' => false, 
                    'message' => 'Some thing went worng please try again letter'
                );

                return response()->json($response);
            }
        }
    }

    public function delete(Request $request) {
        $trans_reg_id = $request->trans_reg_id;
        $query = TransportRegistration::find($trans_reg_id)->delete();
        
        if ($query) {

            $response = array(
                'status' => true, 
                'message' => 'Record has been deleted successfully!'
            );
        }

        else {
            $response = array(
                'status' => false,
                'message' => 'Some thing went worng try again later!'
            );
        }

        return response()->json($response);
    }
}