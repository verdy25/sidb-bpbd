<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengeluaran extends Model
{
    protected $guarded = [];
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function pengeluaran(){
        return $this->belongsTo('App\Pengeluaran', 'id_pengeluaran');
    }
}
