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
            'pelaporans'    => Pelaporan::where('status', 'pending')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function detail(Pelaporan $id)
    {
        $pelaporan = Pelaporan::find($id)->first();
        return view('pelaporan-masuk.detail', [
            'pelaporan' => $pelaporan
        ]);
    }
}
