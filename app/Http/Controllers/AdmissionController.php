<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Imports\StudentAdmissionImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

use App\Models\Campus;
use App\Models\Session;
use App\Models\Classes;
use App\Models\Section;
// use App\Models\Category;
// use App\Models\SchoolHouse;
use App\Models\Area;
use App\Models\System;

use App\Models\Student;
use App\Models\StudentFatherDetails;
use App\Models\StudentMotherDetails;
use App\Models\StudentGuardianDetails;
use App\Models\StudentAddressDetail;
use App\Models\StudentTransportDetails;
use App\Models\StudentReligionType;
use App\Models\StudentSiblingDetails;
use App\Models\StudentDetails;

class AdmissionController extends Controller
{
    public function listing() {
        $students        =  Student::all();
        $campuses        =  Campus::get();
        $sessions        =  Session::get();
        $studentClasses  =  StudentClass::get();
        $sections        =  Section::get();
        $categories      =  Category::get();
        $schoolHouses    =  SchoolHouse::get();
        $areas           =  Area::get();

        $data = array(
            'students'        =>  $students,
            'campuses'        =>  $campuses,
            'sessions'        =>  $sessions,
            'studentClasses'  =>  $studentClasses,
            'sections'        =>  $sections,
            'categories'      =>  $categories,
            'schoolHouses'    =>  $schoolHouses,
            'areas'           =>  $areas,
            'page'            =>  'Admission',
            'menu'            =>  'Manage Admission'
        );

        return view('admission.listing', compact('data'));
    }

