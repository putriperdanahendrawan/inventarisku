@extends('adminlte::page')

@section('title','Tambah Peminjam')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data Peminjaman</div>
                <div class="card-body">
                   <form action="{{route('pinjam.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama barang</label>
                            <select name="id_barang" class="form-control @error('id_Barang') is-invalid @enderror" >
                                @foreach($barang as $data)
                                    <option value="{{$data->id}}">{{$data->Barang()}}</option>
                                @endforeach
                            </select>
                            @error('id_Barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                             <label for="">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror">
                             @error('nama_peminjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Pinjam</label>
                            <input type="number" name="jumlah_pinjam" class="form-control @error('jumlah_pinjam') is-invalid @enderror">
                             @error('jumlah_pinjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control @error('jumlah_msk') is-invalid @enderror">
                             @error('jumlah_msk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group">
                            <label for="">Status</label>
                                <select name="status" class="form-control">
                                <option  disabled>Pilih</option>
                                <option value="Pinjam">Pinjam</option>
                                </select>

                           </div>
                        </div>




                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
