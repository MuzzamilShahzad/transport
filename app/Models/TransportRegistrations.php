<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRegistrations extends Model
{
    use HasFactory;
    protected $table = "student_vehicle";

    public function vehicle(){
        return $this->belongsTo(Vehicles::class, 'vehicle_id','id');
    }

    public function route(){
        return $this->belongsTo(Routes::class, 'route_id','id');
    }

    public function driver(){
        return $this->belongsTo(Drivers::class, 'driver_id','id');
    }

    public function shift(){
        return $this->belongsTo(Shifts::class, 'shift_id','id');
    }

    public function student(){
        return $this->belongsTo(Students::class, 'student_id','id');
    }
    
}
