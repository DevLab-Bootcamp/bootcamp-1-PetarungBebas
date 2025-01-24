<?php

namespace App\Http\Controllers;

use App\Models\EventOfficers;
use App\Models\ScheduleEvents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class ScheduleEventsController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $schedule = ScheduleEvents::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time

        ]);
        return successResponse('Success create schedule',[
            'schedule' => $schedule
        ]);
    }


    public function getScheduleEvents(){
        $Schedules = ScheduleEvents::all();
        if(!$Schedules){
            return errorResponse('Schedules empty', [], 404);
        }
        return successResponse('Success get all schedule events',[
            'schedules' => $Schedules
        ]);
    }

    public function getScheduleEventByUserID(){
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $userId = $user->id; 
        $schedules = EventOfficers::join('users', 'event_officers.user_id', '=', 'users.id')
        ->join('schedule_events', 'event_officers.schedule_event_id', '=', 'schedule_events.id')
        ->where('users.id', '=', $userId)
        ->select('scedule_events.*','users.name')
        ->get();
        if (!$schedules) {
            return errorResponse('Schedule not found', [], 404);
        }
    
        return successResponse('Success get schedule', [
            $schedules
        ]);

    }

    public function update(Request $request, $id){
        $schedule = ScheduleEvents::find($id);
        if(!$schedule){
            return errorResponse('Schedule not found', [], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes',
            'description' => 'sometimes',
            'start_time' => 'sometimes',
            'end_time' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }
        $schedule->update($validator->validated());
        return successResponse('Success update schedule',[
            'schedule' => $schedule
        ]);
    }

    public function delete($id){
        $schedule = ScheduleEvents::find($id);
        if (!$schedule) {
            return errorResponse('Schedule not found', [], 404);
        }
        $schedule->delete();
        return successResponse('Success delete schedule',[
            'schedule' => $schedule
        ]);
    }
}
