<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('merk.index', [
            'mereks'  => Merk::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merk'  => 'required|unique:merks'
        ], [
            'merk.required'  => 'Form wajib di isi !',
            'merk.unique'    => 'Merek sudah digunakan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Merk::create([
            'merk'  => $request->merk,
        ]);

        return redirect('/merk')->with('success', 'Berhasil menambahkan merek baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merk = Merk::find($id);
        return view('merk.edit', [
            'merk'  => $merk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merk = Merk::find($id);
        $validator = Validator::make($request->all(), [
            'merk'  => 'required|unique:merks'
        ], [
            'merk.required'  => 'Form wajib di isi !',
            'merk.unique'    => 'Merek sudah digunakan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $merk->update([
            'merk'  => $request->merk,
        ]);

        return redirect('/merk')->with('success', 'Berhasil memperbarui data merek');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = Merk::find($id);
        $merk->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data merek');
    }
}
