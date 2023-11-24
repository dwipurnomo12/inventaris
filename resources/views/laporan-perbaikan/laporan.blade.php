<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Perbaikan</title>
    <style>
        .container {
            text-align: center;
            margin: auto;
        }

        .column {
            text-align: center;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table {
            margin: auto;
            width: 100%;
        }

        tr {
            text-align: left;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            background-color: gainsboro;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <h2>Laporan Perbaikan</h2>
            </div>
            <div class="col">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Nama Barang</th>
                            <th>Lokasi</th>
                            <th>Tgl. Pelaporan</th>
                            <th>Selesai Perbaikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelaporans as $pelaporan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pelaporan->judul }}</td>
                                <td>{{ $pelaporan->deskripsi }}</td>
                                <td><span class="badge badge-success m-2">{{ $pelaporan->status }}</span></td>
                                <td>{{ $pelaporan->barang->nm_barang }}</td>
                                <td>{{ $pelaporan->barang->lokasi->lokasi }}</td>
                                <td>{{ $pelaporan->created_at }}</td>
                                <td>{{ $pelaporan->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
