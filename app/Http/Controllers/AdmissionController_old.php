<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Campus;
use App\Models\Session;
use App\Models\StudentClass;
use App\Models\Section;
use App\Models\Category;
use App\Models\SchoolHouse;
use App\Models\Area;
use App\Models\System;
use App\Models\Admission;
use App\Models\Student;

class AdmissionController_old extends Controller
{
    public function add() {
        $campus        =  Campus::get();
        $session       =  Session::get();
        $studentClass  =  StudentClass::get();
        $section       =  Section::get();
        $category      =  Category::get();
        $schoolHouse   =  SchoolHouse::get();
        $area          =  Area::get();

        $data = array(
            'campus'        =>  $campus,
            'session'       =>  $session,
            'studentClass'  =>  $studentClass,
            'section'       =>  $section,
            'category'      =>  $category,
            'schoolHouse'   =>  $schoolHouse,
            'area'          =>  $area,
            'page'          =>  'Admission',
            'menu'          =>  'Add Admission'
        );

        return view('admission.add', compact('data'));
    }

    public function store(Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'campus_id'             =>  'required|numeric|gt:0|digits_between:1,11',
            'session_id'            =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'              =>  'required|numeric|gt:0|digits_between:1,11',
            'section_id'            =>  'required|numeric|gt:0|digits_between:1,11',
            'category_id'           =>  'required|numeric|gt:0|digits_between:1,11',
            'admission_date'        =>  'required|date_format:d-m-Y'
        ]);

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            DB::transaction(function() use($request){

                $student = new Student;

                $student->first_name                        =  $request->first_name;
                $student->last_name                         =  $request->last_name;
                $student->dob                               =  date('Y-m-d', strtotime($request->dob));
                $student->gender                            =  $request->gender;
                $student->place_of_birth                    =  $request->place_of_birth;
                $student->nationality                       =  $request->nationality;
                $student->bform_crms_no                     =  $request->bform_crms_no;
                $student->religion                          =  $request->religion;
                $student->admission_date                    =  date('Y-m-d', strtotime($request->admission_date));
                $student->blood_group                       =  $request->blood_group;
                $student->height                            =  $request->height;
                $student->weight                            =  $request->weight;
                $student->save();

                $admission = new Admission;

                $admission->student_id                      =  $student->id;
                $admission->temporary_gr                    =  $request->temporary_gr;
                $admission->gr                              =  $request->gr;
                $admission->campus_id                       =  $request->campus_id;
                $admission->session_id                      =  $request->session_id;
                $admission->system                          =  $request->system;
                $admission->roll_no                         =  $request->roll_no;
                $admission->class_id                        =  $request->class_id;
                $admission->section_id                      =  $request->section_id;
                $admission->mother_tongue                   =  $request->mother_tongue;
                $admission->previous_class                  =  $request->previous_class;
                $admission->previous_school                 =  $request->previous_school;
                $admission->category_id                     =  $request->category_id;
                $admission->mobile_no                       =  $request->mobile_no;
                $admission->email                           =  $request->email;
                $admission->school_house_id                 =  $request->school_house_id;
                $admission->as_on_date                      =  date('Y-m-d', strtotime($request->as_on_date));
                $admission->fee_discount                    =  $request->fee_discount;
                $admission->student_vaccinated              =  $request->student_vaccinated;
                $admission->father_cnic                     =  $request->father_cnic;
                $admission->father_salary                   =  $request->father_salary;
                $admission->father_email                    =  $request->father_email;
                $admission->father_name                     =  $request->father_name;
                $admission->father_phone                    =  $request->father_phone;
                $admission->father_occupation               =  $request->father_occupation;
                $admission->father_company_name             =  $request->father_company_name;
                $admission->father_vaccinated               =  $request->father_vaccinated;
                $admission->mother_cnic                     =  $request->mother_cnic;
                $admission->mother_salary                   =  $request->mother_salary;
                $admission->mother_email                    =  $request->mother_email;
                $admission->mother_name                     =  $request->mother_name;
                $admission->mother_phone                    =  $request->mother_phone;
                $admission->mother_occupation               =  $request->mother_occupation;
                $admission->mother_company_name             =  $request->mother_company_name;
                $admission->mother_vaccinated               =  $request->mother_vaccinated;
                $admission->guardian_cnic                   =  $request->guardian_cnic;
                $admission->guardian_first_name             =  $request->guardian_first_name;
                $admission->guardian_phone                  =  $request->guardian_phone;

                if ($request->guardian_relation) {
                    $admission->guardian_relation           =  $request->guardian_relation;
                    
                } else if ($request->other_relation) {
                    $admission->guardian_relation           =  $request->other_relation;

                } else {
                    $admission->guardian_relation           =  NULL;
                }

                $admission->first_person_call               =  $request->first_person_call;

                $admission->current_house_no                =  $request->current_house_no;
                $admission->current_block_no                =  $request->current_block_no;
                $admission->current_building_name_no        =  $request->current_building_name_no;
                $admission->current_city                    =  $request->current_city;
                $admission->current_area_id                 =  $request->current_area_id;

                if ($request->same_as_current == 'yes') {
                    $admission->permanent_house_no          =  $request->current_house_no;
                    $admission->permanent_block_no          =  $request->current_block_no;
                    $admission->permanent_building_name_no  =  $request->current_building_name_no;
                    $admission->permanent_city              =  $request->current_city;
                    $admission->permanent_area_id           =  $request->current_area_id; 
                } else {
                    $admission->permanent_house_no          =  $request->permanent_house_no;
                    $admission->permanent_block_no          =  $request->permanent_block_no;
                    $admission->permanent_building_name_no  =  $request->permanent_building_name_no;
                    $admission->permanent_city              =  $request->permanent_city;
                    $admission->permanent_area_id           =  $request->permanent_area_id;
                }

                $admission->pick_and_drop_detail            =  $request->pick_and_drop_detail;
                $admission->ride_vehicle_no                 =  $request->ride_vehicle_no;
                $admission->school_driver_name              =  $request->school_driver_name;
                $admission->school_driver_phone             =  $request->school_driver_phone;
                $admission->school_vehicle_no               =  $request->school_vehicle_no;
                $admission->private_driver_name             =  $request->private_driver_name;
                $admission->private_driver_phone            =  $request->private_driver_phone;
                $admission->private_vehicle_no              =  $request->private_vehicle_no;
                
                $query = $admission->save();  
            });

            // if ($query) {
                $response = array(
                    'status'   =>  true, 
                    'message'  =>  'Admission has been completed successfully.'
                );
            // } else {
            //     $response = array(
            //         'status'   =>  false, 
            //         'message'  =>  'Some thing went wrong! please try again letter.'
            //     );
            // }
            return response()->json($response);  

           
        }
    }

    public function getCampusSystem(Request $request){
        $campus_id = $request->campus_id;
        
        $query = Campus::select('system_id')->where('id',$campus_id)->first();
        $system_id = $query['system_id'];

        $system = System::select('type')->where('id',$system_id)->first();
       
        $response = array(
            'system'  => $system['type']
        );

        return response()->json($response);
    }
}
