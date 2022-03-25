<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PengajarRequest;
use ErrorException;
use DB;
use Session;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = Pengajar::with('user')->get();
        return view('backend.website.content.pengajar.index',compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.content.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengajarRequest $request)
    {
        try {
            DB::beginTransaction();

            $image = $request->file('foto_profile');
            $nama_img = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/profile';
            $image->storeAs($tujuan_upload,$nama_img);

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $user = new User;
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->username         = strtolower($username).date("s");
            $user->role             = 'Guru';
            $user->status           = 'Aktif';
            $user->foto_profile     = $nama_img;
            $user->password         = bcrypt('12345678');
            $user->save();

            if ($user) {
                $pengajar = new Pengajar;
                $pengajar->user_id      = $user->id;
                $pengajar->mengajar     = $request->mengajar;
                $pengajar->nip          = $request->nip;
                $pengajar->email        = $request->email;
                $pengajar->linkidln     = $request->linkidln;
                $pengajar->instagram    = $request->instagram;
                $pengajar->website      = $request->website;
                $pengajar->facebook     = $request->facebook;
                $pengajar->twitter      = $request->twitter;
                $pengajar->youtube      = $request->youtube;
                $pengajar->save();
            }

            DB::commit();
            Session::flash('success','Pengajar Berhasil ditambah !');
            return redirect()->route('backend-pengajar.index');

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
        $pengajar = Pengajar::with('user')->where('user_id',$id)->first();
        return view('backend.website.content.pengajar.edit', compact('pengajar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PengajarRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            if ($request->foto_profile) {
                $image = $request->file('foto_profile');
                $nama_img = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload,$nama_img);
            }

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $user = User::find($id);
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->username         = $request->username ? $request->username : strtolower($username).date("s");
            $user->status           = $request->status;
            $user->foto_profile     = $nama_img ?? $user->foto_profile;
            $user->save();

            if ($user) {
                $pengajar = Pengajar::where('user_id',$user->id)->first();
                $pengajar->mengajar     = $request->mengajar;
                $pengajar->nip          = $request->nip;
                $pengajar->email        = $request->email;
                $pengajar->is_active    = $request->status == 'Aktif' ? '0' : '1';
                $pengajar->linkidln     = $request->linkidln;
                $pengajar->instagram    = $request->instagram;
                $pengajar->website      = $request->website;
                $pengajar->facebook     = $request->facebook;
                $pengajar->twitter      = $request->twitter;
                $pengajar->youtube      = $request->youtube;
                $pengajar->save();
            }

            DB::commit();
            Session::flash('success','Pengajar Berhasil ditambah !');
            return redirect()->route('backend-pengajar.index');

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
