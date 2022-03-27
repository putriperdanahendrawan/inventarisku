@extends('adminlte::page')

@section('title','Data Peminjaman')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts._flash')
                   <b>Data pinjaman</b>
                    <a href="{{route('pinjam.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Peminjaman</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="bmasuk">
                            <thead>
                            <tr>
                            <th>Id</th>
                            <th>Nama Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Kategori Barang</th>
                            <th>Jumlah Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            </tr>
                            </thead>
                            @php $no=1; @endphp
                            @foreach ($peminjam as $data)
                            <tbody>
                             <tr>
                             <td>{{ $no++ }}</td>
                             <td>{{ $data->barang->Barang()}}</td>
                             <td>{{ $data->nama_peminjam}}</td>
                              <td>{{ $data->barang->kategori_barang}}</td>
                             <td>{{ $data->jumlah_pinjam }}</td>
                             <td>{{ $data->tgl_pinjam }}</td>
                             <td>{{ $data->status }}</td>

                                 <td>
                                    <form action="{{route('pinjam.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <!-- <a href="{{route('bmasuk.edit',$data->id)}}" class="btn btn-outline-info">Edit</a> -->
                                       <button type="submit"  class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus')"><span class="fa fa-trash"></button>
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


@endsection
@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
@endsection

@section('js')
 <script src="{{asset('DataTables/datatables.min.js')}}"></script>
 <script>
     $(document).ready(function() {
    $('#bmasuk').DataTable();
} );
 </script>
@endsection
