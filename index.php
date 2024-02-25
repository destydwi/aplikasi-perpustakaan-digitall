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
					</li>


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
			
			<!-- Bagian konten utama dashboard dipindah ke home.php -->
			<main class="content">
				<div class="container-fluid p-0">
				<!DOCTYPE html>					
					
					<h1 class="h1 mb-3"><strong>Dashboard</strong>
                    <br>
                    <br>
					<div class="row">
						<div class="col-xl-11 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card bg-primary mb-3">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="card-title text-white">Total Kategori</h4>
													</div>
													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="folder"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3  text-white">
													<?php 
															echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_kategori"));
														?></h1>
											</div>
										</div>
										<div class="card bg-info mb-3 ">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="card-title text-white">Total User</h4>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3  text-white">
												<?php 
													echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_user"));
												?>
												</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card bg-warning mb-3">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="card-title text-white">Total Buku</h4>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="book"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3  text-white">
												<?php 
													echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_buku"));
												?>
												</h1>
											</div>
										</div>
										
										<div class="card bg-danger mb-3">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="card-title text-white">Total Ulasan</h4>
													</div>
													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="bar-chart-2"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3  text-white">
													<?php 
														echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_ulasan"));
													?>
													</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
	<script src="js/app.js"></script>
</body>

</html>
				</div>
				</main>

				<!-- Ini bagian bawah atau footer -->
				<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" ><strong>Hak Cipta &copy; 2024 E-Perpus</strong></a>
							</p>
						</div>
					</div>
				</div>
			</footer>
</body>

</html>