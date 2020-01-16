<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded = [];
    protected $table = 'barangs';
    public function detailnota()
    {
        return $this->hasMany('App\DetailNota', 'kode_barang');
    }
}
