<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\SchoolSystem;
use App\Models\TestInterviewGroup;
use App\Models\CampusClass;
use App\Models\ClassGroup;
use App\Models\Classes;
use App\Models\Session;
use App\Models\Section;

class CampusController extends Controller
{
    public function getCampusSchoolSystemByCampusId(Request $request){
        
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
           
            $response = array(
                'status'               => true,
                'campusSchoolSystems'  =>  $campusSchoolSystems,
            );

            return response()->json($response);
        }
    }

    public function getCampusSchoolSystem($campus_id = NULL){
        
        $schoolSystems = Campus::select('school_systems.*')
                            ->join('campus_details','campus_details.campus_id','=','campuses.id')
                            ->join('school_systems','school_systems.id','=','campus_details.system_id')
                            ->where('campuses.id',$campus_id)
                            ->where('campuses.is_active',1)
                            ->where('campuses.is_delete',0)
                            ->get();

        return $schoolSystems;
    }

    public function getCampusClassesByCampusAndSystemId(Request $request){
        

        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'system_id'       =>  'required|numeric|gt:0|digits_between:1,11'
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {
            
            $formData = $request->all();
           
            $campusClasses        =  $this->getCampusClasses($formData);
           
            $response = array(
                'status'               => true,
                'campusClasses'        =>  $campusClasses
            );

            return response()->json($response);
        }
    }

    public function getCampusClasses($data = array()){
       
        $campusClasses = Classes::select('classes.id','classes.name')
                            ->join('campus_classes','campus_classes.class_id','=','classes.id')
                            ->join('campus_details','campus_details.id','=','campus_classes.campus_detail_id')
                            ->where('campus_details.campus_id',$data['campus_id'])
                            ->where('campus_details.system_id',$data['system_id'])
                            ->where('classes.is_active',1)
                            ->where('classes.is_delete',0)
                            ->get();
                            
        return $campusClasses;
    }

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

    public function getClassGroupAndSectionByCampusSystemAndClassId(Request $request){
        
        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'system_id'       =>  'required|numeric|gt:0|digits_between:1,11',
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

            $ClassGroupAndSection  =  $this->getCampusClassGroupAndSection($formData);
            
            $response = array(
                'status'         => true,
                'classGroups'    =>  $ClassGroupAndSection['classGroups'],
                'classSections'  =>  $ClassGroupAndSection['classSections'],
            );

            return response()->json($response);
        }
    }

    public function getCampusClassGroupAndSection($formData){

        
        $classGroups = ClassGroup::select('class_groups.*')
                            ->join('campus_class_groups','campus_class_groups.class_group_id','=','class_groups.id')
                            ->join('campus_classes','campus_classes.id','=','campus_class_groups.campus_class_id')
                            ->join('campus_details','campus_details.id','=','campus_classes.campus_detail_id')
                            ->where('campus_details.campus_id',$formData['campus_id'])
                            ->where('campus_details.system_id',$formData['system_id'])
                            ->where('campus_classes.class_id',$formData['class_id'])
                            ->where('class_groups.is_active',1)
                            ->where('class_groups.is_delete',0)
                            ->get();
        
        // $classSections = Section::select('class_sections.*')
        //                     ->join('campus_class_sections','campus_class_sections.class_group_id','=','class_sections.id')
        //                     ->join('campus_classes','campus_classes.id','=','campus_class_sections.campus_class_id')
        //                     ->join('campus_details','campus_details.id','=','campus_classes.campus_detail_id')
        //                     ->where('campus_details.campus_id',$formData['campus_id'])
        //                     ->where('campus_details.system_id',$formData['system_id'])
        //                     ->where('campus_classes.class_id',$formData['class_id'])
        //                     // ->where('class_sections.is_active',1)
        //                     // ->where('class_sections.is_delete',0)
        //                     ->get();
        
        $classSections = Section::get();                                
        
        return array(
            'classGroups'   => $classGroups,
            'classSections' => $classSections
        );
    }

    public function getTestInterviewGroupAndClassSectionByCampusSystemClassId(Request $request){
        
        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'system_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'        =>  'required|numeric|gt:0|digits_between:1,11',
            'session_id'      =>  'required|numeric|gt:0|digits_between:1,11'
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
            $campusClassSections  =  $this->campusClassSections($formData);
            
            $response = array(
                'status'              => true,
                'interviewGroups'     =>  $testInterviewGroups['interviewGroups'],
                'testGroups'          =>  $testInterviewGroups['testGroups'],
                'classSections' =>  $campusClassSections 
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

    public function sectionByCampusSytemClassSessionId(){
        
        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'system_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'        =>  'required|numeric|gt:0|digits_between:1,11',
            'class_group_id'  =>  'required|numeric|gt:0|digits_between:1,11'
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {
            
            $formData = $request->all();
            $campusClassSections  =  $this->campusClassSections($formData);
           
            $response = array(
                'status'               => true,
                'campusClassSections'  =>  $campusClassSections
            );

            return response()->json($response);
        }
    }

    public function campusClassSections($formData){
        
        $campusClassSections = Session::select('sessions.*')
                                ->join('campus_class_sections','campus_class_sections.section_id','=','school_systems.id')
                                ->where('school_systems.campus_id',$formData['campus_id'])
                                ->where('school_systems.system_id',$formData['system_id'])
                                ->where('school_systems.class_id',$formData['class_id'])
                                // ->where('school_systems.session_id',$formData['session_id'])
                                ->get();
        
        return $campusClassSections;
    }
}
