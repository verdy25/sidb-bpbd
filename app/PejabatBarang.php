<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PejabatBarang extends Model
{
    protected $guarded = [];
    protected $table = 'pejabat_barangs';
    public function bidang(){
        return $this->belongsTo('App\Bidang', 'id_bidang');
    }
}
