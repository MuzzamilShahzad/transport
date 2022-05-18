<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\DriverVehicle;
use App\Models\Vehicle;
use App\Models\Route;
use App\Models\Driver;
use App\Models\Shift;

class DriverVehicleController extends Controller
{
    public function listing() {
        $driverVehicles = DriverVehicle::all();
        $data = array(
            'page'         => 'Driver Vehicle',
            'menu'         => 'Manage Driver Vehicle',
        );

        return view('driver_vehicle.listing', compact('data','driverVehicles'));
    }

    public function add(){
        $vehicle = Vehicle::get();
        $route = Route::get();
        $driver = Driver::get();
        $shift = Shift::get();

        $data = array(
            'page'         => 'Driver Vehicle',
            'menu'         => 'Add Driver Vehicle',
        );

        return view('driver_vehicle.add', compact('data', 'vehicle', 'route', 'driver', 'shift'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'route_id' => 'required',
            'shift_time_id' => 'required',
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status' => false, 
                'error' => $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $driverVehicle = new DriverVehicle;

            $driverVehicle->vehicle_id = $request->vehicle_id;
            $driverVehicle->driver_id = $request->driver_id;
            $driverVehicle->route_id = $request->route_id;
            $driverVehicle->shift_time_id = $request->shift_time_id;

            $driverVehicle->save();

            if ($driverVehicle->save()) {
                $response = array(
                    'status' => true, 
                    'message' => 'Driver Vehicle has been added successfully'
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

    public function edit($id){
        $vehicle = Vehicle::get();
        $route = Route::get();
        $driver = Driver::get();
        $shift = Shift::get();

        $driverVehicle = DriverVehicle::find($id);

        $data = array(
            'page'         => 'Driver Vehicle',
            'menu'         => 'Edit Driver Vehicle',
        );

        return view('driver_vehicle.edit', compact('data', 'vehicle', 'route', 'driver', 'shift', 'driverVehicle'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'route_id' => 'required',
            'shift_time_id' => 'required',
        ]);

        if (!$validator->passes()) {

            $response = array(
                'status' => false, 
                'error' => $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $driverVehicle = DriverVehicle::find($id);

            $driverVehicle->vehicle_id = $request->vehicle_id;
            $driverVehicle->driver_id = $request->driver_id;
            $driverVehicle->route_id = $request->route_id;
            $driverVehicle->shift_time_id = $request->shift_time_id;

            $driverVehicle->update();

            if ($driverVehicle->update()) {

                $response = array(
                    'status' => true, 
                    'message' => 'Driver Vehicle has been updated successfully'
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
        $driver_id = $request->driver_id;
        $query = DriverVehicle::find($driver_id)->delete();

        if ($query) {

            $response = array(
                'code' => 1, 
                'message' => 'Record has been deleted!'
            );

            return response()->json($response); 
        }
    }
}
