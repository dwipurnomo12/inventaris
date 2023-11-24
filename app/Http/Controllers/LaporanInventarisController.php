<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanInventarisController extends Controller
{
    public function index()
    {
        return view('laporan-inventaris.index', [
            'barangs'   => Barang::orderBy('id', 'DESC')->get()
        ]);
    }

    public function cetakLaporan()
    {
        $barang = Barang::orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('laporan-inventaris.laporan', [
            'barangs'    => $barang
        ]);

        return $pdf->stream('laporan-inventaris.pdf');
    }
}
