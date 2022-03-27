@extends('adminlte::page')

@section('title','Tambah Barang')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Barang</div>
                <div class="card-body">
                   <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="nama_barang"
                                    class="form-control
                                    @error('nama_barang') is-invalid @enderror">

                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="form-group">
                        <label for="">Kategori Barang</label>
                        <select name="kategori_barang" class="form-control @error('kategori_barang') is-invalid @enderror">
                          <option value="">-- Pilih Kategori -- </option>
                          <option value="Barang Lab">Barang Lab</option>
                          <option value="Barang Bengkel">Barang Bengkel</option>
                          @error('kategori_barang')
                          <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>
                      </div>
                            <div class="form-group">
                                <label for="">Merek</label>
                                <input type="text" name="merek"
                                    class="form-control
                                    @error('merek') is-invalid @enderror">

                                @error('merek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
