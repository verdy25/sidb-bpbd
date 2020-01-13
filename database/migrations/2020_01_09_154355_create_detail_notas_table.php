<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_nota');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah');
            $table->float('harga');
            $table->timestamps();

            $table->foreign('id_nota')->references('id')->on('nota');
            $table->foreign('id_barang')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_notas');
    }
}