    public function create() {
        $campus        =  Campus::where('is_active',1)->where('is_delete',0)->get();
        $session       =  Session::get();
        $area          =  Area::get();

        $data = array(
            'campus'   =>  $campus,
            'session'  =>  $session,
            'area'     =>  $area,
            'page'     =>  'Admission',
            'menu'     =>  'Add Admission'
        );

        return view('admission.add', compact('data'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,11',
            'session_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'        =>  'required|numeric|gt:0|digits_between:1,11',
            'section_id'      =>  'required|numeric|gt:0|digits_between:1,11',
            'category_id'     =>  'required|numeric|gt:0|digits_between:1,11',
            'admission_date'  =>  'required|date_format:d-m-Y'
        ]);

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $success = false;
            DB::beginTransaction();
            try {
                $student = Student::create([
                    'gr'                  =>  $request->gr,
                    'bform_crms_no'       =>  $request->bform_crms_no,
                    'dob'                 =>  date('Y-m-d', strtotime($request->dob)),
                    'gender'              =>  $request->gender,
                    'place_of_birth'      =>  $request->place_of_birth,
                    'nationality'         =>  $request->nationality,
                    'mother_tongue'       =>  $request->mother_tongue,
                    'first_name'          =>  $request->first_name,
                    'last_name'           =>  $request->last_name,
                    'religion'            =>  $request->religion,
                    'admission_date'      =>  date('Y-m-d', strtotime($request->admission_date)),
                    'previous_class'      =>  $request->previous_class,
                    'previous_school'     =>  $request->previous_school,
                    'blood_group'         =>  $request->blood_group,
                    'height'              =>  $request->height,
                    'weight'              =>  $request->weight,
                    'student_vaccinated'  =>  $request->student_vaccinated,
                    'as_on_date'          =>  date('Y-m-d', strtotime($request->as_on_date)),
                    'fee_discount'        =>  $request->fee_discount,
                    'system'              =>  $request->system,
                    'roll_no'             =>  $request->roll_no,
                    'temporary_gr'        =>  $request->temporary_gr,
                    'mobile_no'           =>  $request->mobile_no,
                    'email'               =>  $request->email
                ]);

                if ($student) {

                    $studentFatherDetails = StudentFatherDetails::create([
                        'name'          =>  $request->father_name,
                        'cnic'          =>  $request->father_cnic,
                        'phone'         =>  $request->father_phone,
                        'email'         =>  $request->father_email,
                        'occupation'    =>  $request->father_occupation,
                        'company_name'  =>  $request->father_company_name,
                        'salary'        =>  $request->father_salary,
                        'vaccinated'    =>  $request->father_vaccinated
                    ]);

                    if ($studentFatherDetails) {

                        $studentMotherDetails = StudentMotherDetails::create([
                            'name'          =>  $request->mother_name,
                            'cnic'          =>  $request->mother_cnic,
                            'phone'         =>  $request->mother_phone,
                            'email'         =>  $request->mother_email,
                            'occupation'    =>  $request->mother_occupation,
                            'company_name'  =>  $request->mother_company_name,
                            'salary'        =>  $request->mother_salary,
                            'vaccinated'    =>  $request->mother_vaccinated
                        ]);

                        if ($studentMotherDetails) {

                            $studentGuardianDetails = StudentGuardianDetails::create([
                                'name'               =>  $request->guardian_first_name,
                                'phone'              =>  $request->guardian_phone,
                                'relation'           =>  $request->guardian_relation,
                                'other_relation'     =>  $request->other_relation,
                                'first_person_call'  =>  $request->first_person_call,
                                'cnic'               =>  $request->guardian_cnic
                            ]);

                            if ($studentGuardianDetails) {

                                if ($request->same_as_current == 'yes') {
                                    $permenant_house_no          =  $request->current_house_no;
                                    $permenant_block_no          =  $request->current_block_no;
                                    $permenant_building_name_no  =  $request->current_building_name_no;
                                    $permenant_city              =  $request->current_city;
                                    $permenant_area_id           =  $request->current_area_id; 
                                } else {
                                    $permenant_house_no          =  $request->permenant_house_no;
                                    $permenant_block_no          =  $request->permenant_block_no;
                                    $permenant_building_name_no  =  $request->permenant_building_name_no;
                                    $permenant_city              =  $request->permenant_city;
                                    $permenant_area_id           =  $request->permenant_area_id;
                                }

                                $studentAddressDetail = StudentAddressDetail::create([
                                    'current_house_no'            =>  $request->current_house_no,
                                    'current_block_no'            =>  $request->current_block_no,
                                    'current_building_name_no'    =>  $request->current_building_name_no,
                                    'current_city'                =>  $request->current_city,
                                    'current_area_id'             =>  $request->current_area_id,

                                    'permenant_house_no'          =>  $permenant_house_no,
                                    'permenant_block_no'          =>  $permenant_block_no,
                                    'permenant_building_name_no'  =>  $permenant_building_name_no,
                                    'permenant_city'              =>  $permenant_city,
                                    'permenant_area_id'           =>  $permenant_area_id
                                ]);

                                if ($studentAddressDetail) {

                                    $studentTransportDetails = StudentTransportDetails::create([
                                        'pick_and_drop_detail'  =>  $request->pick_and_drop_detail,
                                        'ride_vehicle_no'       =>  $request->ride_vehicle_no,

                                        'school_driver_name'    =>  $request->school_driver_name,
                                        'school_driver_phone'   =>  $request->school_driver_phone,
                                        'school_vehicle_no'     =>  $request->school_vehicle_no,

                                        'private_driver_name'   =>  $request->private_driver_name,
                                        'private_driver_phone'  =>  $request->private_driver_phone,
                                        'private_vehicle_no'    =>  $request->private_vehicle_no
                                    ]);

                                    if ($studentTransportDetails) {

                                        $studentReligionType = StudentReligionType::create([
                                            'religion_type'   =>  $request->religion_type,
                                            'other_religion'  =>  $request->other_religion
                                        ]);

                                        if ($studentReligionType) {

                                            $studentSiblingDetails = StudentSiblingDetails::create([
                                                'siblings_in_mpa'  =>  $request->siblings_in_mpa,
                                                'no_of_siblings'   =>  $request->no_of_siblings
                                            ]);

                                            if ($studentSiblingDetails) {

                                                $studentDetails = StudentDetails::create([
                                                    'student_id'                =>  $student->id,
                                                    'campus_id'                 =>  $request->campus_id,
                                                    'session_id'                =>  $request->session_id,
                                                    'class_id'                  =>  $request->class_id,
                                                    'section_id'                =>  $request->section_id,
                                                    'category_id'               =>  $request->category_id,
                                                    'school_house_id'           =>  $request->school_house_id,

                                                    'student_father_id'         =>  $studentFatherDetails->id,
                                                    'student_mother_id'         =>  $studentMotherDetails->id,
                                                    'student_guardian_id'       =>  $studentGuardianDetails->id,
                                                    'student_address_id'        =>  $studentAddressDetail->id,
                                                    'student_transport_id'      =>  $studentTransportDetails->id,
                                                    'student_religion_type_id'  =>  $studentReligionType->id,
                                                    'student_sibling_id'        =>  $studentSiblingDetails->id
                                                ]);

                                                if ($studentDetails) {

                                                    $success = true;

                                                    if ($success) {
                                                        DB::commit();

                                                        $response = array(
                                                            'status'   =>  true, 
                                                            'message'  =>  'Admission has been completed successfully.'
                                                        );
                                                        return response()->json($response);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollback();
                $success = false;
                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went wrong!'
                );
                return response()->json($response);
            }
        }
    }

    public function edit($id) {
        $student       =  Student::find($id);
        $campus        =  Campus::get();
        $session       =  Session::get();
        $studentClass  =  StudentClass::get();
        $section       =  Section::get();
        $category      =  Category::get();
        $schoolHouse   =  SchoolHouse::get();
        $area          =  Area::get();

        $studentDetails           =  StudentDetails::where('student_id',$id)->first();
        $studentReligionType      =  StudentReligionType::where('id',$studentDetails->student_religion_type_id)->first();
        $studentSiblingDetails    =  StudentSiblingDetails::where('id',$studentDetails->student_sibling_id)->first();
        $studentFatherDetails     =  StudentFatherDetails::where('id',$studentDetails->student_father_id)->first();
        $studentMotherDetails     =  StudentMotherDetails::where('id',$studentDetails->student_mother_id)->first();
        $StudentGuardianDetails   =  StudentGuardianDetails::where('id',$studentDetails->student_guardian_id)->first();
        $studentAddressDetail     =  StudentAddressDetail::where('id',$studentDetails->student_address_id)->first();
        $studentTransportDetails  =  StudentTransportDetails::where('id',$studentDetails->student_transport_id)->first();

        $data = array(
            'student'                  =>  $student,
            'campus'                   =>  $campus,
            'session'                  =>  $session,
            'studentClass'             =>  $studentClass,
            'section'                  =>  $section,
            'category'                 =>  $category,
            'schoolHouse'              =>  $schoolHouse,
            'area'                     =>  $area,

            'studentDetails'           =>  $studentDetails,
            'studentReligionType'      =>  $studentReligionType,
            'studentSiblingDetails'    =>  $studentSiblingDetails,
            'studentFatherDetails'     =>  $studentFatherDetails,
            'studentMotherDetails'     =>  $studentMotherDetails,
            'StudentGuardianDetails'   =>  $StudentGuardianDetails,
            'studentAddressDetail'     =>  $studentAddressDetail,
            'studentTransportDetails'  =>  $studentTransportDetails,

            'page'                     =>  'Admission',
            'menu'                     =>  'Edit Admission',
        );

        return view('admission.edit', compact('data'));
    }

    public function update(Request $request) {
        $student_id = $request->student_id;
        $studentDetails  =  StudentDetails::where('student_id',$student_id)->first();
        $validator = Validator::make($request->all(), [
            'campus_id'       =>  'required|numeric|gt:0|digits_between:1,10',
            'session_id'      =>  'required|numeric|gt:0|digits_between:1,10',
            'class_id'        =>  'required|numeric|gt:0|digits_between:1,10',
            'section_id'      =>  'required|numeric|gt:0|digits_between:1,10',
            'category_id'     =>  'required|numeric|gt:0|digits_between:1,10',
        ]);

        if ($validator->errors()->all()) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
            
        } else {
            $success = false;
            DB::beginTransaction();
            try {
                $student = Student::where('id',$student_id)->update([
                    'gr'                  =>  $request->gr,
                    'bform_crms_no'       =>  $request->bform_crms_no,
                    'dob'                 =>  date('Y-m-d', strtotime($request->dob)),
                    'gender'              =>  $request->gender,
                    'place_of_birth'      =>  $request->place_of_birth,
                    'nationality'         =>  $request->nationality,
                    'mother_tongue'       =>  $request->mother_tongue,
                    'first_name'          =>  $request->first_name,
                    'last_name'           =>  $request->last_name,
                    'religion'            =>  $request->religion,
                    'admission_date'      =>  date('Y-m-d', strtotime($request->admission_date)),
                    'previous_class'      =>  $request->previous_class,
                    'previous_school'     =>  $request->previous_school,
                    'blood_group'         =>  $request->blood_group,
                    'height'              =>  $request->height,
                    'weight'              =>  $request->weight,
                    'student_vaccinated'  =>  $request->student_vaccinated,
                    'as_on_date'          =>  date('Y-m-d', strtotime($request->as_on_date)),
                    'fee_discount'        =>  $request->fee_discount,
                    'system'              =>  $request->system,
                    'roll_no'             =>  $request->roll_no,
                    'temporary_gr'        =>  $request->temporary_gr,
                    'mobile_no'           =>  $request->mobile_no,
                    'email'               =>  $request->email
                ]);

                if ($student) {

                    $studentFatherDetails = StudentFatherDetails::where('id',$studentDetails->student_father_id)->update([
                        'name'          =>  $request->father_name,
                        'cnic'          =>  $request->father_cnic,
                        'phone'         =>  $request->father_phone,
                        'email'         =>  $request->father_email,
                        'occupation'    =>  $request->father_occupation,
                        'company_name'  =>  $request->father_company_name,
                        'salary'        =>  $request->father_salary,
                        'vaccinated'    =>  $request->father_vaccinated
                    ]);

                    if ($studentFatherDetails) {

                        $studentMotherDetails = StudentMotherDetails::where('id',$studentDetails->student_mother_id)->update([
                            'name'          =>  $request->mother_name,
                            'cnic'          =>  $request->mother_cnic,
                            'phone'         =>  $request->mother_phone,
                            'email'         =>  $request->mother_email,
                            'occupation'    =>  $request->mother_occupation,
                            'company_name'  =>  $request->mother_company_name,
                            'salary'        =>  $request->mother_salary,
                            'vaccinated'    =>  $request->mother_vaccinated
                        ]);

                        if ($studentMotherDetails) {

                            $studentGuardianDetails = StudentGuardianDetails::where('id',$studentDetails->student_guardian_id)->update([
                                'name'               =>  $request->guardian_first_name,
                                'phone'              =>  $request->guardian_phone,
                                'relation'           =>  $request->guardian_relation,
                                'other_relation'     =>  $request->other_relation,
                                'first_person_call'  =>  $request->first_person_call,
                                'cnic'               =>  $request->guardian_cnic
                            ]);

                            if ($studentGuardianDetails) {

                                if ($request->same_as_current == 'yes') {
                                    $permenant_house_no          =  $request->current_house_no;
                                    $permenant_block_no          =  $request->current_block_no;
                                    $permenant_building_name_no  =  $request->current_building_name_no;
                                    $permenant_city              =  $request->current_city;
                                    $permenant_area_id           =  $request->current_area_id; 
                                } else {
                                    $permenant_house_no          =  $request->permenant_house_no;
                                    $permenant_block_no          =  $request->permenant_block_no;
                                    $permenant_building_name_no  =  $request->permenant_building_name_no;
                                    $permenant_city              =  $request->permenant_city;
                                    $permenant_area_id           =  $request->permenant_area_id;
                                }

                                $studentAddressDetail = StudentAddressDetail::where('id',$studentDetails->student_address_id)->update([
                                    'current_house_no'            =>  $request->current_house_no,
                                    'current_block_no'            =>  $request->current_block_no,
                                    'current_building_name_no'    =>  $request->current_building_name_no,
                                    'current_city'                =>  $request->current_city,
                                    'current_area_id'             =>  $request->current_area_id,

                                    'permenant_house_no'          =>  $permenant_house_no,
                                    'permenant_block_no'          =>  $permenant_block_no,
                                    'permenant_building_name_no'  =>  $permenant_building_name_no,
                                    'permenant_city'              =>  $permenant_city,
                                    'permenant_area_id'           =>  $permenant_area_id
                                ]);

                                if ($studentAddressDetail) {

                                    $studentTransportDetails = StudentTransportDetails::where('id',$studentDetails->student_transport_id)->update([
                                        'pick_and_drop_detail'  =>  $request->pick_and_drop_detail,
                                        'ride_vehicle_no'       =>  $request->ride_vehicle_no,

                                        'school_driver_name'    =>  $request->school_driver_name,
                                        'school_driver_phone'   =>  $request->school_driver_phone,
                                        'school_vehicle_no'     =>  $request->school_vehicle_no,

                                        'private_driver_name'   =>  $request->private_driver_name,
                                        'private_driver_phone'  =>  $request->private_driver_phone,
                                        'private_vehicle_no'    =>  $request->private_vehicle_no
                                    ]);

                                    if ($studentTransportDetails) {

                                        $studentReligionType = StudentReligionType::where('id',$studentDetails->student_religion_type_id)->update([
                                            'religion_type'   =>  $request->religion_type,
                                            'other_religion'  =>  $request->other_religion
                                        ]);

                                        if ($studentReligionType) {

                                            $studentSiblingDetails = StudentSiblingDetails::where('id',$studentDetails->student_sibling_id)->update([
                                                'siblings_in_mpa'  =>  $request->siblings_in_mpa,
                                                'no_of_siblings'   =>  $request->no_of_siblings
                                            ]);

                                            if ($studentSiblingDetails) {

                                                $studentDetails = StudentDetails::where('id',$studentDetails->id)->update([
                                                    'campus_id'                 =>  $request->campus_id,
                                                    'session_id'                =>  $request->session_id,
                                                    'class_id'                  =>  $request->class_id,
                                                    'section_id'                =>  $request->section_id,
                                                    'category_id'               =>  $request->category_id,
                                                    'school_house_id'           =>  $request->school_house_id,
                                                ]);

                                                if ($studentDetails) {

                                                    $success = true;

                                                    if ($success) {
                                                        DB::commit();

                                                        $response = array(
                                                            'status'   =>  true, 
                                                            'message'  =>  'Admission has been Updated successfully.'
                                                        );
                                                        return response()->json($response);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollback();
                $success = false;
                $response = array(
                    'status'   =>  false, 
                    'message'  =>  'Some thing went wrong!'
                );
                return response()->json($response);
            }
        }
    }

    public function admissionStudentDetails($id) {
        $student       =  Student::find($id);
        $campus        =  Campus::get();
        $session       =  Session::get();
        $studentClass  =  StudentClass::get();
        $section       =  Section::get();
        $category      =  Category::get();
        $schoolHouse   =  SchoolHouse::get();
        $area          =  Area::get();

        $studentDetails           =  StudentDetails::where('student_id',$id)->first();
        $studentReligionType      =  StudentReligionType::where('id',$studentDetails->student_religion_type_id)->first();
        $studentSiblingDetails    =  StudentSiblingDetails::where('id',$studentDetails->student_sibling_id)->first();
        $studentFatherDetails     =  StudentFatherDetails::where('id',$studentDetails->student_father_id)->first();
        $studentMotherDetails     =  StudentMotherDetails::where('id',$studentDetails->student_mother_id)->first();
        $StudentGuardianDetails   =  StudentGuardianDetails::where('id',$studentDetails->student_guardian_id)->first();
        $studentAddressDetail     =  StudentAddressDetail::where('id',$studentDetails->student_address_id)->first();
        $studentTransportDetails  =  StudentTransportDetails::where('id',$studentDetails->student_transport_id)->first();

        $data = array(
            'student'                  =>  $student,
            'campus'                   =>  $campus,
            'session'                  =>  $session,
            'studentClass'             =>  $studentClass,
            'section'                  =>  $section,
            'category'                 =>  $category,
            'schoolHouse'              =>  $schoolHouse,
            'area'                     =>  $area,

            'studentDetails'           =>  $studentDetails,
            'studentReligionType'      =>  $studentReligionType,
            'studentSiblingDetails'    =>  $studentSiblingDetails,
            'studentFatherDetails'     =>  $studentFatherDetails,
            'studentMotherDetails'     =>  $studentMotherDetails,
            'StudentGuardianDetails'   =>  $StudentGuardianDetails,
            'studentAddressDetail'     =>  $studentAddressDetail,
            'studentTransportDetails'  =>  $studentTransportDetails,

            'page'                     =>  'Admission',
            'menu'                     =>  'Student Details',
        );

        return view('admission.details', compact('data'));
    }

    public function studentDetails(Request $request){
        $studentId  =  $request->student_id;
        $student    =  Student::where('id',$studentId)->first();
        // dd($student->toArray());

        return view('admission.listing', compact('student'));

        // $data = array(
        //     'student'  =>  $student,
        // );

        // dd($data['student'][0]['gr']);
        // return view('admission.listing', compact('data'));

    }

    public function searchStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'campus_id'   =>  'required|numeric|gt:0|digits_between:1,11',
            'session_id'  =>  'required|numeric|gt:0|digits_between:1,11',
            'class_id'    =>  'required|numeric|gt:0|digits_between:1,11',
            'section_id'  =>  'required|numeric|gt:0|digits_between:1,11',
        ]);

        if ($validator->errors()->toArray() != Null) {

            $response = array(
                'status'  =>  false, 
                'error'   =>  $validator->errors()->toArray()
            );
            
            return response()->json($response);
        
        } else {
            $where[] = $request->campus_id;
            $where[] = $request->session_id;
            $where[] = $request->class_id;
            $where[] = $request->section_id;

            dd($where);
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

    public function import(){
        $campuses        =  Campus::get();
        $sessions        =  Session::get();
        $studentClasses  =  StudentClass::get();
        $sections        =  Section::get();
        $categories      =  Category::get();
        $schoolHouses    =  SchoolHouse::get();
        $areas           =  Area::get();

        $data = array(
            'campuses'        =>  $campuses,
            'sessions'        =>  $sessions,
            'studentClasses'  =>  $studentClasses,
            'sections'        =>  $sections,
            'categories'      =>  $categories,
            'schoolHouses'    =>  $schoolHouses,
            'areas'           =>  $areas,
            'page'            =>  'Admission',
            'menu'            =>  'Import Student Admission Data'
        );
        
        return view('admission.import',compact('data'));
    }

    public function importStore(Request $request){
        $request->validate([
            'import_file'  =>  'required|mimes:xlsx'
        ]);
        print_r($request->file('import_file'));
        echo "<br>";

        $query = Excel::import(new StudentAdmissionImport, $request->file('import_file'));
        $query = true;
        if ($query) {
            return redirect()->back()->with('success', 'File has been Imported successfully.');
        }
    }

    // public function importStore(Request $request){
    //     // dd($request);
    //     $request->validate([
    //         'import_file'  =>  'required|mimes:xlsx'
    //     ]);
    //     $request = $request->all();
    //     $query = Excel::import(new StudentAdmissionImport, $request);
    //     if ($query) {
    //         return redirect()->back()->with('success', 'File has been Imported successfully.');
    //     }
    // }

    public function delete(Request $request) {
        $student_id      =  $request->student_id;
        $studentDetails  =  StudentDetails::where('student_id',$student_id)->first();

        $student = Student::where('id',$student_id)->delete();

        if ($student) {
            $studentFatherDetails = StudentFatherDetails::find($studentDetails->student_father_id)->delete();
        }
        if ($studentFatherDetails) {
            $atudentMotherDetails = StudentMotherDetails::find($studentDetails->student_mother_id)->delete();
        }
        if ($atudentMotherDetails) {
            $studentGuardianDetails = StudentGuardianDetails::find($studentDetails->student_guardian_id)->delete();
        }
        if ($studentGuardianDetails) {
            $studentAddressDetail = StudentAddressDetail::find($studentDetails->student_address_id)->delete();
        }
        if ($studentAddressDetail) {
            $studentTransportDetails = StudentTransportDetails::find($studentDetails->student_transport_id)->delete();
        }
        if ($studentTransportDetails) {
            $studentReligionType = StudentReligionType::find($studentDetails->student_religion_type_id)->delete();
        }
        if ($studentReligionType) {
            $studentSiblingDetails = StudentSiblingDetails::find($studentDetails->student_sibling_id)->delete();
        }

        if ($studentSiblingDetails) {
            $response = array(
                'status'   =>  true, 
                'message'  =>  'Record has been deleted successfully!'
            );
        }

        else {
            $response = array(
                'status'   =>  false,
                'message'  =>  'Some thing went worng!'
            );
        }
            
        return response()->json($response); 

    }
    
}
