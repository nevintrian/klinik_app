<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">

		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Dashboard</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<?php
								if ($this->session->userdata('jabatan') == 'Dokter') {
								?>
									<div class="col-lg-3 col-6">
										<div class="small-box bg-info">
											<div class="inner">
												<h3><?= $total_pasien ?><sup style="font-size: 20px"></sup></h3>
												<p>Data Pasien Yang Dirawat</p>
											</div>
											<div class="icon">
												<i class="ion ion-stats-bars"></i>
											</div>
											<a href="pasien_pemeriksaan" class="small-box-footer">
												Info lebih lanjut <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
								<?php
								}
								?>
								<?php
								if ($this->session->userdata('jabatan') == 'Apoteker') {
								?>
									<div class="col-lg-3 col-6">
										<div class="small-box bg-info">
											<div class="inner">
												<h3><?= $obat ?><sup style="font-size: 20px"></sup></h3>
												<p>Data Obat</p>
											</div>
											<div class="icon">
												<i class="ion ion-stats-bars"></i>
											</div>
											<a href="obat" class="small-box-footer">
												Info lebih lanjut <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-6">
										<div class="small-box bg-info">
											<div class="inner">
												<h3><?= $pasien_resep_menunggu ?><sup style="font-size: 20px"></sup></h3>
												<p>Data Pasien Menunggu</p>
											</div>
											<div class="icon">
												<i class="ion ion-stats-bars"></i>
											</div>
											<a href="pasien_resep" class="small-box-footer">
												Info lebih lanjut <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-6">
										<div class="small-box bg-info">
											<div class="inner">
												<h3><?= $pasien_resep_selesai ?><sup style="font-size: 20px"></sup></h3>
												<p>Data Pasien Selesai</p>
											</div>
											<div class="icon">
												<i class="ion ion-stats-bars"></i>
											</div>
											<a href="pasien_resep" class="small-box-footer">
												Info lebih lanjut <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
								<?php } ?>

								<?php
								if ($this->session->userdata('jabatan') == 'Petugas Pendaftaran' || $this->session->userdata('jabatan') == 'Kepala Klinik') {
								?>

									<div class="col-lg-3 col-6">
										<div class="small-box bg-info">
											<div class="inner">
												<h3><?= $pasien ?></h3>
												<p>Jumlah Seluruh Pasien</p>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-6">
										<div class="small-box bg-success">
											<div class="inner">
												<h3><?= ($pasien_this_month / $pasien) * 100 ?>%</h3>
												<p>Pasien Bulan Ini</p>
											</div>
										</div>
									</div>
									<?php if ($this->session->userdata('jabatan') == 'Petugas Pendaftaran') { ?>
										<div class="col-lg-3 col-6">
											<div class="small-box bg-warning">
												<div class="inner">
													<h3><?= $pasien_today ?></h3>
													<p>Pasien Hari Ini</p>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-6">
											<div class="small-box bg-danger">
												<div class="inner">
													<h3><?= $pasien_antri ?></h3>
													<p>Pasien Mengantri</p>
												</div>
											</div>
										</div>
									<?php } ?>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header border-0">
											<h3 class="card-title">10 Besar Penyakit</h3>
										</div>
										<div class="card-body table-responsive p-0">
											<table class="table table-striped table-valign-middle">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Penyakit</th>
														<th>Jumlah</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($diagnosis_data as $diagnosis) {
													?>
														<tr>
															<td><?= $no ?></td>
															<td><?= $diagnosis->nama ?></td>
															<td><?= $diagnosis->jumlah ?></td>
														</tr>
													<?php
														$no++;
													}
													?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Pasien Berdasar Akses Bayar</h3>
										</div>
										<div class="card-body">
											<div id="chartContainer" style="margin-bottom: 400px;"></div>
											<?php
											$dataPoints = array(
												array("y" => $pasien_bpjs, "label" => "BPJS"),
												array("y" => $pasien_umum, "label" => "Umum"),
												array("y" => $pasien_sosial, "label" => "Sosial"),
											);
											?>
										</div>
									</div>
								</div>
							</div>

						<?php } ?>




						</div>
					</div>
					<div class="card-footer">
					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>
<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
	$(function() {
		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "theme2",
			animationEnabled: true,
			data: [{
				type: "pie",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	});
</script>
