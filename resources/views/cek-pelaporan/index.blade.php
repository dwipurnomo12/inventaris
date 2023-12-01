@extends('layouts.main')
@section('content')
    <div class="section-header">
        <h1>Cek Status Pelaporan</h1>
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
                                        <th>Dikirim Tanggal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelaporans as $pelaporan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelaporan->judul }}</td>
                                            <td>
                                                @if ($pelaporan->status == 'menunggu')
                                                    <span class="badge badge-warning m-2">{{ $pelaporan->status }}</span>
                                                @elseif($pelaporan->status == 'sedang diperbaiki')
                                                    <span class="badge badge-primary m-2">{{ $pelaporan->status }}</span>
                                                @elseif($pelaporan->status == 'selesai')
                                                    <span class="badge badge-success m-2">{{ $pelaporan->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $pelaporan->barang->nm_barang }}</td>
                                            <td>{{ $pelaporan->barang->lokasi->lokasi }}</td>
                                            <td>{{ $pelaporan->created_at }}</td>
                                            <td><a href="/cek-pelaporan/detail/{{ $pelaporan->id }}"
                                                    class="btn btn-primary">Detail</a></td>
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
