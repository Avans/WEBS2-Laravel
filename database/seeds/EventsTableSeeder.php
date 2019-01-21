<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'summary' => str_random(50),
                'start' => '2019-01-21 10:00:00',
                'end' => '2019-01-21 11:00:00',
                'allDay' => false
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-02-21',
                'end' => '2019-02-21',
                'allDay' => true
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-05-03 10:00:00',
                'end' => '2019-05-03 17:00:00',
                'allDay' => false
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-12-21 10:00:00',
                'end' => '2019-12-21 11:00:00',
                'allDay' => false
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-04-27',
                'end' => '2019-04-27',
                'allDay' => true
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-08-15 09:00:00',
                'end' => '2019-08-15 11:00:00',
                'allDay' => false
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-07-14 09:00:00',
                'end' => '2019-07-14 18:00:00',
                'allDay' => false
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-09-13 10:00:00',
                'end' => '2019-09-13 11:00:00',
                'allDay' => true
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-04-21',
                'end' => '2019-04-25',
                'allDay' => true
            ],
            [
                'summary' => str_random(50),
                'start' => '2019-10-26 10:00:00',
                'end' => '2019-10-31 11:00:00',
                'allDay' => false
            ]
        ];

        foreach ($events as $event) {
            DB::table('events')->insert($event);
        }
    }
}
