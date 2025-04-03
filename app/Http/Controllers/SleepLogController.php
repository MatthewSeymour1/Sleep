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
        $sleepLogs = auth()->user()->sleepLogs()->orderBy('start_date', 'desc')->orderBy('start_time', 'desc')->get();

        return view('sleep-log.index', compact('sleepLogs'));
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
    //
    //The start_date validation ensures that you can't log sleep over a week ago and you can't log sleep that hasn't happened yet.
    //The end_date validation also ensures that you can't log future sleep.
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date', 'after_or_equal:' . now()->subDays(7)->toDateString()],
            'end_date' => ['required', 'date', 'after_or_equal:start_date', 'before_or_equal:' . now()->toDateString()],
            'start_time' => 'required|date_format:H:i',
            'end_time' => ['required', 'date_format:H:i', function ($attribute, $value, $fail) use ($request) {
                if (strtotime($value) <= strtotime($request->start_time) && $request->start_date === $request->end_date) {
                    $fail('End time must be after start time on the same date.');
                }
            }],
            'sleep_quality' => 'required|integer|between:0,10',
        ], [
            'start_date.after_or_equal' => 'The start date cannot be more than 7 days ago.',
            'end_date.before_or_equal' => 'The end date cannot be in the future.',
            'end_date.after_or_equal' => 'The end date must be after or the same as the start date.'
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
        return view('sleep-log.edit', compact('sleepLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SleepLog $sleepLog)
    {
        $request->validate([
            'start_date' => ['required', 'date', 'after_or_equal:' . now()->subDays(7)->toDateString()],
            'end_date' => ['required', 'date', 'after_or_equal:start_date', 'before_or_equal:' . now()->toDateString()],
            'start_time' => 'required|date_format:H:i',
            'end_time' => ['required', 'date_format:H:i', function ($attribute, $value, $fail) use ($request) {
                if (strtotime($value) <= strtotime($request->start_time) && $request->start_date === $request->end_date) {
                    $fail('End time must be after start time on the same date.');
                }
            }],
            'sleep_quality' => 'required|integer|between:0,10',
        ], [
            'start_date.after_or_equal' => 'The start date cannot be more than 7 days ago.',
            'end_date.before_or_equal' => 'The end date cannot be in the future.',
            'end_date.after_or_equal' => 'The end date must be after or the same as the start date.'
        ]);

        $sleepLog->update($request->all());

        return redirect()->route('sleep-log.index')->with('success', 'Sleep log updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SleepLog $sleepLog)
    {
        $sleepLog->delete();
        return redirect()->route('sleep-log.index')->with('success', 'Sleep log deleted successfully!');
    }
}
