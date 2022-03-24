<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use App\Http\Requests\BeritaRequest;
use ErrorException;
use Session;
use Str;
use Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cek kategori
        $kategori = KategoriBerita::where('is_Active','0')->get();

        //Berita
        $berita = Berita::all();
        return view('backend.website.content.berita.index', compact('kategori','berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriBerita::where('is_Active','0')->get();
        return view('backend.website.content.berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeritaRequest $request)
    {
        try {

            $image = $request->file('thumbnail');
            $nama_image = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berita';
            $image->storeAs($tujuan_upload,$nama_image);

            // Create Slug
            $slug = Str::slug($request->title);

            $berita = new Berita;
            $berita->title          = $request->title;
            $berita->slug           = $slug;
            $berita->content        = $request->content;    
            $berita->kategori_id    = $request->kategori_id;
            $berita->thumbnail      = $nama_image;
            $berita->created_by     = Auth::id();
            $berita->is_active      = '0';
            $berita->save();

            Session::flash('success','Berita Berhasil ditambah !');
            return redirect()->route('backend-berita.index');

        }   catch (ErrorException $e) {
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
        $kategori = KategoriBerita::where('is_Active','0')->get();
        $berita = Berita::find($id);
        return view('backend.website.content.berita.edit', compact('kategori','berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeritaRequest $request, $id)
    {
        try {

            if ($request->thumbnail) {
                $image = $request->file('thumbnail');
                $nama_image = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/berita';
                $image->storeAs($tujuan_upload,$nama_image);
            }

            $berita = Berita::find($id);
            $berita->title          = $request->title;
            $berita->slug           = $berita->slug;
            $berita->content        = $request->content;    
            $berita->kategori_id    = $request->kategori_id;
            $berita->thumbnail      = $nama_image ?? $berita->thumbnail;
            $berita->is_active      = $request->is_active;
            $berita->save();

            Session::flash('success','Berita Berhasil diupdate !');
            return redirect()->route('backend-berita.index');

        }   catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
