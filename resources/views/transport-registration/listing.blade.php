@extends('layouts.app')
@section('main-content')
@section('page_title', 'Manage Transport Registration')

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
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <a href="{{ route('registration.create') }}" class="btn btn-primary" style="float:right">Add Transport Registration</a>
                            <div>
                                <h1 class="main-content-label mb-1">{{ $data['menu'] }} </h1>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th width="10px">S.NO</th>
                                            <!-- <th>Reference Number</th> -->
                                            <th>Vehicle</th>
                                            <th>Route</th>
                                            <th>Driver</th>
                                            <!-- <th>Total Capacity</th> -->
                                            <th>Shift Time</th>
                                            <th>Student</th>
                                            <th>Joining Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['transportRegistration'] as $sno => $item)
                                        <tr>
                                            <td>{{ $sno + 1 }}</td>
                                            <!-- <td>{{$item->ref_number}}</td> -->
                                            <td>{{$item->vehicle->maker}}</td>
                                            <td>{{$item->route->area}}</td>
                                            <td>{{$item->driver->name}}</td>
                                            <!-- <td>{{$item->total_cap}}</td> -->
                                            <td>{{$item->shift->timings}}</td>
                                            <td>{{$item->student->first_name}}</td>
                                            <td>{{$item->joining_date}}</td>
                                            <td>
                                                <a href="{{ route('registration.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <button data-id="{{$item->id}}" id="btn-delete-transport-registration" class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>

<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div>
                                <h1 class="main-content-label mb-1">{{ $data['menu'] }} </h1>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th width="10px">S.NO</th>
                                            <th>Student Name</th>
                                            <th>Date</th>
                                            <th>Month</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['transportRegistration'] as $sno => $item)
                                        <tr>
                                            <td>{{ $sno + 1 }}</td>
                                            <td>{{$item->student->first_name}}</td>
                                            <td>{{$item->joining_date}}</td>
                                            <td>{{ date('M', strtotime($item->joining_date)) }}</td>
                                            <td>{{$item->fees}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>

<script src="{{ url('assets/js/transport-registration/transport-registration.js') }}"></script>



@endsection
