@extends('layouts.app')
@section('main-content')
@section('page_title', 'Student Details')

<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;">{{ $data['page'] }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $data['menu'] }}</li>
                    </ol>
                </div>
                <div class="d-flex">
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
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-xl-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="panel profile-cover">
                                <div class="profile-cover__img">
                                    <img src="{{ url('assets/img/users/6.jpg') }}" alt="img" />
                                    <a href="javascript:;"><i class="mdi mdi-pencil"></i></a>
                                </div>
                                <div class="profile-info">
                                    <h3 class="tx-medium">Student Name</h3>
                                </div>
                                <div class="profile-cover__action bg-img"></div>
                            </div>
                            <div class="profile-tab tab-menu-heading d-flex mt-3">
                                <div class="">
                                    <nav class="nav nav-pills flex-column flex-sm-row py-2">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Profile">Profile</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#edit">Fees</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#timeline">Document</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#gallery">Timeline</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#friends">Friends</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#settings">Account Settings</a>
                                    </nav>
                                </div>
                                <div class="ms-auto d-none d-xl-block">
                                    <div class="text-end mt-2">
                                        <button class="btn btn-md ripple bg-primary-transparent text-primary me-1"><i class="mdi mdi-facebook"></i></button>
                                        <button class="btn btn-md ripple bg-danger-transparent text-danger me-1"><i class="mdi mdi-google"></i></button>
                                        <button class="btn btn-md ripple bg-info-transparent text-info me-1"><i class="mdi mdi-twitter"></i></button>
                                        <button class="btn btn-md ripple bg-secondary-transparent text-secondary"><i class="mdi mdi-dribbble"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-xxl-9 col-xl-8 col-md-12">
                    <div class="card custom-card main-content-body-profile">
                        <div class="tab-content">
                            <div class="main-content-body tab-pane p-4 border-top-0" id="Profile">
                                <div class="card-body p-0 border p-0 rounded-10">
                                    <div class="p-4">
                                        <h4 class="tx-15 text-uppercase mb-3">Admission No:</h4>
                                        <p class="m-b-5 text-muted">19968</p>
                                        
                                        <hr>
                                        <h4 class="tx-15 text-uppercase mb-3">Roll No:</h4>
                                        <p class="m-b-5 text-muted">GG-2134</p>
                                        
                                        <hr>
                                        <h4 class="tx-15 text-uppercase mb-3">Class:</h4>
                                        <p class="m-b-5 text-muted">Class I (2021-22)</p>
                                        
                                        <hr>
                                        <h4 class="tx-15 text-uppercase mb-3">Section:</h4><p class="m-b-5 text-muted">A</p>
                                        
                                        
                                        <hr>
                                        <h4 class="tx-15 text-uppercase mb-3">RTE:</h4>
                                        <p class="m-b-5 text-muted">0000</p>
                                        
                                        <hr>
                                        <h4 class="tx-15 text-uppercase mb-3">Gender:</h4>
                                        <p class="m-b-5 text-muted">Female</p>
                                    </div>
                                </div>
                            </div>
                            <div class="main-content-body tab-pane p-4 border-top-0" id="edit">
                                <div class="card custom-card border">
                                    <div class="card-body">
                                        <div class="mb-4 main-content-label">Personal Information</div>
                                        <form class="form-horizontal">
                                            <div class="mb-4 main-content-label">Name</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">User Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="User Name" value="Dennis Mark">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">First Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="First Name" value="Dennis">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">last Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Last Name" value="Mark">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Designation</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Designation" value="Web Designer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Contact Info</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Email<i>(required)</i></label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Email" value="info@Dashplex.in">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Website</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Website" value="@spruko.w">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Phone</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="phone number" value="+245 354 654">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Address</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Address">San Francisco, CA</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Social Info</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Twitter</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="twitter" value="twitter.com/spruko.me">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Facebook</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="facebook" value="https://www.facebook.com/Dashplex">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Linked in</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="linkedin" value="linkedin.com/in/spruko">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">About Yourself</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Biographical Info</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="Please say something about yourself"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Notifications</div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Configure Notifications</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Allow all Notifications</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Disable all Notifications</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Notification Sounds</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer py-3">
                                        <button class="btn ripple btn-success w-sm float-end">Save</button>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="main-content-body p-4 border tab-pane border-top-0" id="gallery">
                                <div class="card-body border rounded-6">
                                    <div class="masonry row row-sm">
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href="../assets/img/media/1.jpg" class="js-img-viewer" data-caption="IMAGE-01"
                                                    data-id="lion">
                                                    <img src="../assets/img/media/1.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href="../assets/img/media/2.jpg" class="js-img-viewer" data-caption="IMAGE-02"
                                                    data-id="camel">
                                                    <img src="../assets/img/media/2.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href="../assets/img/media/3.jpg" class="js-img-viewer" data-caption="IMAGE-03"
                                                    data-id="hippo">
                                                    <img src="../assets/img/media/3.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href="../assets/img/media/4.jpg" class="js-img-viewer" data-caption="IMAGE-04"
                                                    data-id="koala">
                                                    <img src="../assets/img/media/4.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href="../assets/img/media/5.jpg"  class="js-img-viewer" data-caption="IMAGE-05"
                                                    data-id=" bear">
                                                    <img src=" ../assets/img/media/5.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/6.jpg" class=" js-img-viewer" data-caption="IMAGE-06"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/6.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/7.jpg" class=" js-img-viewer" data-caption="IMAGE-07"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/7.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/8.jpg" class=" js-img-viewer" data-caption="IMAGE-08"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/8.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/9.jpg" class=" js-img-viewer" data-caption="IMAGE-09"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/9.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/10.jpg" class=" js-img-viewer" data-caption="IMAGE-10"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/10.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/11.jpg" class=" js-img-viewer" data-caption="IMAGE-11"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/11.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <div class="brick">
                                                <a href=" ../assets/img/media/14.jpg" class=" js-img-viewer" data-caption="IMAGE-11"
                                                    data-id=" rhino">
                                                    <img src=" ../assets/img/media/14.jpg" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-content-body tab-pane border-top-0" id="friends">
                                <div class="card-body border pd-b-10">
                                    <!-- row -->
                                    <div class="row row-sm">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/2.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class=" mb-1 mt-3 main-content-label">Socrates Itumay</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">Project Manager</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/3.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class="mb-1 mt-3  main-content-label">Reynante Labares</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">Web Designer</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/4.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Owen Bongcaras</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">App Developer</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/8.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Stephen Metcalfe</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">Administrator</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/2.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class=" mb-1 mt-3 main-content-label">Socrates Itumay</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">Project Manager</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/3.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class="mb-1 mt-3  main-content-label">Reynante Labares</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">Web Designer</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/4.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Owen Bongcaras</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">App Developer</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-3 col-xl-4">
                                            <div class="card custom-card border">
                                                <div class="card-body text-center">
                                                    <div class="user-lock text-center">
                                                        <div class="dropdown text-end">
                                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical fs-16"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:;"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                        </div>
                                                        <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/img/users/8.jpg"></a>
                                                    </div>
                                                    <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Stephen Metcalfe</h5></a>
                                                    <p class="mb-2 mt-1 tx-inverse">Administrator</p>
                                                    <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-content-body tab-pane p-4 border-top-0" id="settings">
                                <div class="card custom-card border">
                                    <div class="card-body" data-select2-id="12">
                                        <form class="form-horizontal" data-select2-id="11">
                                            <div class="mb-4 main-content-label">Account</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">User Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="User Name" value="Dennis Mark"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Email</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Email" value="info@DennisMark.in"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group " data-select2-id="108">
                                                <div class="row" data-select2-id="107">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Language</label>
                                                    </div>
                                                    <div class="col-md-10" data-select2-id="106">
                                                        <select class="form-control select2-no-search" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                            <option data-select2-id="31">Us English</option>
                                                            <option data-select2-id="109">Arabic</option>
                                                            <option data-select2-id="110">Korean</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group " data-select2-id="10">
                                                <div class="row" data-select2-id="9">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Timezone</label>
                                                    </div>
                                                    <div class="col-md-10" data-select2-id="8">
                                                        <select class="form-control select2-no-search" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                            <option value="Pacific/Midway" data-select2-id="6">(GMT-11:00) Midway Island, Samoa</option>
                                                            <option value="America/Adak" data-select2-id="16">(GMT-10:00) Hawaii-Aleutian</option>
                                                            <option value="Etc/GMT+10" data-select2-id="17">(GMT-10:00) Hawaii</option>
                                                            <option value="Pacific/Marquesas" data-select2-id="18">(GMT-09:30) Marquesas Islands</option>
                                                            <option value="Pacific/Gambier" data-select2-id="19">(GMT-09:00) Gambier Islands</option>
                                                            <option value="America/Anchorage" data-select2-id="20">(GMT-09:00) Alaska</option>
                                                            <option value="America/Ensenada" data-select2-id="21">(GMT-08:00) Tijuana, Baja California</option>
                                                            <option value="Etc/GMT+8" data-select2-id="22">(GMT-08:00) Pitcairn Islands</option>
                                                            <option value="America/Los_Angeles" data-select2-id="23">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                            <option value="America/Denver" data-select2-id="24">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                            <option value="America/Chihuahua" data-select2-id="25">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                            <option value="America/Dawson_Creek" data-select2-id="26">(GMT-07:00) Arizona</option>
                                                            <option value="America/Belize" data-select2-id="27">(GMT-06:00) Saskatchewan, Central America</option>
                                                            <option value="America/Cancun" data-select2-id="28">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                            <option value="Chile/EasterIsland" data-select2-id="29">(GMT-06:00) Easter Island</option>
                                                            <option value="America/Chicago" data-select2-id="30">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                            <option value="America/New_York" data-select2-id="31">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                            <option value="America/Havana" data-select2-id="32">(GMT-05:00) Cuba</option>
                                                            <option value="America/Bogota" data-select2-id="33">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                            <option value="America/Caracas" data-select2-id="34">(GMT-04:30) Caracas</option>
                                                            <option value="America/Santiago" data-select2-id="35">(GMT-04:00) Santiago</option>
                                                            <option value="America/La_Paz" data-select2-id="36">(GMT-04:00) La Paz</option>
                                                            <option value="Atlantic/Stanley" data-select2-id="37">(GMT-04:00) Faukland Islands</option>
                                                            <option value="America/Campo_Grande" data-select2-id="38">(GMT-04:00) Brazil</option>
                                                            <option value="America/Goose_Bay" data-select2-id="39">(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                            <option value="America/Glace_Bay" data-select2-id="40">(GMT-04:00) Atlantic Time (Canada)</option>
                                                            <option value="America/St_Johns" data-select2-id="41">(GMT-03:30) Newfoundland</option>
                                                            <option value="America/Araguaina" data-select2-id="42">(GMT-03:00) UTC-3</option>
                                                            <option value="America/Montevideo" data-select2-id="43">(GMT-03:00) Montevideo</option>
                                                            <option value="America/Miquelon" data-select2-id="44">(GMT-03:00) Miquelon, St. Pierre</option>
                                                            <option value="America/Godthab" data-select2-id="45">(GMT-03:00) Greenland</option>
                                                            <option value="America/Argentina/Buenos_Aires" data-select2-id="46">(GMT-03:00) Buenos Aires</option>
                                                            <option value="America/Sao_Paulo" data-select2-id="47">(GMT-03:00) Brasilia</option>
                                                            <option value="America/Noronha" data-select2-id="48">(GMT-02:00) Mid-Atlantic</option>
                                                            <option value="Atlantic/Cape_Verde" data-select2-id="49">(GMT-01:00) Cape Verde Is.</option>
                                                            <option value="Atlantic/Azores" data-select2-id="50">(GMT-01:00) Azores</option>
                                                            <option value="Europe/Belfast" data-select2-id="51">(GMT) Greenwich Mean Time : Belfast</option>
                                                            <option value="Europe/Dublin" data-select2-id="52">(GMT) Greenwich Mean Time : Dublin</option>
                                                            <option value="Europe/Lisbon" data-select2-id="53">(GMT) Greenwich Mean Time : Lisbon</option>
                                                            <option value="Europe/London" data-select2-id="54">(GMT) Greenwich Mean Time : London</option>
                                                            <option value="Africa/Abidjan" data-select2-id="55">(GMT) Monrovia, Reykjavik</option>
                                                            <option value="Europe/Amsterdam" data-select2-id="56">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                                            <option value="Europe/Belgrade" data-select2-id="57">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                                            <option value="Europe/Brussels" data-select2-id="58">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                            <option value="Africa/Algiers" data-select2-id="59">(GMT+01:00) West Central Africa</option>
                                                            <option value="Africa/Windhoek" data-select2-id="60">(GMT+01:00) Windhoek</option>
                                                            <option value="Asia/Beirut" data-select2-id="61">(GMT+02:00) Beirut</option>
                                                            <option value="Africa/Cairo" data-select2-id="62">(GMT+02:00) Cairo</option>
                                                            <option value="Asia/Gaza" data-select2-id="63">(GMT+02:00) Gaza</option>
                                                            <option value="Africa/Blantyre" data-select2-id="64">(GMT+02:00) Harare, Pretoria</option>
                                                            <option value="Asia/Jerusalem" data-select2-id="65">(GMT+02:00) Jerusalem</option>
                                                            <option value="Europe/Minsk" data-select2-id="66">(GMT+02:00) Minsk</option>
                                                            <option value="Asia/Damascus" data-select2-id="67">(GMT+02:00) Syria</option>
                                                            <option value="Europe/Moscow" data-select2-id="68">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                            <option value="Africa/Addis_Ababa" data-select2-id="69">(GMT+03:00) Nairobi</option>
                                                            <option value="Asia/Tehran" data-select2-id="70">(GMT+03:30) Tehran</option>
                                                            <option value="Asia/Dubai" data-select2-id="71">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                            <option value="Asia/Yerevan" data-select2-id="72">(GMT+04:00) Yerevan</option>
                                                            <option value="Asia/Kabul" data-select2-id="73">(GMT+04:30) Kabul</option>
                                                            <option value="Asia/Yekaterinburg" data-select2-id="74">(GMT+05:00) Ekaterinburg</option>
                                                            <option value="Asia/Tashkent" data-select2-id="75">(GMT+05:00) Tashkent</option>
                                                            <option value="Asia/Kolkata" data-select2-id="76">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                            <option value="Asia/Katmandu" data-select2-id="77">(GMT+05:45) Kathmandu</option>
                                                            <option value="Asia/Dhaka" data-select2-id="78">(GMT+06:00) Astana, Dhaka</option>
                                                            <option value="Asia/Novosibirsk" data-select2-id="79">(GMT+06:00) Novosibirsk</option>
                                                            <option value="Asia/Rangoon" data-select2-id="80">(GMT+06:30) Yangon (Rangoon)</option>
                                                            <option value="Asia/Bangkok" data-select2-id="81">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                            <option value="Asia/Krasnoyarsk" data-select2-id="82">(GMT+07:00) Krasnoyarsk</option>
                                                            <option value="Asia/Hong_Kong" data-select2-id="83">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                            <option value="Asia/Irkutsk" data-select2-id="84">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                            <option value="Australia/Perth" data-select2-id="85">(GMT+08:00) Perth</option>
                                                            <option value="Australia/Eucla" data-select2-id="86">(GMT+08:45) Eucla</option>
                                                            <option value="Asia/Tokyo" data-select2-id="87">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                            <option value="Asia/Seoul" data-select2-id="88">(GMT+09:00) Seoul</option>
                                                            <option value="Asia/Yakutsk" data-select2-id="89">(GMT+09:00) Yakutsk</option>
                                                            <option value="Australia/Adelaide" data-select2-id="90">(GMT+09:30) Adelaide</option>
                                                            <option value="Australia/Darwin" data-select2-id="91">(GMT+09:30) Darwin</option>
                                                            <option value="Australia/Brisbane" data-select2-id="92">(GMT+10:00) Brisbane</option>
                                                            <option value="Australia/Hobart" data-select2-id="93">(GMT+10:00) Hobart</option>
                                                            <option value="Asia/Vladivostok" data-select2-id="94">(GMT+10:00) Vladivostok</option>
                                                            <option value="Australia/Lord_Howe" data-select2-id="95">(GMT+10:30) Lord Howe Island</option>
                                                            <option value="Etc/GMT-11" data-select2-id="96">(GMT+11:00) Solomon Is., New Caledonia</option>
                                                            <option value="Asia/Magadan" data-select2-id="97">(GMT+11:00) Magadan</option>
                                                            <option value="Pacific/Norfolk" data-select2-id="98">(GMT+11:30) Norfolk Island</option>
                                                            <option value="Asia/Anadyr" data-select2-id="99">(GMT+12:00) Anadyr, Kamchatka</option>
                                                            <option value="Pacific/Auckland" data-select2-id="100">(GMT+12:00) Auckland, Wellington</option>
                                                            <option value="Etc/GMT-12" data-select2-id="101">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                            <option value="Pacific/Chatham" data-select2-id="102">(GMT+12:45) Chatham Islands</option>
                                                            <option value="Pacific/Tongatapu" data-select2-id="103">(GMT+13:00) Nuku'alofa</option>
                                                            <option value="Pacific/Kiritimati" data-select2-id="104">(GMT+14:00) Kiritimati</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Verification</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">SMS</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Email ID</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Phone</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Secuirity Settings</div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Change Password</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" placeholder="Enter New Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Confirm Password</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Account Security</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Always Logged In</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Save Passwords</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Display Info on your Profile</span>
                                                        </label>
                                                        <label class="custom-switch d-block mg-b-15-f">
                                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="text-muted ms-2">Two Factor Authentication</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer py-3">
                                        <div class="btn-list float-end">
                                            <button class="btn ripple btn-outline-danger w-md">Delete Account</button>
                                            <button class="btn ripple btn-danger w-md">Deactivate Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h6 class="main-content-label">Following</h6>
                        </div>
                        <div class="card-body">
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/2.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Benedict Vallone</p>
                                        <a href="javascript:;" class="text-muted">Add Friend</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="contact-icon text-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="Message" aria-label="Message"><i class="fe fe-message-square"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/3.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Dennis Trexy</p>
                                        <a href="javascript:;" class="text-muted">Add Friend</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="contact-icon text-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="Message" aria-label="Message"><i class="fe fe-message-square"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/5.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Elida Distefano</p>
                                        <a href="javascript:;" class="text-muted">Add Friend</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="contact-icon text-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="Message" aria-label="Message"><i class="fe fe-message-square"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/6.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Jacquelynn Sapienza</p>
                                        <a href="javascript:;" class="text-muted">Add Friend</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="contact-icon text-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="Message" aria-label="Message"><i class="fe fe-message-square"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-0">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/7.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Catrice Doshier</p>
                                        <a href="javascript:;" class="text-muted">Add Friend</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="contact-icon text-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="Message" aria-label="Message"><i class="fe fe-message-square"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-card">
                        <div class="card-header">
                            <h6 class="main-content-label">Followers</h6>
                        </div>
                        <div class="card-body">
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/1.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Harvey Mattos</p>
                                        <a href="javascript:;" class="text-muted">19 Mutual Friends</a>
                                    </div>
                                    <div class="ms-auto mt-2">
                                        <button class="btn btn-sm btn-success">Follow</button>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/2.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Robbie Ruder</p>
                                        <a href="javascript:;" class="text-muted">21 Mutual Friends</a>
                                    </div>
                                    <div class="ms-auto mt-2">
                                        <button class="btn btn-sm btn-success">Follow</button>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/3.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Dana Lott</p>
                                        <a href="javascript:;" class="text-muted">0 Mutual Friends</a>
                                    </div>
                                    <div class="ms-auto mt-2">
                                        <button class="btn btn-sm btn-success">Follow</button>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/4.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Mercy Ritia</p>
                                        <a href="javascript:;" class="text-muted">24 Mutual Friends</a>
                                    </div>
                                    <div class="ms-auto mt-2">
                                        <button class="btn btn-sm btn-success">Follow</button>
                                    </div>
                                </div>
                            </div>
                            <div class="media mb-0">
                                <div class="avatar avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="../assets/img/users/5.jpg">
                                </div>
                                <div class="media-body ms-3 d-flex">
                                    <div class="">
                                        <p class="tx-14 text-dark mb-0 tx-medium">Mark Jhon</p>
                                        <a href="javascript:;" class="text-muted">15 Mutual Friends</a>
                                    </div>
                                    <div class="ms-auto mt-2">
                                        <button class="btn btn-sm btn-success">Follow</button>
                                    </div>
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
<!-- End Main Content-->

@endsection