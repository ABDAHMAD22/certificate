<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignSubServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_sub_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price')->nullable();
            $table->unsignedBigInteger('design_service_id')->nullable();
            $table->foreign('design_service_id')->references('id')->on('design_services')->onDelete('CASCADE');
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
        Schema::dropIfExists('design_sub_services');
    }
}
