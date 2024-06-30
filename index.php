<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KrediKing Apps|</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="KrediKing/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="KrediKing/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="KrediKing/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="KrediKing/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="KrediKing/index2.html" class="h1"><b>KrediKing</b> App</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="conf/authentication.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="google-login.php" class="btn btn-block btn-danger">
          <i class="fab fa-google mr-2"></i> Login with Google
        </a>
      </div>

    </div>
  </div>
</div>

<!-- jQuery -->
<script src="KrediKing/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="KrediKing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="KrediKing/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="KrediKing/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
  echo "
  <script>
  Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: 'Incorrect username or password.',
      timer: 3000,
      showConfirmButton: false
  });
  </script>";
}
?>
</html>
