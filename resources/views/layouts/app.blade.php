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
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/logout') }}" onclick="return confirm ('Logout?')">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="url('')" class="brand-link">
        <img src="{{ url('') }}/assets/dist/img/logo.png" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Pelaporan Kelulusan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('mahasiswa') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Mahasiswa
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('dosen') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Dosen
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('evaluations') }}" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>
                  Evaluasi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Report
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

                <ul class="nested nav-treeview nav-item mx-2">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-file"></i>
                      <p>
                        Master Data
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>

                      <ul class="nav nav-treeview mx-3">

                        <li class="nav-item">
                          <a href="{{ route('f1s') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Report F1</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{ route('f2s') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Report F2</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{ route('f3s') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Report F3</p>
                          </a>
                        </li>

                      </ul>
                      </li>

                      <ul class="nav nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-file"></i>
                          <p>
                            Rekapitulasi Data
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>

                      <ul class="nav nav-treeview mx-3">

                        <li class="nav-item">
                          <a href="{{ route('f4s') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Report F4</p>
                          </a>
                        </li>
                      </ul>
                      
                    </ul>
                    </ul>
                </li>

            @if(session('level') == 'Admin')
            <li class="nav-item">
              <a href="{{ url('users') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User
                </p>
              </a>
            </li>
            @endif

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="m-0 font-weight-bold">{{ $title }}</h4>
              <h6 class="m-0">{{ $detail }}</h6>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
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
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
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
