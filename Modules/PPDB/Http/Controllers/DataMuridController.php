<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\dataMurid;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use ErrorException;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Routing\Controller;
use DB;
use Session;

class DataMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $murid = User::where('role','Guest')->get();
        return view('ppdb::backend.dataMurid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ppdb::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $murid = User::with('muridDetail','dataOrtu')->where('role','Guest')->find($id);
        return view('ppdb::backend.dataMurid.show',compact('murid'));

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ppdb::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'nis'   => 'required|numeric|unique:data_murids',
                'nisn'  => 'required|numeric|unique:data_murids',
            ],
            [
                'nis.required'      => 'NIS tidak boleh kosong.',
                'nisn.required'     => 'NISN tidak boleh kosong.',
                'nis.numeric'       => 'NIS hanya mendukung angka.',
                'nis.unique'        => 'NIS sudah pernah digunakan.',
                'nisn.numeric'      => 'NISN hanya mendukung angka.',
                'nisn.unique'       => 'NISN sudah pernah digunakan.',
            ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $murid = User::find($id);
            $murid->role = 'Murid';
            $murid->update();

            if ($murid) {
                $data = dataMurid::where('user_id', $id)->first();
                $data->nis      = $request->nis;
                $data->nisn     = $request->nisn;
                $data->update();
            }

            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $murid->assignRole($murid->role);

            DB::commit();
            Session::flash('success','Success, Data Berhasil diupdate !');
            return redirect()->route('data-murid.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
