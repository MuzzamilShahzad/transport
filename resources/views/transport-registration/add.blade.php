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
                                        <div class="form-group">
                                            <label class="tx-semibold">Select Vehicle</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="vehicle_id" id="vehicle-id">
                                                    <option selected value="">Select Vehicle</option>
                                                    @foreach($data['vehicles'] as $vehicle)
                                                        <option value="{{$vehicle->id}}">{{$vehicle->number.' ['.$vehicle->maker.']'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Select Route</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="route_id" id="route-id">
                                                    <option selected value="">Select Route</option>
                                                    @foreach($data['routes'] as $route)
                                                        <option value="{{$route->id}}">{{$route->area}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Select Driver</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="driver_id" id="driver-id">
                                                    <option selected value="">Select Driver</option>
                                                    @foreach($data['drivers'] as $driver)
                                                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Select Shift Time</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="shift_id" id="shift-id">
                                                    <option selected value="">Select Shift Time</option>
                                                    @foreach($data['shifts'] as $shift)
                                                        <option value="{{$shift->id}}">{{$shift->timings}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Select Campus</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="campus_id" id="campus-id">
                                                    <option selected value="">Select Student</option>
                                                    @foreach($data['campuses'] as $campus)
                                                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Select Student</label>
                                            <div class="pos-relative">
                                                <select class="form-control select2" name="student_id" id="student-id">
                                                    <option selected value="">Select Student</option>
                                                    @foreach($data['students'] as $student)
                                                        <option value="{{$student->id}}">{{$student->first_name .' '.$student->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Fees</label>
                                            <input name="fees" class="form-control" type="text" placeholder="Enter Fees" id="fees">
                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">Joining Date</label>
                                            <input class="form-control date-picker" name="joining_date" id="joining-date" placeholder="YYYY-MM-DD" type="text">
                                        </div>
                                        <button type="submit" id="btn-add-transport-registration" class="btn ripple btn-primary">Save</button>
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
<script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/transport-registration/transport-registration.js') }}"></script>

@endsection
