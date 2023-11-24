<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CekPelaporanController extends Controller
{
    public function index()
    {
        return view('cek-pelaporan.index', [
            'pelaporans' => Pelaporan::orderBy('id', 'DESC')->get()
        ]);
    }
}
