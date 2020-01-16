<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailNota extends Model
{
    protected $guarded = [];
    public function nota()
    {
        return $this->belongsTo('App\Nota', 'nota_id');
    }
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'kode_barang', 'kode');
    }
}
