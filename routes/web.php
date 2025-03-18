<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SleepLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/sleep-log/create', [SleepLogController::class, 'create'])->name('sleep-log.create');
    Route::post('/sleep-log', [SleepLogController::class, 'store'])->name('sleep-log.store');

    Route::get('/sleep-logs', [SleepLogController::class, 'index'])->name('sleep-log.index');
    Route::get('/sleep-log/{sleepLog}', [SleepLogController::class, 'show'])->name('sleep-log.show');

    Route::get('/sleep-log/{sleepLog}/edit', [SleepLogController::class, 'edit'])->name('sleep-log.edit');
    Route::patch('/sleep-log/{sleepLog}', [SleepLogController::class, 'update'])->name('sleep-log.update');

    Route::delete('/sleep-log/{sleepLog}', [SleepLogController::class, 'destroy'])->name('sleep-log.destroy');
});

require __DIR__.'/auth.php';
