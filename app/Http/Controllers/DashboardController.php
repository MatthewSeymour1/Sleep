<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SleepLog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $sleepLogs = SleepLog::where('user_id', auth()->id())->orderBy('start_date', 'asc')->get()->map(function ($log) {
            //Combining start_date and start_time into one date-and-time value. Same with end_date and end_time. Doing this to get the duration (in hours) slept.
            $start = Carbon::parse("{$log->start_date} {$log->start_time}");
            $end = Carbon::parse("{$log->end_date} {$log->end_time}");

            $log->duration = abs($end->diffInMinutes($start) / 60);
            $log->start_week = $start->startOfWeek()->format('Y-m-d') . ' to ' . $start->endOfWeek()->format('Y-m-d');
            $log->start_month = $start->startOfMonth()->format('Y-m-d') . ' to ' . $start->endOfMonth()->format('Y-m-d');


            return $log;
        });

        
        return view('dashboard', compact('sleepLogs'));
    }
}
