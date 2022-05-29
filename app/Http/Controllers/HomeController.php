<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Perpustakaan\Entities\Book;
use Modules\Perpustakaan\Entities\Borrowing;
use Modules\Perpustakaan\Entities\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;

        if (Auth::check()) {
            if ($role == 'Admin' || $role == 'Guru' || $role == 'Murid' || $role == 'Staf') {

              $event = Events::where('is_active','0')->first();

              return view('backend.website.home', compact('event'));
            } elseif($role == 'Guest' || $role == 'PPDB') {
                return view('ppdb::backend.index');

            // DASHBOARD PERPUSTAKAAN \\
            } elseif ($role == 'Perpustakaan') {

              $book = Book::sum('stock');
              $borrow = Borrowing::whereNull('lateness')->count();
              $member = Member::where('is_active',0)->count();
              $members = Member::count();
              return view('perpustakaan::index', compact('book','borrow','member','members'));
            }
        }
    }
}
