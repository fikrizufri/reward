<?php

namespace App\Exports;

use App\Models\Perhitungan;
use App\Models\Saksi;
use App\Models\Tps;
use App\Models\Paslon;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExcelPerhitungan implements FromView
{


    protected $paslon, $kelurahan, $tps;

    function __construct($paslon, $kelurahan, $tps)
    {
        $this->paslon = $paslon;
        $this->kelurahan = $kelurahan;
        $this->tps = $tps;
    }

    public function view(): View
    {
        $data = [];
        $jumlah = 0;
        $kelurahan_id = [];
        $tps = $this->tps;
        $paslon = $this->paslon;
        $kelurahan = $this->kelurahan;

        $title =  "Perhitungan";

        $dataPaslon = Paslon::where('paslon', 'ya')->orderBy('nourut', 'ASC')->get();
        $dataNonPaslon = Paslon::where('paslon', 'tidak')->orderBy('nourut', 'ASC')->get()->pluck('id');
        $dataKelurahan = Kelurahan::orderBy('nama', 'ASC')->get();
        $dataKecamatan = Kecamatan::orderBy('nama', 'ASC')->get();
        $dataTps = Tps::orderBy('nama', 'ASC')->get();

        $route = 'perhitungan';
        $kelurahan_id = [];

        $paslon_id = Paslon::where('paslon', 'ya')->orderBy('nourut', 'ASC')->get()->pluck('id');
        $dataPerhitungan = Perhitungan::whereIn('paslon_id', $paslon_id)->get();
        $dataPerhitunganNonPaslon = Perhitungan::whereIn('paslon_id', $dataNonPaslon)->get();

        if ($paslon == "all" || $paslon == "") {
            if ($kelurahan != "") {
                if ($kelurahan == "allkecamatan") {
                    $kecamatan_id = Kecamatan::all()->pluck('id');
                    $kelurahan_id = Kelurahan::whereIn('kecamatan_id', $kecamatan_id)->get()->pluck('id');
                    if ($tps != "") {

                        $checktps = Tps::where('nama', 'LIKE', '%' . $tps . '%')->whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                    } else {
                        $checktps = Tps::whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                    }
                    $checksaksi = Saksi::whereIn('tps_id', $checktps)->get();
                    if ($paslon_id) {
                        $dataPerhitungan = Perhitungan::whereIn('paslon_id', $paslon_id)->whereIn('saksi_id', $checksaksi->pluck('id'))->paginate(10);
                    } else {
                        $dataPerhitungan = Perhitungan::whereIn('saksi_id', $checksaksi)->paginate(10);
                    }
                } else {
                    // $kelurahan;
                    $checkkecamatan = Kecamatan::find($kelurahan);
                    if ($checkkecamatan) {
                        $kelurahan_id = Kelurahan::where('kecamatan_id', $kelurahan)->get()->pluck('id');;
                    } else {
                        $kelurahan_id = [$kelurahan];
                    }
                    if ($tps != "") {
                        $checktps = Tps::where('nama', 'LIKE', '%' . $tps . '%')->whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                    } else {

                        $checktps = Tps::whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                    }

                    $checksaksi = Saksi::whereIn('tps_id', $checktps)->get()->pluck('id');
                    $dataPerhitungan = Perhitungan::whereIn('paslon_id', $paslon_id)->whereIn('saksi_id', $checksaksi)->paginate(10);
                    $dataPerhitunganNonPaslon = Perhitungan::whereIn('paslon_id', $dataNonPaslon)->whereIn('saksi_id', $checksaksi)->paginate(10);
                }
            }
        } else {


            if ($kelurahan != "") {
                if ($kelurahan == "allkecamatan") {
                    $kelurahan_id = Kelurahan::all()->pluck('id');
                } else {

                    $checkkecamatan = Kecamatan::find($kelurahan);
                    if ($checkkecamatan) {
                        $kelurahan_id = Kelurahan::where('kecamatan_id', $kelurahan)->get()->pluck('id');;
                    } else {
                        $kelurahan_id = [$kelurahan];
                    }
                }
                if ($tps != "") {
                    $checktps = Tps::where('nama', 'LIKE', '%' . $tps . '%')->whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                } else {
                    $checktps = Tps::whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                }
            } else {

                $kelurahan_id = Kelurahan::all()->pluck('id');
                if ($tps != "") {
                    $checktps = Tps::where('nama', 'LIKE', '%' . $tps . '%')->whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                } else {
                    $checktps = Tps::whereIn('kelurahan_id', $kelurahan_id)->get()->pluck('id');
                }
            }
            $checksaksi = Saksi::whereIn('tps_id', $checktps)->get()->pluck('id');

            $dataPerhitungan = Perhitungan::where('paslon_id', $paslon)->whereIn('saksi_id', $checksaksi)->paginate(10);

            $dataPerhitunganNonPaslon = Perhitungan::whereIn('paslon_id', $dataNonPaslon)->whereIn('saksi_id', $checksaksi)->paginate(10);
        }
        $jumlah = $dataPerhitungan->sum('jumlah');
        $jumlahNon = $dataPerhitunganNonPaslon->sum('jumlah');

        return view('perhitungan.excel', compact(
            'dataPerhitungan',
            'dataPerhitunganNonPaslon',
            'jumlahNon',
            'title',
            'jumlah'
        ));
    }
}
