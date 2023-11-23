@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Data Kategori</h1>
        <div class="ml-auto">
            <a href="/kategori/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                Kategori</a>
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
                                        <th>Kategori</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategories as $kategori)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kategori->kategori }}</td>
                                            <td>
                                                <a href="/kategori/{{ $kategori->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                                <form id="{{ $kategori->id }}" action="/kategori/{{ $kategori->id }}"
                                                    method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-danger swal-confirm"
                                                        data-form="{{ $kategori->id }}">Hapus
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
