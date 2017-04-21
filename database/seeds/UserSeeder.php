<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();


        DB::table('users')->insert([
            'user_type' => 'admin',
            'username' => 'mrashidcit',
            'password' =>  bcrypt('rashid123'),
            'email' => 'mrashidcit@gmail.com',
            'name' => 'Rashid',
            'father_name' => 'Saleem'

        ]);



    }
}
