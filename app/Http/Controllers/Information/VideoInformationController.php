<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\VideoInformation;
use Illuminate\Http\Request;

class VideoInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informations.video-information');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoInformation  $videoInformation
     * @return \Illuminate\Http\Response
     */
    public function show(VideoInformation $videoInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoInformation  $videoInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoInformation $videoInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoInformation  $videoInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoInformation $videoInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoInformation  $videoInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoInformation $videoInformation)
    {
        //
    }
}
