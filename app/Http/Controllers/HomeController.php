<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengumuman;
use App\Models\ImageInformation;
use App\Models\VideoInformation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pegawai = Pegawai::orderBy('id', 'desc')->count();
        $pengumuman = Pengumuman::where('aktif', '1')->count();
        $video = VideoInformation::where('aktif', '1')->count();
        $image = ImageInformation::where('aktif', '1')->count();
        return view('home', compact(
            'pegawai', 'pengumuman', 'video', 'image'
        ));
    }
}
