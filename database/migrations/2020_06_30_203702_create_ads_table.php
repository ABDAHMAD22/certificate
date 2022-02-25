<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('trainer_name')->nullable();
            $table->string('trainer_about')->nullable();
            $table->string('attached_image')->nullable();
            $table->unsignedBigInteger('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('SET NULL');
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedInteger('date_type')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('hours_no')->nullable();
            $table->string('place')->nullable();
            $table->unsignedBigInteger('ads_type_id')->nullable();
            $table->foreign('ads_type_id')->references('id')->on('ads_types')->onDelete('SET NULL');
            $table->unsignedBigInteger('target_id')->nullable();
            $table->foreign('target_id')->references('id')->on('targets')->onDelete('SET NULL');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('SET NULL');
            $table->unsignedBigInteger('font_id')->nullable();
            $table->foreign('font_id')->references('id')->on('fonts')->onDelete('SET NULL');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('editor_id')->nullable();
            $table->foreign('editor_id')->references('id')->on('editors')->onDelete('SET NULL');
            $table->boolean('is_completed')->nullable();
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
        Schema::dropIfExists('ads');
    }
}
