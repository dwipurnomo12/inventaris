@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h1>Edit Data Barang</h1>
        <div class="ml-auto">
            <a href="/barang" class="btn btn-secondary"><i class="fa fa-plus"></i> Kembali</a>
        </div>
    </div>

    <div class="section-body">
        <form action="/barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Barang <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="nm_barang"
                                    value="{{ $barang->nm_barang }}">
                                @error('nm_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label>Deskripsi <span style="color: red">*</span></label>
                                <textarea class="form-control" name="deskripsi" class="deskripsi">{{ $barang->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Kategori <span style="color: red">*</span></label>
                                    <select class="form-control" name="kategori_id">
                                        @foreach ($kategories as $kategori)
                                            @if (old('kategori_id', $barang->kategori_id) == $kategori->id)
                                                <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}
                                                </option>
                                            @else
                                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label>Merek <span style="color: red">*</span></label>
                                    <select class="form-control" name="merk_id">
                                        @foreach ($merks as $merk)
                                            @if (old('merk_id', $barang->merk_id) == $merk->id)
                                                <option value="{{ $merk->id }}" selected>{{ $merk->merk }}
                                                </option>
                                            @else
                                                <option value="{{ $merk->id }}">{{ $merk->merk }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('merk_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label>Lokasi <span style="color: red">*</span></label>
                                    <select class="form-control" name="lokasi_id">
                                        @foreach ($lokasies as $lokasi)
                                            @if (old('lokasi_id', $barang->lokasi_id) == $lokasi->id)
                                                <option value="{{ $lokasi->id }}" selected>{{ $lokasi->lokasi }}
                                                </option>
                                            @else
                                                <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('lokasi_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $barang->gambar) }}"
                                    class="img-preview img-fluid mb-3 mt-2" id="preview"
                                    style="border-radius: 5px; max-height:300px; overflow:hidden;"><br>
                                <label>Gambar <span style="color: red">*</span></label>
                                <input type="file" class="form-control" name="gambar" id="gambar"
                                    onchange="previewImage()">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Image -->
    <script>
        function previewImage() {
            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('gambar');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
