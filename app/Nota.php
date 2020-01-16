<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $guarded = [];
    public function detailnota()
    {
        return $this->hasMany('App\DetailNota', 'nota_id');
    }
}
