<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelaporanSelesaiController extends Controller
{
    public function index()
    {
        return view('pelaporan-selesai.index', [
            'pelaporans'    => Pelaporan::where('status', 'selesai')->orderBy('updated_at', 'DESC')->get()
        ]);
    }
}
