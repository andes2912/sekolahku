<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                return view('backend.website.home');
            } elseif($role == 'Guest' || $role == 'PPDB') {

                return view('ppdb::backend.index');
            }
        }
    }
}
