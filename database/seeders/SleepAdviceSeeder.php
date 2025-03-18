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
                "advice_title" => "Maintain a Consistent Sleep Schedule",
                "description" => "Go to bed and wake up at the same time every day, even on weekends.",
                "advice_type" => "Routine",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Avoid Caffeine Before Bed",
                "description" => "Try to avoid caffeine at least 6 hours before sleep for better rest.",
                "advice_type" => "Diet",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Limit Screen Time",
                "description" => "Reduce exposure to blue light from screens at least an hour before bed.",
                "advice_type" => "Technology",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Create a Relaxing Bedtime Routine",
                "description" => "Engage in relaxing activities like reading or meditation before sleep.",
                "advice_type" => "Lifestyle",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Keep Your Bedroom Dark and Cool",
                "description" => "Use blackout curtains and maintain a cool room temperature for better sleep.",
                "advice_type" => "Environment",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ]
            
        ];
 
        // insert into db
        DB::table("sleep_advice")->insert($sleepAdvice);
    }
}