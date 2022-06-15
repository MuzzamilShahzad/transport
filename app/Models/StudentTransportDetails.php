<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTransportDetails extends Model
{
    use HasFactory;
    protected $table = "student_transport_details";

    protected $fillable = [
        'pick_and_drop_detail',
        'ride_vehicle_no',

        'school_driver_name',
        'school_driver_phone',
        'school_vehicle_no',

        'private_driver_name',
        'private_driver_phone',
        'private_vehicle_no'
    ];

}
