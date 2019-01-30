<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('people')->truncate();

        DB::table('people')->insert([
            'name' => 'John Wayne'
        ]);
        DB::table('people')->insert([
            'name' => 'Boy Wonder'
        ]);
        DB::table('people')->insert([
            'name' => 'Batman'
        ]);
        DB::table('people')->insert([
            'name' => 'Billy Turf'
        ]);
    }
}
