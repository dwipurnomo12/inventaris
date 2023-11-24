<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $totalInventaris    = Barang::count();
        $totalLokasi        = Lokasi::count();
        $pelaporanPending   = Pelaporan::where('status', 'menunggu')->count();
        $pelaporanSelesai   = Pelaporan::where('status', 'selesai')->count();
        $pendings           = Pelaporan::where('status', 'menunggu')->get();
        $dikerjakans        = Pelaporan::where('status', 'sedang diperbaiki')->get();
        $cekPelaporan       = Pelaporan::orderBy('id', 'DESC')->get();

        return view('home', [
            'totalInventaris'   => $totalInventaris,
            'totalLokasi'       => $totalLokasi,
            'pelaporanPending'  => $pelaporanPending,
            'pelaporanSelesai'  => $pelaporanSelesai,
            'pendings'          => $pendings,
            'dikerjakans'       => $dikerjakans,
            'cekPelaporans'     => $cekPelaporan
        ]);
    }
}
