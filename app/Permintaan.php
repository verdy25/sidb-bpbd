<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $guarded = [];
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function detail(){
        return $this->hasMany('App\DetailPermintaan', 'id_permintaan');
    }

    public function pengeluaran(){
        return $this->hasOne('App\DetailPengeluaran', 'id_pengeluaran');
    }

    public function pemohon_user(){
        return $this->belongsTo('App\PejabatBarang', 'pemohon');
    }
}
