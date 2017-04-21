<?php

use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->truncate();

        DB::table('announcements')->insert([
            'title' => 'Quiz Compitition',
            'description' => 'Compitition on Islamic History.'

        ]);

        DB::table('announcements')->insert([
            'title' => 'Convocation',
            'description' => '8th Convocation is Held on Faisal Town Campus.'

        ]);

    }
}
