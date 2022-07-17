<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\SPP\Entities\BankAccount;

class SettingController extends Controller
{
    // setting
    public function index()
    {
      $bank = Bank::all();
      return view('backend.settings.index', compact('bank'));
    }

    // Tambah Bank
    public function addBank(Request $request)
    {
      try {
        BankAccount::create([
          'user_id'         => Auth::id(),
          'account_number'  => $request->account_number,
          'account_name'    => $request->account_name,
          'bank_name'       => $request->bank_name,
          'is_active'       => $request->is_active,
          'is_primary'      => 1
        ]);
        Session::flash('success','Akun Bank Berhasil Ditambah.');
        return back();
      } catch (\ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }
}
