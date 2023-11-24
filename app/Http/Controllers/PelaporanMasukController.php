<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelaporanMasukController extends Controller
{
    public function index()
    {
        return view('pelaporan-masuk.index', [
            'pelaporans'    => Pelaporan::whereNot('status', 'selesai')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function detail($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        return view('pelaporan-masuk.detail', [
            'pelaporan' => $pelaporan
        ]);
    }

    public function perbaiki($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->update(['status' => 'sedang diperbaiki']);

        return redirect()->back()->with('success', 'Berhasil mengubah status pelaporan menjadi Sedang Diperbaiki');
    }

    public function selesai($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->update(['status' => 'selesai']);

        return redirect()->back()->with('success', 'Berhasil mengubah status pelaporan menjadi Selesai');
    }
}
