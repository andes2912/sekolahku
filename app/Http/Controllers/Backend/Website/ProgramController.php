<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use App\Models\DataJurusan;
use ErrorException;
use Session;
use DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('backend.website.program.index', compact('jurusan'));
    }

    public function create()
    {
        return view('backend.website.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        try {
            DB::beginTransaction();
            $url                = \Str::slug($request->nama);
            $jurusan = new Jurusan;
            $jurusan->nama      = $request->nama;
            $jurusan->slug      = $url;
            $jurusan->singkatan = $request->singkatan;
            $jurusan->is_active = '0';
            $jurusan->save();

            if ($jurusan) {
                $foto = $request->file('image');
                $nama_foto = time()."_".$foto->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/jurusan';
                $foto->storeAs($tujuan_upload,$nama_foto);

                $dataJurusan = new DataJurusan;
                $dataJurusan->jurusan_id    = $jurusan->id;
                $dataJurusan->content       = $request->content;
                $dataJurusan->image         = $nama_foto;
                $dataJurusan->save();
            }

            DB::commit();
            Session::flash('success','Program Studi Berhasil ditambah !');
            return redirect()->route('program-studi.index');

        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::with('dataJurusan')->findOrFail($id);
        return view('backend.website.program.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $jurusan = Jurusan::findOrFail($id);
            $jurusan->nama      = $request->nama;
            $jurusan->singkatan = $request->singkatan;
            $jurusan->is_active = $request->is_active;
            $jurusan->save();

            if ($jurusan) {
                if ($request->image) {
                    $foto = $request->file('image');
                    $nama_foto = time()."_".$foto->getClientOriginalName();
                    // isi dengan nama folder tempat kemana file diupload
                    $tujuan_upload = 'public/images/jurusan';
                    $foto->storeAs($tujuan_upload,$nama_foto);

                    $dataJurusan = DataJurusan::where('jurusan_id', $id)->first();
                    $dataJurusan->content       = $request->content;
                    $dataJurusan->image         = $nama_foto;
                    $dataJurusan->save();
                }
            }

            DB::commit();
            Session::flash('success','Program Studi Berhasil diupdate !');
            return redirect()->route('program-studi.index');
            
        } catch (ErrorException $e) {
            DB::rollback();
            Session::flash('error','Program Studi Gagal diupdate !');
            throw new ErrorException($e->getMessage());
        }
    }
}
