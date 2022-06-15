<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRegistration extends Model
{
    use HasFactory;
    protected $table = "student_vehicle";

    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id','id');
    }

    public function route(){
        return $this->belongsTo(Route::class, 'route_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id','id');
    }

    public function shift(){
        return $this->belongsTo(Shift::class, 'shift_id','id');
    }

    public function student(){
        return $this->belongsTo(student::class, 'student_id','id');
    }
    
}
