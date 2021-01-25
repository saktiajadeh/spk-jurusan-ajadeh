<?php

use Illuminate\Database\Seeder;

class AlternatifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatif = [
            [
                'id' => 1,
                'name' => 'SK',
                'id_user' => 1,
            ],
            [
                'id' => 2,
                'name' => 'TI-DGM',
                'id_user' => 1,
            ],
            [
                'id' => 3,
                'name' => 'TI-KAB',
                'id_user' => 1,
            ],
            [
                'id' => 4,
                'name' => 'TI-MDI',
                'id_user' => 1,
            ]
        ];
        DB::table('alternatif')->insert($alternatif);
    }
}
