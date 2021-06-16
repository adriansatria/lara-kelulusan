<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <link rel="icon" href="{{ url('') }}/assets/dist/img/logo.png" sizes="16x16" type="image/png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin
    <img src="http://localhost:8080/lara-kelulusan/public/assets/logo.png" class="rounded">
    </a>
    <div class="dropdown-menu">
      <a class="nav-link" href="{{ url('/logout') }}" onclick="return confirm ('Logout?')">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
    </div>
  </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background: rgb(160, 160, 160)">
 
      <div class="">
      <img src="{{ url('') }}/assets/dist/img/logo.png" class="brand-image img-circle p-2" style="max-height: 160px !important">
      </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
 
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Dashboard <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('dosen') }}">Dosen <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('mahasiswa') }}">Mahasiswa<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('f1s') }}">Report F1 <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('f2s') }}">Report F2 <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('f3s') }}">Report F3 <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('f4s') }}">Report F4 <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('evaluations') }}">Evaluasi<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ url('users') }}">User <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item"> 
    </nav>

        </li>
      </ul>
   </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
 <table style="width:800px;">
 <tr>
 <td>Prodi &nbsp &nbsp &nbsp &nbsp &nbsp
 <div class="btn-group elevation-1 m-1" style="width: 153px; border-radius: 4px">
    <button type="button" class="btn" style="background: white!important;">Pilih Prodi</button>
    <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split" style="background: white!important"  id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
  </div></td>
 <td>Tahun Akademik &nbsp
 <div class="btn-group elevation-1" style="width: 153px; border-radius: 4px">
    <button type="button" class="btn" style="background: white!important">Pilih Tahun</button>
    <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split"  style="background: white!important" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
  </div></td>
 <td><button type="button" class="btn-secondary btn" style="width: 120px">Browse</button></td>
 </tr>
 <tr>
 <td>Semester  &nbsp
 <div class="btn-group elevation-1 m-1" style="border-radius: 4px">
    <button type="button" class="btn btn" style="background: white!important">Pilih Semester</button>
    <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split" style="background: white!important" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
  </div></td>
 <td></td>
 <td><button type="button" class="btn btn-secondary" style="width: 120px">Cancel</button></td>
 </tr>
 </table>
 
</nav>

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
    <footer class="main-footer">
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
      $('#example1').DataTable( {
        "scrollX": true
      } );
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