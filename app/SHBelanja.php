<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SHBelanja extends Model
{
    protected $fillable = ['kode_barang', 'nama_barang','satuan', 'spesifikasi', 'harga'];
    protected $table = 'shbelanja';
}
