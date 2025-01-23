<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class AppointmentsController extends Controller
{
    public function create(Request $request, $scheduleId)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return errorResponse('token_expired', [$e], 401);
        } catch (TokenInvalidException $e) {
            return errorResponse('token_invalid', [$e], 400);
        } catch (JWTException $e) {
            return errorResponse('token_absent', [$e], 400);
        }

        $userId = JWTAuth::parseToken()->getPayload()->get('user_id');

        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required',
            'type' => 'required',
            'anamnesis' => 'sometimes',
            'status' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }
        $appointment = Appointments::create([
            'user_id' => $userId,
            'schedule_id' => $scheduleId, //atur lagi apkah dari param atau request
            'type' => $request->type,
            'anamnesis' => $request->anamnesis,
            'status' => $request->status
        ]);
        return successResponse('Success create appointment', [
            'appointment' => $appointment
        ]);
    }

    public function getAppointments()
    {
        $appointments = Appointments::with([
            'schedule' => function ($query) {
                $query->with(['doctor:name', 'clinic:name,address']);
            },
            'user:name'
        ])
            ->get();

        if ($appointments->isEmpty()) {
            return errorResponse('Appointments not found for this user', [], 404);
        }

        return successResponse('Success get all appointments for user', [
            'appointments' => $appointments
        ]);
    }

    public function getAppointmentsByUserID()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return errorResponse('token_expired', [$e], 401);
        } catch (TokenInvalidException $e) {
            return errorResponse('token_invalid', [$e], 400);
        } catch (JWTException $e) {
            return errorResponse('token_absent', [$e], 400);
        }

        $userId = JWTAuth::parseToken()->getPayload()->get('user_id');
        $appointments = Appointments::with([
            'schedule' => function ($query) {
                $query->with(['doctor:name', 'clinic:name,address']);
            },
            'user:name'
        ])
            ->where('user_id', $userId)
            ->get();

        if ($appointments->isEmpty()) {
            return errorResponse('Appointments not found for this user', [], 404);
        }

        return successResponse('Success get all appointments for user', [
            'appointments' => $appointments
        ]);
    }
    public function update(Request $request, $id)
    {
        $appointment = Appointments::find($id);
        if (!$appointment) {
            return errorResponse('Appointment not found', [], 404);
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes',
            'schedule_id' => 'sometimes',
            'type' => 'sometimes',
            'anamnesis' => 'sometimes',
            'status' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }
        $appointment->update($validator->validated());
        return successResponse('Success update appointment', [
            'appointment' => $appointment
        ]);
    }

    public function delete($id)
    {
        $appointment = Appointments::find($id);
        if (!$appointment) {
            return errorResponse('Appointment not found', [], 404);
        }
        $appointment->delete();
        return successResponse('Success delete app$appointment', [
            '$appointment' => $appointment
        ]);
    }
}
