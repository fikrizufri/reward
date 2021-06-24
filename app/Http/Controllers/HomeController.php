<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

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
        $title =  "Dashboard";

        $anggota = 1;
        $pegawai = 1;
        $rapat = 1;
        $jenisRapat = 1;

        // return Auth::user()->slug;
        return view('home.index', compact(
            'title',
            'pegawai',
            'anggota',
            'rapat',
            'jenisRapat'
        ));
    }
}
