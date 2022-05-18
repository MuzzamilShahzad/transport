<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Drivers;

class DriverController extends Controller
{
    public function listing(){
        $drivers = Drivers::all();
        $data = array(
            'drivers'  =>  $drivers,
            'page'     =>  'Driver',
            'menu'     =>  'Manage Driver'
        );

        return view('driver.listing', compact('data'));
    }

    public function add(){
        $data = array(
            'page'  =>  'Driver',
            'menu'  =>  'Add Driver',
        );

        return view('driver.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'address'       =>  'required',
            'cnic'          =>  'required',
            'license_no'    =>  'required',
            'joining_date'  =>  'required',
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $driver = new Drivers;

            $driver->name          =  $request->name;
            $driver->address       =  $request->address;
            $driver->cnic          =  $request->cnic;
            $driver->license_no    =  $request->license_no;
            $driver->joining_date  =  $request->joining_date;

            $driver->save();

            if ($driver->save()) {
                
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Driver has been added successfully'
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

    public function edit($id){
        $driver = Drivers::find($id);
        $data = array(
            'driver'       =>  $driver,
            'page'         =>  'Driver',
            'menu'         =>  'Edit Driver'
        );

        return view('driver.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'address'       =>  'required',
            'cnic'          =>  'required',
            'license_no'    =>  'required',
            'joining_date'  =>  'required',
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $driver = Drivers::find($id);

            $driver->name          =  $request->name;
            $driver->address       =  $request->address;
            $driver->cnic          =  $request->cnic;
            $driver->license_no    =  $request->license_no;
            $driver->joining_date  =  $request->joining_date;

            $driver->update();

            if ($driver->update()) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Driver has been updated successfully'
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
        $driver_id  =  $request->driver_id;
        $query      =  Drivers::find($driver_id)->delete();

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
