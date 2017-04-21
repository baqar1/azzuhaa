<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(EventTypeSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(CampusSeeder::class);
        $this->call(OutDoorClassesSeeder::class);
        $this->call(LectureScheduleSeeder::class);



        $this->call(ShiftTimingsSeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(CoursesSeeder::class);

    }
}
