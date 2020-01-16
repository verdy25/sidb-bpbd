<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_nota')->unique();
            $table->string('pihak_ketiga');
            $table->string('nama_perwakilan');
            $table->string('jabatan_perwakilan');
            $table->string('program');
            $table->mediumText('kegiatan')->nullable();
            $table->unsignedBigInteger('penanda_tangan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('penanda_tangan')->references('id')->on('pejabat_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
