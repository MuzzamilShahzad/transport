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
            $table->string('gr',20);
            $table->string('bform_crms_no',20)->nullable();
            $table->date('dob')->nullable();
            $table->string('gender',10);
            $table->string('place_of_birth',30);
            $table->string('nationality',30);
            $table->string('mother_tongue',30)->nullable();
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('religion',20);
            $table->date('admission_date');
            $table->string('previous_class',20)->nullable();
            $table->string('previous_school',30)->nullable();
            $table->string('blood_group',10)->nullable();
            $table->string('height',20)->nullable();
            $table->string('weight',20)->nullable();
            $table->string('student_vaccinated', 4)->nullable();
            $table->date('as_on_date')->nullable();
            $table->string('fee_discount',20)->nullable();

            $table->string('system',20);
            $table->string('roll_no',20);
            $table->string('temporary_gr',20)->nullable();
            $table->string('mobile_no',20)->nullable();
            $table->string('email',30)->nullable();

            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_delete')->default(0);
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
