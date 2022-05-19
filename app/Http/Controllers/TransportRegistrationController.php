<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\TransportRegistrations;
use App\Models\Vehicles;
use App\Models\Routes;
use App\Models\Drivers;
use App\Models\Shifts;
use App\Models\Students;
use App\Models\Campuses;

class TransportRegistrationController extends Controller
{
    public function listing() {
        $transReg = TransportRegistrations::all();
        $data = array(
            'transReg'  =>  $transReg,
            'page'      =>  'Transport Registration',
            'menu'      =>  'Manage Registration'
        );

        return view('transport-registration.listing', compact('data'));
    }

    public function add() {
        $vehicles   =  Vehicles::get();
        $routes     =  Routes::get();
        $drivers    =  Drivers::get();
        $shifts     =  Shifts::get();
        $campuses  =  Campuses::get();
        $students   =  Students::get();

        $data = array(
            'vehicles'   =>  $vehicles,
            'routes'     =>  $routes,
            'drivers'    =>  $drivers,
            'shifts'     =>  $shifts,
            'campuses'   =>  $campuses,
            'students'   =>  $students,
            'page'      =>  'Transport Registration',
            'menu'      =>  'Add Registration'
        );

        return view('transport-registration.add', compact('data'));
    }

    public function store(Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'vehicle_id'    =>  'required',
            'driver_id'     =>  'required',
            'shift_id'      =>  'required',
            'student_id'    =>  'required',
            'joining_date'  =>  'required'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            
            $transportRegistration = new TransportRegistrations;

            $transportRegistration->vehicle_id    =  $request->vehicle_id;
            $transportRegistration->route_id      =  $request->route_id;
            $transportRegistration->driver_id     =  $request->driver_id;
            $transportRegistration->shift_id      =  $request->shift_id;
            $transportRegistration->student_id    =  $request->student_id;
            $transportRegistration->student_id    =  $request->student_id;
            $transportRegistration->joining_date  =  $request->joining_date;

            if ($transportRegistration->save()) {
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Transport Registration has been completed successfully'
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

    public function edit($id) {
        $vehicle   =  Vehicles::get();
        $route     =  Routes::get();
        $driver    =  Drivers::get();
        $shift     =  Shifts::get();
        $campuses  =  Campuses::get();
        $student   =  Students::get();

        $regTrans = TransportRegistrations::find($id);

        $data = array(
            'regTrans'  =>  $regTrans,
            'vehicle'   =>  $vehicle,
            'route'     =>  $route,
            'driver'    =>  $driver,
            'shift'     =>  $shift,
            'campuses'  =>  $campuses,
            'student'   =>  $student,
            'page'      =>  'Transport Registration',
            'menu'      =>  'Edit Transport Registration'
        );

        return view('transport-registration.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
            'route_id' => 'required',
            'driver_id' => 'required',
            'shift_id' => 'required',
            'student_id' => 'required',
            'joining_date' => 'required'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $regTrans = TransportRegistrations::find($id);

            $regTrans->vehicle_id    =  $request->vehicle_id;
            $regTrans->route_id      =  $request->route_id;
            $regTrans->driver_id     =  $request->driver_id;
            $regTrans->shift_id      =  $request->shift_id;
            $regTrans->campus_id     =  $request->shift_id;
            $regTrans->student_id    =  $request->student_id;
            $regTrans->joining_date  =  $request->joining_date;

            if ($regTrans->update()) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Transport Registration has been updated successfully'
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
        $trans_reg_id  =  $request->trans_reg_id;
        $query         =  TransportRegistrations::find($trans_reg_id)->delete();
        
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