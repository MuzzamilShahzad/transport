<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
    use HasFactory;
    protected $table = "student_details";

    protected $fillable = [
        'student_id',
        'campus_id',
        'session_id',
        'class_id',
        'section_id',
        'category_id',
        'school_house_id',
        'student_guardian_id',
        'student_mother_id',
        'student_father_id',
        'student_transport_id',
        'student_religion_type_id',
        'student_address_id',
        'student_sibling_id',
    ];

}
