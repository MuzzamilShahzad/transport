<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMotherDetails extends Model
{
    use HasFactory;
    protected $table = "student_mother_details";

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
