<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShbelanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shbelanja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->mediumText('spesifikasi')->nullable();
            $table->string('merk')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('harga')->nullable();
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
        Schema::dropIfExists('shbelanja');
    }
}
