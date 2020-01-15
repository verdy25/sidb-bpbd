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
            $table->unsignedBigInteger('nota_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('volume');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('nota_id')->references('id')->on('notas');
            $table->foreign('barang_id')->references('id')->on('barangs');
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
