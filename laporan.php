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
                <h1 ><b>Laporan Transaksi Buku</b></h1>	
				
            <table class="table table-hover" border="1" width="100%" cellspacing="5">
            <tr>
			 <th class="align-middle text-center"  style="width:5%">No</th>
                <th class="align-middle text-center" style="width:11%" >User</th>
                <th class="align-middle text-center" style="width:30%">Buku</th>
                <th class="align-middle text-center"  style="width:11%">Tanggal Pinjam</th>
                <th class="align-middle text-center"  style="width:11%">Tanggal Kembali</th>
                <th class="align-middle text-center"  style="width:8%">Status Peminjaman</th>
				<th class="align-middle text-center"  style="width:18%">Aksi</th>
				
			</tr>
			<?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman LEFT JOIN tb_user ON tb_user.id_user = tb_peminjaman.id_user LEFT JOIN tb_buku ON tb_buku.id_buku = tb_peminjaman.id_buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="align-middle text-center"><?php echo $i++; ?></td>
                                <td class="align-middle text-left"><?php echo $data['nama']; ?></td>
                                <td class="align-middle text-left"><?php echo $data['judul']; ?></td>
                                <td class="align-middle text-left"><?php echo $data['tanggal_peminjaman']; ?></td>
                                <td class="align-middle text-left"><?php echo $data['tanggal_pengembalian']; ?></td>
                                <td class="align-middle text-left"><?php echo $data['status']; ?></td>
								<td class="align-middle text-center">
                                   <?php 
                                        if($data ['status'] == 'dipinjam'){
                                   ?>
                                    <a href="peminjaman_edit.php?id=<?= $data['id_peminjaman'] ?>" class="btn btn-primary">Edit</a> 
                                    <?php
                                        }
                                    ?>
									<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="peminjaman_hapus.php?id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
            </table>
		  <a href="cetak.php" target="_blank" class="btn btn-primary" ><i class="align-middle" data-feather="printer"></i> Cetak laporan</a>
            </div>
        </div>
    </div>
</div>
</div>
</main>
	<script src="js/app.js"></script>
</body>
</html>

