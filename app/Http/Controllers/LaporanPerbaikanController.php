<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanPerbaikanController extends Controller
{
    public function index()
    {
        return view('laporan-perbaikan.index', [
            'pelaporans'  => Pelaporan::where('status', 'selesai')->orderBy('id', 'DESC')->get()
        ]);
    }

    public function cetakLaporan()
    {
        $pelaporan = Pelaporan::where('status', 'selesai')->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('laporan-perbaikan.laporan', [
            'pelaporans'    => $pelaporan
        ]);

        return $pdf->stream('laporan-perbaikan.pdf');
    }
}
