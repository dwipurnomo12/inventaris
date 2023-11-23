@extends('layouts.main')
<style>
    td {
        font-size: 16px;
        padding-bottom: 5px;
    }
</style>

@section('content')
    <div class="section-header">
        <h1>Detail Pelaporan</h1>
        <div class="ml-auto">
            <a href="/pelaporan-masuk" class="btn btn-secondary"><i class="fa fa-back"></i> Kembali</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        Pelaporan Inventaris
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nm_barang">Nama Barang</label>
                                    <input type="text" name="nm_barang" class="form-control"
                                        value="{{ $pelaporan->barang->nm_barang }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kd_barang">Kode Barang</label>
                                    <input type="text" name="kd_barang" class="form-control"
                                        value="{{ $pelaporan->barang->kd_barang }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="kategori">Kategori Barang</label>
                                    <input type="text" name="kategori" class="form-control"
                                        value="{{ $pelaporan->barang->kategori->kategori }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="merk">Merek Barang</label>
                                    <input type="text" name="merk" class="form-control"
                                        value="{{ $pelaporan->barang->merk->merk }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Barang</label>
                                    <input type="text" name="lokasi" class="form-control"
                                        value="{{ $pelaporan->barang->lokasi->lokasi }}" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="judul">Judul Pelaporan</label>
                            <input type="text" name="judul" class="form-control" value="{{ $pelaporan->judul }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Pelaporan</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" disabled>{{ $pelaporan->deskripsi }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        Aksi
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>
                            Tolak</a>
                        <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i>
                            Selesai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
