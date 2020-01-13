<?php

use Illuminate\Database\Seeder;

class BarangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bidang Rehabilitasi dan Rekonstruksi',
            'username' => 'rekonstruksi',
            'password' => bcrypt('password'),
            'status' => 'bidang'
        ]);

        DB::table('barang')->insert(
            [
                [
                    'nama' => 'sidu 80gr',
                    'harga_pokok' => 50000.00,
                    'stok' => 0,
                    'satuan' => 'rim'
                ],
                [
                    'nama' => 'tinta printer',
                    'harga_pokok' => 80000.00,
                    'stok' => 0,
                    'satuan' => 'buah'
                ]
            ]
        );
    }
}
