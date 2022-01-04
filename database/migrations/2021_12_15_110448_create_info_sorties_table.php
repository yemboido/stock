<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_sorties', function (Blueprint $table) {
            $table->id();
            $table->double('quantite');

            $table->timestamps();
            $table->foreignId('produit_id')->references('id')->on('produits');
            $table->foreignId('sortie_id')->references('id')->on('sorties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_sorties');
    }
}
