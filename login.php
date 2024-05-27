<?php 
  session_start();
  require 'function/functions.php'; 
  require 'function/loginRegister.php';

  // cek cookie
  if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
  }

  if ( isset($_SESSION["login"]) ) {
    header("Location: dashboard");
    exit;
  } elseif(isset($_COOKIE['login'])) {
    header("Location: dashboard");
    exit;
  }
  
  // login
  if( isset($_POST['login']) ) {
    login($_POST);
  }

  // register
  if (isset($_POST['sign-up'])) {
    if (register($_POST) > 0) {
      echo "
          <script>
              swal('Berhasil','Akun anda berhasil didaftarkan!','success');
          </script>
      ";
    } else {
      echo mysqli_error($koneksi);
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | CashFlow Manager</title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
    body {
      background: linear-gradient(120deg, #3498db, #8e44ad);
      font-family: "Roboto", sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      width: 400px;
      background: #fff;
    }

    .card-header {
      background: #30336b;
      color: #fff;
      text-align: center;
      padding: 40px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sub-title {
      font-size: 14px;
      color: #ccc;
      margin-top: 20px;
    }

    .input-group-text {
      background: #f5f6fa;
      border: none;
    }

    .form-control {
      border-radius: 25px;
      border: 2px solid #f5f6fa;
      padding: 12px 20px;
      color: #30336b;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #30336b;
      box-shadow: none;
    }

    .btn-primary {
      background: #30336b;
      border: none;
      border-radius: 25px;
      padding: 10px 20px;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background: #1e272e;
    }

    /* Style tambahan */
    .login-icon {
      font-size: 60px;
      color: #30336b;
    }

    .input-group-prepend .fa {
      font-size: 20px;
      color: #30336b;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-lock login-icon"></i>
        <h4 class="aktif">LOGIN</h4>
        <div class="sub-title">Login untuk gunakan CashFlow Manager</div>
      </div>

      <div class="card-body">
        <form method="POST">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="user-email" class="form-control" placeholder="Username" autocomplete="off" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" name="password-login" class="form-control" placeholder="Password" required>
          </div>

          <div class="form-group">
            <label class="mz-check">
              <input type="checkbox" name="rememberme">
              <i class="mz-blue"></i>
              Remember Me
            </label>
          </div>

          <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
