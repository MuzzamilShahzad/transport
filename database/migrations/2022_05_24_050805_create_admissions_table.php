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
        Schema::create('student_admission_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('temporary_gr',20)->nullable();
            $table->string('gr',20);
            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->string('system',20);
            $table->string('roll_no',20);
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->string('mother_tongue',30)->nullable();
            $table->string('previous_class',20)->nullable();
            $table->string('previous_school',30)->nullable();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('mobile_no',20)->nullable();
            $table->string('email',30)->nullable();
            $table->unsignedInteger('school_house_id')->nullable();
            $table->foreign('school_house_id')->references('id')->on('school_houses')->onDelete('cascade');
            $table->date('as_on_date')->nullable();
            $table->string('fee_discount',20)->nullable();
            $table->string('student_vaccinated', 4)->nullable();

            $table->string('father_cnic',20);
            $table->string('father_salary',20)->nullable();
            $table->string('father_email',30)->nullable();
            $table->string('father_name',30);
            $table->string('father_phone',20);
            $table->string('father_occupation',30)->nullable();
            $table->string('father_company_name',30)->nullable();
            $table->string('father_vaccinated',5)->nullable();
            
            $table->string('mother_cnic',20);
            $table->string('mother_salary',20)->nullable();
            $table->string('mother_email',30)->nullable();
            $table->string('mother_name',30);
            $table->string('mother_phone',20);
            $table->string('mother_occupation',30)->nullable();
            $table->string('mother_company_name',30)->nullable();
            $table->string('mother_vaccinated',5)->nullable();

            $table->string('guardian_cnic',20)->nullable();
            $table->string('guardian_first_name',30)->nullable();
            $table->string('guardian_phone',20)->nullable();
            $table->string('guardian_relation',40)->nullable();
            $table->string('first_person_call',10)->nullable();

            $table->string('current_house_no',30)->nullable();
            $table->string('current_block_no',30)->nullable();
            $table->string('current_building_name_no',30)->nullable();
            $table->string('current_city',30)->nullable();

            $table->unsignedInteger('current_area_id')->nullable();
            $table->foreign('current_area_id')->references('id')->on('areas')->onDelete('cascade');

            $table->string('permenant_house_no',30)->nullable();
            $table->string('permenant_block_no',30)->nullable();
            $table->string('permenant_building_name_no',30)->nullable();
            $table->string('permenant_city',30)->nullable();

            $table->unsignedInteger('permenant_area_id')->nullable();
            $table->foreign('permenant_area_id')->references('id')->on('areas')->onDelete('cascade');

            $table->string('pick_and_drop_detail',20);

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
        Schema::dropIfExists('admissions');
    }
};
