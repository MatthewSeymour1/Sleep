<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SleepLog extends Model
{
    protected $fillable = [
        "start_date",
        "end_date",
        "start_time",
        "end_time",
        "sleep_quality",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
