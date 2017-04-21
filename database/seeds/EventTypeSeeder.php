<?php

use App\EventType;
use App\Event;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->truncate();

        DB::Table('event_types')->insert([
            'event_name' => 'Camps',

        ]);

        DB::Table('event_types')->insert([
            'event_name' => 'Workshops',
        ]);

        DB::Table('event_types')->insert([
            'event_name' => 'Series',
        ]);

        DB::Table('event_types')->insert([
            'event_name' => 'Seminars',
        ]);


        DB::Table('event_types')->insert([
            'event_name' => 'Bayanaat',
        ]);


        DB::Table('event_types')->insert([
            'event_name' => 'Competitions',
        ]);

        DB::Table('event_types')->insert([
            'event_name' => 'Teachers Training programs',
        ]);

        DB::Table('event_types')->insert([
            'event_name' => 'Educational trips',
        ]);


        DB::Table('event_types')->insert([
            'event_name' => 'Extra Curricular activities',
        ]);










    }
}
