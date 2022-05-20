<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;

    // use SoftDeletes;
    // protected $date = ['deleted_at'];

    protected $table = "Vehicles";

    public function contractor(){
        return $this->belongsTo(Contractor::class,'contractor_id','id');
    }
}
