<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = [];

    public function detail_nota(){
        return $this->hasMany('App\DetailNota', 'id_barang');
    }

    public function permintaan(){
        return $this->hasMany('App\Permintaan', 'id_barang');
    }

    public function peminjaman(){
        return $this->hasMany('App\Peminjaman', 'id_barang');
    }
}
