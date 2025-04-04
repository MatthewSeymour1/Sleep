<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\SleepLog;

class CrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_sleep_log(): void
    {
        $sleepLog = SleepLog::factory()->create();

        $this->assertDatabaseHas('sleep_log', [
            'start_date' => $sleepLog->start_date,
            'end_date' => $sleepLog->end_date,
            'start_time' => $sleepLog->start_time,
            'end_time' => $sleepLog->end_time,
            'sleep_quality' => $sleepLog->sleep_quality,
        ]);
    }

    public function test_user_can_read_their_own_sleep_logs(): void
    {
        $user = User::factory()->create();
        $sleepLog = SleepLog::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        // Attempt to view the SleepLog
        $response = $this->get(route('sleep-log.index', $sleepLog->id));

        // Check if the response is successful and contains the SleepLog details
        $response->assertStatus(200);
        $response->assertSee($sleepLog->start_date);
        $response->assertSee($sleepLog->end_date);
        $response->assertSee($sleepLog->start_time);
        $response->assertSee($sleepLog->end_time);
        $response->assertSee($sleepLog->sleep_quality);
    }

    public function test_user_can_update_their_own_sleep_logs(): void
    {
        $user = User::factory()->create();
        $sleepLog = SleepLog::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);


        $updatedData = [
            'start_date' => date('Y-m-d', strtotime('-1 day')),
            'end_date' => date('Y-m-d', strtotime('-1 day')),
            'start_time' => '22:00',
            'end_time' => '23:30',
            'sleep_quality' => 9,
        ];

        $response = $this->patch(route('sleep-log.update', $sleepLog->id), $updatedData);
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Sleep log updated successfully!');
        $sleepLog->refresh();

        $this->assertEquals($updatedData['start_date'], $sleepLog->start_date);
        $this->assertEquals($updatedData['end_date'], $sleepLog->end_date);
        //This substring part is needed because mySql automatically adds seconds in the database. So what would be 22:00 becomes 22:00:00
        //And to the computer they are not equal, So only comparing the hours and minutes is required.
        $this->assertEquals(substr($updatedData['start_time'], 0, 5), substr($sleepLog->start_time, 0, 5));
        $this->assertEquals(substr($updatedData['end_time'], 0, 5), substr($sleepLog->end_time, 0, 5));
        $this->assertEquals($updatedData['sleep_quality'], $sleepLog->sleep_quality);
    }

    public function test_user_can_delete_their_own_sleep_logs(): void
    {
        $user = User::factory()->create();
        $sleepLog = SleepLog::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->delete(route('sleep-log.destroy', $sleepLog->id));
        $response->assertStatus(302);

        $this->assertDatabaseMissing('sleep_log', ['id' => $sleepLog->id]);
    }
}