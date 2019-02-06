<?php

use Illuminate\Database\Seeder;

class EventUsersAndResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prevEventId = $prevUserId = [];
        
        \Illuminate\Support\Facades\DB::table('event_user')->insert([
            'event_id' => $prevEventId[] = $this->unselected('events', $prevEventId)->id,
            'user_id' => $prevUserId[] = $this->unselected('users', $prevUserId)->id,
            'required' => true
        ]);
        \Illuminate\Support\Facades\DB::table('event_user')->insert([
            'event_id' => $prevEventId[] = $this->unselected('events', $prevEventId)->id,
            'user_id' => $prevUserId[] = $this->unselected('users', $prevUserId)->id,
            'required' => false
        ]);
        \Illuminate\Support\Facades\DB::table('event_resource')->insert([
            'event_id' => $prevEventId[] = $this->unselected('events', $prevEventId)->id,
            'resource_id' => $prevUserId[] = $this->unselected('resources', $prevUserId)->id
        ]);

        for ($i = 0; $i < 3; $i++) {
            $selectedEventId = $prevEventId[] = $this->unselected('events', $prevEventId)->id;
            \Illuminate\Support\Facades\DB::table('events')->where('id', $selectedEventId)->update(['chairman_id' => $this->unselected('users', $prevUserId)->id]);
        }
    }

    private function unselected(string $table, array $previous) {
        return \Illuminate\Support\Facades\DB::table($table)->select(['id'])->whereNotIn('id', $previous)->first();
    }
}
