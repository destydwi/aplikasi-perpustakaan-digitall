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