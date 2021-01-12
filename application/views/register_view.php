<!doctype html>
<html lang="en" dir="ltr">
  <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="bootstrap panel, bootstrap admin template, dashboard template, bootstrap dashboard, dashboard design, best dashboard, html css admin template, html admin template, admin panel template, admin dashbaord template, bootstrap dashbaord template, it dashbaord, hr dashbaord, marketing dashbaord, sales dashbaord, dashboard ui, admin portal, bootstrap 4 admin template, bootstrap 4 admin"/>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/brand/favicon.ico'); ?>" />

		<!-- Title -->
		<title>e - Posyandu</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet" />

		<!-- Dashboard css -->
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/css/color-styles.css'); ?>" rel="stylesheet" />

		<!---Font icons css-->
		<link href="<?php echo base_url('assets/plugins/iconfonts/plugin.css'); ?>" rel="stylesheet" />

		<!--Font Awesome css-->
		<link href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.css'); ?>" rel="stylesheet">

	</head>

	<body>
    <?php if($this->session->flashdata('msg')){ ?>
                <script>
                  Swal.fire({
                    icon: 'error',
                    title: "Oops...",
                    text: "<?php echo $this->session->flashdata('msg'); ?>",
                    timer: 1500,
                  });
                </script>
              <?php }
              elseif($this->session->flashdata('msg_success')){ ?>
                <script>
                  Swal.fire({
                    icon: 'success',
                    title: "Pendaftaran berhasil",
                    text: "<?php echo $this->session->flashdata('msg_success'); ?>",
                    timer: 2500,
                  });
                </script>
              <?php } ?>
		<!-- Global Loader-->
		<div id="global-loader"><img src="<?php echo base_url('assets/images/svgs/loader.svg'); ?>" alt="loader"></div>

		<div class="page">
			<div class="container">
				<div class="row">
					<div class="col  mx-auto">
						<div class="text-center mb-6">
							<!-- <img src="<?php echo base_url('assets/images/brand/logo.png'); ?>" class="" alt=""> -->
						</div>
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card-group mb-0">
									<div class="card p-4">
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Registrasi Akun:</div>
                                        <form role="form" action="<?php echo site_url('auth/register_auth') ?>" method="post">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email address</label>
													<input type="email" class="form-control" placeholder="Email" name="email" required>
												</div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Password</label>
													<input type="password" class="form-control" title="Min 8 Karakter dan Terdiri dari kombinasi" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" placeholder="Password" name="password" required>
												</div>
											</div>
                                        </div>
                                        <hr>
                                        <div class="card-title font-weight-bold">Lengkapi Data:</div>
										<div class="row">
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Nama Lengkap</label>
													<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
												</div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Nomor Induk Kependudukan / NIK</label>
													<input type="number" class="form-control" placeholder="No KTP" name="nik" required>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Username</label>
													<input type="text" class="form-control" placeholder="Username" name="username" required>
												</div>
                                            </div>
                                            <!-- <div class="col-md-6">
												<div class="form-group">
                                                    <label class="form-label">Jenis Kelamin</label>
													<select class="form-control" name="jenis_kelamin" required>
														<optgroup label="Categories">
															<option value="Laki-Laki">Laki-Laki</option>
															<option value="Perempuan">Perempuan</option>
														</optgroup>
													</select>
												</div>
											</div> -->
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Tempat Lahir</label>
													<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
												</div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Tanggal Lahir</label>
													<input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Nomor Telepon</label>
													<input type="number" class="form-control" placeholder="Nomor Telepon" name="no_hp" required>
												</div>
                                            </div>                                           
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Alamat Lengkap</label>
													<textarea class="form-control" name="alamat" rows="6" placeholder="Alamat Lengkap" required></textarea>
													<!-- <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Kota</label>
													<input type="text" class="form-control" placeholder="Kota" name="alamat_kota" required>
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label class="form-label">Kode Pos</label>
													<input type="number" class="form-control" placeholder="Kode POS" name="kode_pos" required>
												</div>
											</div>
										</div>
									
										<hr>
									<div class="text-center">
												<button type="submit" class="btn btn-primary">Sign up</button>
												<!-- <a href="<?= base_url('auth');?>" class="btn btn-secondary">Cancel</a> -->
                                            </div>
                                            <div class="text-center text-muted mt-3">
												Already have account? <a href="<?php echo base_url('auth') ?>">Sign in</a>
											</div>
                                    </div>
                                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Dashboard js -->
		<script src="<?php echo base_url('assets/js/vendors/jquery-3.2.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendors/jquery.sparkline.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendors/selectize.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendors/jquery.tablesorter.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendors/circle-progress.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/jquery.rating/jquery.rating-stars.js'); ?>"></script>

		<!--Bootstrap min js-->
		<script src="<?php echo base_url('assets/plugins/bootstrap/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

		<!-- peitychart js-->
		<script src="<?php echo base_url('assets/plugins/peitychart/jquery.peity.min.js'); ?>"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

		<!--Counters js-->
		<script src="<?php echo base_url('assets/plugins/counters/counterup.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/counters/waypoints.min.js'); ?>"></script>

		<!-- Custom js -->
		<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

	</body>
</html>
