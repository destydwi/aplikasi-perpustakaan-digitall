<?php 
include "koneksi.php";
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
	<style>
        .card-img-top {
            height: 200px; /* Sesuaikan dengan tinggi yang diinginkan */
            object-fit: contain;
            width: 100%;
        }
    </style>
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

			

			<!-- Ini Konten Utama -->
            <main class="content">
                <div class="container-fluid p-0">
                <h1 ><b>Koleksi Favorit</b></h1> 
                
              <div class="row">
                <div class="col-xl-0 col-md-0 mb-xl-0 mb-0">
                  <div class="">
                    <div class="position-relative">
                    </div>
                    <div class="card-body px- pb-0">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="avatar-group mt-2"> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
				<?php
                        // Query untuk mengambil buku yang difavoritkan oleh pengguna
                        $id_user = $_SESSION['tb_user']['id_user'];
						$query = "SELECT b.judul,b.id_buku, b.penulis, b.penerbit, b.tahun_terbit, b.deskripsi, b.foto,b.stok, f.id_koleksi
						FROM tb_buku b
						INNER JOIN tb_koleksi f ON b.id_buku = f.id_buku
						WHERE f.id_user = $id_user";
					
						$result = mysqli_query($koneksi, $query);
						while($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="img/cover/<?=$data['foto']?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$data['judul']?></h5>
                                    <p class="card-text">Penulis: <?=substr($data['penulis'],0,150)?></p>
                                    <p class="card-text">Penerbit: <?=substr($data['penerbit'],0,150)?></p>
                                    <p class="card-text">Tahun Terbit: <?=substr($data['tahun_terbit'],0,150)?></p>
                                    <p class="card-text">Stok: <?=substr($data['stok'],0,150)?></p>
                                    <p class="card-text"><?=substr($data['deskripsi'],0,150)?></p>
							 <a href="peminjaman_tambah.php?id_buku=<?=$data['id_buku']?>" class="btn btn-dark">Pinjam Buku</a>
							 <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="favorit_hapus.php?id_koleksi=<?php echo $data['id_koleksi']; ?>" class="btn btn-danger">Hapus</a>

                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
        </div>
    </div>
</div>
</div>
</main>
	<script src="js/app.js"></script>
</body>
</html>