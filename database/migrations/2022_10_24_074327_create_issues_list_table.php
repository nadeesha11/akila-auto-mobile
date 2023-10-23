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
        Schema::create('issues_list', function (Blueprint $table) {

            $table->id();
            $table->string('service_name');
            $table->string('telephone');
            $table->string('issue_status')->nullable();
            $table->float('price',8,2)->nullable();
            $table->string('comment')->nullable();
            $table->string('invoice_status')->nullable();
            $table->integer('batch_number')->nullable();
            $table->timestamps();


            $table->foreign('telephone')
            ->references('customer_telephone')->on('vehicleregister')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues_list');
    }
};
