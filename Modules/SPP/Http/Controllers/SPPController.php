<?php

namespace Modules\SPP\Http\Controllers;

use App\Helpers\GlobalHelpers;
use App\Models\User;
use Carbon\Carbon;
use ErrorException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\SPP\Entities\DetailPaymentSpp;
use Modules\SPP\Entities\PaymentSpp;
use PhpParser\Node\Stmt\Return_;

class SPPController extends Controller
{
    use GlobalHelpers;
    public function index()
    {
        return view('spp::index');
    }

    // Murid
    public function murid()
    {
      $payment = User::with('payment')
      ->whereHas('payment',function($a) {
        $a->where('year',date('Y'));
      })
      ->where('role','Murid')->get();
      return view('spp::murid.index', compact('payment'));
    }

    // Detail Pembayaran
    public function detail($id)
    {
      $payment = PaymentSpp::with('detailPayment.aprroveBy','user.muridDetail')->findOrFail($id);
      return view('spp::murid.show', compact('payment'));
    }

    // Update Pembayaran
    public function updatePembayaran(Request $request)
    {
      try {
        DB::beginTransaction();

        $payment = DetailPaymentSpp::find($request->id_payment);
        $payment->status        = 'paid';
        $payment->approve_by    = Auth::id();
        $payment->approve_date  = Carbon::now();
        $payment->update();

        // Update Payment
        $pay = PaymentSpp::find($payment->payment_id);
        if ($payment->month == 'January') {
          $pay->January = 'paid';
        } elseif($payment->month == 'February') {
          $pay->February = 'paid';
        } elseif ($payment->month == 'March') {
          $pay->March = 'paid';
        } elseif ($payment->month == 'April') {
          $pay->April = 'paid';
        } elseif ($payment->month == 'May') {
          $pay->May = 'paid';
        } elseif ($payment->month == 'June') {
          $pay->June = 'paid';
        } elseif ($payment->month == 'July') {
          $pay->July = 'paid';
        } elseif ($payment->month == 'August') {
          $payment->August = 'paid';
        } elseif ($payment->month == 'September') {
          $pay->September = 'paid';
        } elseif ($payment->month == 'October') {
          $pay->October = 'paid';
        } elseif ($payment->month == 'November') {
          $pay->November = 'paid';
        } elseif ($payment->month == 'December') {
          $pay->December = 'paid';
        }
        $pay->update();

        DB::commit();
        Session::flash('success','Pembayaran Berhasil Dikonfirmasi.');
        return $payment;
      } catch (\ErrorException $e) {
        DB::rollback();
        throw new ErrorException($e->getMessage());
      }
    }
}
