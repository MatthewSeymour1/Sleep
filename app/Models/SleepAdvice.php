<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SleepAdvice extends Model
{
    protected $fillable = [
        "advice_tile",
        "description",
        "advice_type",
    ];
}
