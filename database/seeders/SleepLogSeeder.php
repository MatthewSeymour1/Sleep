<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SleepLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = now();
 
        $sleepLog = [
            [
                "advice_title" => "Example Title!!!!!!!",
                "description" => "Example Description!!!!!!!!!!!!!",
                "advice_type" => "Exercise",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
        ];
 
        // insert into db
        DB::table("sleep_advice")->insert($sleepLog);
    }
}
