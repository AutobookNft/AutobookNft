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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('name');
            $table->boolean('personal_team');
            $table->char('creator')->nullable(); // Aggiungi questa riga

            $table->bigInteger('epp_id')->nullable($value = true);
            $table->index('epp_id', 'epp_id');
            $table->bigInteger('eco_asset_nft_id')->nullable($value = true);
            $table->index('eco_asset_nft_id', 'eco_asset_nft_id');

            $table->string('collection_name')->nullable($value = true);

            $table->text('description')->nullable($value = true);
            $table->string('type', 10)->nullable($value = true);

            $table->string('path_image_banner', 1024)->nullable($value = true);
            $table->string('path_image_card', 1024)->nullable($value = true);
            $table->string('path_image_avatar', 1024)->nullable($value = true);
            $table->string('path_image_econft', 1024)->nullable($value = true);

            $table->string('url_collection_site')->nullable($value = true);
            $table->boolean('show')->nullable($value = true);
            $table->integer('position')->nullable($value = true);

            $table->string('token')->nullable($value = true);

            // nel caso l'asset venga venduto ad un owner
            $table->foreignId('owner_id')->nullable()->index(); // il producer appartiene alla tabella users

            $table->integer('econft_number')->nullable($value = true);
            $table->text('eco_asset_roles')->nullable($value = true);
            $table->float('floor_price')->nullable($value = true);

            // indirizzo dei wallet
            $table->string('wallet_frangette')->nullable($value = true);
            $table->string('wallet_epp')->nullable($value = true);
            $table->string('wallet_creator')->nullable($value = true);
            $table->string('wallet_owner')->nullable($value = true);

            // dividendo all'atto della prima vendita
            $table->float('mint_frangette')->nullable($value = true);
            $table->float('mint_epp')->nullable($value = true);
            $table->float('mint_creator')->nullable($value = true);
            $table->float('mint_owner')->nullable($value = true);

            // royalty del secondo mercato
            $table->float('royalty_frangette')->nullable($value = true);
            $table->float('royalty_epp')->nullable($value = true);
            $table->float('royalty_creator')->nullable($value = true);
            $table->float('royalty_owner')->nullable($value = true);

            // si tratta dell'immagine/oper d'arte, che deve essere depositata sul server IPFS
            $table->string('path_image_to_ipfs')->nullable($value = true);
            $table->string('url_image_ipfs')->nullable($value = true);

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
