<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriBeritaRequest;
use ErrorException;
use Session;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriBerita::all();
        return view('backend.website.content.kategoriBerita.index', compact('kategori'));
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
    public function store(KategoriBeritaRequest $request)
    {
        try {
            $kategori = new KategoriBerita();
            $kategori->nama         = $request->nama;
            $kategori->is_active    = $request->is_active;
            $kategori->save();

            Session::flash('success','Kategori Berhasil ditambah !');
            return redirect()->route('backend-kategori-berita.index');
        } catch (ErrorException $e) {
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
        $kategori = KategoriBerita::find($id);
        return view('backend.website.content.kategoriBerita.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriBeritaRequest $request, $id)
    {
        try {
            $kategori = KategoriBerita::find($id);
            $kategori->nama         = $request->nama;
            $kategori->is_active    = $request->is_active;
            $kategori->save();

            Session::flash('success','Kategori Berhasil diupdate !');
            return redirect()->route('backend-kategori-berita.index');
        } catch (ErrorException $e) {
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
