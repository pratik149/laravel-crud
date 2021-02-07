<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$currentDateTime = Carbon::now();
        $hobbies = array(
			array('name' => "Reading", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Writing", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Swimming", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Running", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Singing", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Dancing", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Boxing", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Joking", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime)
		);

        DB::table('hobbies')->insert($hobbies);

    }
}
