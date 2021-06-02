<?php

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            Team::insert([
                ['name' => 'Manchester'],
                ['name' => 'Chelsea'],
                ['name' => 'Arsenal'],
                ['name' => 'Liverpool'],
            ]);
        });
    }
}
