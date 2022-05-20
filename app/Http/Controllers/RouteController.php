<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Route;

class RouteController extends Controller
{
    public function listing() {
        $Route = Route::all();
        $data = array(
            'Route'  =>  $Route,
            'page'    =>  'Route',
            'menu'    =>  'Manage Route',
        );

        return view('route.listing', compact('data'));
    }

    public function add() {
        $data = array(
            'page'  =>  'Route',
            'menu'  =>  'Add Route',
        );

        return view('route.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'area'  =>  'required|min:4|max:30',
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  0,
                'error'   =>  $validator->errors()->toArray(),
            );
            return response()->json($response);
            
        } else {

            $route = new Route;
            $route->area  =  $request->area;
            $query = $route->save();

            if ($query) {
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Route has been added successfully'
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
        $route = Route::find($id);
        $data = array(
            'route'  =>  $route,
            'page'   =>  'Route',
            'menu'   =>  'Edit Route',
        );

        return view('route.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'area'  =>  'required|min:4|max:30',
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $route = Route::find($id);
            $route->area  =  $request->area;
            $query = $route->update();

            if ($query) {

                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Route has been updated successfully'
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
        $route_id  =  $request->route_id;
        $query     =  Route::find($route_id)->delete();

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
