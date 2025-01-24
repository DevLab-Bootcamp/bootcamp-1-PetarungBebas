<?php

namespace App\Http\Controllers;

use App\Models\PatientAppointmentRecord;
use App\Models\PatientDiagnose;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class PatientDiagnoseController extends Controller
{
    public function getByUserId()
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $userId = $user->id; 
        $userName = $user->name;

        $medicalRecord = PatientAppointmentRecord::where('user_id', $userId)->first();
        if(!$medicalRecord){
            return errorResponse('Patient_appointment_record not found', [], 404);
        }

        $medicalRecordId = $medicalRecord->id;

        $diagnoses = PatientDiagnose::where('patient_diagnose.patient_medical_record_id', $medicalRecordId)
            ->select('patient_diagnose.*', 'u.name AS doctor_name') 
            ->from('patient_diagnose')
            ->join('users AS u', 'patient_diagnose.user_id', '=', 'u.id')
            ->get();

        if (!$diagnoses) {
            return errorResponse('Patient_diagnose not found', [], 404);
        }
        $diagnoses = $diagnoses->map(function ($diagnosis) use ($userName) {
            $diagnosis->patient_name = $userName;
            return $diagnosis;
        });

        return successResponse('Success get patient_diagnose by user_id', [
            'diagnoses' => $diagnoses
        ]);
    }
}
