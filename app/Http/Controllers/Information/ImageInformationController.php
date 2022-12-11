<?php


namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\ImageInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ImageInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ImageInformation::get();
        return view('informations.image-information', compact(
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
            $nama_file = $request->name.Carbon::now()->timestamp.".".$extention;

            $new = new ImageInformation();
            $new->nama = $request->name;
            $new->path = $request->file("file")->storeAs("public/image/", $nama_file);
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageInformation  $imageInformation
     * @return \Illuminate\Http\Response
     */
    public function show(ImageInformation $imageInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageInformation  $imageInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageInformation $imageInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageInformation  $imageInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $update = ImageInformation::find($request->id);
            $update->nama = $request->name;
            if ($request->file("file") != "") {
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $request->name.Carbon::now()->timestamp.".".$extention;

                Storage::delete($update->path);
                $newPath = $request->file("file")->storeAs("public/image/", $nama_file);
                $update->path = $newPath;
            }
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    public function change_status(Request $request)
    {
        if ($request->ajax()) {
            $status = ImageInformation::find($request->id);
            $status->aktif = $request->st;
            $status->save();

            return response()->json(['success' => 'Status berhasil diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageInformation  $imageInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $view = ImageInformation::find($request->id);
            Storage::delete($view->path);
            ImageInformation::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}

