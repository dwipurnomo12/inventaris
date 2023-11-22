@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Data Barang</h1>
        <div class="ml-auto">
            <a href="/barang/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                Produk</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $barang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/' . $barang->gambar) }}" alt="gambar barang"
                                                    style="width: 150px"; height="150px"></td>
                                            <td>{{ $barang->kd_barang }}</td>
                                            <td>{{ $barang->nm_barang }}</td>
                                            <td>
                                                <a href="/barang/{{ $barang->id }}" class="btn btn-success">Detail</a>
                                                <a href="/barang/edit/{{ $barang->id }}" class="btn btn-warning">Edit</a>
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
