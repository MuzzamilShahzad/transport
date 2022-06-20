<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Campus;
use App\Models\StudentClass;
use App\Models\Session;
use App\Models\Area;
use App\Models\StudentRegistration;
use App\Models\Group;

class RegistrationController extends Controller
{
    public function create() {
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

        return view('student.registration.add', compact('data'));
    }

    public function store(Request $request) {
        $formData = $request->all();
        
        
        $validator = Validator::make($request->all(), [
            // 'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            // 'class_id'        =>  'required|numeric|gt:0|digits_between:1,11',
            // 'session_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            // 'father_email'    =>  'email',
            // 'no_of_siblings'  =>  'numeric',

            'campus_id'                 =>  'required|numeric|gt:0|digits_between:1,11',
            'school_system_id'          =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'                  =>  'required|numeric|gt:0|digits_between:1,11',
            'class_group_id'            =>  'required|numeric|gt:0|digits_between:1,11',
            'form_no'                   =>  'required|max:10',
            'session_id'                =>  'required|numeric|gt:0|digits_between:1,11',
            // 'computerize_registration'  =>   computerize_registration,
            'first_name'                =>  'required|alpha|max:30',
            'last_name'                 =>  'required|alpha|max:30',
            'dob'                       =>  dob,
            'gender'                    =>  'required|alpha',
            'siblings_in_mpa'           =>  'numeric|gt:0|digits_between:1,11',
            'no_of_siblings'            =>  'required|numeric|gt:0|digits_between:1,11',
            'previous_class'            =>  'max:60',
            'previous_school'           =>  'max:60',
            // CURRENT ADDRESS
            'house_no'                  =>  'required|alpha_num|max:60',
            'block_no'                  =>  'required|alpha_num|max:60',
            'building_name_no'          =>  'required|alpha_num|max:60',
            'area_id'                   =>  'required|numeric|gt:0|digits_between:1,11',
            'city_id'                   =>  'required|numeric|gt:0|digits_between:1,11',
            // FATHERS DETAIL
            'father_salary'             =>  'numeric|gt:0|digits_between:1,11',
            'father_name'               =>  'required|max:30',
            'father_cnic'               =>  'required|numeric|gt:0|digits:13',
            'father_email'              =>  'email|max:60',
            'father_occupation'         =>  'alpha|max:30',
            'father_company_name'       =>  'alpha_num|max:30',
            'father_phone'              =>  'required|numeric|gt:0|digits:12',
            'hear_about_us'             =>  'alpha|max:20',
            'other'                     =>  'alpha|max:20',
            // TEST-INTERVIEW GROUP
            'test_group'                =>  'required_if:is_test_group,on|numeric|gt:0|digits_between:1,11',
            'interview_group'           =>  'required_if:is_interview_group,on|numeric|gt:0|digits_between:1,11'
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {
            exit();

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
                // 'hear_about_us'             =>  $hear_about_us,
                'test_group'                =>  $formData['test_group'],
                'interview_group'           =>  $formData['interview_group']
            );

            if ($request->hear_about_us) {
                $data['hear_about_us'] = $formData['hear_about_us'];

            } 
            // else if($request->other) {
            //     $hear_about_us = $formData['other'];

            // } else {
            //     $hear_about_us = NULL;
            // }


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
