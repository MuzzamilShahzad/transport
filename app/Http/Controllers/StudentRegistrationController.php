<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Campus;
use App\Models\StudentClass;
use App\Models\Session;
use App\Models\Area;
use App\Models\StudentRegistration;
use App\Models\Group;

class StudentRegistrationController extends Controller
{
    public function add() {
        $campus        =  Campus::get();
        $studentClass  =  StudentClass::get();
        $session       =  Session::get();
        $area          =  Area::get();

        $data = array(
            'campus'        =>  $campus,
            'studentClass'  =>  $studentClass,
            'session'       =>  $session,
            'area'          =>  $area,
            'page'          =>  'Student Registration',
            'menu'          =>  'Add Student Registration'
        );

        return view('student-registration.add', compact('data'));
    }

    public function store(Request $request) {
        $formData = $request->all();

        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,10',
            'class_id'        =>  'required|numeric|gt:0|digits_between:1,10',
            'session_id'      =>  'required|numeric|gt:0|digits_between:1,10',
            'father_email'    =>  'email',
            'no_of_siblings'  =>  'numeric'
        ]);

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {

            if ($request->hear_about_us) {
                $hear_about_us = $formData['hear_about_us'];

            } else if($request->other) {
                $hear_about_us = $formData['other'];

            } else {
                $hear_about_us = NULL;
            }

            $data = array(
                'campus_id'                 =>  $formData['campus_id'],
                'system_type'               =>  $formData['system'],
                'class_id'                  =>  $formData['class_id'],
                'form_no'                   =>  $formData['form_no'],
                'session_id'                =>  $formData['session_id'],
                'computerize_registration'  =>  $formData['computerize_registration'],
                'first_name'                =>  $formData['first_name'],
                'last_name'                 =>  $formData['last_name'],
                'dob'                       =>  date('Y-m-d', strtotime($formData['dob'])),
                'gender'                    =>  $formData['gender'],
                'siblings_in_mpa'           =>  $formData['siblings_in_mpa'],
                'no_of_siblings'            =>  $formData['no_of_siblings'],
                'previous_class'            =>  $formData['previous_class'],
                'previous_school'           =>  $formData['previous_school'],
                'house_no'                  =>  $formData['house_no'],
                'block_no'                  =>  $formData['block_no'],
                'building_name_no'          =>  $formData['building_name_no'],
                'area_id'                   =>  $formData['area_id'],
                'city'                      =>  $formData['city'],
                'father_cnic'               =>  $formData['father_cnic'],
                'father_name'               =>  $formData['father_name'],
                'father_occupation'         =>  $formData['father_occupation'],
                'father_company_name'       =>  $formData['father_company_name'],
                'father_salary'             =>  $formData['father_salary'],
                'father_email'              =>  $formData['father_email'],
                'father_phone'              =>  $formData['father_phone'],
                'hear_about_us'             =>  $hear_about_us,
                'test_group'                =>  $formData['test_group'],
                'interview_group'           =>  $formData['interview_group']
            );

            $query = StudentRegistration::create($data);
            
            if ($query) {
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Student Registration has been completed successfully.'
                );
            } else {
                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went wrong! please try again letter!'
                );
            }
            return response()->json($response);  
        }
    }

    public function getSessionGroups(Request $request){
        $session_id = $request->session_id;
        
        $testGroups = Group::where('session_id',$session_id)->where('type','Test')->get();
        $InterviewGroups = Group::where('session_id',$session_id)->where('type','Interview')->get();
       
        $response = array(
            'testGroups'       =>  $testGroups,
            'InterviewGroups'  =>  $InterviewGroups
        );

        return response()->json($response);
    }
}
