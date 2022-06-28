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
        Schema::create('campus_classes', function (Blueprint $table) {
            
            $table->increments('id');

            // $table->unsignedInteger('campus_id')->nullable();
            // $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            
            // $table->unsignedInteger('system_id')->nullable();
            // $table->foreign('system_id')->references('id')->on('campus_school_systems')->onDelete('cascade');
            
            $table->unsignedInteger('campus_detail_id')->nullable();
            $table->foreign('campus_detail_id')->references('id')->on('campus_details')->onDelete('cascade');
            
            $table->unsignedInteger('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

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
        Schema::dropIfExists('campus_classes');
    }
};
