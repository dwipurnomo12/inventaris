@extends('layouts.main')
@section('content')
    <div class="section-header">
        <h1>Pelaporan Masuk</h1>
    </div>

    <div class="section-body">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Nama Barang</th>
                                        <th>Lokasi</th>
                                        <th>Lihat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelaporans as $pelaporan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelaporan->judul }}</td>
                                            <td><span class="badge badge-warning m-2">{{ $pelaporan->status }}</span></td>
                                            <td>{{ $pelaporan->barang->nm_barang }}</td>
                                            <td>{{ $pelaporan->barang->lokasi->lokasi }}</td>
                                            <td>
                                                <a href="/pelaporan-masuk/detail/{{ $pelaporan->id }}"
                                                    class="btn btn-success">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
