<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointments extends Model
{
    use HasFactory,HasUuids, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function schedule()
    {
        return $this->morphTo('schedule', 'type', 'schedule_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
