<?php
	include "koneksi.php";
	if(!isset($_SESSION['tb_user'])){
		header('location:login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon2.png">

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>E-Perpustakaan</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<!-- Ini bagian sidebar yang background biru -->
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
				<img src="img/icons/icon2.png" width="25%">
          <span class="align-middle">E-Perpus</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					<li class="sidebar-header">
						Data E-Perpus
					</li>
					<?php
					if($_SESSION['tb_user']['level'] !='peminjam'){
						?>

					<li class="sidebar-item">
						<a class="sidebar-link" href="kategori.php">
              <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Kategori</span>
            </a>
					</li>

                         <li class="sidebar-item">
					<a class="sidebar-link" href="buku.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Buku</span>
            </a>

					<li class="sidebar-item">
						<a class="sidebar-link" href="laporan.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Laporan Transaksi</span>
            </a>
					</li>
					
					<?php
					}else{
						?>
					<li class="sidebar-item">
					<a class="sidebar-link" href="buku.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Buku</span>
            </a>
					</li>
                         <li class="sidebar-item">
					<a class="sidebar-link" href="favorit.php">
              <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Koleksi Favorit</span>
            </a>
					</li>
					<li class="sidebar-header">
						Fitur
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="peminjaman.php">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Peminjaman</span>
            </a>
					</li>
					<?php }
					 ?>

					 

					<li class="sidebar-item">
						<a class="sidebar-link" href="ulasan.php">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Ulasan</span>
            </a>
					</li>

					<li class="sidebar-header">
						Lain-lain
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="logout.php">
              <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
            </a>
					</li>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>
	     
	   <!-- Ini bagian atas pojok kanan (navbar profil user) -->
	   	<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/profil.jpg" class="avatar img-fluid rounded me-2" alt="Charles Hall" /> <span class="text-dark">
			 <strong class="d-inline-block mb-1">
						<?php echo $_SESSION ['tb_user']['nama'];?>
				 </strong>		
			 </span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="logout.php"><i class="align-middle me-1" data-feather="log-out"></i>Logout</a>
						</li>
					</ul>
				</div>
			</nav>
            

            <!-- Ini bagian Konten utama -->
            <main class="content">
				<div class="container-fluid p-0">
                <h1 ><b>Koleksi Buku</b></h1>
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                         <form method="post">
                              <?php 
                                   if(isset($_POST['submit'])){
                                        $id_kategori = $_POST['id_kategori'];
                                        $judul = $_POST['judul'];
                                        $foto = $_POST['foto'];
                                        $stok = $_POST['stok'];
                                        $penulis = $_POST['penulis'];
                                        $penerbit = $_POST['penerbit'];
                                        $tahun_terbit = $_POST['tahun_terbit'];
                                        $deskripsi = $_POST['deskripsi'];
                                        $query=mysqli_query($koneksi, "INSERT INTO tb_buku (id_kategori, judul, foto, stok, penulis, penerbit, tahun_terbit, deskripsi) VALUES ('$id_kategori', '$judul', '$foto', '$stok', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                                        if($query){
                                             echo '<script> alert ("Tambah data berhasil")
                                             document.location.href="buku.php"</script>
                                             </script>';
                                             
                                        }else{
                                             echo '<script> alert ("Tambah data gagal")</script>';
                                        }
                                   }
                              ?>
                              <div class="row">
                              <div class="row mb-4">
                                   <div class="col-md-3">Kategori</div>
                                   <div class="col-md-8">
                                        <select name ="id_kategori" class="form-control">
                                             <?php 
                                             $kat = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                             while($kategori = mysqli_fetch_array($kat)){
                                                  ?>
                                                  <option value="<?php echo $kategori['id_kategori'];?>"> <?php echo $kategori['kategori'];?></option>
                                                  <?php
                                             }
                                             ?>
                                        </select>
                                   </div>
                                   </div>
                                        
                               <div class="row mb-4">
                                   <div class="col-md-3">Judul</div>
                                   <div class="col-md-8"><input type="text" class="form-control" name="judul" required></div>
                              </div>
                              <div class="row mb-4">
                                   <div class="col-md-3">Cover buku</div>
                                   <div class="col-md-8"><input type="file" class="form-control" name="foto" required></div>
                              </div>
                              <div class="row mb-4">
                                   <div class="col-md-3">Stok</div>
                                   <div class="col-md-8"><input type="number" class="form-control" name="stok" required ></div>
                              </div>
                              <div class="row mb-4">
                                   <div class="col-md-3">Penulis</div>
                                   <div class="col-md-8"><input type="text" class="form-control" name="penulis" required></div>
                              </div>
                              <div class="row mb-4">
                                   <div class="col-md-3">Penerbit</div>
                                   <div class="col-md-8"><input type="text" class="form-control" name="penerbit" required></div>
                              </div>
                              <div class="row mb-4">
                                   <div class="col-md-3">Tahun terbit</div>
                                   <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" required></div>
                              </div>
                              <div class="row mb-4">
                                   <div class="col-md-3">Deskripsi</div>
                                   <div class="col-md-8"><textarea name="deskripsi" rows="5" class="form-control" required ></textarea></div>
                              </div>
                                   <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                   </div>
                                   </div>
                              </div>
                             
                         </form>
                     </div>
                     </div>
                    </div>
                </div>
                <script src="js/app.js"></script>
</main>


