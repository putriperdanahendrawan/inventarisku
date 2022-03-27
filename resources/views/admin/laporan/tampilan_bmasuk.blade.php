<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
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
            background: rgb(0, 183, 255);
        }

    </style>

    <center><br>
        <h2>Laporan Barang Masuk</h2>
        <br>
        <table border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah Masuk</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($bmasuk as $data)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td><center>{{ $data->barang->Barang()}}</center></td>
                        <td><center>{{ $data->barang->kategori_barang}}</center></td>
                        <td><center>{{ $data->tgl_msk }}</center></td>
                        <td><center>{{ $data->jumlah_msk }}</center></td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
    </center>

    <form action="{{ route('cetak.laporan') }}" method="post">
        <input type="hidden" name="tanggalAwal" value="{{ $start }}">
        <input type="hidden" name="tanggalAkhir" value="{{ $end }}">
        <input type="hidden" name="cetak" value="masuk">
        @csrf
        <br>
         <button name="submit" type="submit" class="btn btn-primary btn-block btn-lg">
                <em class="fa fa-print">&nbsp;</em> Cetak</button></form>
        </div><br>

    </form>

</body>

</html>
