<?php

namespace App\Http\Controllers;

use App\Models\VideoIslami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class VideoIslamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VideoIslami::get();
        return view('video-islami.video-islami', compact(
            'data'
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
     * @param  \App\Models\VideoIslami  $videoIslami
     * @return \Illuminate\Http\Response
     */
    public function show(VideoIslami $videoIslami)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoIslami  $videoIslami
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoIslami $videoIslami)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoIslami  $videoIslami
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $update = VideoIslami::find($request->id);
            if ($request->file("file") != "") {
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $request->name.Carbon::now()->timestamp.".".$extention;

                Storage::delete($update->path);
                $newPath = $request->file("file")->storeAs("public/video-islami/", $nama_file);
                $update->path = $newPath;
            }
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoIslami  $videoIslami
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoIslami $videoIslami)
    {
        //
    }
}
