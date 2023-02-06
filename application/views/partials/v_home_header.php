<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Klinik RSK</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/jqvmap/jqvmap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/dist/css/adminlte.min.css') ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/daterangepicker/daterangepicker.css') ?>">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/summernote/summernote-bs4.min.css') ?>">
	<!-- Scss -->
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/docs/styles/main.css') ?>" />
	<!-- AOS -->
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<!-- Fonts Google -->
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

</head>
<style>
	#page-container {
		position: relative;
		min-height: 100vh;
	}

	#content-wrap {
		padding-bottom: 5rem;
		/* Footer height */
	}

	#footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 5rem;
		/* Footer height */
	}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
	<div id="page-container">
		<div id="content-wrap">
			<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark mb-1">
				<div class="container">
					<a class="navbar-brand" href="<?= base_url('/home') ?>">Klinik RSK</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link text-weight-light <?php if (strpos($_SERVER['REQUEST_URI'], "home") !== false) {
																			echo "active text-bold";
																		} ?>" href="<?= base_url('/home') ?>">Beranda</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-weight-light <?php if (strpos($_SERVER['REQUEST_URI'], "jadwal_dokter") !== false) {
																			echo "active text-bold";
																		} ?>" href="<?= base_url('/jadwal_dokter') ?>">Jadwal Dokter</a>
							</li>
							<li class="nav-item">
								<a class="nav-link font-weight-light" href="<?= base_url('/home') ?>">Alur Pendaftaran</a>
							</li>
							<?php if ($this->session->userdata('nama') != null) { ?>
								<li class="nav-item">
									<a class="nav-link font-weight-light <?php if (strpos($_SERVER['REQUEST_URI'], "dashboard") !== false) {
																				echo "active text-bold";
																			} ?>" href="<?= base_url('/dashboard') ?>"><?= $this->session->userdata('nama') ?></a>
								</li>
							<?php } else { ?>
								<li class="nav-item">
									<a class="nav-link text-weight-light <?php if (strpos($_SERVER['REQUEST_URI'], "login") !== false) {
																				echo "active text-bold";
																			} ?>" href="<?= base_url('/login') ?>">Login</a>
								</li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</nav>
