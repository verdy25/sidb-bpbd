<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $guarded = [];
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
