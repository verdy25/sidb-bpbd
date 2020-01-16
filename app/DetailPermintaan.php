<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    protected $guarded = [];
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function permintaan(){
        return $this->belongsTo('App\Permintaan', 'id_permintaan');
    }
}
