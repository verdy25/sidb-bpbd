<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    public function pejabat(){
        return $this->hasMany('App\PejabatBarang', 'id_bidang');
    }

    public function nota(){
        return $this->hasMany('App\Nota', 'id_bidang');
    }
}
