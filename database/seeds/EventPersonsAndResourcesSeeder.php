<?php

use Illuminate\Database\Seeder;

class EventPersonsAndResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('event_person')->truncate();
        \Illuminate\Support\Facades\DB::table('event_resource')->truncate();

        $prevEventId = $prevPersonId = [];


        \Illuminate\Support\Facades\DB::table('event_person')->insert([
            'event_id' => $prevEventId[] = $this->unselected('events', $prevEventId)->id,
            'person_id' => $prevPersonId[] = $this->unselected('people', $prevPersonId)->id,
            'required' => true
        ]);
        \Illuminate\Support\Facades\DB::table('event_person')->insert([
            'event_id' => $prevEventId[] = $this->unselected('events', $prevEventId)->id,
            'person_id' => $prevPersonId[] = $this->unselected('people', $prevPersonId)->id,
            'required' => false
        ]);
        \Illuminate\Support\Facades\DB::table('event_resource')->insert([
            'event_id' => $prevEventId[] = $this->unselected('events', $prevEventId)->id,
            'resource_id' => $prevPersonId[] = $this->unselected('resources', $prevPersonId)->id
        ]);

        for ($i = 0; $i < 3; $i++) {
            $selectedEventId = $prevEventId[] = $this->unselected('events', $prevEventId)->id;
            \Illuminate\Support\Facades\DB::table('events')->where('id', $selectedEventId)->update(['chairman_id' => $this->unselected('people', $prevPersonId)->id]);
        }
    }

    private function unselected(string $table, array $previous) {
        return \Illuminate\Support\Facades\DB::table($table)->select(['id'])->whereNotIn('id', $previous)->first();
    }
}
