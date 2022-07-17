<?php

namespace Modules\SPP\Http\Controllers;

use App\Helpers\GlobalHelpers;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Date;
use Modules\SPP\Entities\PaymentSpp;

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
      $payment = PaymentSpp::with('detailPayment','user.muridDetail')->findOrFail($id);
      return view('spp::murid.show', compact('payment'));
    }
}
