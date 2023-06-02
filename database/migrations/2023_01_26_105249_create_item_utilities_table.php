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
        Schema::create('item_utilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teams_items_id');
            $table->foreign('teams_items_id')->references('id')->on('teams_items');
            $table->string('note', 2048)->nullable();
            $table->string('description', 2048)->nullable();
            $table->string('code', 50)->nullable();
            $table->date('creation_data')->nullable();
            $table->tinyInteger('joint')->nullable();
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
        Schema::dropIfExists('item_utilities');
    }
};
