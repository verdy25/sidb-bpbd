<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $guarded = [];
    public function permintaan(){
        return $this->belongsTo('App\Permintaan', 'id_permintaan');
    }

    public function detail(){
        return $this->hasMany('App\DetailPengeluaran', 'id_pengeluaran');
    }
}
