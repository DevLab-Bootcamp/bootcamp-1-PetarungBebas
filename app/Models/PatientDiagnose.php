<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PatientDiagnose extends Model
{
    use HasFactory,HasUuids, SoftDeletes;
    protected $table = 'patient_diagnose';
    protected $fillable = [
        'patient_medical_record_id', // Jika ada
        'user_id',
        'diagnose',
        'teraphy',
        'medical_letter_porpuse',
        'medical_letter_result',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
