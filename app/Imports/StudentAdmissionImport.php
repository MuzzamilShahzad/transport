<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\StudentFatherDetails;
use App\Models\StudentMotherDetails;
use App\Models\StudentGuardianDetails;
use App\Models\StudentAddressDetail;
use App\Models\StudentTransportDetails;
use App\Models\StudentReligionType;
use App\Models\StudentSiblingDetails;
use App\Models\StudentDetails;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentAdmissionImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $request)
    {
        dd($request);
        foreach ($request->file('import_file') as $row) {
            $student = Student::create([
                'gr'                  =>  $row['gr'],
                'bform_crms_no'       =>  $row['bform_crms_no'],
                'dob'                 =>  date('Y-m-d', strtotime($row['dob'])),
                'gender'              =>  $row['gender'],
                'place_of_birth'      =>  $row['place_of_birth'],
                'nationality'         =>  $row['nationality'],
                'mother_tongue'       =>  $row['mother_tongue'],
                'first_name'          =>  $row['first_name'],
                'last_name'           =>  $row['last_name'],
                'religion'            =>  $row['religion'],
                'admission_date'      =>  date('Y-m-d', strtotime($row['admission_date'])),
                'previous_class'      =>  $row['previous_class'],
                'previous_school'     =>  $row['previous_school'],
                'blood_group'         =>  $row['blood_group'],
                'height'              =>  $row['height'],
                'weight'              =>  $row['weight'],
                'student_vaccinated'  =>  $row['student_vaccinated'],
                'as_on_date'          =>  date('Y-m-d', strtotime($row['as_on_date'])),
                'fee_discount'        =>  $row['fee_discount'],
                'system'              =>  $row['system'],
                'roll_no'             =>  $row['roll_no'],
                'temporary_gr'        =>  $row['temporary_gr'],
                'mobile_no'           =>  $row['mobile_no'],
                'email'               =>  $row['email']
            ]);

            if ($student) {

                $studentFatherDetails = StudentFatherDetails::create([
                    'name'          =>  $row['father_name'],
                    'cnic'          =>  $row['father_cnic'],
                    'phone'         =>  $row['father_phone'],
                    'email'         =>  $row['father_email'],
                    'occupation'    =>  $row['father_occupation'],
                    'company_name'  =>  $row['father_company_name'],
                    'salary'        =>  $row['father_salary'],
                    'vaccinated'    =>  $row['father_vaccinated']
                ]);

                if ($studentFatherDetails) {

                    $studentMotherDetails = StudentMotherDetails::create([
                        'name'          =>  $row['mother_name'],
                        'cnic'          =>  $row['mother_cnic'],
                        'phone'         =>  $row['mother_phone'],
                        'email'         =>  $row['mother_email'],
                        'occupation'    =>  $row['mother_occupation'],
                        'company_name'  =>  $row['mother_company_name'],
                        'salary'        =>  $row['mother_salary'],
                        'vaccinated'    =>  $row['mother_vaccinated']
                    ]);

                    if ($studentMotherDetails) {

                        $studentGuardianDetails = StudentGuardianDetails::create([
                            'name'               =>  $row['guardian_first_name'],
                            'phone'              =>  $row['guardian_phone'],
                            'relation'           =>  $row['guardian_relation'],
                            'other_relation'     =>  $row['other_relation'],
                            'first_person_call'  =>  $row['first_person_call'],
                            'cnic'               =>  $row['guardian_cnic']
                        ]);

                        if ($studentGuardianDetails) {

                            $studentAddressDetail = StudentAddressDetail::create([
                                'current_house_no'            =>  $row['current_house_no'],
                                'current_block_no'            =>  $row['current_block_no'],
                                'current_building_name_no'    =>  $row['current_building_name_no'],
                                'current_city'                =>  $row['current_city'],
                                'current_area_id'             =>  $row['current_area_id'],

                                'permanent_house_no'          =>  $row['permanent_house_no'],
                                'permanent_block_no'          =>  $row['permanent_block_no'],
                                'permanent_building_name_no'  =>  $row['permanent_building_name_no'],
                                'permanent_city'              =>  $row['permanent_city'],
                                'permanent_area_id'           =>  $row['permanent_area_id']
                            ]);

                            if ($studentAddressDetail) {

                                $studentTransportDetails = StudentTransportDetails::create([
                                    'pick_and_drop_detail'  =>  $row['pick_and_drop_detail'],
                                    'ride_vehicle_no'       =>  $row['ride_vehicle_no'],

                                    'school_driver_name'    =>  $row['school_driver_name'],
                                    'school_driver_phone'   =>  $row['school_driver_phone'],
                                    'school_vehicle_no'     =>  $row['school_vehicle_no'],

                                    'private_driver_name'   =>  $row['private_driver_name'],
                                    'private_driver_phone'  =>  $row['private_driver_phone'],
                                    'private_vehicle_no'    =>  $row['private_vehicle_no']
                                ]);

                                if ($studentTransportDetails) {

                                    $studentReligionType = StudentReligionType::create([
                                        'religion_type'   =>  $row['religion_type'],
                                        'other_religion'  =>  $row['other_religion']
                                    ]);

                                    if ($studentReligionType) {

                                        $studentSiblingDetails = StudentSiblingDetails::create([
                                            'siblings_in_mpa'  =>  $row['siblings_in_mpa'],
                                            'no_of_siblings'   =>  $row['no_of_siblings']
                                        ]);

                                        if ($studentSiblingDetails) {

                                            $studentDetails = StudentDetails::create([
                                                // 'campus_id'                 =>  $request->campus_id,
                                                // 'session_id'                =>  $request->session_id,
                                                // 'class_id'                  =>  $request->class_id,
                                                // 'section_id'                =>  $request->section_id,
                                                // 'category_id'               =>  $request->category_id,
                                                // 'school_house_id'           =>  $request->school_house_id,
                                                
                                                'student_id'                =>  $student->id,
                                                'student_father_id'         =>  $studentFatherDetails->id,
                                                'student_mother_id'         =>  $studentMotherDetails->id,
                                                'student_guardian_id'       =>  $studentGuardianDetails->id,
                                                'student_address_id'        =>  $studentAddressDetail->id,
                                                'student_transport_id'      =>  $studentTransportDetails->id,
                                                'student_religion_type_id'  =>  $studentReligionType->id,
                                                'student_sibling_id'        =>  $studentSiblingDetails->id
                                            ]); 
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
}
