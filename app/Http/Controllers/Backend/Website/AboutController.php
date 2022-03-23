<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use ErrorException;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use Session;
use DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        return view('backend.website.content.about.index', compact('about'));
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
    public function store(AboutRequest $request)
    {
        try {
            DB::beginTransaction();
            $image = $request->file('image');
            $nama_image = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/about';
            $image->storeAs($tujuan_upload,$nama_image);

            if ($request->is_active == '0') {
               $about = About::where('is_active','0')->update([
                   'is_active'  => '1'
               ]);
            }
            $about = new About;
            $about->title       = $request->title;
            $about->desc        = $request->desc;
            $about->is_active   = $request->is_active;
            $about->image       = $nama_image;
            $about->save();

            DB::commit();
            Session::flash('success','About Berhasil ditambah !');
            return redirect()->route('backend-about.index');

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
        $about = About::find($id);
        return view('backend.website.content.about.edit', compact('about'));
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
            if ($request->image) {
                $image = $request->file('image');
                $nama_image = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/about';
                $image->storeAs($tujuan_upload,$nama_image);
            }

            if ($request->is_active == '0') {
               $about = About::where('is_active','0')->update([
                   'is_active'  => '1'
               ]);
            }
            $about = About::find($id);
            $about->title       = $request->title ?? $about->title;
            $about->desc        = $request->desc ?? $about->desc;
            $about->is_active   = $request->is_active;
            $about->image       = $nama_image ?? $about->image;
            $about->save();

            DB::commit();
            Session::flash('success','About Berhasil ditambah !');
            return redirect()->route('backend-about.index');

        } catch (ErrorException $e) {
            DB::rollback();
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
