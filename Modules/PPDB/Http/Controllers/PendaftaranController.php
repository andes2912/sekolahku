<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\Bank;
use App\Models\dataMurid;
use App\Models\User;
use ErrorException;
use Modules\PPDB\Http\Requests\{BerkasMuridRequest, DataMuridRequest, DataOrtuRequest};
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\PPDB\Entities\BerkasMurid;
use Modules\PPDB\Entities\DataOrangTua;
use Illuminate\Support\Facades\Session;
use Modules\PPDB\Entities\paymentRegistration;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    // Data Murid
    public function index()
    {
        $user = User::with('paymentRegis', 'muridDetail', 'dataOrtu')->where('status', 'Aktif')->where('id', Auth::id())->first();

        if ($user->paymentRegis->file == null || $user->paymentRegis->status == 'Unpaid') {
            return redirect('ppdb/payment-pendaftaran/' . $user->paymentRegis->id);
        }
        // Jika data murid sudah lengkap
        if ($user->muridDetail->agama) {
            return redirect('ppdb/form-data-orangtua');
        }
        return view('ppdb::backend.pendaftaran.index', compact('user'));
    }

    // Update Data Murid
    public function update(DataMuridRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::with('muridDetail')->where('id', $id)->first();
            $user->name     = $request->name;
            $user->email     = $request->email;
            $user->update();

            if ($user) {
                $murid = dataMurid::where('user_id', $id)->first();
                $murid->tempat_lahir    = $request->tempat_lahir;
                $murid->tgl_lahir       = $request->tgl_lahir;
                $murid->agama           = $request->agama;
                $murid->telp            = $request->telp;
                $murid->whatsapp        = $request->whatsapp;
                $murid->alamat          = $request->alamat;
                $murid->asal_sekolah    = $request->asal_sekolah;
                $murid->update();

                if ($murid) {
                    $ortu = new DataOrangTua;
                    $ortu->user_id  = $id;
                    $ortu->save();
                }
            }
            DB::commit();
            Session::flash('success', 'Success, Data Berhasil dikirim !');
            return redirect('ppdb/form-data-orangtua');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    // Data Orang Tua
    public function dataOrtuView()
    {
        $ortu = DataOrangTua::where('user_id', Auth::id())->first();

        // Jika data orang tua masih empty
        if (!$ortu) {
            Session::flash('error', 'Data kamu belum lengkap !');
            return redirect('ppdb/form-pendaftaran');
        }

        // jika data orang tua sudah terisi
        if ($ortu->telp_ayah) {
            Session::flash('success', 'Data kamu sudah lengkap !');
            return redirect('ppdb/form-berkas');
        }
        return view('ppdb::backend.pendaftaran.dataOrtu');
    }

    // Update Data Orang Tua
    public function updateOrtu(DataOrtuRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $ortu = DataOrangTua::where('user_id', $id)->first();
            // Data Ayah
            $ortu->nama_ayah        = $request->nama_ayah;
            $ortu->pekerjaan_ayah   = $request->pekerjaan_ayah;
            $ortu->pendidikan_ayah  = $request->pendidikan_ayah;
            $ortu->telp_ayah        = $request->telp_ayah;
            $ortu->alamat_ayah      = $request->nama_ayah;

            // Data Ibu
            $ortu->nama_ibu         = $request->nama_ibu;
            $ortu->pekerjaan_ibu    = $request->pekerjaan_ibu;
            $ortu->pendidikan_ibu   = $request->pendidikan_ibu;
            $ortu->telp_ibu         = $request->telp_ibu;
            $ortu->alamat_ibu       = $request->nama_ibu;
            $ortu->update();

            if ($ortu) {
                $berkas = new BerkasMurid();
                $berkas->user_id    = $id;
                $berkas->save();
            }

            DB::commit();
            Session::flash('success', 'Success, Data Berhasil dikirim !');
            return redirect('/ppdb/form-berkas');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    // Berkas View
    public function berkasView()
    {
        $berkas = BerkasMurid::where('user_id', Auth::id())->first();
        // Jika data berkas sudah terisi
        if ($berkas->rapor) {
            Session::flash('error', 'Data kamu sudah lengkap !');
            return redirect('/home');
        }
        return view('ppdb::backend.pendaftaran.berkas', compact('berkas'));
    }

    // Berkas Store
    public function berkasStore(BerkasMuridRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $imageKk = $request->file('kartu_keluarga');
            $kartuKeluarga = time() . "_" . $imageKk->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imageKk->storeAs($tujuan_upload, $kartuKeluarga);

            $imageakte = $request->file('kartu_keluarga');
            $akteKelahiran = time() . "_" . $imageakte->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imageakte->storeAs($tujuan_upload, $akteKelahiran);

            $imageskbaik = $request->file('surat_kelakuan_baik');
            $suratbaik = time() . "_" . $imageskbaik->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imageskbaik->storeAs($tujuan_upload, $suratbaik);

            $imagesehat = $request->file('surat_sehat');
            $suratsehat = time() . "_" . $imagesehat->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imagesehat->storeAs($tujuan_upload, $suratsehat);

            $imagemata = $request->file('surat_tidak_buta_warna');
            $surattidakbutawarna = time() . "_" . $imagemata->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imagemata->storeAs($tujuan_upload, $surattidakbutawarna);

            $imagerapor = $request->file('rapor');
            $rapor = time() . "_" . $imagerapor->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imagerapor->storeAs($tujuan_upload, $rapor);

            $imagefoto = $request->file('foto');
            $foto = time() . "_" . $imagefoto->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imagefoto->storeAs($tujuan_upload, $foto);

            if ($request->ijazah) {
                $imageijazah = $request->file('ijazah');
                $ijazah = time() . "_" . $imageijazah->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/berkas_murid';
                $imageijazah->storeAs($tujuan_upload, $ijazah);
            }

            $berkas = BerkasMurid::find($id);
            $berkas->kartu_keluarga         = $kartuKeluarga;
            $berkas->akte_kelahiran         = $akteKelahiran;
            $berkas->surat_kelakuan_baik    = $suratbaik;
            $berkas->surat_sehat            = $suratsehat;
            $berkas->surat_tidak_buta_warna = $surattidakbutawarna;
            $berkas->rapor                  = $rapor;
            $berkas->foto                   = $foto;
            $berkas->ijazah                 = $ijazah ?? null;
            $berkas->save();

            DB::commit();
            Session::flash('success', 'Success, Data Berhasil dikirim !');
            return redirect('/home');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    public function paymentPage()
    {
        $accountbanks = User::with('banks')->first();
        $user = User::with('paymentRegis')->where('status', 'Aktif')->where('id', Auth::id())->first();
        if ($user->paymentRegis->file != null) {
            Session::flash('success', 'Pembayaran kamu sedang di proses.');
            return redirect('/home');
        }
        return view('ppdb::backend.pendaftaran.paymentRegis', compact('accountbanks', 'user'));
    }

    public function paymentStore(Request $request)
    {
        $imagePayment = $request->file('file');
        $payments = time() . "_" . $imagePayment->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/images/payment_pendaftaran';
        $imagePayment->storeAs($tujuan_upload, $payments);

        $payment = paymentRegistration::whereId($request->id)->first();
        $payment->sender            = $request->sender;
        $payment->destination_bank  = $request->destination_bank;
        $payment->file              = $payments;
        $payment->update();

        Session::flash('success', 'Success, Data Berhasil dikirim !');
        return redirect('/home');
    }
}
