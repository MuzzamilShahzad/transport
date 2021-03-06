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
        Schema::create('student_address_details', function (Blueprint $table) {
            $table->increments('id');

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
        Schema::dropIfExists('student_address_details');
    }
};
