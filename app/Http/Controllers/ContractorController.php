<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Contractor;

class ContractorController extends Controller
{
    public function listing() {
        $Contractor = Contractor::all();
        $data = array(
            'Contractor'  =>  $Contractor, 
            'page'         =>  'Contractor',
            'menu'         =>  'Manage Contractor',
        );

        return view('contractor.listing', compact('data'));
    }

    public function add() {
        $data = array(
            'page'  =>  'Contractor',
            'menu'  =>  'Add Contractor',
        );

        return view('contractor.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|min:4|max:30',
            'area'  =>  'required|min:4|max:30',
            'cnic'  =>  'required|min:4|max:30',
        ]);

        if (!$validator->errors()) {
            
            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
        
        } else {
            $contractor = new Contractor;

            $contractor->name  =  $request->name;
            $contractor->area  =  $request->area;
            $contractor->cnic  =  $request->cnic;

            $query = $contractor->save();

            if ($query) {
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Contractor has been added successfully'
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

    public function edit($id) {
        $contractor = Contractor::find($id);
        $data = array(
            'contractor'  =>  $contractor,
            'page'        =>  'Contractor',
            'menu'        =>  'Edit Contractor',
        );

        return view('contractor.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|min:4|max:30',
            'area'  =>  'required|min:4|max:30',
            'cnic'  =>  'required|min:4|max:30'
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $contractor = Contractor::find($id);

            $contractor->name  =  $request->name;
            $contractor->area  =  $request->area;
            $contractor->cnic  =  $request->cnic;

            $query = $contractor->update();

            if ($query) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Contractor has been updated successfully'
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
        $contractor_id  =  $request->contractor_id;
        $query          =  Contractor::find($contractor_id)->delete();
        
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