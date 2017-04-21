<?php

use Illuminate\Database\Seeder;

class OutDoorClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outdoor_classes')->truncate();

        \App\OutdoorClass::create([
            'class_name' => 'History of Islam',
            'place' => 'Model Town Campus',
            'other_description' => 'lsd fjlksdj flksajdflks jdflksj dflklfsdjflksjdf',
            'contactInfo' => 'laskjdflksdj flksdjflk sdjflksjdklfjd'
        ]);

        \App\OutdoorClass::create([
            'class_name' => 'Seeking Justic',
            'place' => 'Model Town Campus',
            'other_description' => 'jslak djfl ksdjflksdjflksdjflk ',
            'contactInfo' => 'ksj dflksajhjdf;owheeoihslsdkjhff'
        ]);

        \App\OutdoorClass::create([
            'class_name' => 'Mehfil',
            'place' => 'Model Town Campus',
            'other_description' => 'ksld fsldjflsijjfoisjdlkfjsdlkfj',
            'contactInfo' => 'shdfofjsdoffuaosshdjffl asd;fofiiahsd;oif asd'
        ]);





    }
}
