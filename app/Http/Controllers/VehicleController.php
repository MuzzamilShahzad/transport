<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Vehicle;
use App\Models\Contractor;

class VehicleController extends Controller
{
    public function listing() {
        $vehicles = Vehicle::all();
        $data = array(
            'vehicles'      => $vehicles,
            'page'         => 'Vehicle',
            'menu'         => 'Manage Vehicle',
        );

        return view('vehicle.listing', compact('data'));
    }

    public function add() {
        $contractors = Contractor::get();
        $data = array(
            'contractors'   => $contractors,
            'page'         => 'Vehicle',
            'menu'         => 'Add Vehicle',
        );

        return view('vehicle.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'number' => 'required|min:1|max:20',
            'maker' => 'required|min:1|max:20',
            'chassis_number' => 'required|min:1|max:20',
            'engine_number' => 'required|min:1|max:20',
            'capacity' => 'required',
            'contractor_id' => 'required'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status' => false, 
                'error' => $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $vehicle = new Vehicle;
            $vehicle->number = $request->number;
            $vehicle->maker = $request->maker;
            $vehicle->chassis_number = $request->chassis_number;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->capacity = $request->capacity;
            $vehicle->contractor_id = $request->contractor_id;
            $vehicle->save();

            if ($vehicle->save()) {

                $response = array(
                    'status' => true, 
                    'message' => 'Vehicle has been added successfully'
                );

                return response()->json($response);

            } else {

                $response = array(
                    'status' => false, 
                    'message' => 'Some thing went please try again letter'
                );
                
                return response()->json($response);
            }
        }
    }

    public function edit($id){
        $contractor = Contractor::get();
        $vehicle = Vehicle::find($id);
        $data = array(
            'contractor'   => $contractor,
            'vehicle'      => $vehicle,
            'page'         => 'Vehicle',
            'menu'         => 'Edit Vehicle',
        );

        return view('vehicle.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'number' => 'required|min:1|max:20',
            'maker' => 'required|min:1|max:20',
            'chassis_number' => 'required|min:1|max:20',
            'engine_number' => 'required|min:1|max:20',
            'capacity' => 'required',
            'contractor_id' => 'required'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status' => false, 
                'error' => $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $vehicle = Vehicle::find($id);
            $vehicle->number = $request->number;
            $vehicle->maker = $request->maker;
            $vehicle->chassis_number = $request->chassis_number;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->capacity = $request->capacity;
            $vehicle->contractor_id = $request->contractor_id;
            $vehicle->update();

            if ($vehicle->update()) {

                $response = array(
                    'status' => true, 
                    'message' => 'Vehicle has been updated successfully'
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
        $vehicle_id = $request->vehicle_id;
        $query = Vehicle::find($vehicle_id)->delete();

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