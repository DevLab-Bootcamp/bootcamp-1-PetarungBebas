<?php

namespace App\Http\Controllers;

use App\Models\Clinics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class ClinicsController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $clinic = Clinics::create([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return successResponse('Success create clinic',[
            'data' => $clinic
        ]);
    }

    public function getClinics(){
        $clinic = Clinics::all();
        if($clinic->isEmpty()){
            return errorResponse('Clinic not found', [], 404);
        }
        return successResponse('Success get all clinics',[
            'data' => $clinic
        ]);
    }

    public function getClinicsById($id){
        $clinic = Clinics::find($id);
        return $clinic;
    }

    public function searchClinics(Request $request){
        $clinic = Clinics::where('name', 'like', '%' . $request->search. '%')->get();
        if ($clinic->isEmpty()) {
            return errorResponse('Clinic not found', [], 404);
        }
        return successResponse('Success get clinics',[
            'data' => $clinic
        ]);
    }

    public function updateClinics(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $clinic = Clinics::find($id);
        if(!$clinic){
            return errorResponse('Clinic not found', [], 404);
        }
        $clinic->update($validator->validated());
        return successResponse('Success update clinic',[
            'data' => $clinic
        ]);
    }
    public function deleteClinics($id){
        $clinic = Clinics::find($id);
        if (!$clinic) {
            return errorResponse('Clinic not found', [], 404);
        }
        $clinic->delete();
        return successResponse('Success delete clinic',[
            'data' => $clinic
        ]);
    }
}
