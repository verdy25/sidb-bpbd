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
                    'password' => bcrypt('20201010'),
                    'status' => 'kepala'
                ],
                [
                    'name' => 'Sekretaris BPBD',
                    'email' => 'sekretariat@bpbdbwi.com',
                    'password' => bcrypt('20201011'),
                    'status' => 'sekretariat'
                ],
                [
                    'name' => 'Bidang Pencegahan dan Kesiapsiagaan',
                    'email' => 'bidangpk@bpbdbwi.com',
                    'password' => bcrypt('20201012'),
                    'status' => 'bidang'
                ],
                [
                    'name' => 'Bidang Kedaruratan dan Logistik',
                    'email' => 'bidangkl@bpbdbwi.com',
                    'password' => bcrypt('20201013'),
                    'status' => 'bidang'
                ],
                [
                    'name' => 'Bidang Rehabilitasi dan Rekonstruksi',
                    'email' => 'bidangrrk@bpbdbwi.com',
                    'password' => bcrypt('20201014'),
                    'status' => 'bidang'
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@bpbdbwi.com',
                    'password' => bcrypt('password'),
                    'status' => 'admin'
                ],
            ]
        );
    }
}
