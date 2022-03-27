@extends('adminlte::page')

@section('title','Barang')

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
                   <b>Data Barang</b>
                   <a href="{{route('barang.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Barang</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                        <thead>
                            <tr>
                                <th><i>Id</i></th>
                                <th><i>Nama Barang</i></th>
                                <th><i>Kategori Barang</i></th>
                                <th><i>Jumlah Stok</i></th>
                                <th><i>Aksi</i></th>
                            </tr>
                        </thead>
                            @php $no=1; @endphp
                            @foreach ($barang as $data)
                            <tbody>
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->Barang()}}</td>
                                 <td>{{$data->kategori_barang}}</td>
                                 <td>{{$data->jumlah_stok}}</td>



                                 <td>
                                     <form action="{{route('barang.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('barang.edit',$data->id)}}" class="btn btn-outline-warning"><span class="fa fa-edit"></span></a>
                                        <button type="submit" class="btn btn-outline-danger delete-confirm" ><span class="fa fa-trash"></span></button>
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
    $('#example').DataTable();
} );
 </script>
@endsection
