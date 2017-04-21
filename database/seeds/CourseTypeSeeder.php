<?php

use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->truncate();


        \App\CourseType::create([
            'name' => 'Long Courses for Ladies , Girls and young girls only'
        ]);

        \App\CourseType::create([
            'name' => 'Dars-e-Nizami Aalima Course'
        ]);



    }
}
