<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use App\Models\VideoInformation;
use App\Models\ImageInformation;
use App\Models\Pengumuman;
use App\Models\Pegawai;
use App\Models\VideoIslami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = ["ashar" => "15:32", "dzuhur" => "12:06", "isya" => "19:31", "maghrib" => "18:16", "subuh" => "04:30", "tanggal" => date("d M Y")];
        if ( @fopen("https://api.banghasan.com", "r") )
            $schedule = Http::retry(3, 100)->get('https://api.banghasan.com/sholat/format/json/jadwal/kota/613/tanggal/'.date("Y-m-d"))->json()['jadwal']['data'];

        $video = VideoInformation::where('aktif', '1')->get();
        $welcome = Welcome::first();
        $image = Imageinformation::where('aktif', '1')->get();
        $pengumuman = Pengumuman::where('aktif', '1')->get();
        $video_islami = VideoIslami::first();
        $pegawai = Pegawai::select('pegawais.id', 'nama', 'jabatan', 'foto', DB::raw('count(*) as total'), DB::raw('DATE_ADD(pangkat_pegawais.created_at, INTERVAL 1 MONTH) as sebulan'), 'terbaik')
            ->join('pangkat_pegawais', 'pangkat_pegawais.id_pegawai', 'pegawais.id')
            ->groupBy('id_pegawai')
            ->get();

        return view('welcome', compact(
            'welcome',
            'video',
            'image',
            'pengumuman',
            'schedule',
            'pegawai',
            'video_islami'
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
