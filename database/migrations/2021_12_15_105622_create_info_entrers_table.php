<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoEntrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_entrers', function (Blueprint $table) {
            $table->id();
            $table->double('quantite');

            $table->timestamps();
            $table->foreignId('produit_id')->references('id')->on('produits');
            $table->foreignId('entrer_id')->references('id')->on('entrers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_entrers');
    }
}
