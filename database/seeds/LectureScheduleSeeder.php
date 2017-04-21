<?php

use Illuminate\Database\Seeder;

class LectureScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecture_schedules')->truncate();

        $today = date_create( date('D-m-Y', strtotime('today')));

        for ($i = 1; $i <= 6; $i++){
            // Increment day by one
            date_add($today, date_interval_create_from_date_string('1 days'));

            \App\LectureSchedule::create([
                'title' => '',
                'time' => '08:00',
                'date' => $today,
                'duration' => '',

            ]);

        }


    }
}
