<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assetsLogin/css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <!-- <img src="<?= base_url()?>assetsLogin/images/logo.svg" alt="logo" class="logo"> -->
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title" style="width:500px">Log in Admin / Supervisor Perpustakaan</h1>
            <form action="<?=base_url('login/prosesLogin')?>" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" name="uname1" id="username" class="form-control" placeholder="Masukan Username Anda">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="pwd1" id="password" class="form-control" placeholder="Masukan Password passsword">
              </div>
              <button name="login" id="login" class="btn btn-block login-btn"style="height:60px;"> LOGIN </button>
            </form>

              <br>
                <div class="alert alert-info" role="alert">
                  <?php
                    if(isset($pesan)) {
                      echo $pesan;
                    }
                    else {
                      echo "Masukkan Username Dan Password Anda";
                    }
                  ?>
                </div>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="<?= base_url()?>assetsLogin/images/kims.png" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
