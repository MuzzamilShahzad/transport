<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Vehicles;
use App\Models\Contractors;
use App\Models\TransportRegistrations;

class VehicleController extends Controller
{
    public function listing() {
        $vehicles = Vehicles::all();
        $data = array(
            'vehicles'  =>  $vehicles,
            'page'      =>  'Vehicle',
            'menu'      =>  'Manage Vehicle',
        );

        return view('vehicle.listing', compact('data'));
    }

    public function add() {
        $contractors = Contractors::get();
        $data = array(
            'contractors'  => $contractors,
            'page'         => 'Vehicle',
            'menu'         => 'Add Vehicle',
        );

        return view('vehicle.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'vehicle_number'  =>  'required|min:1|max:20',
            'maker'           =>  'required|min:1|max:20',
            'chassis_number'  =>  'required|min:1|max:20',
            'engine_number'   =>  'required|min:1|max:20',
            'capacity'        =>  'required',
            'contractor_id'   =>  'required'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $vehicle = new Vehicles;

            $vehicle->number          =  $request->vehicle_number;
            $vehicle->maker           =  $request->maker;
            $vehicle->chassis_number  =  $request->chassis_number;
            $vehicle->engine_number   =  $request->engine_number;
            $vehicle->capacity        =  $request->capacity;
            $vehicle->contractor_id   =  $request->contractor_id;

            $query = $vehicle->save();

            if ($query) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Vehicle has been added successfully'
                );

                return response()->json($response);

            } else {

                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went please try again letter'
                );
                
                return response()->json($response);
            }
        }
    }

    public function edit($id){
        $contractor = Contractors::get();
        $vehicle = Vehicles::find($id);
        $data = array(
            'contractor'  =>  $contractor,
            'vehicle'     =>  $vehicle,
            'page'        =>  'Vehicle',
            'menu'        =>  'Edit Vehicle',
        );

        return view('vehicle.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'vehicle_number'  =>  'required|min:1|max:20',
            'maker'           =>  'required|min:1|max:20',
            'chassis_number'  =>  'required|min:1|max:20',
            'engine_number'   =>  'required|min:1|max:20',
            'capacity'        =>  'required',
            'contractor_id'   =>  'required'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $vehicle = Vehicles::find($id);

            $vehicle->number          =  $request->vehicle_number;
            $vehicle->maker           =  $request->maker;
            $vehicle->chassis_number  =  $request->chassis_number;
            $vehicle->engine_number   =  $request->engine_number;
            $vehicle->capacity        =  $request->capacity;
            $vehicle->contractor_id   =  $request->contractor_id;

            $query = $vehicle->update();

            if ($query) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Vehicle has been updated successfully'
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
        $vehicle_id  =  $request->vehicle_id;
        $query       =  Vehicles::find($vehicle_id)->delete();

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

    public function getTotalCapacity(Request $request){
        $vehicle_id = $request->vehicle_id;

        $totalCapacity = Vehicles::select('capacity')->where('id',$vehicle_id)->get();
        $registerCount = TransportRegistrations::select('vehicle_id')->where('vehicle_id',$vehicle_id)->count();

        $response = array(
            'totalCapacity'  => $totalCapacity[0]['capacity'],
            'registerCount'  =>  $registerCount
        );

        return response()->json($response);
    }

    // public function getRemainingCapacity(Request $request){
    //     $vehicle_id = $request->vehicle_id;

    //     $totalCapacity = Vehicles::select('capacity')->where('id',$vehicle_id)->get();
    //     $registerCount = TransportRegistrations::select('vehicle_id')->where('vehicle_id',$vehicle_id)->count();

    //     // $remainingCapacity = $totalCapacity - $registerCount;
    //     return response()->json($registerCount);
    // }
}