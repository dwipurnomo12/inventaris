<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Kategori;
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
        return view('barang.create', [
            'kategories'    => Kategori::all(),
            'merks'         => Merk::all(),
            'lokasies'      => Lokasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar'        => 'required|mimes:jpeg,jpg,png',
            'nm_barang'     => 'required',
            'deskripsi'     => 'required',
            'kategori_id'   => 'required',
            'merk_id'       => 'required',
            'lokasi_id'     => 'required'
        ], [
            'gambar.required'       => 'Wajib menambahkan gambar !',
            'gambar.mimes'          => 'Format gambar yang di izinkan Jpeg, Jpg, Png',
            'nm_barang'             => 'Form wajib di isi !',
            'deskripsi'             => 'Form wajib di isi !',
            'kategori_id'           => 'Form wajib dipilih !',
            'merk_id'               => 'Form wajib dipilih !',
            'lokasi_id'             => 'Form wajib dipilih !',
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

        $qrCodePath = 'qrcode/' . $kd_barang . '.png';

        if (!Storage::disk('public')->exists($qrCodePath)) {
            $qrCode = new QrCode($kd_barang);
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $image  = $result->getDataUri();
            Storage::disk('public')->put($qrCodePath, file_get_contents($image));
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Barang::create([
            'kd_barang'         => $kd_barang,
            'nm_barang'         => $request->nm_barang,
            'deskripsi'         => $request->deskripsi,
            'tgl_penambahan'    => $request->tgl_penambahan,
            'gambar'            => $gambar,
            'kategori_id'       => $request->kategori_id,
            'merk_id'           => $request->merk_id,
            'lokasi_id'         => $request->lokasi_id,
        ]);

        return redirect('/barang')->with('success', 'Berhasil menambahkan data barang baru');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);
        $qrCode = new QrCode($barang->kd_barang);
        return view('barang.show', [
            'barang'    => $barang,
            'qrCode'    => $qrCode
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', [
            'barang'        => $barang,
            'kategories'    => Kategori::all(),
            'merks'         => Merk::all(),
            'lokasies'      => Lokasi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);
        $validator = Validator::make($request->all(), [
            'gambar'        => 'mimes:jpeg,jpg,png',
            'nm_barang'     => 'required',
            'deskripsi'     => 'required',
            'kategori_id'   => 'required',
            'merk_id'       => 'required',
            'lokasi_id'     => 'required'
        ], [
            'gambar.mimes'          => 'Format gambar yang di izinkan Jpeg, Jpg, Png',
            'nm_barang'             => 'Form wajib di isi !',
            'deskripsi'             => 'Form wajib di isi !',
            'kategori_id'           => 'Form wajib dipilih !',
            'merk_id'               => 'Form wajib dipilih !',
            'lokasi_id'             => 'Form wajib dipilih !',
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) {
                unlink('.' . Storage::url($barang->gambar));
            }
            $path       = 'gambar/';
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $gambar     = $file->storeAs($path, $fileName, 'public');
        } else {
            $gambar     = $barang->gambar;
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $barang->update([
            'nm_barang'         => $request->nm_barang,
            'deskripsi'         => $request->deskripsi,
            'gambar'            => $gambar,
            'kategori_id'       => $request->kategori_id,
            'merk_id'           => $request->merk_id,
            'lokasi_id'         => $request->lokasi_id,
        ]);

        return redirect('/barang')->with('success', 'Berhasil memperbarui data barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        unlink('.' . Storage::url($barang->gambar));
        $barang->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data barang');
    }
}
