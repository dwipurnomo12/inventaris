@extends('layouts.main')


@section('content')
    <div class="section-header">
        <h1>Data Kategori</h1>
        <div class="ml-auto">
            <a href="/kategori/" class="btn btn-secondary"><i class="fa fa-back"></i> Kembali</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="/kategori" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kategori <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="kategori">
                                @error('kategori')
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
