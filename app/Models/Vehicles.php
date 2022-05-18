<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicles extends Model
{
    use HasFactory;

    // use SoftDeletes;
    // protected $date = ['deleted_at'];

    protected $table = "vehicles";

    public function contractor(){
        return $this->belongsTo(Contractors::class,'contractor_id','id');
    }
}
