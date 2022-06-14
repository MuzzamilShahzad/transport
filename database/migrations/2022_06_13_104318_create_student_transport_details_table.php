<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_transport_details', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('pick_and_drop_detail',['ByWalk','ByRide', 'SchoolVan','PrivateVan'])->nullable();
            $table->string('ride_vehicle_no',30)->nullable();

            $table->string('school_driver_name',30)->nullable();
            $table->string('school_driver_phone',20)->nullable();
            $table->string('school_vehicle_no',30)->nullable();

            $table->string('private_driver_name',30)->nullable();
            $table->string('private_driver_phone',20)->nullable();
            $table->string('private_vehicle_no',30)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_transport_details');
    }
};
