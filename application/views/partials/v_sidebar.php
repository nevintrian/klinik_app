<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Klinik RSK</title>
	<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/plugins/daterangepicker/daterangepicker.css') ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="<?php echo base_url('templates/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('templates/dist/css/adminlte.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css'); ?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<style>
		@media screen and (max-width: 900px) {

			.posyandu-header {
				overflow-x: scroll;
				display: block;
				overflow-x: auto;
				white-space: nowrap;
				text-align: center;
			}
		}

		fieldset {
			display: none;
		}

		fieldset.show {
			display: block;
		}



		.tabs {
			margin: 2px 5px 0px 5px;
			padding-bottom: 10px;
			cursor: pointer;
		}

		.tabs:hover,
		.tabs.active {
			border-bottom: 1px solid #2196F3;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url() ?>login/logout" type="submit" class="btn btn-danger" onclick="javasciprt: return confirm('Apa Anda Yakin?')">Logout </a>
				</li>
			</ul>
		</nav>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="<?php echo base_url("home"); ?>" class="brand-link">
				<img src="<?php echo base_url('templates/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Klink RSK</span>
			</a>

			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url('templates/dist/img/user.png'); ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="dashboard" class="d-block"><?= $this->session->userdata('nama') ?></a>
					</div>
				</div>

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?php echo base_url("dashboard"); ?>" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>


						<?php
						if ($this->session->userdata('jabatan') == null) {
							redirect('login');
						}
						?>


						<?php
						if ($this->session->userdata('jabatan') == 'Apoteker') {
						?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Data Obat
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?php echo base_url("obat_kategori"); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Kategori Obat</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url("obat_satuan"); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Satuan Obat</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url("obat"); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Obat</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url("pasien_resep"); ?>" class="nav-link">
									<i class="nav-icon fas fa-receipt"></i>
									<p>
										Peresepan
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url("obat_indeks"); ?>" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Indeks Obat
									</p>
								</a>
							</li>
						<?php
						}
						?>


						<?php
						if ($this->session->userdata('jabatan') == 'Petugas Pendaftaran' || $this->session->userdata('jabatan') == 'Kepala Klinik') {
						?>

							<?php
							if ($this->session->userdata('jabatan') == 'Petugas Pendaftaran') {
							?>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-table"></i>
										<p>
											Data Master
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo base_url("pasien"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Data Pasien</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("dokter"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Data Dokter</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("user"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Data User</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("diagnosis"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Data Diagnosis</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("tindakan"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Tarif Tindakan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("obat"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Obat</p>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-clipboard-list"></i>
										<p>
											Pelayanan
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo base_url("poli"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Info Dokter</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_daftar"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Daftar Pasien</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_kunjungan"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Daftar Kunjungan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_antrian"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>List Antrian Kunjungan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_pembayaran"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Billing Pembayaran</p>
											</a>
										</li>
									</ul>
								</li>
							<?php
							}
							?>



							<?php
							if ($this->session->userdata('jabatan') == 'Petugas Pendaftaran' || $this->session->userdata('jabatan') == 'Kepala Klinik') {
							?>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-file"></i>
										<p>
											Pelaporan
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_indeks"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Laporan Pasien</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_kunjungan_indeks"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Laporan Kunjungan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("diagnosis_besar"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>10 Besar Penyakit</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("obat_indeks"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Indeks Obat</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("dokter_indeks"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Indeks Dokter</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url("pasien_pembayaran_indeks"); ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Laporan Keuangan</p>
											</a>
										</li>
									</ul>
								</li>
							<?php
							}
							?>
						<?php
						}
						?>


						<?php
						if ($this->session->userdata('jabatan') == 'Dokter') {
						?>
							<li class="nav-item">
								<a href="<?php echo base_url("pasien_pemeriksaan"); ?>" class="nav-link">
									<i class="nav-icon fas fa-stethoscope"></i>
									<p>
										Input Pemeriksaan
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url("dokter_indeks"); ?>" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Indeks Dokter
									</p>
								</a>
							</li>
						<?php
						}
						?>
					</ul>
				</nav>
			</div>
		</aside>
