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
                <div class="card-header">Edit Barang</div>
                <div class="card-body">
                    <form action="{{route('barang.update', $barang->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                                <label for="">Barang</label>
                                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"
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
                        <select id="type" name="kategori_barang" class="form-control @error('kategori_barang') is-invalid @enderror">
                       <option value="">-- Pilih Kategori -- </option>
                        <option value="Barang Lab" {{ $barang->kategori_barang == "Barang Lab" ? 'selected' : '' }}>Barang Lab</option>
                        <option value="Barang Bengkel" {{ $barang->kategori_barang ==  "Barang Bengkel" ? 'selected' : '' }}>Barang Bengkel</option>
                        </select>
                       @error('kategori_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="">Merek</label>
                                <input type="text" name="merek" value="{{ $barang->merek }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary">Save</button>
                            </div>
                           @error('merek')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
