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
						
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card-group mb-0">
									<div class="card p-4">
										<div class="card-body">
                                            <form role="form" action="<?php echo site_url('auth/login_auth') ?>" method="post">
											<div class="form-group">
												<label class="form-label text-left" for="exampleInputEmail1">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email" name="email">
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="text-left form-label">Password</label>
												<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
											</div>
											
											<div class="text-left">
												<button type="submit" class="btn btn-primary">Login</button>
												<button type="submit" class="btn btn-secondary">Cancel</button>
                                            </div>
                                            </form>
											<div class="text-left text-muted mt-3">
												Belum Punya Akun? <a href="<?php echo base_url('auth/register') ?>">Daftar</a>
											</div>
											<div class="text-left text-muted mt-3">
												<a href="<?php echo base_url('auth/lupapassword') ?>">Lupa Password</a>
											</div>
										</div>
									</div>
									<div class="card  py-5 d-md-down-none">
										<div class="card-body align-items-center">
											<div>
												<h2 class="text-center">Selamat Datang!</h2>
												<p class="text-muted text-center">Di Aplikasi e Posyandu.</p>
												
											</div>
										</div>
									</div>
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
