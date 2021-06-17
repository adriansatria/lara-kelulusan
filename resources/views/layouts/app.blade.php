<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .btn-black {
      background-color: white;
      color: black;
      border: 2px solid #555555;
    }

    .btn-black:hover {
      background-color: #7e7e7e;
      color: white!important;      
    }
    .dropbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #ddd;}
    
    .dropdown:hover .dropdown-content {display: block;}
    
    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="icon" href="{{ url('') }}/assets/dist/img/logo.png" sizes="16x16" type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('') }}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('') }}/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Vendor CSS -->
		{{-- <link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/vendor/magnific-popup/magnific-popup.min.css"> --}}

		<!-- Theme CSS -->
		{{-- <link rel="stylesheet" href="{{ url('') }}/assets/plugins/css/theme.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/css/theme-elements.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/css/theme-blog.css">
		<link rel="stylesheet" href="{{ url('') }}/assets/plugins/css/theme-shop.css"> --}}

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-light">
          <nav class="navbar navbar-expand-lg navbar-light">

            <div class="">
                <img src="{{ url('') }}/assets/dist/img/logo-pelaporan-kelulusan.png" class="brand-image p-2"
                    style="max-height: 100px !important">
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link btn btn-black" href="{{ url('/') }}">Dashboard <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link btn btn-black" href="{{ url('dosen') }}">Dosen <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link btn btn-black" href="{{ url('mahasiswa') }}">Mahasiswa<span
                                class="sr-only">(current)</span></a>
                    </li>


                    <div class="btn-group dropdown">
                      <button type="button" class="btn dropbtn"
                          style="background: transparent!important">Report </button>
                      </button>
                      <div class="dropdown-content"  aria-labelledby="dropdownMenuReference">

                          <li class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Report F1</a>
                            <ul class="dropdown-submenu" data-toggle="collapse" data-target="#navbarSupportedContent" style="overflow: hidden">
                              <li><a class="dropdown-item" href="{{ url('f1s') }}">Master Data</a></li>
                              <li><a class="dropdown-item" href="{{ url('rekapkehadirandosen') }}">Rekapitulasi Kehadiran Dosen</a></li>
                            </ul>
                          </li>

                          <li class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Report F2</a>
                            <ul class="dropdown-submenu">
                              <li><a class="dropdown-item" href="{{ url('f2s') }}">Master Data</a></li>
                              <li><a class="dropdown-item" href="{{ url('rekapipmahasiswa') }}">Rekapitulasi IP Mahasiswa</a></li>
                            </ul>
                          </li>

                          <li class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Report F3</a>
                              <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="{{ url('f3s') }}">Master Data</a></li>
                                <li><a class="dropdown-item" href="{{ url('rekapstatuskelulusan') }}">Rekapitulasi Status Kelulusan</a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Report F4</a>
                            <ul class="dropdown-submenu">
                              <li><a class="dropdown-item" href="{{ url('rekapsuratperingatan') }}">Rekapitulasi Surat Peringatan</a></li>
                            </ul>
                          </li>

                      </div>
                    </div>

                    <li class="nav-item active">
                        <a class="nav-link btn btn-black" href="{{ url('evaluations') }}">Evaluasi<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link btn btn-black" href="{{ url('users') }}">User <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
              </div>
            </nav>
            <!-- Right navbar links -->
            <ul class="navbar" style="margin-left:570px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-black" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false" >Admin
                        <img src="{{ url('') }}/assets/dist/img/logo.png" style="max-height: 20px" class="rounded">
                    </a>
                    <div class="dropdown-menu p-1 m-1" >
                        <a class="dropdown-item " href="{{ url('/logout') }}" onclick="return confirm ('Logout?')">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
      
              <div class="collapse navbar-collapse-hide" id="navbarSupportedContent">
                  <table style="width:800px;">
                      <tr>
                          <td>Prodi &nbsp &nbsp &nbsp &nbsp &nbsp
                              <div class="btn-group elevation-1" style="width: 153px; ">
                                  <button type="button" class="btn" style="background: white!important;">Pilih Prodi</button>
                                  <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split"
                                      style="background: white!important" id="dropdownMenuReference" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                          </td>
                          <td>
                            <div class="row">
                              <div class="col-sm">
                                  <span>Tahun Akademik</span>
                              </div>
                              <div class="col-md">
                              <select class="form-select form-control" name="year" aria-label="Default select example">
                                  <option selected>Pilih</option>
                                  <option value="2010">2010</option>
                                  <option value="2011">2011</option>
                                  <option value="2012">2012</option>
                                  <option value="2013">2013</option>
                                  <option value="2014">2014</option>
                                  <option value="2015">2015</option>
                                  <option value="2016">2016</option>
                                  <option value="2017">2017</option>
                                  <option value="2018">2018</option>
                                  <option value="2019">2019</option>
                                  <option value="2020">2020</option>
                                  <option value="2021">2021</option>
                                  <option value="2022">2022</option>
                                  <option value="2023">2023</option>
                                  <option value="2024">2024</option>
                                  <option value="2025">2025</option>
                                  <option value="2026">2026</option>
                                  <option value="2027">2027</option>
                                  <option value="2028">2028</option>
                                  <option value="2029">2029</option>
                                  <option value="2030">2030</option>
                              </select>
                              </div>
                            </div>
                          </td>
                          <td><button type="button" class="btn-secondary btn" style="width: 120px">Browse</button></td>
                      </tr>
                      <tr>
                          <td>Semester &nbsp
                              <div class="btn-group elevation-1 m-1" style="border-radius: 4px">
                                  <button type="button" class="btn btn" style="background: white!important">Pilih
                                      Semester</button>
                                  <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split"
                                      style="background: white!important" id="dropdownMenuReference" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                          </td>
                          <td></td>
                          <td><button type="button" class="btn btn-secondary" style="width: 120px">Cancel</button></td>
                      </tr>
                  </table>
      
          </nav>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        


    

    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @yield('content')
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main">
        <div class="text-center">
            <strong>Copyright &copy; {{ date('Y') }} <a href="">AdminLTE3</a>.</strong>
            All rights reserved.
        </div>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('') }}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ url('') }}/assets/plugins/sparklines/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('') }}/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ url('') }}/assets/plugins/moment/moment.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('') }}/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ url('') }}/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('') }}/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('') }}/assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('') }}/assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('') }}/assets/dist/js/pages/dashboard.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ url('') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
            $('#example1').DataTable({
                "scrollX": true
            });
            // $('#example2').DataTable({
            //   "paging": true,
            //   "lengthChange": false,
            //   "searching": false,
            //   "ordering": true,
            //   "info": true,
            //   "autoWidth": false,
            //   "responsive": true,
            //    "scrollX": true
            // });
        });

    </script>
</body>

</html>
