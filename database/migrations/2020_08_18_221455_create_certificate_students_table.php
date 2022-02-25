<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('id_no')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('certificate_id')->nullable();
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('CASCADE');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->boolean('is_completed')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->unsignedInteger('date_type')->nullable();
            $table->string('trainer_name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('days_no')->nullable();
            $table->integer('hours_no')->nullable();
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
        Schema::dropIfExists('certificate_students');
    }
}
