<?php

namespace Modules\Murid\Http\Controllers;

use Carbon\Carbon;
use ErrorException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\SPP\Entities\DetailPaymentSpp;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $payment = DetailPaymentSpp::with('payment')->where('user_id', Auth::id())->get();
        return view('murid::pembayaran.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('murid::create');
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
        return view('murid::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $payment = DetailPaymentSpp::with('user.muridDetail')->where('user_id', Auth::id())->findOrFail($id);
        return view('murid::pembayaran.edit', compact('payment'));
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

        $file = $request->file('file');
        $file_payment = 'payment-'.time().Auth::id().".".$file->getClientOriginalExtension();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/images/bukti_payment';
        $file->storeAs($tujuan_upload,$file_payment);

        $payment = DetailPaymentSpp::where('user_id', Auth::id())->findOrFail($id);
        $payment->file  = $file_payment;
        $payment->date_file = Carbon::now();
        $payment->update();

        DB::commit();
        Session::flash('success','Pembayaran Berhasil dikirim,');
        return redirect('murid/pembayaran');

      } catch (\ErrorException $e) {
        DB::rollBack();
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
