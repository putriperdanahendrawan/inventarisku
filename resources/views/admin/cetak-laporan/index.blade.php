@extends('adminlte::page')

@section('title','cetak-laporan')

@section('content_header')

<br>
@endsection

@section('content')
    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><center>Cetak Laporan</center></h1>
			</div>
		</div><!--/.row--><br>
            <form action="/admin/cetak-laporan" method="post">
                @csrf
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cetak" id="cetak1" value="masuk" checked>
                <label class="form-check-label" for="cetak1">
                  <h4> Barang Masuk</h4>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="cetak" id="cetak2" value="keluar">
                <label class="form-check-label" for="cetak2">
                  <h4> Barang Keluar</h4>
                </label>
              </div><br>
                <div class="form-group">
                <label for="">Kategori Barang</label>
                <select name="kategori_barang" class="form-control @error('kategori_barang') is-invalid @enderror">
                <option value="">-- Pilih Kategori -- </option>
                <option value="Barang Lab" id="Barang Lab">Barang Lab</option>
                <option value="Barang Bengkel" id="Barang Bengkel">Barang Bengkel</option>
                 @error('kategori_barang')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </select>
                </div>
              <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" name=tanggal_awal class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" name=tanggal_akhir class="form-control">
                            </div>
                        </div>
                    </div>

            <button name="submit" type="submit" class="btn btn-primary btn-block btn-lg">
                <em class="fa fa-print">&nbsp;</em> Cetak</button></form>
        </div><br>

    </div>
@endsection
