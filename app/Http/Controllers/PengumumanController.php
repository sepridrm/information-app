<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengumuman::get();
        return view('pengumuman.pengumuman', compact(
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
        if ($request->ajax()) {
            $extention = $request->file("file")->getClientOriginalExtension();
            $nama_file = $request->name.".".$extention;

            $new = new Pengumuman();
            $new->nama = $request->name;
            $new->path = $request->file("file")->storeAs("public/video/", $nama_file);
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        if ($request->ajax()) {
            $update = Pengumuman::find($request->id);
            $update->nama = $request->name;
            if ($request->file("file") != "") {
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $request->name.".".$extention;

                Storage::delete($update->path);
                $newPath = $request->file("file")->storeAs("public/video/", $nama_file);
                $update->path = $newPath;
            }
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    public function change_status(Request $request)
    {
        if ($request->ajax()) {
            $status = Pengumuman::find($request->id_change);
            $status->aktif = $request->st;
            $status->save();

            return response()->json(['success' => 'Status berhasil diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $view = Pengumuman::find($request->id);
            Storage::delete($view->file);
            Arsip::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}
