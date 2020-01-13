<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $guarded =[];
    protected $table = 'nota';

    public function detail_nota(){
        return $this->hasMany('App\DetailNota', 'id_nota');
    }
}
