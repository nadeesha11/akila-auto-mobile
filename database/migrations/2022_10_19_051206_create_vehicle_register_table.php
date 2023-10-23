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
        Schema::create('vehicleRegister', function (Blueprint $table) {

            $table->id();
            $table->string('customer_name');
            $table->string('customer_telephone')->unique();
            $table->string('province');
            $table->string('vehicle_model');
            $table->string('vehicle_number');
            $table->string('vehicle_type');
            $table->string('vehicle_year');

            $table->string('Address_one')->nullable();
            $table->string('Address_two')->nullable();

   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicleRegister');
    }
};
