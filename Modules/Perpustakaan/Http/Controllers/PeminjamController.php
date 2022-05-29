<?php

namespace Modules\Perpustakaan\Http\Controllers;

use App\Helpers\GlobalHelpers;
use ErrorException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Perpustakaan\Entities\Book;
use Modules\Perpustakaan\Entities\Borrowing;
use Modules\Perpustakaan\Entities\Member;
use Modules\Perpustakaan\Http\Requests\PeminjamRequest;
use Modules\Perpustakaan\Http\Requests\UpdatePeminjamRequest;

class PeminjamController extends Controller
{
  use GlobalHelpers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
      $peminjam = Borrowing::with('members','books')->whereNull('lateness')->orderBy('created_at','desc')->get();
      return view('perpustakaan::backend.peminjam.index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
      $book   = Book::where('is_available',0)->get();
      $member = Member::where('is_active',0)->get();
      return view('perpustakaan::backend.peminjam.create',compact('book','member'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PeminjamRequest $request)
    {
      try {
        DB::beginTransaction();

        $cekBook = Borrowing::where('book_id', $request->book_id)->whereNull('lateness')->first();
        $cekMember = Borrowing::where('member_id', $request->member_id)->whereNull('lateness')->first();
        $available = Book::where('id', $request->book_id)->first();

        // Jika member dan buku sudah dipinjam
        if ($cekBook && $cekMember) {
          Session::flash('error','Tidak Bisa Meminjam Buku yang sama.');
          return redirect('perpus/peminjam/create');
        }

        // Jika buku is_available == 1
        if ($available->is_available == 1) {
          Session::flash('error','Buku tidak tersedia.');
          return redirect('perpus/peminjam/create');
        }

        $peminjam = new Borrowing;
        $peminjam->borrow_code  = $this->generateNumber($peminjam,'BORROW');
        $peminjam->book_id      = $request->book_id;
        $peminjam->member_id    = $request->member_id;
        $peminjam->borrow_date  = $request->borrow_date;
        $peminjam->return_date  = $request->return_date;
        $peminjam->save();

        $peminjam->borrow_code  = $this->generateNumber($peminjam,'BORROW');
        $peminjam->save();

        // kurangi stock buku
        $book = Book::where('id',$peminjam->book_id)->first();
        $book->stock = $book->stock - 1;
        $book->is_available = $book->stock == 0 ? 1 : 0; // Rubah availabe menjadi 1 jika stock 0
        $book->update();

        DB::commit();
        Session::flash('success','Buku berhasil masuk ke daftar peminjam.');
        return redirect('perpus/peminjam');

      } catch (\ErrorException $e) {
        DB::rollback();
        throw new ErrorException($e->getMessage());
      }
    }

    // Update Peminjam
    public function updates(UpdatePeminjamRequest $request)
    {
      try {
        DB::beginTransaction();
        $update = Borrowing::find($request->id_peminjam);
        $update->update([
          'lateness'  => $request->lateness
        ]);
        $stock = Book::find($update->book_id);
        $stock->update([
          'stock' => $stock->stock + 1,
        ]);

        // Rubah availabe menjadi 0 jika stock lebih dari 0
        $available = Book::where('id', $update->book_id)->first();
        $available->is_available = $stock->stock >= 0 ? 0 : 1;
        $available->update();

        DB::commit();
        Session::flash('success','Data Peminjam berhasil di update.');
        return $update;

      } catch (\ErrorException $e) {
        DB::rollback();
        throw new ErrorException($e->getMessage());
      }
    }

    // History Data Peminjam
    public function history()
    {
      $HistoryPeminjam = Borrowing::with('books','members')->whereNotNull('lateness')->orderBy('created_at','desc')->get();
      return view('perpustakaan::backend.peminjam.history', compact('HistoryPeminjam'));
    }


}
