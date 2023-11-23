@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Data Lokasi</h1>
        <div class="ml-auto">
            <a href="/lokasi/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                Lokasi</a>
        </div>
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
                                        <th>Lokasi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasis as $lokasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lokasi->lokasi }}</td>
                                            <td>
                                                <a href="/lokasi/{{ $lokasi->id }}/edit" class="btn btn-warning">Edit</a>
                                                <form id="{{ $lokasi->id }}" action="/lokasi/{{ $lokasi->id }}"
                                                    method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-danger swal-confirm"
                                                        data-form="{{ $lokasi->id }}">Hapus
                                                    </div>
                                                </form>
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
