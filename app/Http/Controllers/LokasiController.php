<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lokasi.index', [
            'lokasis'   => Lokasi::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lokasi'  => 'required|unique:lokasis'
        ], [
            'lokasi.required'  => 'Form wajib di isi !',
            'lokasi.unique'    => 'lokasi sudah digunakan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Lokasi::create([
            'lokasi'  => $request->lokasi,
        ]);

        return redirect('/lokasi')->with('success', 'Berhasil menambahkan lokasi baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lokasi = Lokasi::find($id);
        return view('lokasi.edit', [
            'lokasi'   => $lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lokasi     = Lokasi::find($id);
        $validator  = Validator::make($request->all(), [
            'lokasi'  => 'required|unique:lokasis'
        ], [
            'lokasi.required'  => 'Form wajib di isi !',
            'lokasi.unique'    => 'lokasi sudah digunakan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $lokasi->update([
            'lokasi'  => $request->lokasi,
        ]);

        return redirect('/lokasi')->with('success', 'Berhasil memperbarui data lokasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();

        return redirect('/lokasi')->with('success', 'Berhasil menghapus data lokasi');
    }
}
