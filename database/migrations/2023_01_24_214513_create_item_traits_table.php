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
        Schema::create('item_traits', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('teams_items_id');
            $table->foreign('teams_items_id')->references('id')->on('teams_items');
            $table->string('title', 50)->nullable();
            $table->string('description', 50)->nullable();
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
        Schema::dropIfExists('item_traits');
    }
};
