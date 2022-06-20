@extends('layouts.app')
@section('main-content')
@section('page_title', 'Add Student Registration')

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
                        <form action="{{ route('student.registration.store') }}" method="post">
                            <div class="card-body">
                                <h4 class="main-content-label"> <strong>Student</strong></h4>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Campus</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="campus_id" id="campus-id">
                                                    <option selected value="">Select Student</option>
                                                    @foreach($data['campus'] as $campus)
                                                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">School System</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="school_system_id" id="school-system-id" disabled>
                                                    <option selected value="">Select School System</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <div class="pos-relative">
                                                <label class="form-label tx-semibold">Class</label>
                                                <select class="form-control select2" name="class_id" id="class-id">
                                                    <option selected value="">Select Class</option>
                                                    @foreach($data['studentClass'] as $studentClass)
                                                        <option value="{{$studentClass->id}}">{{$studentClass->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Class Group</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="class_group_id" id="class-group-id" disabled>
                                                    <option selected value="">Select Class Group</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Form Number</label>
                                            <input type="text" class="form-control" name="form_no" id="form-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <div class="pos-relative">
                                            <label class="form-label tx-semibold">Session</label>
                                                <select class="form-control select2" name="session_id" id="session-id">
                                                    <option selected value="">Select Session</option>
                                                    @foreach($data['session'] as $item)
                                                        <option value="{{$item->id}}">{{$item->session}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Computerize Registration</label>
                                            <input type="text" class="form-control" name="computerize_registration"  id="computerize-registration">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">First Name</label>
                                            <input type="text" class="form-control" name="first_name"  id="first-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"  id="last-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold date-picker">Date of Birth</label>
                                            <input class="form-control date-picker" name="dob" id="dob" placeholder="DD-MM-YYYY" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
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
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Is there any sibling currently studying in MPA ?</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="siblings_in_mpa" id="siblings-in-mpa">
                                                    <option selected value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">No. of Siblings</label>
                                            <input type="text" class="form-control" name="no_of_siblings"  id="no-of-siblings">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Previous Class (IF ANY)</label>
                                            <input type="text" class="form-control" name="previous_class"  id="previous-class">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Previous School (IF ANY)</label>
                                            <input type="text" class="form-control" name="previous_school"  id="previous-school">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="main-content-label"> <strong>Current Address</strong> </h4>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">House / Apartment Number</label>
                                            <input type="text" class="form-control" name="house_no" id="house-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Block Number</label>
                                            <input type="text" class="form-control" name="block_no" id="block-no">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Building Name/Number (If ANY)</label>
                                            <input type="text" class="form-control" name="building_name_no"  id="building-name-no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Area</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="area_id " id="area-id">
                                                    <option selected value="">Select Area</option>
                                                    @foreach($data['area'] as $area)
                                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">City</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="city_id" id="city-id">
                                                    <option selected value="">Select City</option>
                                                    @foreach($data['area'] as $area)
                                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="main-content-label"> <strong>Father</strong> </h4>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father CNIC Number</label>
                                            <input type="text" class="form-control" name="father_cnic" id="father-cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Name</label>
                                            <input type="text" class="form-control" name="father_name" id="father-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Occupation</label>
                                            <input type="text" class="form-control" name="father_occupation"  id="father-occupation">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Company Name</label>
                                            <input type="text" class="form-control" name="father_company_name" id="father-company-name">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Salary</label>
                                            <input type="number" class="form-control" name="father_salary" id="father-salary">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Email</label>
                                            <input type="text" class="form-control" name="father_email" id="father-email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Father Phone No</label>
                                            <input type="text" class="form-control" name="father_phone"  id="father-phone" data-inputmask="'mask': '03##-#######'" placeholder="03##-#######">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                                <label class="form-label tx-semibold">How did you hear about us?</label>
                                                <div class="pos-relative">
                                                    <select class="form-control select2" name="area_id " id="area-id">
                                                        <option selected value="">Select</option>
                                                        <option value="Social Media">Social Media</option>
                                                        <option value="Electronic Media">Electronic Media</option>
                                                        <option value="Print Media">Print Media</option>
                                                        <option value="Other">Other</option>
                                                        
                                                    </select>
                                                </div>
                                            
                                            <!-- <label class="form-label tx-semibold">How did you hear about us?</label>
                                            <div class="selectgroup selectgroup-pills">
                                                <label class="selectgroup-item ">
                                                    <input type="checkbox" name="first_person_call" value="Social Media" class="selectgroup-input">
                                                    <span class="selectgroup-button">Social Media</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="first_person_call" value="Electronic Media" class="selectgroup-input">
                                                    <span class="selectgroup-button">Electronic Media</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="first_person_call" value="Print Media" class="selectgroup-input">
                                                    <span class="selectgroup-button">Print Media</span>
                                                </label>
                                            </div> -->
                                            
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Other</label>
                                            <input type="text" class="form-control" name="other" id="other" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="main-content-label"> <strong>Test Group</strong> </h4>
                                <br>
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Test Group</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="test_group" id="test-group">
                                                    <option selected value="">Select Test Group</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <label class="form-label tx-semibold">Interview Group</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="interview_group" id="interview-group">
                                                    <option selected value="0">Select Interview Group</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-footer mt-2">
                                    <button type="submit" class="btn btn-primary" id="btn-add-registration">Save</button>
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
<script src="{{ url('assets/js/student/registration.js') }}"></script>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>

@endsection
