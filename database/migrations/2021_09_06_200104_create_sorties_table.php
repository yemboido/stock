<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->id();
            $table->date('dateSortie');
            $table->double('quantite');
            $table->timestamps();

            $table->foreignId('stock_id')->references('id')->on('stocks');
            $table->foreignId('user_id')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorties');
    }
}