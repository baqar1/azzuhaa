<?php

use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('about_uses')->truncate();

        \App\AboutUs::create([
            'mission' => 'lskdjfl sdlkfjsdlkfjs dlf',
            'history' => 'ksjdf flskdjf lsk ldjflksdjf lskdjflksd f',
            'other_description' => 'ksjdldfkjsdlkfd sdkfkjfslkd fjlskdjflksdjf lskdf'
        ]);
    }
}
