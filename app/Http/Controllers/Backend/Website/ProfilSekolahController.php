<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileSekolahRequest;
use ErrorException;
use Session;

class ProfilSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = ProfileSekolah::first();
        return view('backend.website.tentang.index',compact('profile'));
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
    public function store(ProfileSekolahRequest $request)
    {
        try {
            $image = $request->file('image');
            $nama_img = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/profileSekolah';
            $image->storeAs($tujuan_upload,$nama_img);

            $profile = new ProfileSekolah();
            $profile->title     = strtoupper($request->title);
            $profile->content   = $request->content;
            $profile->image     = $nama_img;
            $profile->save();

            Session::flash('success','Profile Sekolah Berhasil dibuat!');
            return redirect()->route('backend-profile-sekolah.index');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileSekolahRequest $request, $id)
    {
        try {
            if ($request->image) {
                $image = $request->file('image');
                $nama_img = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profileSekolah';
                $image->storeAs($tujuan_upload,$nama_img);
            }

            $profile = ProfileSekolah::find($id);
            $profile->title     = strtoupper($request->title);
            $profile->content   = $request->content;
            $profile->image     = $nama_img ?? $profile->image;
            $profile->save();

            Session::flash('success','Profile Sekolah Berhasil diupdate!');
            return redirect()->route('backend-profile-sekolah.index');

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
