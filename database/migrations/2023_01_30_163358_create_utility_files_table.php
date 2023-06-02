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
        Schema::create('utility_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_utilities_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable()->index();
            $table->foreign('item_utilities_id')->references('id')->on('item_utilities');
            $table->string('hash_file', 1024)->nullable();
            $table->string('path_image', 1024)->nullable();

            $table->string('cript_filename', 1024)->nullable();
            $table->integer('position')->nullable($value = true);
            $table->string('file_mime',20)->nullable();
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
        Schema::dropIfExists('utility_files');
    }
};
