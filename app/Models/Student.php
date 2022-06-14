<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    
    protected $fillable = [
        'gr',
        'bform_crms_no',
        'dob',
        'gender',
        'place_of_birth',
        'nationality',
        'mother_tongue',
        'first_name',
        'last_name',
        'religion',
        'admission_date',
        'previous_class',
        'previous_school',
        'blood_group',
        'height',
        'weight',
        'student_vaccinated',
        'as_on_date',
        'fee_discount',
        'system',
        'roll_no',
        'temporary_gr',
        'mobile_no',
        'email',
    ];
}
