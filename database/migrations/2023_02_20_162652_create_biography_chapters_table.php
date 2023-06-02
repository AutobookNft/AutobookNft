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
        Schema::create('biography_chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biography_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('chapter_title', 50)->nullable();
            $table->text('chapter_biography')->nullable();
            $table->date('chapter_bio_date_dal')->nullable();
            $table->date('chapter_bio_date_al')->nullable();
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
        Schema::dropIfExists('biography_chapters');
    }
};
