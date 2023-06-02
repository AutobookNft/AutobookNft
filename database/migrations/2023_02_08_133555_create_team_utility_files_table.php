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
        Schema::create('team_utility_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_util_id')->nullable()->index();
            $table->unsignedBigInteger('item_id')->nullable()->index();
            $table->foreign('team_util_id')->references('id')->on('teams');

            $table->string('hash_file', 2048)->nullable();
            $table->string('cript_filename', 2048)->nullable();
            $table->integer('position')->nullable($value = true);
            $table->string('file_mime', 20)->nullable();
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
        Schema::dropIfExists('team_utility_files');
    }
};
