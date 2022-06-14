<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFatherDetails extends Model
{
    use HasFactory;
    protected $table = "student_father_details";

    protected $fillable = [
        'name',
        'cnic',
        'phone',
        'email',
        'occupation',
        'company_name',
        'salary',
        'vaccinated',
    ];

}
