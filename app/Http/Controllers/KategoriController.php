<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'kategories'    => Kategori::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori'  => 'required|unique:kategoris'
        ], [
            'kategori.required'  => 'Form wajib di isi !',
            'kategori.unique'    => 'Kategori sudah digunakan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Kategori::create([
            'kategori'  => $request->kategori,
        ]);

        return redirect('/kategori')->with('success', 'Berhasil menambahkan kategori baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = kategori::find($id);
        return view('kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = kategori::find($id);
        $validator = Validator::make($request->all(), [
            'kategori'  => 'required|unique:kategoris'
        ], [
            'kategori.required'  => 'Form wajib di isi !',
            'kategori.unique'    => 'Kategori sudah digunakan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $kategori->update([
            'kategori'  => $request->kategori
        ]);

        return redirect('/kategori')->with('success', 'Berhasil mengedit data kategori !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data kategori');
    }
}
