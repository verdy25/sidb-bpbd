<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_permintaan');
            $table->string('nomor_keluar')->unique()->nullable();
            $table->string('dari')->nullable();
            $table->string('kepada')->nullable();
            $table->string('nomor_ambil')->unique()->nullable();
            $table->unsignedBigInteger('penyerah_user')->nullable();
            $table->unsignedBigInteger('kepada_user')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_permintaan')->references('id')->on('permintaans');
            $table->foreign('penyerah_user')->references('id')->on('pejabat_barangs');
            $table->foreign('kepada_user')->references('id')->on('pejabat_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
}
