<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use App\Models\VideoInformation;
use App\Models\ImageInformation;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/613/tanggal/'.date("Y-m-d"))->json()['jadwal']['data'];
        $video = VideoInformation::where('aktif', '1')->get();
        $welcome = Welcome::first();
        $image = Imageinformation::where('aktif', '1')->get();
        $pengumuman = Pengumuman::where('aktif', '1')->get();
        
        return view('welcome', compact(
            'welcome',
            'video',
            'image',
            'pengumuman',
            'schedule'
        ));
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
     * @param  \App\Models\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function show(Pangkat $pangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pangkat $pangkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pangkat $pangkat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pangkat $pangkat)
    {
        //
    }
}
