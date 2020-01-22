<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kepada');
            $table->unsignedBigInteger('pemohon');
            $table->string('nomor');
            $table->string('perihal'); 
            $table->string('status');
            $table->timestamps();

            $table->foreign('kepada')->references('id')->on('pejabat_barangs');
            $table->foreign('pemohon')->references('id')->on('pejabat_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaans');
    }
}
