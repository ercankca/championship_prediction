<?php

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            Week::insert([
                ['title' => '1'],
                ['title' => '2'],
                ['title' => '3'],
                ['title' => '4'],
                ['title' => '5'],
                ['title' => '6'],
            ]);
        });
    }
}
