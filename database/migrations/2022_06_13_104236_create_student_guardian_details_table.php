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
        Schema::create('student_guardian_details', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',30)->nullable();
            $table->string('phone',20)->nullable();
            $table->enum('relation',['Uncle/Aunty','GrandFather/GrandMother', 'Neighbours'])->nullable();
            $table->string('other_relation',10)->nullable();
            $table->enum('first_person_call',['Father','Mother', 'Guardian'])->nullable();
            $table->string('cnic',20)->nullable();
            
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
        Schema::dropIfExists('student_guardian_details');
    }
};
