<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Driver;

class DriverController extends Controller
{
    public function listing(){
        $Driver = Driver::all();
        $data = array(
            'Driver'  =>  $Driver,
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

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $driver = new Driver;

            $driver->name          =  $request->name;
            $driver->address       =  $request->address;
            $driver->cnic          =  $request->cnic;
            $driver->license_no    =  $request->license_no;
            $driver->joining_date  =  date('Y-m-d', strtotime($request->joining_date));

            $query = $driver->save();

            if ($query) {
                
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
        $driver = Driver::find($id);
        $data = array(
            'driver'  =>  $driver,
            'page'    =>  'Driver',
            'menu'    =>  'Edit Driver'
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

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $driver = Driver::find($id);

            $driver->name          =  $request->name;
            $driver->address       =  $request->address;
            $driver->cnic          =  $request->cnic;
            $driver->license_no    =  $request->license_no;
            $driver->joining_date  =  date('Y-m-d', strtotime($request->joining_date));

            $query = $driver->update();

            if ($query) {

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
        $query      =  Driver::find($driver_id)->delete();

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
