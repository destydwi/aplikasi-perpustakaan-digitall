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
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Laporan Perpustakaan</span>
            </a>
					</li>

					<li class="sidebar-header">
						Fitur
					</li>

					<?php
					}else{
						?>

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

					<!-- <div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<a class="text-muted" ><strong>Hak Cipta &copy; </strong></a>
						<a class="text-muted" ><p> 2024 E-Perpus</p></a>
					</div>
					</div> -->
												
						
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
							<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="log-out"></i>Logout</a>
						</li>
					</ul>
				</div>
			</nav>

			

			<!-- Ini Konten Utama -->
            <main class="content">
				<div class="container-fluid p-0">
                <h1 ><b>Kategori</b></h1>	
				
            <table class="table table-hover" border="1" width="100%" cellspacing="5">
            <tr>
			 <th class="align-middle text-center">No</th>
                <th class="align-middle text-center">Nama Kategori</th>
                <th class="align-middle text-center">Aksi</th>	
			</tr>
            <?php $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                    while($data = mysqli_fetch_array($query)){  
                ?>
            <tr>
				<td class="align-middle text-center"><?php echo $i++; ?></td>
				<td class="align-middle text-left"><?php echo $data['kategori']; ?></td>
                <td class="align-middle text-center">
                    <a href="kategori_edit.php?id=<?=$data['id_kategori']?>" class="btn btn-primary">Edit</a>
				<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori'];?>" class="btn btn-danger">hapus</a>
                </td>
			</tr>
            <?php 
              }
            ?>
            </table>
			<a href="kategori_tambah.php" class="btn btn-primary">Tambah data</a>
            </div>
        </div>
    </div>
</div>
</div>
</main>
	<script src="js/app.js"></script>
</body>
</html>

