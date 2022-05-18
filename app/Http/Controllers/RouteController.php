<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Routes;

class RouteController extends Controller
{
    public function listing() {
        $routes = Routes::all();
        $data = array(
            'routes'     =>  $routes,
            'page'       =>  'Route',
            'menu'       =>  'Manage Route',
        );

        return view('route.listing', compact('data'));
    }

    public function add() {
        $data = array(
            'page'         =>  'Route',
            'menu'         =>  'Add Route',
        );

        return view('route.add', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'area' => 'required|min:4|max:30',
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status' => 0,
                'error' => $validator->errors()->toArray(),
            );
            return response()->json($response);
            
        } else {

            $route = new Routes;
            $route->area = $request->area;
            $route->save();

            if ($route->save()) {
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
        $route = Routes::find($id);
        $data = array(
            'route'        =>  $route,
            'page'         =>  'Route',
            'menu'         =>  'Edit Route',
        );

        return view('route.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'area' => 'required|min:4|max:30',
        ]);

        if (!$validator->errors()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);

        } else {
            $route = Routes::find($id);
            $route->area = $request->area;
            $route->update();

            if ($route->update()) {

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
        $route_id = $request->route_id;
        $query = Routes::find($route_id)->delete();

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
