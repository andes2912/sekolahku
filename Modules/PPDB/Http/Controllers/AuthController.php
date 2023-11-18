<?php

namespace Modules\PPDB\Http\Controllers;

use ErrorException;
use App\Models\User;
use App\Models\dataMurid;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\PPDB\Entities\paymentRegistration;
use Modules\PPDB\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Register View
    public function registerView()
    {
        return view('ppdb::auth.register');
    }

    // Register Store
    public function registerStore(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $register = new User();
            $register->name      = $request->name;
            $register->username  = $username;
            $register->email     = $request->email;
            $register->role      = 'Guest';
            $register->password  = bcrypt($request->password);
            $register->save();

            if ($register) {
                $murid = new dataMurid();
                $murid->user_id         =   $register->id;
                $murid->jenjang         =   $request->jenjang;
                $murid->whatsapp        =   $request->whatsapp;
                $murid->asal_sekolah    =   $request->asal_sekolah;
                $murid->save();
            }

            $payment = new paymentRegistration();
            $payment->user_id   = $register->id;
            $payment->jenjang   = $request->jenjang;
            $payment->amount    = 300000;
            $payment->save();

            $register->assignRole($register->role);

            DB::commit();
            Session::flash('success', 'Success, Data Berhasil dikirim !');
            return redirect()->route('login');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }
}
