<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SchoolClass;

class ClassController extends Controller
{
    public function getClassGroupByClassId(Request $request){
        
        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11'
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {
            
            $formData = $request->all();

            $schoolSystems  =  $this->getSchoolSystem($formData['campus_id']);
           
            $response = array(
                'schoolSystems'    =>  $schoolSystems
            );

            return response()->json($response);
        }
    }

    public function getSchoolSystem($campus_id = NULL){
        
        $school_systems = SchoolClass::select(' *')
                            ->join('campus_school_systems','campus_school_systems.system_id','=','school_systems.id')
                            ->where('campus_school_systems.campus_id',$campus_id)
                            ->where('school_systems.is_active',1)
                            ->where('school_systems.is_delete',0)
                            ->get();

        return $school_systems;
    }
}
