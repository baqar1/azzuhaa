<?php

use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('campuses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        \App\Campus::create([
            'name' => 'Model Town Campus',
            'address' => 'Model Town, Lahore, Punjab, Pakistan',
            'lat' =>  31.485722,
            'lng' => 74.326487
        ]);

        \App\Campus::create([
            'name' => 'PIA Campus',
            'address' => 'Multan, Punjab, Pakistan',
            'lat' =>  30.198381,
            'lng' => 71.468703
        ]);
    }
}
