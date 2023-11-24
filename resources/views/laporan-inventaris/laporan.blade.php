<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Inventaris</title>
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
                <h2>Laporan Inventaris Barang</h2>
            </div>
            <div class="col">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tgl. Penambahan</th>
                            <th>Lokasi</th>
                            <th>Merek</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kd_barang }}</td>
                                <td>{{ $barang->nm_barang }}</td>
                                <td>{{ \Carbon\Carbon::parse($barang->tgl_penambahan)->format('d-m-Y') }}</td>
                                <td>{{ $barang->lokasi->lokasi }}</td>
                                <td>{{ $barang->merk->merk }}</td>
                                <td>{{ $barang->lokasi->lokasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
