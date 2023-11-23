@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Data Merek</h1>
        <div class="ml-auto">
            <a href="/merk/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                Merek</a>
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
                                        <th>Merek</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mereks as $merek)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $merek->merk }}</td>
                                            <td>
                                                <a href="/merk/{{ $merek->id }}/edit" class="btn btn-warning">Edit</a>
                                                <form id="{{ $merek->id }}" action="/merk/{{ $merek->id }}"
                                                    method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-danger swal-confirm"
                                                        data-form="{{ $merek->id }}">Hapus
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
