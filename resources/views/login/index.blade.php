
<!DOCTYPE html>
<?php 
$site_config = DB::table('konfigurasi')->first();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login-Admin</title>
    <link href="assets/img/ubg.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- sweetalert -->
    <script src="{{ asset('assets/sweetalert/js/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sweetalert/css/sweetalert.css') }}">
</head>

<body>

    
      <div class="container">
  
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
                <div class="d-flex justify-content-center py-4">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <span class="d-none d-lg-block"><?php echo $site_config->namaweb; ?> Admin</span>
                  </a>
                </div><!-- End Logo -->
  
                <div class="card mb-3">
  
                  <div class="card-body">
  
                      
                    <div class="pt-4 pb-2">
                      <p class="text-center">Masukkan Username & Password Anda untuk login</p>
                    </div>
  
                    <form action="{{ asset('login/check') }}" method="post" accept-charset="utf-8" class="row g-3 needs-validation" novalidate>
                        {{ csrf_field() }}
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" name="username" class="form-control" id="yourUsername" required>
                          <div class="invalid-feedback">Silahkan masukkan Username Anda</div>
                        </div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Silahkan masukkan Password Anda!</div>
                      </div>
  
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                      </div>
                      <div class="col-12 mt-4">
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                      </div>
                      <div class="col-12 mt-2 text-center">
                        <a href="{{ asset('/') }}" class=" text-secondary">
                        Back to Homepage</a>
                      </div>
                      
                    </form>
  
                  </div>
                </div>
  
  
              </div>
            </div>
          </div>
  
        </section>
  
      </div>
    
     <!-- jQuery -->
     <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
     <!-- Bootstrap 4 -->
     <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <!-- AdminLTE App -->
     <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
     <script>
         @if ($message = Session::get('warning'))
             // Notifikasi
             swal("Mohon maaf", "<?php echo $message; ?>", "warning")
         @endif
 
         @if ($message = Session::get('sukses'))
             // Notifikasi
             swal("Berhasil", "<?php echo $message; ?>", "success")
         @endif
     </script>
  
  </body>
</html>
