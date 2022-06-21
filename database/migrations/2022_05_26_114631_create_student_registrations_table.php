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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');

            $table->string('system_type',20);

            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

            $table->string('form_no',20)->nullable();
            
            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');

            $table->string('computerize_registration',30);
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->date('dob')->nullable();
            $table->string('gender',10);
            
            $table->enum('siblings_in_mpa',['Yes','No'])->default('No');
            
            $table->string('no_of_siblings',10)->nullable();
            
            $table->string('previous_class',20)->nullable();
            $table->string('previous_school',30)->nullable();

            $table->string('house_no',30)->nullable();
            $table->string('block_no',30)->nullable();
            $table->string('building_name_no',30)->nullable();

            $table->unsignedInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');

            $table->string('city',30)->nullable();

            $table->string('father_cnic',20);
            $table->string('father_name',30);
            $table->string('father_occupation',30)->nullable();
            $table->string('father_company_name',30)->nullable();
            $table->string('father_salary',20)->nullable();
            $table->string('father_email',30)->nullable();
            $table->string('father_phone',20);
            $table->string('hear_about_us',30)->nullable();

            $table->string('test_group',30)->nullable();
            $table->string('interview_group',30)->nullable();

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
        Schema::dropIfExists('student_registrations');
    }
};
