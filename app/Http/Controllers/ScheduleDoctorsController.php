<?php

namespace App\Http\Controllers;

use App\Models\ScheduleDoctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class ScheduleDoctorsController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'clinic_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $schedule = ScheduleDoctors::create([
            'user_id' => $request->doctor_id,
            'clinic_id' => $request->clinic_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time

        ]);
        return successResponse('Success create schedule',[
            'schedule' => $schedule
        ]);
    }
    public function getScheduleDoctors(){
        $schedules = ScheduleDoctors::join('users', 'schedule_doctors.user_id', '=', 'users.id')
        ->join('clinics', 'schedule_doctors.clinic_id', '=', 'clinics.id')
        ->select('schedule_doctors.*','users.name as user_name', 'clinics.name as clinic_name', 'clinics.address')
        ->get();

    if (!$schedules) {
        return errorResponse('Schedule not found', [], 404);
    }

    return successResponse('Success get all schdeule doctors', [
        $schedules
    ]);
    }

    public function getScheduleDoctorsById($id){
        $schedules = ScheduleDoctors::join('users', 'schedule_doctors.user_id', '=', 'users.id')
        ->join('clinics', 'schedule_doctors.clinic_id', '=', 'clinics.id')
        ->where('schedule_doctors.id', '=', $id)
        ->select('schedule_doctors.*','users.name as user_name', 'clinics.name as clinic_name', 'clinics.address')
        ->get();

    if (!$schedules) {
        return errorResponse('Schedule not found', [], 404);
    }

    return successResponse('Success get schedule doctor', [
        $schedules
    ]);
    }

    public function updateScheduleDoctor(Request $request, $id){
        $schedule = ScheduleDoctors::find($id);
        if(!$schedule){
            return errorResponse('Schedule not found', [], 404);
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes',
            'clinic_id' => 'sometimes',
            'date' => 'sometimes',
            'start_time' => 'sometimes',
            'end_time' => 'sometimes',
        ]);  
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }
        $schedule->update($validator->validated());
        return successResponse('Success update schedule',[
            'schedule' => $schedule
        ]);
        
    }
    public function deleteScheduleDoctor($id){ 
        $schedule = ScheduleDoctors::find($id);
        if (!$schedule) {
            return errorResponse('Schedule not found', [], 404);
        }
        $schedule->delete();
        return successResponse('Success delete schedule',[
            'schedule' => $schedule
        ]);
    }

}
