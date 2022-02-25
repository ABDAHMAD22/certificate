<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
//            $table->morphs('templatable');
            $table->string("name")->nullable();
            $table->string("image")->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('SET NULL');
            $table->unsignedBigInteger('font_id')->nullable();
            $table->foreign('font_id')->references('id')->on('fonts')->onDelete('SET NULL');
            $table->json("settings")->nullable();
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
        Schema::dropIfExists('templates');
    }
}
