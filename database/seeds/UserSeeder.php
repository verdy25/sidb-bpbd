<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Kepala BPBD',
                    'email' => 'kepala@bpbdbwi.com',
                    'password' => bcrypt('kepalabpbd'),
                    'status' => 'kepala',
                    'id_bidang' => 1
                ],
                [
                    'name' => 'Sekretaris BPBD',
                    'email' => 'sekretariat@bpbdbwi.com',
                    'password' => bcrypt('sekretariat'),
                    'status' => 'sekretariat',
                    'id_bidang' => 2
                ],
                [
                    'name' => 'Bidang Pencegahan dan Kesiapsiagaan',
                    'email' => 'bidangpk@bpbdbwi.com',
                    'password' => bcrypt('bidangpk'),
                    'status' => 'bidang',
                    'id_bidang' => 3
                ],
                [
                    'name' => 'Bidang Kedaruratan dan Logistik',
                    'email' => 'bidangkl@bpbdbwi.com',
                    'password' => bcrypt('bidangkl'),
                    'status' => 'bidang',
                    'id_bidang' => 4
                ],
                [
                    'name' => 'Bidang Rehabilitasi dan Rekonstruksi',
                    'email' => 'bidangrrk@bpbdbwi.com',
                    'password' => bcrypt('bidangrrk'),
                    'status' => 'bidang',
                    'id_bidang' => 5
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@bpbdbwi.com',
                    'password' => bcrypt('password'),
                    'status' => 'admin',
                    'id_bidang' => 1
                ],
            ]
        );
    }
}
