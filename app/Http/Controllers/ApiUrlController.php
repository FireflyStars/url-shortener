<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Resources\UrlResource;
use Illuminate\Support\Facades\Validator;

class ApiUrlController extends Controller
{
    public function getUrlResource(Request $request){
        $validator = Validator::make($request->all(), [
            'destination' => 'required|exists:urls|url',
        ], [
            'required' => 'The destination is required',
            'url' => 'The destination is invalid',
            'exist' => 'The destination does not have shortened url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // check if request is valid or not.
        $validated = $request->validated();
        return new UrlResource(Url::where('destination', $validated['destination'])->first());
    }
}
