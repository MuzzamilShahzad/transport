<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;
    protected $table = "student_registrations";
    protected $fillable = [
        'campus_id',
        'system_id',
        'class_id',
        'form_no',
        'session_id',
        'registration_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'siblings_in_mpa',
        'no_of_siblings',
        'previous_class_id',
        'previous_school',
        'house_no',
        'block_no',
        'building_no',
        'area_id',
        'city_id',
        'father_cnic',
        'father_name',
        'father_occupation',
        'father_company_name',
        'father_salary',
        'father_email',
        'father_phone',
        'hear_about_us',
        'hear_about_us_other',
        'test_group_id',
        'interview_group_id'
    ];
}
