<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembayaran</title>
</head>
<style>
    .container {
        border: 1px solid black;
    }

    .header {
        text-align: center;
    }

    .h3 {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .column {
        float: left;
        text-align: left;
        width: 33.33%;
        margin-bottom: 15px;
    }

    .detail {
        margin-top: 15px;
        padding-left: 10px;
    }

    .row {
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 30px;
    }

    table {
        width: 100%;
        text-align: center;
        padding: 20px;
    }

    table,
    th,
    td {
        border: 0 px;
    }

    tr {
        text-align: left;
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <h2>Laporan Perbaikan Selesai</h2>
        </div>

        <hr>

        <div class="detail">
            <table>
                <tr>
                    <td><b>Judul Pelaporan</b></td>
                    <td>:</td>
                    <td>{{ $pelaporan->judul }}</td>
                </tr>
                <tr>
                    <td><b>Deskripsi Pelaporan</b></td>
                    <td>:</td>
                    <td>{!! $pelaporan->deskripsi !!}</td>
                </tr>
                <tr>
                    <td><b>Nama Barang</b></td>
                    <td>:</td>
                    <td>{{ $pelaporan->barang->nm_barang }}</td>
                    <hr>
                </tr>
                <tr>
                    <td><strong>Merk</strong></td>
                    <td>:</td>
                    <td>{{ $pelaporan->barang->merk->merk }}</td>
                </tr>
                <tr>
                    <td><strong>Kategpri</strong></td>
                    <td>:</td>
                    <td>{{ $pelaporan->barang->kategori->kategori }}</td>
                </tr>
                <tr>
                    <td><strong>Lokasi</strong></td>
                    <td>:</td>
                    <td>{{ $pelaporan->barang->lokasi->lokasi }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Pelaporan</strong></td>
                    <td>:</td>
                    <td>{{ $pelaporan->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Tangal Selesai Perbaikan</strong></td>
                    <td>:</td>
                    <td>{{ $pelaporan->updated_at }}</td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>
