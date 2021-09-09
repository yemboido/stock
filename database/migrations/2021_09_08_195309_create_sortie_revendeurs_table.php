<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortieRevendeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_revendeurs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dateSortie');
            $table->double('quantite');
            

            $table->foreignId('stock_id')->references('id')->on('stocks');
            $table->foreignId('revendeur_id')->references('id')->on('revendeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sortie_revendeurs');
    }
}
