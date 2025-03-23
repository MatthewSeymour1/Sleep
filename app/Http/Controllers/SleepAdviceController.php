<?php

namespace App\Http\Controllers;

use App\Models\SleepAdvice;
use Illuminate\Http\Request;

class SleepAdviceController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SleepAdvice $sleepAdvice, Request $request)
    {
        if ($request->has('random') && $request->random) {
            $advice = SleepAdvice::inRandomOrder()->first();

            session(['advice_of_the_day' => $advice->id]);
        } else {
            $advice = session('advice_of_the_day');
            if (!$advice) {
                $advice = SleepAdvice::inRandomOrder()->first();
                session(['advice_of_the_day' => $advice->id]);
            } else {
                $advice = SleepAdvice::find($advice);
            }
        }
        
        return view('advice.show', compact('advice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SleepAdvice $sleepAdvice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SleepAdvice $sleepAdvice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SleepAdvice $sleepAdvice)
    {
        //
    }
}
