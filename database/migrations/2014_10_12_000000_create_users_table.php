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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_url', 1024)->nullable();
            $table->string('creator', 1024)->nullable();
            $table->string('profile_photo_path', 1024)->nullable();

            $table->boolean('consent')->default(false);

            //biography
            $table->string('bio_title', 50)->nullable();
            $table->text('bio_story')->nullable();


            //Job
            $table->string('title', 50)->nullable();
            $table->string('job_role', 40)->nullable();
            $table->string('username', 40)->nullable()->unique();
            $table->string('usertype', 10)->default('creator');

            //address
            $table->string('street')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('zip', 20)->nullable();

            //phone
            $table->string('home_phone', 20)->nullable();
            $table->string('cell_phone', 20)->nullable();
            $table->string('work_phone', 20)->nullable();

            // internet address
            $table->string('site_url', 2048)->nullable()->default('https://....');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('twich')->nullable();
            $table->string('oder')->nullable();

            // birthdate
            $table->date('birth_date')->nullable();

            //tax data
            $table->string('fiscal_code', 16)->nullable()->unique();
            $table->string('tax_id_number', 11)->nullable()->unique();

            //document data
            $table->string('doc_typo', 30)->nullable();
            $table->string('doc_num', 30)->nullable()->unique();
            $table->date('doc_issue_date')->nullable();
            $table->date('doc_expired_date')->nullable();
            $table->string('doc_issue_from')->nullable();
            $table->string('doc_photo_path_f', 2048)->nullable();
            $table->string('doc_photo_path_r', 2048)->nullable();

            //company or organizaiont data
            $table->string('org_name')->nullable();
            $table->string('org_street')->nullable();
            $table->string('org_city', 100)->nullable();
            $table->string('org_region', 100)->nullable();
            $table->string('org_state', 20)->nullable();
            $table->string('org_zip', 20)->nullable();
            $table->string('org_site_url', 2048)->nullable()->default('https://....');
            $table->text('annotation')->nullable();

            //company phone
            $table->string('org_phone_1', 20)->nullable();
            $table->string('org_phone_2', 20)->nullable();
            $table->string('org_phone_3', 20)->nullable();

            //company tax data
            $table->string('rea', 30)->nullable()->unique()->unique();
            $table->string('org_fiscal_code', 20)->nullable()->unique();
            $table->string('org_vat_number', 20)->nullable()->unique();


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
};
