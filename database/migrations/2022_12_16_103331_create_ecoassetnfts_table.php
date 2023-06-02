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
        Schema::create('eco_asset_nfts', function (Blueprint $table) {
            $table->bigInteger('collection_id')->nullable($value = true);
            $table->index('collection_id', 'collection_id');
            $table->string('token')->nullable($value = true);

            // nel caso l'asset venga venduto ad un owner
            $table->foreignId('owner_id')->index(); // il producer appartiene alla tabella users

            $table->integer('econft_number')->nullable($value = true);;
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
        Schema::dropIfExists('ecoassetnft');
    }
};
