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
        Schema::create('student_father_details', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name',30);
            $table->string('cnic',20);
            $table->string('phone',20);
            $table->string('email',30)->nullable();
            $table->string('occupation',30)->nullable();
            $table->string('company_name',30)->nullable();
            $table->string('salary',20)->nullable();
            $table->string('vaccinated',5)->nullable();

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
        Schema::dropIfExists('student_father_details');
    }
};
