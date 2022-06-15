<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSiblingDetails extends Model
{
    use HasFactory;
    protected $table = "student_siblings_details";

    protected $fillable = [
        'siblings_in_mpa',
        'no_of_siblings',
    ];

}
