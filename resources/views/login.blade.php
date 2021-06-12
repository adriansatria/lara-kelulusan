
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('') }}/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="text-center" style="margin-top: -100px;">
    <img src="{{ url('') }}/assets/dist/img/logo.png" width="120px" class="mb-3">
    <h3 class="font-weight-bold">Pelaporan Kelulusan Mahasiswa</h3>
  </div>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      {{-- <div class="card-header text-center">
        <a href="{{ url('login') }}" class="h1"><b>Pelaporan</b> Kelulusan Mahasiswa</a>
      </div> --}}
      <div class="card-body">
        {{-- <p class="login-box-msg">Please login to your account!</p> --}}

        @if(session()->has('pesan'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ session()->get('pesan') }}
        </div>
        @endif

        <form action="{{ url('/login') }}" method="post">
          @csrf
          <div class="input-group">
            <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('username')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <br>
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <br>
          <div class="row">
            <!-- /.col -->
            <div class="col-5 mx-auto">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ url('') }}/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('') }}/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
