@extends('layouts.main')
@section('content')
    <div class="section-header">
        <h1>History Pelaporan Selesai</h1>
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
                                        <th>Tgl. Pelaporan</th>
                                        <th>Selesai Perbaikan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelaporans as $pelaporan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelaporan->judul }}</td>
                                            <td><span class="badge badge-success m-2">{{ $pelaporan->status }}</span></td>
                                            <td>{{ $pelaporan->barang->nm_barang }}</td>
                                            <td>{{ $pelaporan->barang->lokasi->lokasi }}</td>
                                            <td>{{ $pelaporan->created_at }}</td>
                                            <td>{{ $pelaporan->updated_at }}</td>
                                            <td>
                                                <a href="/pelaporan-selesai/cetak-laporan/{{ $pelaporan->id }}"
                                                    class="btn btn-primary">Print</a>
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


    <!-- Datatables Jquery -->
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        })
    </script>
@endsection
