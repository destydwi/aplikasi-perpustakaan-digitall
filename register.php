<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <title>Register | E- Perpustakaan </title>
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
        if(isset($_POST['register'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $no_telepon = $_POST['no_telepon'];
            $username = $_POST['username'];
            $level = $_POST['level'];
            $password = md5($_POST['password']);

           $insert = mysqli_query($koneksi, "INSERT INTO tb_user(nama, email, alamat, no_telepon, username, password, level) 
           VALUES('$nama', '$email', '$alamat', '$no_telepon', '$username', '$password', '$level')");

           if($insert){
            echo '<script> alert ("Selamat pendaftaran berhasil, Silahkan Login"); location.href="login.php";</script>';
           }else{
            echo '<script> alert ("Pendaftaran Gagal, Silahkan Ulangi");</script>';
           }
        }
        ?>
        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 10px;">
            <img src="img/icons/icon.png" height="90px" width="90px" style="display: block; margin-left: auto; margin-right: auto; margin-top: -12px; margin-bottom: 5px;">

            <form name="formLogin"  method="POST" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" required name="nama" placeholder="Nama Lengkap" id="nama">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" required name="email" placeholder="E-mail" id="email">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" required name="no_telepon" placeholder="No. Telepon" id="no_telepon">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" required name="alamat" placeholder="Alamat" id="alamat">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" required name="username" placeholder="Username" id="username">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" required name="password" placeholder="Password" id="password" >
                </div>
                <div class="form-group has-feedback">
                    <select name = "level"  required class= "form-control ">
                        <option value="" >Level</option>
                        <option value="Peminjam" >Peminjam</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-warning btn-block btn-flat" name="register" value="register"">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p style="text-align: center; font-size: 13px;">Hak Cipta &copy; 2024 E-Perpus</p>
            <br><center><p>Sudah punya akun? <a href='login.php' >Login</a></p></center>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</body>
</html>