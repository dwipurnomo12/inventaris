<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\Validator;

class TambahPelaporanController extends Controller
{
    public function index()
    {
        return view('tambah-pelaporan.index');
    }

    public function getDataBarang(Request $request)
    {
        $qrCode = $request->input('result');
        $barang = Barang::where('kd_barang', $qrCode)->first();

        $dataBarang = [
            'id'            => null,
            'nm_barang'     => null,
            'kategori_id'   => null,
            'merk_id'       => null,
            'lokasi_id'     => null
        ];

        if ($barang) {
            $dataBarang = [
                'id'        => $barang->id,
                'nm_barang' => $barang->nm_barang,
                'kategori'  => $barang->kategori->kategori,
                'merk'      => $barang->merk->merk,
                'lokasi'    => $barang->lokasi->lokasi
            ];
        }

        return response()->json($dataBarang);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'deskripsi' => 'required'
        ], [
            'judul.required'        => 'Form wajib diisi !',
            'deskripsi.required'    => 'Form wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pelaporan::create([
            'barang_id' => $request->barang_id,
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/tambah-pelaporan')->with('success', 'Berhasil menambahkan pelaporan baru');
    }
}
