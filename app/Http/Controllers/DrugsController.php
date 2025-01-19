<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class DrugsController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'code' => 'required|unique:drugs'
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $drug = Drugs::create([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code
        ]);
        return successResponse('Success create drug',[
            'data' => $drug
        ]);
    }
    public function getDrugs(){
        $drug = Drugs::all();
        if($drug->isEmpty()){
            return errorResponse('Drug not found', [], 404);
        }
        return successResponse('Success get all drug',[
            'data' => $drug
        ]);
    }

    public function getDrugsById($id){
        $drug = Drugs::find($id);
        return $drug;
    }

    public function searchDrugs(Request $request){
        $drug = Drugs::where('name', 'like', '%' . $request->search . '%')->get();
        if($drug->isEmpty()){
            return errorResponse('Drug not found', [], 404);
        }
        return successResponse('Success get all drug',[
            'data' => $drug
        ]);
    }
    public function updateDrugs(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes',
            'description' => 'sometimes',
            'code' => 'sometimes|unique:drugs'
        ]);
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $drug = Drugs::find($id);
        if(!$drug){
            return errorResponse('Drug not found', [], 404);
        }
        $drug->update($validator->validated());
        return successResponse('Success update drug',[
            'data' => $drug
        ]);
    }

    public function deleteDrugs($id){
        $drug = Drugs::find($id);
        if (!$drug) {
            return errorResponse('Drug not found', [], 404);
        }
        $drug->delete();
        return successResponse('Success delete drug',[
            'data' => $drug
        ]);
    }
}
