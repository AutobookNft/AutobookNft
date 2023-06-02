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
        Schema::create('teams_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teams_items_id')->nullable()->index();
            $table->unsignedBigInteger('team_id')->nullable()->index();
            $table->unsignedBigInteger('drop_id')->nullable()->index();
            $table->string('upload_id',1024)->nullable();
            $table->string('creator', 1024)->nullable(); // Aggiungi questa riga
            $table->foreign('drop_id')->references('id')->on('drops')->onDelete('set null');
            $table->string('title', 60);
            $table->text('description')->nullable();
            $table->date('creation_date')->nullable();
            $table->float('size')->nullable();
            $table->float('dimention')->nullable();
            $table->boolean('show')->default(false)->nullable();
            $table->string('path_file', 1024)->nullable();
            $table->string('hash_file', 1024)->nullable();
            $table->string('hash_file_name', 1024)->nullable();
            $table->string('file_cover', 1024)->nullable();
            $table->string('path_absolute', 1024)->nullable();
            $table->string('webp', 1024)->nullable();
            $table->string('webp_filename', 1024)->nullable();
            $table->string('thumbnail', 1024)->nullable();
            $table->string('extention', 10)->nullable();
            $table->integer('bind')->nullable();
            $table->integer('paired')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('position')->nullable();
            $table->string('type', 10)->nullable();
            $table->string('cript_filename', 2048)->nullable();
            $table->string('file_mime', 15)->nullable();
            $table->string('path_image', 1024)->nullable();
            $table->string('url_IPFS', 1024)->nullable();
            $table->text('util_description')->nullable();
            $table->text('util_code')->nullable();
            $table->text('util_data')->nullable();
            $table->text('util_joint')->nullable();
            $table->text('util_spec_1')->nullable();
            $table->text('util_spec_2')->nullable();
            $table->text('util_spec_3')->nullable();
            $table->text('util_spec_4')->nullable();
            $table->text('util_spec_5')->nullable();
            $table->timestamps();
        });

        Schema::table('teams_items', function (Blueprint $table) {
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_items');
    }
};
