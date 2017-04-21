<?php

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->truncate();

        DB::table('facilities')->insert([
            'facility_name' => 'Fresh Filtered Water'
        ]);

        DB::table('facilities')->insert([
            'facility_name' => 'Air Conditioned Rooms'
        ]);


        DB::table('facilities')->insert([
            'facility_name' => 'Transport Facility'
        ]);

        DB::table('facilities')->insert([
            'facility_name' => 'Playground & Sports Facility'
        ]);




    }
}
