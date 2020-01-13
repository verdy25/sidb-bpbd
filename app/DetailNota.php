<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailNota extends Model
{
    protected $guarded = [];
    protected $table = 'detail_notas';

    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function nota(){
        return $this->belongsTo('App\Nota', 'id_nota');
    }
}
