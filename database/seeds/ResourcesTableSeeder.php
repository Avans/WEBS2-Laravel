<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('people')->truncate();

        DB::table('resources')->insert([
            'name' => 'OB107',
            'type' => 'room'
        ]);
        DB::table('resources')->insert([
            'name' => 'OB102',
            'type' => 'room'
        ]);
        DB::table('resources')->insert([
            'name' => 'OB105',
            'type' => 'room'
        ]);
        DB::table('resources')->insert([
            'name' => 'Panasonic 1234',
            'type' => 'beamer'
        ]);
        DB::table('resources')->insert([
            'name' => 'Sony 1234',
            'type' => 'beamer'
        ]);
        DB::table('resources')->insert([
            'name' => 'HP Notebook 1234',
            'type' => 'computer'
        ]);
        DB::table('resources')->insert([
            'name' => 'Dell Notebook 1234',
            'type' => 'computer'
        ]);
    }
}
