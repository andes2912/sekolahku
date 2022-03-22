<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class ProgamController extends Controller
{
    // Program Studi
    public function programStudi($slug)
    {
        $jurusan = Jurusan::with('dataJurusan')->where('slug', $slug)->first();

        // Menu
        $jurusanM = Jurusan::where('is_active','0')->get();
        return view('frontend.program.jurusan.show', compact('jurusan','jurusanM'));
    }
}
