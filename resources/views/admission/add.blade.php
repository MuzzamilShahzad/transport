@extends('layouts.app')
@section('main-content')
@section('page_title', 'Add Admission')

<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">{{ $data['menu'] }}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;">{{ $data['page'] }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $data['menu'] }}</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card custom-card">
                        <div class="card-header d-flex">
                            <h6 class="main-content-label">{{ $data['menu'] }}</h6>
                        </div>
                        <form action="{{ route('admission.store') }}" method="post">
                            <div class="card-body">  
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Temporary G.R</label>
                                            <input type="text" class="form-control" name="temporary_gr" id="temporary-gr">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">G.R</label>
                                            <input type="text" class="form-control" name="gr" id="gr">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Campus</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="campus_id" id="campus-id">
                                                    <option selected value="">Select Student</option>
                                                    @foreach($data['campus'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Session</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="session_id" id="session-id">
                                                    <option selected value="">Select Session</option>
                                                    @foreach($data['session'] as $item)
                                                        <option value="{{$item->id}}">{{$item->session}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group" id="campus-system-input">
                                        
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Roll Number</label>
                                            <input type="text" class="form-control" name="roll_no"  id="roll-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Class</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="class_id" id="class-id">
                                                    <option selected value="">Select Class</option>
                                                    @foreach($data['studentClass'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Section</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="section_id" id="section-id">
                                                    <option selected value="">Select Section</option>
                                                    @foreach($data['section'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">B-Form / CRMS No </label>
                                            <input type="text" class="form-control" name="bform_crms_no" id="bform-crms-no">
                                            <!-- <input type="text" class="form-control" name="bform_crms_no" id="bform-crms-no" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X"> -->
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">First Name</label>
                                            <input type="text" class="form-control" name="first_name"  id="first-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"  id="last-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">Date of Birth</label>
                                            <input class="form-control date-picker" name="dob" id="dob" placeholder="DD-MM-YYYY" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Gender</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="gender" id="gender">
                                                    <option selected value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Place of Birth</label>
                                            <input type="text" class="form-control" name="place_of_birth"  id="place-of-birth">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Nationality</label>
                                            <input type="text" class="form-control" name="nationality"  id="nationality">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Tongue</label>
                                            <input type="text" class="form-control" name="mother_tongue"  id="mother-tongue">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Previous Class</label>
                                            <input type="text" class="form-control" name="previous_class"  id="previous-class">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Previous School</label>
                                            <input type="text" class="form-control" name="previous_school"  id="previous-school">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Category</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="category_id" id="category-id">
                                                    <option selected value="">Select Category</option>
                                                    @foreach($data['category'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Religion</label>
                                            <input type="text" class="form-control" name="religion"  id="religion">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mobile Number</label>
                                            <input type="number" class="form-control" name="mobile_no"  id="mobile-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Email</label>
                                            <input type="text" class="form-control" name="email"  id="email">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">Admission Date</label>
                                            <input class="form-control date-picker" name="admission_date" id="admission-date" placeholder="DD-MM-YYYY" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Blood Group</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="blood_group" id="blood-group">
                                                    <option selected value="">Select Blood Group</option>
                                                    <option value="O+">O+</option>
                                                    <option value="A+">A+</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">School House</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="school_house_id" id="school-house-id">
                                                    <option selected value="">Select School House</option>
                                                    @foreach($data['schoolHouse'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Height</label>
                                            <input type="text" class="form-control" name="height"  id="height">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Weight</label>
                                            <input type="text" class="form-control" name="weight"  id="weight">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">As on Date</label>
                                            <input class="form-control date-picker" name="as_on_date" id="as-on-date" placeholder="DD-MM-YYYY" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Fee Discount</label>
                                            <input type="text" class="form-control" name="fee_discount"  id="fee-discount">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Student Vaccinated</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="student_vaccinated" id="student-vaccinated" value="Yes">
                                                <label class="form-check-label" for="student_vaccinated">Yes</label>
                                                
                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="student_vaccinated" value="Yes">
                                                    <span class="custom-control-label"> Yes </span>
                                                </label> -->
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="student_vaccinated" id="student-vaccinated" value="No">
                                                <label class="form-check-label" for="student_vaccinated">No</label>

                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="student_vaccinated" value="No">
                                                    <span class="custom-control-label"> No </span>
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header d-flex">
                                <h6 class="main-content-label">Parent Guardian Detail</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father CNIC Number</label>
                                            <input type="text" class="form-control" name="father_cnic" id="father-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Salary</label>
                                            <input type="number" class="form-control" name="father_salary" id="father-salary">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Email</label>
                                            <input type="text" class="form-control" name="father_email" id="father-email">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Name</label>
                                            <input type="text" class="form-control" name="father_name" id="father-name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Phone No</label>
                                            <input type="number" class="form-control" name="father_phone"  id="father-phone">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Occupation</label>
                                            <input type="text" class="form-control" name="father_occupation"  id="father-occupation">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Company Name</label>
                                            <input type="text" class="form-control" name="father_company_name" id="father-company-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Vaccinated</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="father_vaccinated" id="father-vaccinated" value="Yes">
                                                <label class="form-check-label" for="father_vaccinated">Yes</label>

                                                
                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="father_vaccinated" value="Yes">
                                                    <span class="custom-control-label"> Yes </span>
                                                </label> -->
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="father_vaccinated" id="father-vaccinated" value="No">
                                                <label class="form-check-label" for="father_vaccinated">No</label>

                                                
                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="father_vaccinated" value="No">
                                                    <span class="custom-control-label"> No </span>
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr style="border: 1px solid black;">
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother CNIC Number</label>
                                            <input type="text" class="form-control" name="mother_cnic" id="mother-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Salary</label>
                                            <input type="number" class="form-control" name="mother_salary" id="mother-salary">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Email</label>
                                            <input type="text" class="form-control" name="mother_email" id="mother-email">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Name</label>
                                            <input type="text" class="form-control" name="mother_name" id="mother-name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Phone No</label>
                                            <input type="number" class="form-control" name="mother_phone"  id="mother-phone">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Occupation</label>
                                            <input type="text" class="form-control" name="mother_occupation"  id="mother-occupation">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Company Name</label>
                                            <input type="text" class="form-control" name="mother_company_name" id="mother-company-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Vaccinated</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mother_vaccinated" id="mother-vaccinated" value="Yes">
                                                <label class="form-check-label" for="mother_vaccinated">Yes</label>

                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="mother_vaccinated" value="Yes">
                                                    <span class="custom-control-label"> Yes </span>
                                                </label> -->
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mother_vaccinated" id="mother-vaccinated" value="No">
                                                <label class="form-check-label" for="mother_vaccinated">No</label>

                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="mother_vaccinated" value="No">
                                                    <span class="custom-control-label"> No </span>
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr style="border: 1px solid black;">
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Guardian CNIC</label>
                                            <input type="text" class="form-control" name="guardian_cnic" id="guardian-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Guardian First Name</label>
                                            <input type="text" class="form-control" name="guardian_first_name"  id="guardian-first-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Guardian Phone</label>
                                            <input type="number" class="form-control" name="guardian_phone"  id="guardian-phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Guardian Relation</label>

                                            <div class="form-check form-check-inline">
                                                <!-- <input class="form-check-input" type="radio" name="guardian_relation" id="guardian-relation" value="Uncle/Aunty">
                                                <label class="form-check-label" for="guardian_relation">Uncle / Aunty</label> -->

                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="guardian_relation" id="guardian-relation" value="Uncle/Aunty">
                                                    <span class="custom-control-label"> Uncle / Aunty </span>
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <!-- <input class="form-check-input" type="radio" name="guardian_relation" id="guardian-relation" value="GrandFather/GrandMother">
                                                <label class="form-check-label" for="guardian_relation">Grand Father / Grand Mother</label> -->

                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="guardian_relation" id="guardian-relation" value="GrandFather/GrandMother">
                                                    <span class="custom-control-label"> GrandFather / GrandMother </span>
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <!-- <input class="form-check-input" type="radio" name="guardian_relation" id="guardian-relation" value="Neighbours">
                                                <label class="form-check-label" for="guardian_relation">Neighbours</label> -->

                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="guardian_relation" id="guardian-relation" value="Neighbours">
                                                    <span class="custom-control-label"> Neighbours </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Other</label>
                                            <input type="text" class="form-control" name="other_relation"  id="other-relation">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">First Person to call in case of Emergency:</label>

                                            <div class="form-check form-check-inline">

                                                <!-- <input class="form-check-input" type="radio" name="first_person_call" id="first-person-call" value="Father">
                                                <label class="form-check-label" for="first_person_call">Father</label> -->

                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="first_person_call" value="Father">
                                                    <span class="custom-control-label"> Father </span>
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">

                                                <!-- <input class="form-check-input" type="radio" name="first_person_call" id="first-person-call" value="Mother">
                                                <label class="form-check-label" for="first_person_call">Mother</label> -->

                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="first_person_call" value="Mother">
                                                    <span class="custom-control-label"> Mother </span>
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <!-- <input class="form-check-input" type="radio" name="first_person_call" id="first-person-call" value="Guardian">
                                                <label class="form-check-label" for="first_person_call">Guardian</label> -->

                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="first_person_call" value="Guardian">
                                                    <span class="custom-control-label"> Guardian </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header d-flex">
                                <h6 class="main-content-label">Address Details</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="main-content-label">Current Address</h6>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">House / Apartment Number</label>
                                            <input type="text" class="form-control" name="current_house_no" id="current-house-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Block Number</label>
                                            <input type="text" class="form-control" name="current_block_no" id="current-block-no">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Building Name/Number (If ANY)</label>
                                            <input type="text" class="form-control" name="current_building_name_no"  id="current-building-name-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Area</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="current_area_id " id="current-area-id">
                                                    <option selected value="">Select Area</option>
                                                    @foreach($data['area'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">City</label>
                                            <input type="text" class="form-control" name="current_city" id="current-city">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr style="border: 1px solid black;">
                                <br>

                                <div class="form-row">
                                    <div class="col-md-6 mb-0">
                                        <h6 class="main-content-label">Permenant Address</h6>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-check form-check-inline">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="same_as_current" value="yes">
                                                <span class="custom-control-label"><strong> Same As Current Address </strong></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">House / Apartment Number</label>
                                            <input type="text" class="form-control" name="permenant_house_no" id="permenant-house-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Block Number</label>
                                            <input type="text" class="form-control" name="permenant_block_no" id="permenant-block-no">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Building Name/Number (If ANY)</label>
                                            <input type="text" class="form-control" name="permenant_building_name_no"  id="permenant-building-name-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Area</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="permenant_area_id" id="permenant-area-id">
                                                    <option selected value="">Select Area</option>
                                                    @foreach($data['area'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">City</label>
                                            <input type="text" class="form-control" name="permenant_city" id="permenant-city">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header d-flex">
                                <h6 class="main-content-label">Pick up / Drop off Transport Details</h6>
                            </div>
                            <div class="card-body">
                            
                                <div class="form-row">
                                    <div class="form-group col-md-12 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Select Pick up / Drop off Transport Details</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="pick_and_drop_detail" id="pick-and-drop-detail">
                                                    <option selected value="">Select Pick/Drop</option>
                                                    <option value="ByWalk">By Walk</option>
                                                    <option value="ByRide">By Ride</option>
                                                    <option value="SchoolVan">School Van</option>
                                                    <option value="PrivateVan">Private Van</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="append-input">
                                            
                                        </div>

                                    </div>
                                </div>

                                <div class="form-footer mt-2">
                                    <button type="submit" class="btn btn-primary" id="btn-add-admission">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- End Row -->
        </div>
    </div>
</div>

<!-- {{-- Own javascript --}} -->
<script src="{{ url('assets/js/admission/admission.js') }}"></script>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>

@endsection
