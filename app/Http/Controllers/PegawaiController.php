<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pangkat;
use App\Models\PangkatPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::orderBy('id', 'desc')->get();
        
        $pangkat = Pangkat::orderBy('id', 'desc')->get();
        return view('pegawai.pegawai', compact(
            'data',
            'pangkat'
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
            $nama_file = $request->name.Carbon::now()->timestamp.".".$extention;

            $new = new Pegawai();
            $new->nama = $request->name;
            $new->jabatan = $request->jabatan;
            $new->foto = $request->file("file")->storeAs("public/pegawai/", $nama_file);
            $new->save();
            
            $pangkat = new PangkatPegawai();
            $pangkat->id_pegawai = DB::getPdo()->lastInsertId();
            $pangkat->id_pangkat = $request->pangkat;
            $pangkat->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }
    public function pangkat(Request $request)
    {
        if ($request->ajax()) {
            $pangkat = new PangkatPegawai();
            $pangkat->id_pegawai = $request->id;
            $pangkat->id_pangkat = $request->pangkat;
            $pangkat->save();

            return response()->json(['success' => 'Pangkat Berhasil Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $update = Pegawai::find($request->id);
            $update->nama = $request->name;
            $update->jabatan = $request->jabatan;
            if ($request->file("file") != "") {
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $request->name.Carbon::now()->timestamp.".".$extention;

                Storage::delete($update->foto);
                $newPath = $request->file("file")->storeAs("public/pegawai/", $nama_file);
                $update->foto = $newPath;
            }
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $view = Pegawai::find($request->id);
            Storage::delete($view->foto);
            Pegawai::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}
