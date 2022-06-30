<?php

// namespace App\Http\Controllers\Student;
// namespace App\Http\Controllers\School;
// use App\Http\Controllers\School;
// use App\Http\Controllers\DashboardController;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\DashboardController;

// use App\Http\Controllers\ContractorController;
// use App\Http\Controllers\DriverController;
// use App\Http\Controllers\VehicleController;
// use App\Http\Controllers\RouteController;
// use App\Http\Controllers\ShiftController;
// use App\Http\Controllers\DriverVehicleController;
// use App\Http\Controllers\TransportRegistrationController;

// use App\Http\Controllers\AdmissionController;
// use App\Http\Controllers\StudentRegistrationController;

// use App\Http\Controllers\FeesGroupController;
// use App\Http\Controllers\FeesTypeController;
// use App\Http\Controllers\FeesMasterController;
// use App\Http\Controllers\FeesDiscountController;

// use App\Http\Controllers\StudentDetailsController;


// ---------- STUDENT ---------- //
Route::controller(RegistrationController::class)->group(function () {
    Route::get('/student/registration/add', 'create')->name('student.registration.create');
    // Route::post('/student/registration/store', 'store')->name(us'student.registration.store');
    Route::post('/student/registration/store', 'store')->name('student.registration.store');
    Route::get('/session/get-groups', 'getSessionGroups');
});

// ---------- SCHOOL ---------- //
Route::controller(CampusController::class)->group(function () {
    Route::get('/campus/school-system', 'getCampusSchoolSystemByCampusId')->name('campus.campusSchoolSystemByCampusId');
    Route::get('/campus/classes', 'getCampusClassesByCampusAndSystemId')->name('campus.CampusClassesByCampusAndSystemId');
    // Route::get('/campus/get-school-system-and-class', 'getCampusSchoolSystemAndClassesByCampusId')->name('campus.schoolSystemAndClassesByCampusId');
    Route::get('/campus/class-groups-and-sections', 'getClassGroupAndSectionByCampusSystemAndClassId')->name('campus.classGroupAndSectionByCampusSystemAndClassId');
    // Route::get('/campus/test-inteview-groups', 'getTestInterviewGroupByCampusId')->name('campus.testInterviewGroupByCampusId');
    Route::get('/campus/test-inteview-groups-and-class-sections', 'getTestInterviewGroupAndClassSectionByCampusSystemClassId')->name('campus.testInterviewGroupAndClassSectionByCampusSystemClassId');
    // Route::get('/campus/class-sections', 'getSectionByCampusSytemClassSessionId')->name('campus.sectionByCampusSytemClassSessionId');
});

// Route::controller(ClassController::class)->group(function () {
//     Route::get('/campus/get-class-groups', 'getClassGroupByCampusAndClassId')->name('campus.getClassesByCampusId');
// });

// Dashboard Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//Contractor routes
Route::controller(ContractorController::class)->group(function () {
    Route::get('/contractor', 'listing')->name('contractor.view');
    Route::get('/contractor/add', 'add')->name('contractor.create');
    Route::post('/contractor/store', 'store')->name('contractor.store');
    Route::get('/contractor/edit/{id}', 'edit')->name('contractor.edit');
    Route::put('/contractor/update/{id}', 'update')->name('contractor.update');
    Route::delete('/contractor/delete', 'delete')->name('contractor.delete');
});

//Driver routes
Route::controller(DriverController::class)->group(function () {
    Route::get('/driver', 'listing')->name('driver.view');
    Route::get('/driver/add', 'add')->name('driver.create');
    Route::post('/driver/store', 'store')->name('driver.store');
    Route::get('/driver/edit/{id}', 'edit')->name('driver.edit');
    Route::put('/driver/update/{id}', 'update')->name('driver.update');
    Route::delete('/driver/delete', 'delete')->name('driver.delete');
});

//Vehicle routes
Route::controller(VehicleController::class)->group(function () {
    Route::get('/vehicle', 'listing')->name('vehicle.view');
    Route::get('/vehicle/add', 'add')->name('vehicle.create');
    Route::post('/vehicle/store', 'store')->name('vehicle.store');
    Route::get('/vehicle/edit/{id}', 'edit')->name('vehicle.edit');
    Route::put('/vehicle/update/{id}', 'update')->name('vehicle.update');
    Route::delete('/vehicle/delete', 'delete')->name('vehicle.delete');

    Route::get('/vehicle/total-capacity', 'getTotalCapacity')->name('get.totalCapacity');
});

