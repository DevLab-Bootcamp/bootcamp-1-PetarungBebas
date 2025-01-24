<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PatientAppointmentRecord extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'patient_appointment_record'; 
    protected $primaryKey = 'id'; 
    public $timestamps = false; 

    protected $fillable = [ 
        'user_id',
        'appointment_id',
        'clinic_id',
        'doctor_user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' adalah foreign key di tabel ini
    }

    // Relasi ke tabel appointments
    public function appointment()
    {
        return $this->belongsTo(Appointments::class, 'appointment_id'); // 'appointment_id' adalah foreign key
    }

    // Relasi ke tabel clinics
    public function clinic()
    {
        return $this->belongsTo(Clinics::class, 'clinic_id'); // 'clinic_id' adalah foreign key
    }

    // Relasi ke tabel users (dokter)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_user_id'); // 'doctor_user_id' adalah foreign key
    }

    // Contoh scope untuk memfilter berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Contoh accessor untuk menampilkan status dengan format tertentu
    public function getFormattedStatusAttribute()
    {
      return ucfirst(strtolower($this->status)); // Contoh: "pending" jadi "Pending"
    }
}
