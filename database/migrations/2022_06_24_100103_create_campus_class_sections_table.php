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
        Schema::create('campus_class_sections', function (Blueprint $table) {
            
            $table->increments('id');

            // $table->primary(['campus_id','system_id','class_id','session_id','section_id']);
            
            // $table->unsignedInteger('campus_id')->nullable();
            // $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');

            // $table->unsignedInteger('system_id')->nullable();
            // $table->foreign('system_id')->references('id')->on('campus_school_systems')->onDelete('cascade');
            
            // $table->unsignedInteger('class_id')->nullable();
            // $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

            // $table->unsignedInteger('session_id')->nullable();
            // $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');

            $table->unsignedInteger('campus_class_id')->nullable();
            $table->foreign('campus_class_id')->references('id')->on('campus_classes')->onDelete('cascade');

            $table->unsignedInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

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
        Schema::dropIfExists('campus_class_sections');
    }
};
