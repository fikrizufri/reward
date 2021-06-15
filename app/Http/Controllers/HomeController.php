<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\JenisRapat;
use App\Models\Karyawan;
use App\Models\Kendaraan;
use App\Models\User;
use App\Models\Paslon;
use App\Models\Pegawai;
use App\Models\Saksi;
use App\Models\Perhitungan;
use App\Models\Permission;
use App\Models\Rapat;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Sparepart;
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

        $anggota = Anggota::count();
        $pegawai = Pegawai::count();
        $rapat = Rapat::count();
        $jenisRapat = JenisRapat::count();

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
