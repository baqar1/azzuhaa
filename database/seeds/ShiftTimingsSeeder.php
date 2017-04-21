<?php

use Illuminate\Database\Seeder;

class ShiftTimingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift_timings')->truncate();


        // For 1st Shift of Both Campuses

        $campus = \App\Campus::find(1);

        $start_time = '08:00';

        $end_time = '14:00';

        $campus->shiftTimings()->create([
            'shift' => '1st Shift',
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);

        $campus = \App\Campus::find(2);

        $campus->shiftTimings()->create([
            'shift' => '1st Shift',
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);


        // For 2nd Shift of Both Campuses

        $campus = \App\Campus::find(1);

        $start_time = '16:00';

        $end_time = '20:00';

        $campus->shiftTimings()->create([
            'shift' => '2nd Shift',
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);

        $campus = \App\Campus::find(2);

        $campus->shiftTimings()->create([
            'shift' => '2nd Shift',
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);
    }
}
