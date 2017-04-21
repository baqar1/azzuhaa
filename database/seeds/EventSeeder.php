<?php

use App\Event;
use App\EventType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->truncate();

        $eventType = App\EventType::find(1);

        $eventType->events()->create([
            'title' => 'Lahore Park Visit',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'Safari Park Lahore'
        ]);

        $eventType = App\EventType::find(2);
        $eventType->events()->create([
            'title' => 'Pak Meusium',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'Lahore Meusium'
        ]);

        $eventType = App\EventType::find(3);
        $eventType->events()->create([
            'title' => 'Summer Camp',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'In both campuses'
        ]);

        $eventType = App\EventType::find(3);
        $eventType->events()->create([
            'title' => 'Winter Camp',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'In both Campuses'
        ]);


        $eventType = App\EventType::find(4);
        $eventType->events()->create([
            'title' => 'Religion awareness seminar',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'PAI Campus'
        ]);


        $eventType = App\EventType::find(4);
        $eventType->events()->create([
            'title' => 'Muslim Unity seminar',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'PIA Campus'
        ]);


        $eventType = App\EventType::find(4);
        $eventType->events()->create([
            'title' => 'Importance of Sunnah',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'Model Town Campus'
        ]);


        $eventType = App\EventType::find(5);
        $eventType->events()->create([
            'title' => 'Bayanaat of famous personalities',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'In different areas'
        ]);


        $eventType = App\EventType::find(6);
        $eventType->events()->create([
            'title' => 'Dora Tadrebul Molimaat',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'Model Town Campus'
        ]);

        $eventType = App\EventType::find(6);
        $eventType->events()->create([
            'title' => 'Refreshment courses',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'In both campuses'
        ]);

        $eventType = App\EventType::find(6);
        $eventType->events()->create([
            'title' => 'Visit of other Institute',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => 'At different places'
        ]);

        $eventType = App\EventType::find(7);
        $eventType->events()->create([
            'title' => 'Faculty trip',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'place' => '--'
        ]);








    }
}
