<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Wayne',
            'email' => 'j.wayne@avans.nl',
            'password' => uniqid()
        ]);
        DB::table('users')->insert([
            'name' => 'Boy Wonder',
            'email' => 'b.wonder@avans.nl',
            'password' => uniqid()
        ]);
        DB::table('users')->insert([
            'name' => 'Batman',
            'email' => 'b.wayne@avans.nl',
            'password' => uniqid()
        ]);
        DB::table('users')->insert([
            'name' => 'Billy Turf',
            'email' => 'b.turg@avans.nl',
            'password' => uniqid()
        ]);
    }
}
