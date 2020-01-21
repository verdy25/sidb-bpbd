<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidangs')->insert(
            [
                [
                    'nama' => 'kepala'
                ],
                [
                    'nama' => 'sekretariat'
                ],
                [
                    'nama' => 'pencegahan dan kesiapsiagaan'
                ],
                [
                    'nama' => 'kedaruratan dan logistik'
                ],
                [
                    'nama' => 'rehabilitasi dan rekonstruksi'
                ],
            ]
        );
    }
}
