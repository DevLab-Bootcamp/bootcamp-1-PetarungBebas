<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleEvents extends Model
{
    use HasFactory,HasUuids, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function appointments()
    {
        return $this->morphMany(Appointments::class, 'schedule');
    }
}
