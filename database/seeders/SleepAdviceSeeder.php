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
            ],
            [
                "advice_title" => "Avoid Large Meals Before Bed",
                "description" => "Eating heavy meals can interfere with your sleep, so avoid them at least 2-3 hours before bed.",
                "advice_type" => "Diet",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Exercise Regularly",
                "description" => "Engage in regular physical activity during the day to promote deeper sleep at night.",
                "advice_type" => "Routine",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Limit Naps During the Day",
                "description" => "Long or late naps can affect nighttime sleep, so try to keep naps to 20-30 minutes earlier in the day.",
                "advice_type" => "Routine",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Stay Hydrated",
                "description" => "Dehydration can disrupt your sleep, so be sure to drink enough water throughout the day, but avoid excessive amounts right before bed.",
                "advice_type" => "Diet",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Establish a Comfortable Mattress and Pillows",
                "description" => "Make sure your mattress and pillows are comfortable and supportive to prevent aches and promote restful sleep.",
                "advice_type" => "Environment",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Get Exposure to Natural Light During the Day",
                "description" => "Exposure to natural sunlight during the day helps regulate your body's sleep-wake cycle.",
                "advice_type" => "Lifestyle",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Avoid Alcohol Before Bed",
                "description" => "While alcohol may make you feel sleepy, it disrupts your sleep cycle and reduces sleep quality.",
                "advice_type" => "Diet",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Keep a Sleep Journal",
                "description" => "Track your sleep habits, routines, and any factors that may affect your sleep quality to identify patterns.",
                "advice_type" => "Lifestyle",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Limit Fluid Intake Before Bed",
                "description" => "Drink plenty of fluids during the day, but limit your intake before bed to avoid waking up in the middle of the night to use the bathroom.",
                "advice_type" => "Diet",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Use Aromatherapy for Relaxation",
                "description" => "Scents like lavender and chamomile can have a calming effect and improve your ability to fall asleep.",
                "advice_type" => "Lifestyle",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Avoid Overthinking Before Bed",
                "description" => "Try to clear your mind and avoid stressful thoughts before bed by practicing relaxation techniques like deep breathing or meditation.",
                "advice_type" => "Lifestyle",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Set a Sleep Schedule and Stick to It",
                "description" => "Try to go to bed and wake up at the same time each day to establish a consistent routine.",
                "advice_type" => "Routine",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Use White Noise or Soft Music",
                "description" => "Background sounds can help mask distractions and improve sleep quality for some people.",
                "advice_type" => "Environment",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Avoid Watching TV in Bed",
                "description" => "Try to reserve your bed for sleep and relaxation, not for activities like watching TV, as it may confuse your brain about the purpose of the space.",
                "advice_type" => "Technology",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ],
            [
                "advice_title" => "Create a Sleep-Inducing Environment",
                "description" => "Keep your bedroom quiet, cool, and dark to create the perfect environment for restful sleep.",
                "advice_type" => "Environment",
                "created_at" => $currentTimestamp,
                "updated_at" => $currentTimestamp
            ]            
            
        ];
 
        // insert into db
        DB::table("sleep_advice")->insert($sleepAdvice);
    }
}