<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('member_no')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('SET NULL');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL');
            $table->string('region')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('training_licence')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('training_licence_no')->nullable();
            $table->string('commercial_register_no')->nullable();
            $table->string('account_manager')->nullable();
            $table->string('account_manager_mobile')->nullable();
            $table->string('account_manager_email')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->string('reset_code')->nullable();
            $table->boolean('is_completed')->nullable();
            $table->json('social_links')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
