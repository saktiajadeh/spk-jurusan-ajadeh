<?php

use Illuminate\Database\Seeder;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            [
                'id' => 1,
                'name' => 'Harga',
                'bobot_utama' => 3.0000,
                'persen_bobot_sub' => 0.3333,
                'id_kriteria_sub' => 2,
                'id_user' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Prospek',
                'bobot_utama' => 1.0000,
                'persen_bobot_sub' => 1.0000,
                'id_kriteria_sub' => 3,
                'id_user' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Keinginan',
                'bobot_utama' => 0.3333,
                'persen_bobot_sub' => 3.0000,
                'id_kriteria_sub' => 1,
                'id_user' => 1,
            ]
        ];
        DB::table('kriteria')->insert($kriteria);
    }
}
