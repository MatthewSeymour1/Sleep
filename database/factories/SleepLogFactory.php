<?php

namespace Database\Factories;

use App\Models\SleepLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SleepLog>
 */
class SleepLogFactory extends Factory
{
    protected $model = SleepLog::class;

    public function definition()
    {
        $start_date = $this->faker->date();
        $end_date = $this->faker->date();
        $start_time = $this->faker->time('H:i');
        $end_time = $this->faker->time('H:i');
    
        if (strtotime($end_date) < strtotime($start_date)) {
            $end_date = $start_date;
        }

        if ($start_date === $end_date && strtotime($end_time) <= strtotime($start_time)) {
            // If start_time is close to midnight (23:59), push it back to 22:00 so that adding an hour to it won't push it past midnight on to the next day.
            if (substr($start_time, 0, 2) == '23') {
                $start_time = '22:00';
            }
    
            // Adjust end_time to be 1 hour after start_time
            $end_time = date('H:i', strtotime($start_time) + 3600);
        }

        return [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
            'sleep_quality' => $this->faker->numberBetween(4, 10),
            'user_id' => User::factory(),
        ];
    }
}
