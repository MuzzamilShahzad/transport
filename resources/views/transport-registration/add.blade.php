@extends('layouts.app')
@section('main-content')
@section('page_title', 'Add Transport Registration')

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
                <!-- <div class="d-flex">
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                            <i class="fe fe-settings"></i>
                            <span>Settings</span>
                        </button>
                        <button type="button" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-download-cloud bg-white-transparent text-white"></i>
                            <span>Reports</span>
                        </button>
                    </div>
                </div> -->
            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div>
                                <h6 class="main-content-label">{{ $data['menu'] }}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row row-sm">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <form action="{{ route('registration.store') }}" method="post">
                                        <!-- <div class="form-group">
                                            <label class="tx-semibold">Reference Number</label>
                                            <input name="ref_number" class="form-control" type="text" placeholder="Reference Number" id="ref_number">
                                            <span class="text-danger error-text timings_error"></span>
                                        </div> -->

                                        <div class="form-group">
                                            <label class="tx-semibold">Select Vehicle</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="vehicle_id" id="vehicle-id">
                                                    <option selected value="">Select Vehicle</option>
                                                    @foreach($data['vehicle'] as $item)
                                                        <option value="{{$item->id}}">{{$item->maker}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="tx-semibold">Select Route</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="route_id" id="route-id">
                                                    <option selected value="">Select Route</option>
                                                    @foreach($data['route'] as $item)
                                                        <option value="{{$item->id}}">{{$item->area}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="tx-semibold">Select Driver</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="driver_id" id="driver-id">
                                                    <option selected value="">Select Driver</option>
                                                    @foreach($data['driver'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="tx-semibold">Total Capacity</label>
                                            <input name="total_cap" class="form-control" type="text" placeholder="Enter Total Capacity" id="total_cap">
                                        </div> -->

                                         <div class="form-group">
                                            <label class="tx-semibold">Select Shift Time</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="shift_id" id="shift-id">
                                                    <option selected value="">Select Shift Time</option>
                                                    @foreach($data['shift'] as $item)
                                                        <option value="{{$item->id}}">{{$item->timings}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="tx-semibold">Driver Shift</label>
                                            <input name="driver_shift" class="form-control" type="text"
                                                placeholder="Driver Shift">
                                            <span class="text-danger error-text driver_shift_error"></span>
                                        </div> -->

                                        <div class="form-group">
                                            <label class="tx-semibold">Select Student</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="student_id" id="student-id">
                                                    <option selected value="">Select Student</option>
                                                    @foreach($data['student'] as $item)
                                                        <option value="{{$item->id}}">{{$item->first_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="tx-semibold">Joining Date</label>
                                            <input class="form-control date-picker" name="joining_date" id="joining-date" placeholder="MM/DD/YYYY" type="text">
                                        </div>

                                        <button type="submit" id="btn-add-transport-reg" class="btn ripple btn-primary">Save</button>
                                        <a href="{{ route('registration.view') }}" class="btn btn-danger">Back</a>
                                    </form>
                                </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{url('assets/js/transport-reg/transport-registration.js')}}"></script>

@endsection
