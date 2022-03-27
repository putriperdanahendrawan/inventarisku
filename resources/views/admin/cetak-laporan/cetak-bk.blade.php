<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang Keluar</title>
</head>
<body>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 5px;
        }
        th {
            padding: 5px;
            background: rgb(0, 234, 255);
        }
    </style>

    <center><img src="vendor/adminlte/dist/img/smk.png" align="left" style="width:100px;height:75px;">
   <h1>Laporan Barang Keluar</h1></center>
    <hr>
    <br>
    <table border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Tanggal Keluar</th>
                <th>Jumlah Keluar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($bk as $data)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                             <td><center>{{ $data->barang->Barang()}}</center></td>
                              <td><center>{{ $data->barang->kategori_barang}}</center></td>
                             <td><center>{{ $data->tgl_klr }}</center></td>
                             <td><center>{{ $data->jumlah_klr }}</center></td>
                             <td><center>{{ $data->alasan }}</center></td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    </center>

</body>
</html>
