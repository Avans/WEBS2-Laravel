<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventsTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(EventPersonsAndResourcesSeeder::class);
    }
}
