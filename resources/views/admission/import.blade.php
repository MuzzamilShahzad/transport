@extends('layouts.app')
@section('main-content')
@section('page_title', 'Add Admission')

<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <br>
            <div class="form-group row">
                <div class="col-lg-12 col-sm-12">
                    <input type="file" class="dropify" onchange="readURL(this);" data-height="180" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection