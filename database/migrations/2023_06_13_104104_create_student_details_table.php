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
        Schema::create('student_details', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');

            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');

            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
         
            $table->unsignedInteger('school_house_id')->nullable();
            $table->foreign('school_house_id')->references('id')->on('school_houses')->onDelete('cascade');

            $table->unsignedInteger('student_guardian_id')->nullable();
            $table->foreign('student_guardian_id')->references('id')->on('student_guardian_details')->onDelete('cascade');

            $table->unsignedInteger('student_mother_id')->nullable();
            $table->foreign('student_mother_id')->references('id')->on('student_mother_details')->onDelete('cascade');

            $table->unsignedInteger('student_father_id')->nullable();
            $table->foreign('student_father_id')->references('id')->on('student_father_details')->onDelete('cascade');

            $table->unsignedInteger('student_transport_id')->nullable();
            $table->foreign('student_transport_id')->references('id')->on('student_transport_details')->onDelete('cascade');

            $table->unsignedInteger('student_religion_type_id')->nullable();
            $table->foreign('student_religion_type_id')->references('id')->on('student_religion_types')->onDelete('cascade');

            $table->unsignedInteger('student_address_id')->nullable();
            $table->foreign('student_address_id')->references('id')->on('student_address_details')->onDelete('cascade');

            $table->unsignedInteger('student_sibling_id')->nullable();
            $table->foreign('student_sibling_id')->references('id')->on('student_siblings_details')->onDelete('cascade');

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
        Schema::dropIfExists('student_details');
    }
};
