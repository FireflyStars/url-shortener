<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard', ['urls'=> Url::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUrlRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrlRequest $request)
    {
        // check if request is valid or not.
        $validated = $request->validated();
        
        // passed validation and save it with Url Model.
        $validated['slug'] = Str::random(5);
        Url::create($validated);

        // redirect to dashboard with success value 
        return redirect()->route('dashboard')->with(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $shortened_url)
    {
        return redirect($shortened_url->destination);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUrlRequest  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUrlRequest $request, Url $shortened_url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $shortened_url)
    {
        //
    }

    /**
     * POST REST API Url Resource 
     * @param detination
     * @return App\Http\Resources\UrlResource
     */
    public function urlResource(Request $request, $destionation){
        
    }
}
