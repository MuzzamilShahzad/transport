@extends('layouts.app')
@section('main-content')
@section('page_title', 'Student Details')

<link href="{{ url('assets/css/custom/style.css') }}" rel="stylesheet" />


<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <a href="{{ route('import') }}" class="btn btn-primary" style="float:right">Import</a>
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
                            <div class="card-body" id="after-form-store-msg">  
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Temporary G.R</label>
                                            <input type="text" class="form-control" name="temporary_gr" id="temporary-gr" value="{{ $data['student']->temporary_gr }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">G.R</label>
                                            <input type="text" class="form-control" name="gr" id="gr" value="{{ $data['student']->gr }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Campus</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="campus_id" id="campus-id" disabled>
                                                    @foreach($data['campus'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentDetails']->campus_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Session</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="session_id" id="session-id" disabled>
                                                    @foreach($data['session'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentDetails']->session_id == $item->id ? 'selected' : null }}>{{$item->session}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group" id="campus-system-input">
                                        <label class="form-label tx-semibold">System</label>
                                            <input type="text" class="form-control" name="system" id="system" value="{{ $data['student']->system }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Roll Number</label>
                                            <input type="text" class="form-control" name="roll_no"  id="roll-no" value="{{ $data['student']->roll_no }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Class</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="class_id" id="class-id" disabled>
                                                    @foreach($data['studentClass'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentDetails']->class_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Section</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="section_id" id="section-id" disabled>
                                                    @foreach($data['section'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentDetails']->section_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
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
                                            <input type="text" class="form-control" name="bform_crms_no" id="bform-crms-no" value="{{ $data['student']->bform_crms_no }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">First Name</label>
                                            <input type="text" class="form-control" name="first_name"  id="first-name" value="{{ $data['student']->first_name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"  id="last-name" value="{{ $data['student']->last_name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">Date of Birth</label>
                                            <input class="form-control date-picker" name="dob" id="dob" placeholder="DD-MM-YYYY" type="text" value="{{ $data['student']->dob }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Gender</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="gender" id="gender" disabled>
                                                    <option value="Male" {{$data['student']->gender == 'Male' ? 'selected' : null }}>Male</option>
                                                    <option value="Female" {{$data['student']->gender == 'Female' ? 'selected' : null }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Place of Birth</label>
                                            <input type="text" class="form-control" name="place_of_birth"  id="place-of-birth" value="{{ $data['student']->place_of_birth }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Nationality</label>
                                            <input type="text" class="form-control" name="nationality"  id="nationality" value="{{ $data['student']->nationality }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Tongue</label>
                                            <input type="text" class="form-control" name="mother_tongue"  id="mother-tongue" value="{{ $data['student']->mother_tongue }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Previous Class</label>
                                            <input type="text" class="form-control" name="previous_class"  id="previous-class" value="{{ $data['student']->previous_class }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Previous School</label>
                                            <input type="text" class="form-control" name="previous_school"  id="previous-school" value="{{ $data['student']->previous_school }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Category</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="category_id" id="category-id" disabled>
                                                    @foreach($data['category'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentDetails']->category_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Religion</label>
                                            <input type="text" class="form-control" name="religion"  id="religion" value="{{ $data['student']->religion }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_no" id="mobile-no" data-inputmask="'mask': '03##-#######'" placeholder="03##-#######" value="{{ $data['student']->mobile_no }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Email</label>
                                            <input type="text" class="form-control" name="email"  id="email" value="{{ $data['student']->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">Admission Date</label>
                                            <input class="form-control date-picker" name="admission_date" id="admission-date" placeholder="DD-MM-YYYY" type="text" value="{{ $data['student']->admission_date }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Blood Group</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="blood_group" id="blood-group" disabled>
                                                    <option value="O+" {{$data['student']->blood_group == 'O+' ? 'selected' : null }}>O+</option>
                                                    <option value="A+" {{$data['student']->blood_group == 'A+' ? 'selected' : null }}>A+</option>
                                                    <option value="B+" {{$data['student']->blood_group == 'B+' ? 'selected' : null }}>B+</option>
                                                    <option value="AB+" {{$data['student']->blood_group == 'AB+' ? 'selected' : null }}>AB+</option>
                                                    <option value="O-" {{$data['student']->blood_group == 'O-' ? 'selected' : null }}>O-</option>
                                                    <option value="A-" {{$data['student']->blood_group == 'A-' ? 'selected' : null }}>A-</option>
                                                    <option value="B-" {{$data['student']->blood_group == 'B-' ? 'selected' : null }}>B-</option>
                                                    <option value="AB-" {{$data['student']->blood_group == 'AB-' ? 'selected' : null }}>AB-</option>
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
                                                <select class="form-control select2" name="school_house_id" id="school-house-id" disabled>
                                                    @foreach($data['schoolHouse'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentDetails']->school_house_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Height</label>
                                            <input type="text" class="form-control" name="height"  id="height" value="{{ $data['student']->height }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Weight</label>
                                            <input type="text" class="form-control" name="weight"  id="weight" value="{{ $data['student']->weight }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">As on Date</label>
                                            <input class="form-control date-picker" name="as_on_date" id="as-on-date" placeholder="DD-MM-YYYY" type="text" value="{{ $data['student']->as_on_date }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Fee Discount</label>
                                            <input type="text" class="form-control" name="fee_discount"  id="fee-discount" value="{{ $data['student']->fee_discount }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Select Religion Type</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="religion_type" id="religion-type" disabled>
                                                    <option value="Sunni" {{$data['studentReligionType']->religion_type == 'Sunni' ? 'selected' : null }}>Sunni</option>
                                                    <option value="Asna Ashri" {{$data['studentReligionType']->religion_type == 'Asna Ashri' ? 'selected' : null }}>Asna Ashri</option>
                                                    <option value="other" {{$data['studentReligionType']->religion_type == 'other' ? 'selected' : null }}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group" id="religion-type-other-input">
                                            <label class="form-label tx-semibold">Other</label>
                                            <input type="text" class="form-control" name="other_religion" id="other-religion" value="{{$data['studentReligionType']->other_religion}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Is there any sibling currently studying in MPA ?</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="siblings_in_mpa" id="siblings-in-mpa" disabled>
                                                    <option value="Yes" {{$data['studentSiblingDetails']->siblings_in_mpa == 'Yes' ? 'selected' : null }}>Yes</option>
                                                    <option value="No" {{$data['studentSiblingDetails']->siblings_in_mpa == 'No' ? 'selected' : null }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">No. of Siblings</label>
                                            <input type="number" class="form-control" name="no_of_siblings"  id="no-of-siblings" value="{{$data['studentSiblingDetails']->no_of_siblings}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Student Vaccinated</label>
                                            <div class="btn-list radiobtns radio-btn">
                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="student_vaccinated" id="student-vaccinated-yes" value="Yes" {{ $data['student']->student_vaccinated == 'Yes' ? 'checked' : '' }}>
                                                    <label class="btn btn-outline-primary" for="student-vaccinated-yes">Yes</label>

                                                    <input type="radio" class="btn-check" name="student_vaccinated" id="student-vaccinated-no" value="No" {{ $data['student']->student_vaccinated == 'No' ? 'checked' : '' }}>
                                                    <label class="btn btn-outline-primary" for="student-vaccinated-no">No</label>
                                                </div>
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
                                            <input type="text" class="form-control" name="father_cnic" id="father-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" value="{{$data['studentFatherDetails']->cnic}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Salary</label>
                                            <input type="number" class="form-control" name="father_salary" id="father-salary" value="{{$data['studentFatherDetails']->salary}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Email</label>
                                            <input type="text" class="form-control" name="father_email" id="father-email" value="{{$data['studentFatherDetails']->email}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Name</label>
                                            <input type="text" class="form-control" name="father_name" id="father-name" value="{{$data['studentFatherDetails']->name}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Phone No</label>
                                            <input type="text" class="form-control" name="father_phone"  id="father-phone" data-inputmask="'mask': '03##-#######'" placeholder="03##-#######" value="{{$data['studentFatherDetails']->phone}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Occupation</label>
                                            <input type="text" class="form-control" name="father_occupation"  id="father-occupation" value="{{$data['studentFatherDetails']->occupation}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Company Name</label>
                                            <input type="text" class="form-control" name="father_company_name" id="father-company-name" value="{{$data['studentFatherDetails']->company_name}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Vaccinated</label>

                                            <div class="btn-list radiobtns radio-btn">
                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="father_vaccinated" id="father-vaccinated-yes" value="Yes" {{ $data['studentFatherDetails']->vaccinated == 'Yes' ? 'checked' : '' }}>
                                                    <label class="btn btn-outline-primary" for="father-vaccinated-yes">Yes</label>

                                                    <input type="radio" class="btn-check" name="father_vaccinated" id="father-vaccinated-no" value="No" {{ $data['studentFatherDetails']->vaccinated == 'No' ? 'checked' : '' }}>
                                                    <label class="btn btn-outline-primary" for="father-vaccinated-no">No</label>
                                                </div>
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
                                            <input type="text" class="form-control" name="mother_cnic" id="mother-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" value="{{$data['studentMotherDetails']->cnic}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Salary</label>
                                            <input type="number" class="form-control" name="mother_salary" id="mother-salary" value="{{$data['studentMotherDetails']->salary}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Email</label>
                                            <input type="text" class="form-control" name="mother_email" id="mother-email" value="{{$data['studentMotherDetails']->email}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Name</label>
                                            <input type="text" class="form-control" name="mother_name" id="mother-name" value="{{$data['studentMotherDetails']->name}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Phone No</label>
                                            <input type="text" class="form-control" name="mother_phone"  id="mother-phone" data-inputmask="'mask': '03##-#######'" placeholder="03##-#######" value="{{$data['studentMotherDetails']->phone}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Occupation</label>
                                            <input type="text" class="form-control" name="mother_occupation"  id="mother-occupation" value="{{$data['studentMotherDetails']->occupation}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Company Name</label>
                                            <input type="text" class="form-control" name="mother_company_name" id="mother-company-name" value="{{$data['studentMotherDetails']->company_name}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Mother Vaccinated</label>

                                            <div class="btn-list radiobtns radio-btn">
                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="mother_vaccinated" id="mother-vaccinated-yes" value="Yes" {{ $data['studentMotherDetails']->vaccinated == 'Yes' ? 'checked' : '' }}>
                                                    <label class="btn btn-outline-primary" for="mother-vaccinated-yes">Yes</label>

                                                    <input type="radio" class="btn-check" name="mother_vaccinated" id="mother-vaccinated-no" value="No" {{ $data['studentMotherDetails']->vaccinated == 'No' ? 'checked' : '' }}>
                                                    <label class="btn btn-outline-primary" for="mother-vaccinated-no">No</label>
                                                </div>
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
                                            <input type="text" class="form-control" name="guardian_cnic" id="guardian-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" value="{{$data['StudentGuardianDetails']->cnic}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Guardian First Name</label>
                                            <input type="text" class="form-control" name="guardian_first_name" id="guardian-first-name" value="{{$data['StudentGuardianDetails']->name}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Guardian Phone</label>
                                            <input type="text" class="form-control" name="guardian_phone" id="guardian-phone" data-inputmask="'mask': '03##-#######'" placeholder="03##-#######" value="{{$data['StudentGuardianDetails']->phone}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Select Guardian Relation</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="guardian_relation" id="guardian-relation" disabled>
                                                    <option value="Uncle/Aunty" {{$data['StudentGuardianDetails']->relation == 'Uncle/Aunty' ? 'selected' : ''}}>Uncle/Aunty</option>
                                                    <option value="GrandFather/GrandMother" {{$data['StudentGuardianDetails']->relation == 'GrandFather/GrandMother' ? 'selected' : ''}}>GrandFather/GrandMother</option>
                                                    <option value="Neighbours" {{$data['StudentGuardianDetails']->relation == 'Neighbours' ? 'selected' : ''}}>Neighbours</option>
                                                    <option value="other" {{$data['StudentGuardianDetails']->relation == 'other' ? 'selected' : ''}}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group" id="guardian-relation-other-input">
                                            <label class="form-label tx-semibold">Other</label>
                                            <input type="text" class="form-control" name="other_relation" id="other-relation" value="{{$data['StudentGuardianDetails']->other_relation}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">First Person to call in case of Emergency</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="first_person_call" id="first-person-call" disabled>
                                                    <option value="Father" {{ $data['StudentGuardianDetails']->first_person_call == 'Father' ? 'selected' : '' }}>Father</option>
                                                    <option value="Mother" {{ $data['StudentGuardianDetails']->first_person_call == 'Mother' ? 'selected' : '' }}>Mother</option>
                                                    <option value="Guardian" {{ $data['StudentGuardianDetails']->first_person_call == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                                                </select>
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
                                            <input type="text" class="form-control" name="current_house_no" id="current-house-no" value="{{$data['studentAddressDetail']->current_house_no}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Block Number</label>
                                            <input type="text" class="form-control" name="current_block_no" id="current-block-no" value="{{$data['studentAddressDetail']->current_block_no}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Building Name/Number (If ANY)</label>
                                            <input type="text" class="form-control" name="current_building_name_no"  id="current-building-name-no" value="{{$data['studentAddressDetail']->current_building_name_no}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Area</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="current_area_id " id="current-area-id" disabled>
                                                    @foreach($data['area'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentAddressDetail']->current_area_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">City</label>
                                            <input type="text" class="form-control" name="current_city" id="current-city" value="{{$data['studentAddressDetail']->current_city}}" readonly>
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
                                                <input type="checkbox" class="custom-control-input" name="same_as_current" value="yes" {{ $data['studentAddressDetail']->current_house_no == $data['studentAddressDetail']->permenant_house_no ? 'checked' : '' }}>
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
                                            <input type="text" class="form-control" name="permenant_house_no" id="permenant-house-no" value="{{$data['studentAddressDetail']->permenant_house_no}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Block Number</label>
                                            <input type="text" class="form-control" name="permenant_block_no" id="permenant-block-no" value="{{$data['studentAddressDetail']->permenant_block_no}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Building Name/Number (If ANY)</label>
                                            <input type="text" class="form-control" name="permenant_building_name_no"  id="permenant-building-name-no" value="{{$data['studentAddressDetail']->permenant_building_name_no}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Area</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="permenant_area_id" id="permenant-area-id" disabled>
                                                    <option selected value="">Select Area</option>
                                                    @foreach($data['area'] as $item)
                                                        <option value="{{$item->id}}" {{$data['studentAddressDetail']->permenant_area_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">City</label>
                                            <input type="text" class="form-control" name="permenant_city" id="permenant-city" value="{{$data['studentAddressDetail']->permenant_city}}" readonly>
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
                                                <select class="form-control select2" name="pick_and_drop_detail" id="pick-and-drop-detail" disabled>
                                                    <option value="ByWalk" {{ $data['studentTransportDetails']->pick_and_drop_detail == 'ByWalk' ? 'selected' : '' }} >By Walk</option>
                                                    <option value="ByRide" {{ $data['studentTransportDetails']->pick_and_drop_detail == 'ByRide' ? 'selected' : '' }}>By Ride</option>
                                                    <option value="SchoolVan" {{ $data['studentTransportDetails']->pick_and_drop_detail == 'SchoolVan' ? 'selected' : '' }}>School Van</option>
                                                    <option value="PrivateVan" {{ $data['studentTransportDetails']->pick_and_drop_detail == 'PrivateVan' ? 'selected' : '' }}>Private Van</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="pick-drop-append-input">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer mt-2">
                                    <a href="{{ route('admission.view') }}" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>

<!-- {{-- Own javascript --}} -->
<script src="{{ url('assets/js/admission/admission.js') }}" readonly></script>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>

@endsection
