<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <title>Login | E- Perpustakaan </title> <!--<?= $row1['nama_app']; ?>-->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <!-- Icon -->
    <link rel="icon" type="icon" href="img/icons/icon2.png">
    <!-- Custom -->
    <link rel="stylesheet" href="assets/dist/css/custom.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/dist/css/toastr.min.css">
</head>

<body class="hold-transition login-page" style="font-family: 'Quicksand', sans-serif;">
    <div class="login-box">
        <div class="login-logo">
        </div>

        <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
            $cek = mysqli_num_rows($data);
            if($cek > 0){
                $_SESSION['tb_user']= mysqli_fetch_array($data);
                echo '<script> alert("Selamat Datang Login Berhasil"); location.href="index.php";</script>';           
            }else{
                echo '<script> alert("Maaf, Username/Password salah")</script>';
            }
        }
        ?>
        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 10px;">
            <img src="img/icons/icon.png" height="100px" width="100px" style="display: block; margin-left: auto; margin-right: auto; margin-top: -12px; margin-bottom: 5px;">
            <form name="formLogin"  method="POST" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" required name="username" id="username" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" required name="password" id="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" name="login" value="login" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="social-auth-links text-center">
                <p style="font-size: 11px;">- ATAU -</p>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="register.php" class="btn btn-block btn-warning btn-flat"><i class="fa fa-user-plus"></i> Register</a>
                    </div>
                </div>
            </div>

            <p style="text-align: center; font-size: 13px;">Hak Cipta &copy; 2024 E-Perpus</p>
            <center><p> by Desty Dwi S</a></p></center>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</body>
</html>