<?php

namespace App\Http\Controllers;

use App\Models\Icds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class IcdsController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name_en' => 'required',
            'name_id' => 'required',
            'code' => 'required|unique:table'
        ]);  
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $icd = Icds::create([
            'code' => $request->code,
            'name_en' => $request->name_en,
            'name_id' => $request->name_id
        ]);
        return successResponse('Success create icd',[
            'data' => $icd
        ]);
    }

    public function getIcds(){
        $icd = Icds::all();
        if($icd->isEmpty()){
            return errorResponse('Icd not found', [], 404);
        }
        return successResponse('Success get all icd',[
            'data' => $icd
        ]);
    }

    public function getIcdsById($id){
        $icd = Icds::find($id);
        return $icd;
    }

    public function searchIcds(Request $request){
        $icd = Icds::where('name_en', 'like', '%'.$request->search.'%')->orWhere('name_id', 'like', '%'.$request->search.'%')->get();
        if ($icd->isEmpty()) {
            return errorResponse('Icd not found', [], 404);
        }
        return successResponse('Success get icd',[
            'data' => $icd
        ]);
    }

    public function updateIcds(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name_en' => 'required',
            'name_id' => 'required',
            'code' => 'required|unique:table'
        ]);  
        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $icd = Icds::find($id);
        if(!$icd){
            return errorResponse('Icd not found', [], 404);
        }
        $icd->update($validator->validated());
        return successResponse('Success update icd',[
            'data' => $icd
        ]);

    }

    public function deleteIcds($id){
        $icd = Icds::find($id);
        if (!$icd) {
            return errorResponse('Icd not found', [], 404);
        }
        $icd->delete();
        return successResponse('Success delete icd',[
            'data' => $icd
        ]);
    }



}
