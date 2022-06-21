<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\CampusSchoolSystem;
use App\Models\TestInterviewGroup;
use App\Models\SchoolClass;
use App\Models\ClassGroup;
// use App\Models\CampusClassGroup;

class CampusController extends Controller
{

    public function getCampusSchoolSystemAndClassesByCampusId(Request $request){
        
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

            $campusSchoolSystems  =  $this->getCampusSchoolSystem($formData['campus_id']);
            $campusClasses        =  $this->getCampusClasses($formData['campus_id']);
           
            $response = array(
                'status'               => true,
                'campusSchoolSystems'  =>  $campusSchoolSystems,
                'campusClasses'        =>  $campusClasses
            );

            return response()->json($response);
        }
    }

    public function getCampusSchoolSystem($campus_id = NULL){
        
        // $school_systems = Campus::select('school_systems.*')
        //                     ->join('campus_school_systems','campus_school_systems.campus_id','=','campus.id')
        //                     ->join('school_systems','school_systems.id','=','campus_school_systems.school_systems_id')
        //                     ->where('campus.id',$campus_id)
        //                     ->where('campus.is_active',1)
        //                     ->where('campus.is_delete',0)
        //                     ->get();
        
        $school_systems = CampusSchoolSystem::select('school_systems.*')
                            ->join('campus_school_systems','campus_school_systems.system_id','=','school_systems.id')
                            ->where('campus_school_systems.campus_id',$campus_id)
                            ->where('school_systems.is_active',1)
                            ->where('school_systems.is_delete',0)
                            ->get();
                            
        
        // $response = array(
        //     'school_systems'  => $school_systems->toArray()
        // );
        
        // return response()->json($response);

        return $school_systems;
    }

    public function getCampusClasses($campus_id = NULL){
        
        $campus_classes = SchoolClass::select('classes.*')
                            ->join('campus_classes','campus_classes.class_id','=','classes.id')
                            ->where('campus_classes.campus_id',$campus_id)
                            ->where('classes.is_active',1)
                            ->where('classes.is_delete',0)
                            ->get();
                            

        return $campus_classes;
    }

    public function getclassGroupByCampusAndClassId(Request $request){
        
        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'        =>  'required|numeric|gt:0|digits_between:1,11'
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {
            
            $formData = $request->all();

            $classGroups  =  $this->getCampusClassGroups($formData);
            
            $response = array(
                'status'       => true,
                'classGroups'  =>  $classGroups,
            );

            return response()->json($response);
        }
    }

    public function getCampusClassGroups($formData){
        
        $classGroups = ClassGroup::select('class_groups.*')
                            ->join('campus_class_groups','campus_class_groups.class_group_id','=','class_groups.id')
                            ->where('campus_class_groups.campus_id',$formData['campus_id'])
                            ->where('campus_class_groups.class_id',$formData['class_id'])
                            ->where('class_groups.is_active',1)
                            ->where('class_groups.is_delete',0)
                            ->get();
                            

        return $classGroups;
    }

    public function getTestInterviewGroupByCampusId(Request $request){
        
        $validator = Validator::make($request->all(), [
            'session_id'       =>  'required|numeric|gt:0|digits_between:1,11',
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {
            
            $formData = $request->all();

            $testInterviewGroups  =  $this->testInterviewGroups($formData['session_id']);
            
            $response = array(
                'status'       => true,
                'interviewGroups'  =>  $testInterviewGroups['interviewGroups'],
                'testGroups'       =>  $testInterviewGroups['testGroups'],
            );

            return response()->json($response);
        }
    }

    public function testInterviewGroups($session_id){
        
        $testGroups = TestInterviewGroup::select('test_interview_groups.*')
                            ->join('sessions','sessions.id','=','test_interview_groups.session_id')
                            ->where('test_interview_groups.session_id',$session_id)
                            ->where('test_interview_groups.type','Test')
                            ->get();
        
        $interviewGroups = TestInterviewGroup::select('test_interview_groups.*')
                            ->join('sessions','sessions.id','=','test_interview_groups.session_id')
                            ->where('test_interview_groups.session_id',$session_id)
                            ->where('test_interview_groups.type','Interview')
                            ->get();
                            

        return array(
            'testGroups'      => $testGroups,
            'interviewGroups' => $interviewGroups,
        );
    }
}
