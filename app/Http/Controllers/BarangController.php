<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang.index', [
            'barangs'   => Barang::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar'        => 'required|mimes:jpeg,jpg,png',
            'nm_barang'     => 'required',
            'deskripsi'     => 'required'
        ], [
            'gambar.required'       => 'Wajib menambahkan gambar !',
            'gambar.mimes'          => 'Format gambar yang di izinkan Jpeg, Jpg, Png',
            'nm_barang'             => 'Form wajib di isi !',
            'deskripsi'             => 'Form wajib di isi !',
        ]);

        if ($request->hasFile('gambar')) {
            $path       = 'gambar/';
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $gambar     = $file->storeAs($path, $fileName, 'public');
        } else {
            $gambar     = null;
        }

        $kd_barang = 'BRG-' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

        $barcodePath = 'barcode/' . $kd_barang . '.png';

        if (!Storage::disk('public')->exists($barcodePath)) {
            $qrCode = new QrCode($kd_barang);
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $image  = $result->getDataUri();
            Storage::disk('public')->put($barcodePath, file_get_contents($image));
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Barang::create([
            'kd_barang'         => $kd_barang,
            'nm_barang'         => $request->nm_barang,
            'deskripsi'         => $request->deskripsi,
            'tgl_penambahan'    => $request->tgl_penambahan,
            'gambar'            => $gambar
        ]);

        return redirect('/barang')->with('success', 'Berhasil menambahkan data barang baru');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
