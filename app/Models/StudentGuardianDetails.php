<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGuardianDetails extends Model
{
    use HasFactory;
    protected $table = "student_guardian_details";

    protected $fillable = [
        'name',
        'phone',
        'relation',
        'other_relation',
        'first_person_call',
        'cnic',
    ];
}
