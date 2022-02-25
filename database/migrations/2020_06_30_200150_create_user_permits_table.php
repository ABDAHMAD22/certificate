<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permits', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('permit_id')->constrained()->onDelete('CASCADE');
            $table->primary(['user_id', 'permit_id']);
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
        Schema::dropIfExists('user_permits');
    }
}
