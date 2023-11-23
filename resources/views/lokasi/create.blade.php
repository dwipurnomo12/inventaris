@extends('layouts.main')


@section('content')
    <div class="section-header">
        <h1>Tambah Data Lokasi</h1>
        <div class="ml-auto">
            <a href="/lokasi/" class="btn btn-secondary"><i class="fa fa-back"></i> Kembali</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="/lokasi" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Lokasi <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="lokasi">
                                @error('lokasi')
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
