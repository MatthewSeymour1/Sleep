<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SleepAdvice;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
 
class SleepAdviceSeeder extends Seeder
{
    public function run(): void
    {
        $currentTimestamp = now();
 
        $sleepAdvice = [
            [
                "advice_title" => "Example Title!!!!!!!",
                "description" => "Example Description!!!!!!!!!!!!!",
                "advice_type" => "Exercise",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
        ];
 
        // insert into db
        DB::table("sleep_advice")->insert($sleepAdvice);
    }
}