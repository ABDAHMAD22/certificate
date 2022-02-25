<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editor_permits', function (Blueprint $table) {
            $table->foreignId('editor_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('permit_id')->constrained()->onDelete('CASCADE');
            $table->primary(['editor_id', 'permit_id']);
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
        Schema::dropIfExists('editor_permits');
    }
}
