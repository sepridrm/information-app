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
            $new = new Pengumuman();
            $new->isi = $request->isi;
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
            $update->isi = $request->isi;
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    public function change_status(Request $request)
    {
        if ($request->ajax()) {
            $status = Pengumuman::find($request->id);
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
            Pengumuman::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}
