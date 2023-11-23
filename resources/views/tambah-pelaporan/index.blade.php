@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Tambah Pelaporan</h1>
    </div>

    <div class="section-body">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        Scan Barcode Disini
                    </div>
                    <div class="card-body">
                        <div id="reader" width="600px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        Detail Barang Inventaris
                    </div>
                    <div class="card-body">
                        <form action="/tambah-pelaporan" method="POST">
                            @csrf
                            <input type="hidden" name="barang_id" id="id">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="nm_barang" id="nm_barang" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Kode Barang</label>
                                        <input type="text" class="form-control" name="kd_barang" id="result" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Kategori</label>
                                        <input type="text" class="form-control" name="kategori" id="kategori" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Merek</label>
                                        <input type="text" class="form-control" name="merk" id="merk" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" id="lokasi" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Judul Pelaporan <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="judul" id="judul">
                                    @error('judul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label>Deskripsi Pelaporan <span style="color: red">*</span></label>
                                    <textarea class="form-control" name="deskripsi" class="deskripsi"></textarea>
                                    @error('deskripsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Kirim Laporan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $.ajax({
                url: '/get-data-barang', // Ganti dengan endpoint yang sesuai di Laravel Anda
                method: 'GET',
                data: {
                    result: decodedText
                },
                success: function(response) {
                    // Handle the response, update UI with product information
                    $('#result').val(decodedText);
                    $('#id').val(response.id);
                    $('#nm_barang').val(response.nm_barang);
                    $('#kategori').val(response.kategori);
                    $('#merk').val(response.merk);
                    $('#lokasi').val(response.lokasi);
                    // Tambahan informasi lainnya sesuai kebutuhan
                },
                error: function(error) {
                    console.warn(`Code scan error = ${error}`);
                }
            });
        }

        function onScanFailure(rror) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
