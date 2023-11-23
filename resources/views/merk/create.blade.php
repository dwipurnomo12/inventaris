@extends('layouts.main')


@section('content')
    <div class="section-header">
        <h1>Tambah Data Merek</h1>
        <div class="ml-auto">
            <a href="/merk/" class="btn btn-secondary"><i class="fa fa-back"></i> Kembali</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="/merk" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>merk <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="merk">
                                @error('merk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
