<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.bagian.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.bagian.navbar')
                <!-- End of Topbar -->
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="page-header">Kategori : {{ $kategori->nama_kategori }}</h3>

                                    <div class="row">

                                        @foreach ($berita as $item)
                                        <div class="col-sm-4">
                                          <div class="card">
                                              <img src="{{ $item->image() }}" alt="">
                                            <div class="card-body">
                                              <h5 class="card-title">{{ $item->judul }}</h5>
                                              <p class="card-text">{{ Str::limit($item->isi, 20, '...') }}</p>
                                              <a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                          </div>
                                        </div>
                                        @endforeach
                                      </div>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                        </div>
                        <!-- /.row -->
                            <!-- Scroll to Top Button-->
                            <a class="scroll-to-top rounded" href="#page-top">
                                <i class="fas fa-angle-up"></i>
                            </a>

                            <!-- Logout Modal-->
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                            <button class="close" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Select "Logout" below if you are ready to end your
                                            current session.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="login.html">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bootstrap core JavaScript-->
                            <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
                            <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                            <!-- Core plugin JavaScript-->
                            <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                            <!-- Custom scripts for all pages-->
                            <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

                            <!-- Page level plugins -->
                            <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>

                            <!-- Page level custom scripts -->
                            <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
                            <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
