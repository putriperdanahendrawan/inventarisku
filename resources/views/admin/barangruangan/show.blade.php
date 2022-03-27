<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The News Reporter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/font/font-awesome.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/font/font.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/responsive.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/jquery.bxslider.css')}}" media="screen" />
</head>
<body>
<div class="body_wrapper">
  <div class="center">
    <div class="header_area">
      <div class="logo floatleft"><a href="#"><img src="{{asset('frontend/images/logo.png')}}" alt="" /></a></div>
      <div class="top_menu floatleft">
        <ul>
        <li><a href="https://wa.me/6285795290778">Contact us</a></li>
        <li><a href="https://www.instagram.com/silviaa_sisill/">Follow Me</a></li>
        <li><a href="login">Login</a></li>
        </ul>
      </div>
    </div>
<html>

<div class="container mt-3">
    <div class="row">
        <div class="col md-12">
<div class="card">
    <div class="card-header bg-dark">
    </div>
    <div class="card-body">
        <center>
       <label for="">
        </label>
        <h2>{{ $berita->judul }}</h2>
        <br>
        <img src="{{ $berita->image()}}" alt="" style="width:500px; height:500px;" alt="poto">
        <br>
        <label for="">
        </label>
        <h2>{{ $berita->isi }}</h2>
        <br>
        </center>
        <!-- <label for="">
        </label>
        <h2>{{ $berita->kategori->nama_kategori }}</h2>
        <br> -->

        <label for="">
          Penulis :
        </label>
        <h2>{{ $berita->nama_penulis }}</h2>

        <label for="">
          Tanggal Publish:
        </label>
        <h2>{{ $berita->tanggal }}</h2>
        <br>

<center><a class="btn btn-danger ml-2" href="{{ route('frontend.index') }}">Kembali</a></center>
    </div>
</div>
</div>
</div>
</div>
</html>