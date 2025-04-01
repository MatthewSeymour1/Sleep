<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\User;

class CalculationTest extends TestCase
{
    public function test_calculate_sleep_duration(): void
    {
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s', '2025-04-01 22:00:00');
        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', '2025-04-02 06:30:00');
        $duration = abs($end_time->diffInMinutes($start_time));
        $this->assertEquals(510, $duration);
    }

    public function test_calculate_addition_of_sleep_quality(): void
    {
        $sleep_quality_array = [7, 8, 6, 9];
        $total_quality = array_sum($sleep_quality_array);
        $this->assertEquals(30, $total_quality);
    }
}