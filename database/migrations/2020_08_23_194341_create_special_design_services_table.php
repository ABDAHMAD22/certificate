<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialDesignServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_design_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('special_design_id')->nullable();
            $table->foreign('special_design_id')->references('id')->on('special_designs')->onDelete('CASCADE');
            $table->unsignedBigInteger('special_design_sub_service_id')->nullable();
            $table->foreign('special_design_sub_service_id')->references('id')->on('design_sub_services')->onDelete('CASCADE');
            $table->float('price')->nullable();
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
        Schema::dropIfExists('special_design_services');
    }
}
