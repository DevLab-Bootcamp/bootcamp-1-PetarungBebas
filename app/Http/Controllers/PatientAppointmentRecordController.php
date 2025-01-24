<?php

namespace App\Http\Controllers;

use App\Models\PatientAppointmentRecord;
use Illuminate\Http\Request;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class PatientAppointmentRecordController extends Controller
{

    public function getByUserId()
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $userId = $user->id; 

        $records = PatientAppointmentRecord::where('par.user_id', $userId)
        ->whereNull('par.deleted_at')
            ->select('par.*', 'u.name AS user_name', 'a.anamnesis', 'c.name AS clinic_name', 'd.name AS doctor_name')
            ->from('patient_appointment_record AS par')
            ->join('users AS u', 'par.user_id', '=', 'u.id')
            ->join('appointments AS a', 'par.appointment_id', '=', 'a.id')
            ->join('clinics AS c', 'par.clinic_id', '=', 'c.id')
            ->join('users AS d', 'par.doctor_user_id', '=', 'd.id')
            ->get();

        if (!$records) {
            return errorResponse('Patient_appointment_record not found', [], 404);
        }

        return successResponse('Success get patient_appointment_record by user_id', [
            'records' => $records
        ]);
    }
}
