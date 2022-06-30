<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddressDetail extends Model
{
    use HasFactory;
    protected $table = "student_address_details";
    
    protected $fillable = [
        'current_house_no',
        'current_block_no',
        'current_building_name_no',
        'current_city',
        'current_area_id',
        'permanent_house_no',
        'permanent_block_no',
        'permanent_building_name_no',
        'permanent_city',
        'permanent_area_id',
    ];
}
