<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Resources\UrlResource;
use Illuminate\Support\Facades\Validator;

class ApiUrlController extends Controller
{
    public function getUrlResource(Request $request){
        // making validator manually
        $validator = Validator::make($request->all(), [
            'destination' => 'required|url|exists:urls'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // get validated values
        $validated = $validator->validated();
        return new UrlResource(Url::where('destination', $validated['destination'])->first());
    }
}
