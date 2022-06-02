@extends('layouts.app')
@section('main-content')
@section('page_title', 'Add Contactor')

<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        .................
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
                                    <form action="{{ route('contractor.store') }}" method="post">
                                        <div class="form-group">
                                            <label class="tx-semibold">Name</label>
                                            <input name="name" class="form-control" type="text" placeholder="Enter Name" id="name">
                                        </div>

                                        <div class="form-group">
                                            <label class="tx-semibold">Area</label>
                                            <div class="pos-relative">
                                                <input name="area" class="form-control pd-r-80" type="text" placeholder="Enter Area" id="area">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="tx-semibold">CNIC</label>
                                            <div class="pos-relative">
                                                <input name="cnic" class="form-control pd-r-80" type="text" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" id="cnic">
                                            </div>
                                        </div>
                                        <button class="btn ripple btn-primary" id="btn-add-contractor" type="submit">Submit</button>
                                        <a href="{{ route('contractor.view') }}" class="btn ripple btn-danger">Back</a>
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
<script src="{{ url('assets/js/contractor/contractor.js') }}"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>

@endsection
