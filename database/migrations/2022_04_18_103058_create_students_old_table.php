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
        Schema::create('students_old', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->date('dob')->nullable();
            $table->string('gender',10);
            $table->string('place_of_birth',30);
            $table->string('nationality',30);
            $table->string('bform_crms_no',20)->nullable();
            $table->string('religion',20);
            $table->date('admission_date');
            $table->string('blood_group',10)->nullable();
            $table->string('height',20)->nullable();
            $table->string('weight',20)->nullable();

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
