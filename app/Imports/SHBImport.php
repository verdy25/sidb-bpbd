<?php

namespace App\Imports;

use App\SHBelanja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SHBImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // if($row['merk']){
        //     return new SHBelanja([
        //         'kode_barang' => $row['kode_barang'],
        //         'nama_barang' => $row['nama_barang'],
        //         'spesifikasi' => $row['spesifikasi'],
        //         'merk'  => $row['merk'],
        //         'satuan' => $row['satuan'],
        //         'harga' => $row['harga'],
        //     ]);
        // }else{
            return new SHBelanja([
                'kode_barang' => $row['kode_barang'],
                'nama_barang' => $row['nama_barang'],
                'spesifikasi' => $row['spesifikasi'], 
                'satuan' => $row['satuan'],
                'harga' => $row['harga'],
            ]);
    //     }
    }
}
