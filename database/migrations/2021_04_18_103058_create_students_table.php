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
        Schema::create('students', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->string('temporary_gr',10);
            $table->string('gr',20);
            $table->string('roll_no',10)->nullable();

            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');

            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');

            $table->unsignedInteger('system_id');
            $table->foreign('system_id')->references('id')->on('school_systems')->onDelete('cascade');

            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

            $table->unsignedInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('class_groups')->onDelete('cascade');

            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->string('bform_crms_no',20)->nullable();
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->date('dob')->nullable();
            $table->string('gender',6);
            $table->string('place_of_birth',30);
            $table->string('nationality',30);
            $table->string('mother_tongue',30);

            $table->unsignedInteger('previous_class_id')->nullable();
            $table->foreign('previous_class_id')->references('id')->on('classes')->onDelete('cascade');
            
            $table->string('previous_school',30)->nullable();
            $table->string('mobile_no',20)->nullable();
            $table->string('email',30)->nullable();
            $table->date('admission_date');
            $table->string('blood_group',3)->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->date('as_on_date')->nullable();
            $table->integer('fee_discount')->nullable();
            
            $table->string('religion',20);
            $table->enum('religion_type',['sunni','asna_ashri','other']);
            $table->string('religion_type_other',20)->nullable();

            $table->enum('siblings_in_mpa',['yes','no'])->default('no');
            $table->tinyInteger('no_of_siblings')->nullable();
                
            $table->enum('student_vaccinated',['yes','no'])->default('no');

            $table->text('father_details');
            $table->text('mother_details');
            $table->text('guardian_details');
            $table->text('address_details');

            $table->enum('pick-and-drop',['by_walk','by_ride','by_school_van','by_private_van']);

            $table->string('vehicle_no',20)->nullable();
            $table->string('driver_name',20)->nullable();
            $table->string('driver_phone',10)->nullable();

            // $table->unsignedInteger('transport_id')->nullable();
            // $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');

            $table->enum('status',['active','stuck_of'])->default('active');
            $table->tinyInteger('is_active')->unsigned()->default(1);
            $table->tinyInteger('is_delete')->unsigned()->default(0);
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
        Schema::dropIfExists('students');
    }
};
