<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="bootstrap panel, bootstrap admin template, dashboard template, bootstrap dashboard, dashboard design, best dashboard, html css admin template, html admin template, admin panel template, admin dashbaord template, bootstrap dashbaord template, it dashbaord, hr dashbaord, marketing dashbaord, sales dashbaord, dashboard ui, admin portal, bootstrap 4 admin template, bootstrap 4 admin"/>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" />

		<!-- Title -->
		<title>Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">

        <!--Font Awesome-->
		<link href="../assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/css/color-styles.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/css/skin-modes.css" rel="stylesheet" />

		<!-- vector-map -->
		<link href="<?php echo base_url(); ?>assets/plugins/jquery.vmap/jqvmap.min.css" rel="stylesheet">

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url(); ?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="<?php echo base_url(); ?>assets/plugins/sidemenu/css/sidemenu-closed.css" rel="stylesheet">

		<!-- morris Charts Plugin -->
		<link href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" rel="stylesheet" />

		<link href="<?php echo base_url(); ?>assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Datatable/css/buttons.bootstrap4.min.css">
    	<link href="<?php echo base_url(); ?>assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />


		<!---Font icons-->
		<link href="<?php echo base_url(); ?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<!-- Sidebar css -->
		<link href="<?php echo base_url(); ?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

	</head>

	<body class="app sidebar-mini rtl">

		<!-- Global Loader-->
		<div id="global-loader"><img src="<?php echo base_url(); ?>assets/images/svgs/loader.svg" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				<!-- Navbar-->
				<header class="app-header header">
					<!-- Navbar Right Menu-->
					<div class="container-fluid">
						<div class="d-flex">
							
							<!-- Sidebar toggle button-->
						
							
							<div class="d-flex order-lg-2 ml-auto">
								<div class="d-sm-flex d-none">
									<a href="#" class="nav-link icon full-screen-link">
										<i class="fe fe-minimize fullscreen-button" style="color: #000;"></i>
									</a>
								</div>
														
								<!--Navbar -->
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url(); ?>assets/images/users/5.jpg"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-1"><?php echo $this->session->userdata('nama_lengkap'); ?></h5>
												<small class="text-muted"><?php echo $this->session->userdata('email'); ?></small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
										<a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>"><i class="dropdown-icon fe fe-power"></i> Log Out</a>
									
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</header>
				<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-sm-none bg-white">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
							
			
						</div>
					</div>
				</div>
				<!--/.Navbar -->

				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
          <div class="app-sidebar__user">
            <div class="user-body">
              <span class="avatar avatar-lg brround text-center cover-image" data-image-src="<?php echo base_url(); ?>assets/images/users/5.jpg"></span>
            </div>
            <div class="user-info">
              <a href="#" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold">Selamat Datang</span><br>
                <span class="text-muted app-sidebar__user-name text-sm"> <?php echo $this->session->userdata("nama_lengkap"); ?></span>
              </a>
            </div>
          </div>
          <ul class="side-menu">
            <li>
              <a class="side-menu__item" href="<?php echo base_url('/') ?>"><i class="side-menu__icon si si-screen-desktop"></i><span class="side-menu__label">Dashboard</span></a>
            </li>
            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-note"></i><span class="side-menu__label">Kelola Jenis</span><i class="angle fas fa-angle-right"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="<?php echo base_url('imunisasi/Imunisasi.html'); ?>">Imunisasi</a></li>
                <li><a class="slide-item" href="<?php echo base_url('vitamin/Vitamin.html'); ?>">Vitamin</a></li>
              </ul>
            </li> 
            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon far fa-address-card"></i><span class="side-menu__label">Kelola Pasien</span><i class="angle fas fa-angle-right"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html') ?>">Pasien Ibu Hamil</a></li>
                <li><a class="slide-item" href="<?php echo base_url('pasien/Pasien-Bayi.html') ?>">Pasien Balita</a></li>
              </ul>
            </li>
            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-baby-buggy"></i><span class="side-menu__label">Kelola Imunisasi</span><i class="angle fas fa-angle-right"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="<?php echo base_url('imunisasi/Imunisasi-Ibu-Hamil.html'); ?>">Imunisasi Ibu Hamil</a></li>
                <li><a class="slide-item" href="<?php echo base_url('imunisasi/Imunisasi-bayi.html'); ?>">Imunisasi Balita</a></li>
              </ul>
            </li>
            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-drop"></i><span class="side-menu__label">Kelola Vitamin</span><i class="angle fas fa-angle-right"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="<?php echo base_url('vitamin/Vitamin-Ibu-Hamil.html'); ?>">Vitamin Ibu Hamil</a></li>
                <li><a class="slide-item" href="<?php echo base_url('vitamin/Vitamin-bayi.html') ?>">Vitamin Balita</a></li>
              </ul>
            </li> 
            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-trending-up"></i><span class="side-menu__label">Kelola Penimbangan</span><i class="angle fas fa-angle-right"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="<?php echo base_url('penimbangan/Penimbangan-Ibu-Hamil.html') ?>">Penimbangan Ibu Hamil</a></li>
                <li><a class="slide-item" href="<?php echo base_url('penimbangan/Penimbangan-bayi.html') ?>">Penimbangan Balita</a></li>
              </ul>
            </li>
            <li>
              <a class="side-menu__item" href="<?php echo base_url('Kelola-User.html') ?>"><i class="side-menu__icon si si-people"></i><span class="side-menu__label">Kelola User</span></a>
            </li>           
          </ul>
        </aside>
				<!--side-menu-->

				<div class=" app-content">

				<?= $contents ?>
				<!--footer-->
				<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 text-center">
									Copyright © 2019 <a href="#">Spaner</a>. Designed by <a href="https://spruko.com/">Spruko Technologies Pvt.Ltd</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->
				</div>
			</div>
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>

		<!-- Dashboard Core -->
		<script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="../assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="../assets/js/vendors/selectize.min.js"></script>
		<script src="../assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="../assets/js/vendors/circle-progress.min.js"></script>
		<script src="../assets/plugins/jquery.rating/jquery.rating-stars.js"></script>

		<!--Bootstrap.min js-->
		<script src="../assets/plugins/bootstrap/popper.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Side menu js -->
		<script src="../assets/plugins/sidemenu/js/sidemenu.js"></script>

		<!-- Custom scroll bar Js-->
		<script src="../assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="../assets/plugins/sidemenu/js/left-menu.js"></script>

		<!-- Input Mask Plugin -->
		<script src="../assets/plugins/jquery.mask/jquery.mask.min.js"></script>

		<!-- Progress -->
        <script src="../assets/js/vendors/circle-progress.min.js"></script>

		<!-- Chart js -->
		<script src="../assets/plugins/chart.js/chart.min.js"></script>
		<script src="../assets/plugins/chart.js/chart.extension.js"></script>

		<!-- Data tables -->
		<script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/Datatable/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatable/responsive.bootstrap4.min.js"></script>

    <!-- Data table js -->
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>

		<!--Echart Plugin -->
		<script src="../assets/plugins/echart/echart.js"></script>

		<!--Jquery.knob js-->
		<script src="../assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="../assets/plugins/othercharts/othercharts.js"></script>

		<!--Jquery.sparkline js-->
		<script src="../assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- peitychart -->
		<script src="../assets/plugins/peitychart/jquery.peity.min.js"></script>

		<!--Counters -->
		<script src="../assets/plugins/counters/counterup.min.js"></script>
		<script src="../assets/plugins/counters/waypoints.min.js"></script>

		<!-- Sidebar js -->
		<script src="../assets/plugins/sidebar/sidebar.js"></script>

		<!-- custom js -->
		<script src="../assets/js/custom.js"></script>
		<script src="../assets/js/index.js"></script>
	</body>
</html>