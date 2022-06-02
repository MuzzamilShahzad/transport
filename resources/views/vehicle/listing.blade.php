@extends('layouts.app')
@section('main-content')
@section('page_title', 'Manage Vehicle')

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
                            <a href="{{ route('vehicle.create') }}" class="btn btn-primary" style="float:right">Add Vehicle</a>
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
                                            <th>Vehicle Number</th>
                                            <th>Maker</th>
                                            <th>Chassis Number</th>
                                            <th>Engine Number</th>
                                            <th>Capacity</th>
                                            <th>Contractor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['Vehicle'] as $sno => $item)
                                        <tr>
                                            <td>{{ $sno + 1 }}</td>
                                            <td>{{$item->number}}</td>
                                            <td>{{$item->maker}}</td>
                                            <td>{{$item->chassis_number}}</td>
                                            <td>{{$item->engine_number}}</td>
                                            <td>{{$item->capacity}}</td>
                                            <td>{{$item->contractor_id ? $item->contractor->name : 'No Contractor Selected'}}</td>
                                            <td>
                                                <a href="{{ route('vehicle.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <button data-id="{{$item->id}}" id="btn-delete-vehicle" class="btn btn-danger btn-sm">Delete</button>
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

<script src="{{ url('assets/js/vehicle/vehicle.js') }}"></script>



@endsection
