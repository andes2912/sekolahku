<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Pengajar;
use App\Models\Video;

class IndexController extends Controller
{
    //Welcome
    public function index()
    {
        // Menu
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();

        // Gambar Slider
        $slider = ImageSlider::where('is_Active','0')->get();

        // About
        $about = About::where('is_Active','0')->first();

        // Video
        $video = Video::where('is_active','0')->first();

        // Pengajar
        $pengajar = Pengajar::with('user')->where('is_active','0')->get();

        return view('frontend.welcome', compact('jurusanM','kegiatanM','slider','about','video','pengajar'));
    }
}
