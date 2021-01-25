<?php

use Illuminate\Database\Seeder;

class BobotAlternatifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobot_alternatif = [
            [
                'id' => 1,
                'bobot' => '50',
                'id_alternatif' => 1,
                'id_kriteria' => 1,
                'id_user' => 1
            ],
            [
                'id' => 2,
                'bobot' => '100',
                'id_alternatif' => 1,
                'id_kriteria' => 2,
                'id_user' => 1
            ],
            [
                'id' => 3,
                'bobot' => '50',
                'id_alternatif' => 1,
                'id_kriteria' => 3,
                'id_user' => 1
            ],
            [
                'id' => 4,
                'bobot' => '50',
                'id_alternatif' => 2,
                'id_kriteria' => 1,
                'id_user' => 1
            ],
            [
                'id' => 5,
                'bobot' => '100',
                'id_alternatif' => 2,
                'id_kriteria' => 2,
                'id_user' => 1
            ],
            [
                'id' => 6,
                'bobot' => '50',
                'id_alternatif' => 2,
                'id_kriteria' => 3,
                'id_user' => 1
            ],
            [
                'id' => 7,
                'bobot' => '50',
                'id_alternatif' => 3,
                'id_kriteria' => 1,
                'id_user' => 1
            ],
            [
                'id' => 8,
                'bobot' => '100',
                'id_alternatif' => 3,
                'id_kriteria' => 2,
                'id_user' => 1
            ],
            [
                'id' => 9,
                'bobot' => '50',
                'id_alternatif' => 3,
                'id_kriteria' => 3,
                'id_user' => 1
            ],
            [
                'id' => 10,
                'bobot' => '50',
                'id_alternatif' => 4,
                'id_kriteria' => 1,
                'id_user' => 1
            ],
            [
                'id' => 11,
                'bobot' => '100',
                'id_alternatif' => 4,
                'id_kriteria' => 2,
                'id_user' => 1
            ],
            [
                'id' => 12,
                'bobot' => '50',
                'id_alternatif' => 4,
                'id_kriteria' => 3,
                'id_user' => 1
            ],
        ];
        DB::table('bobot_alternatif')->insert($bobot_alternatif);
    }
}
