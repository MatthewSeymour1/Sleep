<?php

namespace App\Http\Controllers;

use App\Models\SleepLog;
use Illuminate\Http\Request;

class SleepLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sleep-log.create');
    }

    //The validation of end_time has custom validation that ensures that the end_time is not less than the start time IF the start_date equals the end_date.
    //In other words it ensures that you aren't saying you woke up before you went to sleep.
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => ['required', 'date_format:H:i', function ($attribute, $value, $fail) use ($request) {
                if (strtotime($value) <= strtotime($request->start_time) && $request->start_date === $request->end_date) {
                    $fail('End time must be after start time on the same date.');
                }
            }],
            'sleep_quality' => 'required|integer|between:0,10',
        ]);

        auth()->user()->sleepLogs()->create([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'sleep_quality' => $request->sleep_quality,
        ]);

        return redirect()->route('dashboard')->with('success', 'Sleep log added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SleepLog $sleepLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SleepLog $sleepLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SleepLog $sleepLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SleepLog $sleepLog)
    {
        //
    }
}
