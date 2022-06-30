<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Campus;
use App\Models\Classes;
use App\Models\CampusClassGroup;
use App\Models\StudentRegistration;
use App\Models\Session;
use App\Models\Area;
use App\Models\City;

class RegistrationController extends Controller
{
    public function create() {
        $campus   =  Campus::get();
        $session  =  Session::get();
        $area     =  Area::get();
        $class    =  Classes::get();
        $city     =  City::get();

        $data = array(
            'campus'   =>  $campus,
            'session'  =>  $session,
            'area'     =>  $area,
            'class'    =>  $class,
            'city'     =>  $city,
            'page'     =>  'Student Registration',
            'menu'     =>  'Add Student Registration'
        );

        return view('student.registration.add', compact('data'));
    }

    public function store(Request $request) {
        
        $formData = $request->all();

        // dd($formData);
        
        $validator = Validator::make($formData, [
            
            'campus_id'                 =>  'required|numeric|gt:0|digits_between:1,11',
            'system_id'                 =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'                  =>  'required|numeric|gt:0|digits_between:1,11',
            'class_group_id'            =>  'numeric|gt:0|digits_between:1,11',
            // 'form_no'                   =>  'required|max:10',
            'session_id'                =>  'required|numeric|gt:0|digits_between:1,11',
            'first_name'                =>  'required|alpha|max:30',
            'last_name'                 =>  'required|alpha|max:30',
            // 'dob'                       =>  'date_format:d-m-Y',
            'gender'                    =>  'required|alpha',
            // 'siblings_in_mpa'           =>  'numeric|gt:0|digits_between:1,11',
            // 'no_of_siblings'            =>  'numeric|gt:0|digits_between:1,11',
            // 'previous_class'            =>  'numeric|gt:0|digits_between:1,11',
            'previous_school'           =>  'max:60',
            // CURRENT ADDRESS
            'house_no'                  =>  'required|alpha_num|max:60',
            'block_no'                  =>  'required|alpha_num|max:60',
            // 'building_name_no'          =>  'required|alpha_num|max:60',
            'area_id'                   =>  'required|numeric|gt:0|digits_between:1,11',
            // 'city_id'                   =>  'required|numeric|gt:0|digits_between:1,11',
            // FATHERS DETAIL
            // 'father_salary'             =>  'numeric|gt:0|digits_between:1,11',
            'father_name'               =>  'required|max:30',
            // 'father_cnic'               =>  'required|numeric|gt:0|digits:13',
            // 'father_email'              =>  'email|max:60',
            // 'father_occupation'         =>  'alpha|max:30',
            'father_company_name'       =>  'max:30',
            'father_phone'              =>  'required|numeric|gt:0|digits:11',
            // 'hear_about_us'             =>  'alpha|max:20',
            // 'other'                     =>  'alpha|max:20',
            // TEST-INTERVIEW GROUP
            // 'test_group'                =>  'required_if:test_chkbox,on|numeric|gt:0|digits_between:1,11',
            // 'interview_group'           =>  'required_if:interview_chkbox,on|numeric|gt:0|digits_between:1,11'
        ]);

        if ($validator->fails()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()
            );
            
            return response()->json($response);
            
        } else {

            // dd($formData);
            // exit();

            $data = array(
                'campus_id'                 =>  $formData['campus_id'],
                'system_id'                 =>  $formData['system_id'],
                'class_id'                  =>  $formData['class_id'],
                'form_no'                   =>  $formData['form_no'],
                'session_id'                =>  $formData['session_id'],
                'registration_id'           =>  'q',
                'first_name'                =>  $formData['first_name'],
                'last_name'                 =>  $formData['last_name'],
                'dob'                       =>  $formData['dob'] ? date('Y-m-d', strtotime($formData['dob'])) : NULL,
                'gender'                    =>  $formData['gender'],
                'siblings_in_mpa'           =>  $formData['siblings_in_mpa'] ? $formData['siblings_in_mpa'] : 'No',
                'no_of_siblings'            =>  $formData['no_of_siblings'],
                'previous_class_id'         =>  $formData['previous_class'],
                'previous_school'           =>  $formData['previous_school'],
                'house_no'                  =>  $formData['house_no'],
                'block_no'                  =>  $formData['block_no'],
                'building_no'               =>  $formData['building_no'],
                'area_id'                   =>  $formData['area_id'],
                'city_id'                   =>  $formData['city_id'],
                'father_cnic'               =>  $formData['father_cnic'],
                'father_name'               =>  $formData['father_name'],
                'father_occupation'         =>  $formData['father_occupation'],
                'father_company_name'       =>  $formData['father_company_name'],
                'father_salary'             =>  $formData['father_salary'],
                'father_email'              =>  $formData['father_email'],
                'father_phone'              =>  $formData['father_phone'],
                'hear_about_us'             =>  $formData['hear_about_us'],
                'hear_about_us_other'       =>  isset($formData['hear_about_us_other']) ? $formData['hear_about_us_other'] : '',
                'test_group_id'             =>  $formData['test_group'],
                'interview_group_id'        =>  $formData['interview_group']
            );

            // dd($data['dob']);

            // dd($data);
            // if ($request->hear_about_us) {
            //     $data['hear_about_us'] = $formData['hear_about_us'];

            // } 
            // else if($request->other) {
            //     $hear_about_us = $formData['other'];

            // } else {
            //     $hear_about_us = NULL;
            // }

            // dd($formData['system_id']);

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

            dd($query);
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
