<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->truncate();

        $courseType = \App\CourseType::find(1);

        $courseType->courses()->create([
            'name' => 'Dars-e-Nizami Aalima Course',
            'description' => 'Part 1: Aalmia Awal, Part 3: Aalmia Awal, Part 2: Aalmia Doum, Part 4: Aalmia Doum'
        ]);

        $courseType->courses()->create([
            'name' => 'Darasat Diniya Fazila Course',
            'description' => 'Saal Awal, Saal Doum'
        ]);


        $courseType->courses()->create([
            'name' => 'Tarjima-o-Tafseer-ul-Quran',
            'description' => ''
        ]);




    }
}