//Route routes
Route::controller(RouteController::class)->group(function () {
    Route::get('/route', 'listing')->name('route.view');
    Route::get('/route/add', 'add')->name('route.create');
    Route::post('/route/store', 'store')->name('route.store');
    Route::get('/route/edit/{id}', 'edit')->name('route.edit');
    Route::put('/route/update/{id}', 'update')->name('route.update');
    Route::delete('/route/delete', 'delete')->name('route.delete');
});

//Shift routes
Route::controller(ShiftController::class)->group(function () {
    Route::get('/shift', 'listing')->name('shift.view');
    Route::get('/shift/add', 'add')->name('shift.create');
    Route::post('/shift/store', 'store')->name('shift.store');
    Route::get('/shift/edit/{id}', 'edit')->name('shift.edit');
    Route::put('/shift/update/{id}', 'update')->name('shift.update');
    Route::delete('/shift/delete', 'delete')->name('shift.delete');
});

//Registration routes
Route::controller(TransportRegistrationController::class)->group(function () {
    Route::get('/transport/registration', 'listing')->name('registration.view');
    Route::get('/transport/registration/add', 'add')->name('registration.create');
    Route::post('/transport/registration/store', 'store')->name('registration.store');
    Route::get('/transport/registration/edit/{id}', 'edit')->name('registration.edit');
    Route::put('/transport/registration/update/{id}', 'update')->name('registration.update');
    Route::delete('/transport/registration/delete', 'delete')->name('registration.delete');
});

//Student Registration Routes
// Route::controller(StudentRegistrationController::class)->group(function () {
//     Route::get('/student/registration/add', 'add')->name('student.registration.create');
//     Route::post('/student/registration/store', 'store')->name('student.registration.store');

//     Route::get('/session/get-groups', 'getSessionGroups');
// });

//Admission routes
Route::controller(AdmissionController::class)->group(function () {
    Route::get('/admission', 'listing')->name('admission.view');
    Route::get('/admission/add', 'create')->name('admission.create');
    Route::post('/admission/store', 'store')->name('admission.store');
    Route::get('/admission/edit/{id}', 'edit')->name('admission.edit');
    Route::put('/admission/update', 'update')->name('admission.update');
    Route::delete('/admission/delete', 'delete')->name('admission.delete');
    Route::get('/admission/student/details/{id}', 'admissionStudentDetails')->name('student.details');

    Route::post('/search/student', 'searchStudent');
    Route::get('/student/details', 'studentDetails');
<<<<<<< HEAD
    Route::get('/import', 'import')->name('admission.import');
=======
    // Route::get('/import', 'import')->name('import');
    Route::get('admission/import', 'import')->name('admission.import');
>>>>>>> 82e4fd1bf2cc7b7e5cfda98764c6c1976bf2d8ab
    Route::post('/admission/import/store', 'importStore')->name('admission.import.store');

    Route::get('/campus/get-system', 'getCampusSystem');
});

Route::controller(FeesGroupController::class)->group(function () {
    Route::get('/fees/group', 'listing')->name('fees.group.view');
    Route::get('/fees/group/add', 'add')->name('fees.group.create');
});

Route::controller(FeesTypeController::class)->group(function () {
    Route::get('/fees/type', 'listing')->name('fees.type.view');
    Route::get('/fees/type/add', 'add')->name('fees.type.create');
});

Route::controller(FeesMasterController::class)->group(function () {
    Route::get('/fees/master', 'listing')->name('fees.master.view');
    Route::get('/fees/master/add', 'add')->name('fees.master.create');
});

Route::controller(FeesDiscountController::class)->group(function () {
    Route::get('/fees/discount', 'listing')->name('fees.discount.view');
    Route::get('/fees/discount/add', 'add')->name('fees.discount.create');
});

Route::controller(StudentDetailsController::class)->group(function () {
    Route::get('/student/details/view', 'studentDetailsView')->name('student.details.view');
});

//Driver Vehicles routes
// Route::controller(DriverVehicleController::class)->group(function () {
//     Route::get('/driver-vehicle', 'listing')->name('driver-vehicle.view');
//     Route::get('/driver-vehicle/create', 'create')->name('driver-vehicle.create');
//     Route::post('/driver-vehicle/store', 'store')->name('driver-vehicle.store');
//     Route::get('/driver-vehicle/edit/{id}', 'edit')->name('driver-vehicle.edit');
//     Route::put('/driver-vehicle/update/{id}', 'update')->name('driver-vehicle.update');
//     Route::delete('/driver-vehicle/delete', 'delete')->name('driver-vehicle.delete');
// });