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
            <a href="/cek-pelaporan" class="btn btn-secondary"><i class="fa fa-back"></i> Kembali</a>
        </div>
    </div>

    <div class="section-body">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        Pelaporan Inventaris
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nm_barang">Nama Barang</label>
                                    <input type="text" name="nm_barang" class="form-control"
                                        value="{{ $pelaporan->barang->nm_barang }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="kd_barang">Kode Barang</label>
                                    <input type="text" name="kd_barang" class="form-control"
                                        value="{{ $pelaporan->barang->kd_barang }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="status">Status Pelaporan</label>
                                @if ($pelaporan->status == 'menunggu')
                                    <div class="alert alert-warning">
                                        {{ $pelaporan->status }}
                                    </div>
                                @elseif($pelaporan->status == 'sedang diperbaiki')
                                    <div class="alert alert-primary">
                                        {{ $pelaporan->status }}
                                    </div>
                                @elseif($pelaporan->status == 'selesai')
                                    <div class="alert alert-success">
                                        {{ $pelaporan->status }}
                                    </div>
                                @endif
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
                        Analisis Perbaikan & Feedback
                    </div>
                    <div class="card-body">
                        @if ($feedback && $feedback->analisis_perbaikan)
                            <label for="analisis_perbaikan">From Admin</label><br>
                            <div class="alert alert-light">
                                {{ $feedback->analisis_perbaikan }}
                            </div>
                        @else
                        @endif

                        @if ($feedbackReply && $feedbackReply->feedback_replies && $feedbackReply->feedback_replies)
                            <label for="feedback_replies">From User</label><br>
                            <div class="alert alert-primary">
                                {{ $feedbackReply->feedback_replies }}
                            </div>
                        @endif

                        <hr>

                        <form action="/cek-pelaporan/detail/{{ $pelaporan->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="feedback_id" value="{{ $feedback ? $feedback->id : null }}">
                            @if ($feedbackReply && $feedbackReply->feedback_replies && $feedbackReply->feedback_replies)
                            @else
                                <div class="mb-3">
                                    <label for="feedback_replies">Berikan Feedback</label>
                                    <textarea class="form-control" name="feedback_replies" id="feedback_replies" cols="30" rows="10"></textarea>
                                    @error('feedback_replies')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success my-3 float-right">Kirim Balasan</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for SweetAlert -->
    <script>
        function confirmPerbaiki(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin memngubah status pelaporan menjadi Sedang Diperbaiki?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Perbaiki!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('perbaikiForm' + id).submit();
                }
            });
        }

        function confirmSelesai(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin pelaporan ini sudah selesai?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Selesai!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('selesaiForm' + id).submit();
                }
            });
        }
    </script>
@endsection
