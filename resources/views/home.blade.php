@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        @if (auth()->user()->role->role == 'admin')
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            Total Barang Inventaris
                        </div>
                        <div class="card-body">
                            <p>{{ $totalInventaris }} Inventaris</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-danger">
                        <div class="card-header">
                            Total Lokasi Inventaris
                        </div>
                        <div class="card-body">
                            <p>{{ $totalLokasi }} Lokasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            Perbaikan Menunggu
                        </div>
                        <div class="card-body">
                            <p>{{ $pelaporanPending }} Pelaporan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-success">
                        <div class="card-header">
                            Perbaikan Selesai
                        </div>
                        <div class="card-body">
                            <p>{{ $pelaporanSelesai }} Pelaporan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            Pelaporan Menunggu
                            <div class="ml-auto">
                                <a href="/pelaporan-masuk" class="btn btn-warning"><i class="fa fa-back"></i> Pelaporan
                                    Masuk</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendings as $pelaporan)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pelaporan->judul }}</td>
                                            <td>{{ $pelaporan->barang->nm_barang }}</td>
                                            <td> <span class="badge badge-primary m-2">{{ $pelaporan->status }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            Pelaporan Sedang Dikerjakan
                            <div class="ml-auto">
                                <a href="/pelaporan-masuk" class="btn btn-primary"><i class="fa fa-back"></i> Pelaporan
                                    Masuk</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dikerjakans as $pelaporan)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pelaporan->judul }}</td>
                                            <td>{{ $pelaporan->barang->nm_barang }}</td>
                                            <td> <span class="badge badge-warning m-2">{{ $pelaporan->status }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else<div class="row">
                <div class="col-lg-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            Total Barang Inventaris
                        </div>
                        <div class="card-body">
                            <p>{{ $totalInventaris }} Inventaris</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-danger">
                        <div class="card-header">
                            Total Lokasi Inventaris
                        </div>
                        <div class="card-body">
                            <p>{{ $totalLokasi }} Lokasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            Perbaikan Menunggu
                        </div>
                        <div class="card-body">
                            <p>{{ $pelaporanPending }} Pelaporan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-success">
                        <div class="card-header">
                            Perbaikan Selesai
                        </div>
                        <div class="card-body">
                            <p>{{ $pelaporanSelesai }} Pelaporan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            Status Pelaporan Inventaris
                            <div class="ml-auto">
                                <a href="/cek-pelaporan" class="btn btn-primary"><i class="fa fa-back"></i> Cek
                                    Pelaporan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cekPelaporans as $pelaporan)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pelaporan->judul }}</td>
                                            <td>{{ $pelaporan->barang->nm_barang }}</td>
                                            <td>
                                                @if ($pelaporan->status == 'menunggu')
                                                    <span class="badge badge-warning m-2">{{ $pelaporan->status }}</span>
                                                @elseif($pelaporan->status == 'sedang diperbaiki')
                                                    <span class="badge badge-primary m-2">{{ $pelaporan->status }}</span>
                                                @elseif($pelaporan->status == 'selesai')
                                                    <span class="badge badge-success m-2">{{ $pelaporan->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
@endsection
