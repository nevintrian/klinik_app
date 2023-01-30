<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Laporan Keuangan</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title mr-5">Data Laporan Keuangan</h3>
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="false">Pasien Umum</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="sosial-tab" data-toggle="tab" href="#sosial" role="tab" aria-controls="sosial" aria-selected="false">Pasien Sosial</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<form action="">
									<div class="d-sm-flex align-items-center">
										<div class="form-group mr-3">
											<label>Tahun :</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="far fa-calendar-alt"></i>
													</span>
												</div>
												<select name="tahun" class="form-control tahun" required>
													<option value="0">Semua Tahun</option>
													<option value="2019" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2019) ? 'selected' : ''; ?>>2019</option>
													<option value="2020" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2020) ? 'selected' : ''; ?>>2020</option>
													<option value="2021" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2021) ? 'selected' : ''; ?>>2021</option>
													<option value="2022" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2022) ? 'selected' : ''; ?>>2022</option>
													<option value="2023" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2023) ? 'selected' : ''; ?>>2023</option>
													<option value="2024" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2024) ? 'selected' : ''; ?>>2024</option>
													<option value="2025" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2025) ? 'selected' : ''; ?>>2025</option>
													<option value="2026" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2026) ? 'selected' : ''; ?>>2026</option>
													<option value="2027" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2027) ? 'selected' : ''; ?>>2027</option>
													<option value="2028" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2028) ? 'selected' : ''; ?>>2028</option>
													<option value="2029" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2029) ? 'selected' : ''; ?>>2029</option>
													<option value="2030" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == 2030) ? 'selected' : ''; ?>>2030</option>
												</select>
											</div>
										</div>
										<button class="btn btn-info mt-3">Cari</button>
										<a href="pasien_pembayaran_indeks" class="btn btn-info mt-3 ml-3">Reset</a>
									</div>
								</form>
							</div>
							<hr>
							<div class="col-md-12">

								<div class="card-body p-0">
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade  show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
											<div class="mb-3">
												<?php
												$url = basename($_SERVER['REQUEST_URI']);
												$data = explode('?', $url);
												$param = $data[1] ?? null;
												if ($param == null) {
												?>
													<a href="pasien_pembayaran_indeks/cetak_pdf?akses_bayar=umum&" class="btn btn-primary">Cetak PDF</a>
													<a href="pasien_pembayaran_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
												<?php } else { ?>
													<a href="pasien_pembayaran_indeks/cetak_pdf?akses_bayar=umum&<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
													<a href="pasien_pembayaran_indeks/cetak_excel?akses_bayar=umum&<?= $param ?>" class="btn btn-info">Cetak Excel</a>
												<?php } ?>
											</div>
											<table class="table table-bordered table-responsive-md" id="datatables2">
												<thead>
													<tr>
														<th>No</th>
														<th>Bulan</th>
														<th>Jumlah Pasien</th>
														<th>Total Harga</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													$total = 0;
													$jumlah = 0;
													foreach ($pasien_pembayaran_indeks_umum_data as $pasien_pembayaran) { ?>
														<tr>
															<td><?= $i ?></td>
															<?php
															$bulan = $pasien_pembayaran->bulan;
															if ($bulan == 1) {
																$bulan =
																	"Januari " . $pasien_pembayaran->year;
															} else if ($bulan == 2) {
																$bulan =
																	"Februari " . $pasien_pembayaran->year;
															} else if ($bulan == 3) {
																$bulan =
																	"Maret " . $pasien_pembayaran->year;
															} else if ($bulan == 4) {
																$bulan =
																	"April " . $pasien_pembayaran->year;
															} else if ($bulan == 5) {
																$bulan =
																	"Mei " . $pasien_pembayaran->year;
															} else if ($bulan == 6) {
																$bulan =
																	"Juni " . $pasien_pembayaran->year;
															} else if ($bulan == 7) {
																$bulan =
																	"Juli " . $pasien_pembayaran->year;
															} else if ($bulan == 8) {
																$bulan =
																	"Agustus " . $pasien_pembayaran->year;
															} else if ($bulan == 9) {
																$bulan =
																	"September " . $pasien_pembayaran->year;
															} else if ($bulan == 10) {
																$bulan =
																	"Oktober " . $pasien_pembayaran->year;
															} else if ($bulan == 11) {
																$bulan =
																	"November " . $pasien_pembayaran->year;
															} else if ($bulan == 12) {
																$bulan =
																	"Desember " . $pasien_pembayaran->year;
															}
															?>
															<td><?= $bulan ?></td>
															<td><?= $pasien_pembayaran->jumlah_pasien ?></td>
															<td>Rp<?= $pasien_pembayaran->total_harga ?></td>
														</tr>
													<?php
														$i++;
														$total += $pasien_pembayaran->total_harga;
														$jumlah += $pasien_pembayaran->jumlah_pasien;
													}
													?>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2">Total</th>
														<th><?= $jumlah ?></th>
														<th>Rp<?= $total ?></th>
													</tr>
												</tfoot>
											</table>
										</div>
										<div class="tab-pane fade" id="sosial" role="tabpanel" aria-labelledby="sosial-tab">
											<div class="mb-3">
												<?php
												$url = basename($_SERVER['REQUEST_URI']);
												$data = explode('?', $url);
												$param = $data[1] ?? null;
												if ($param == null) {
												?>
													<a href="pasien_pembayaran_indeks/cetak_pdf?akses_bayar=sosial&" class="btn btn-primary">Cetak PDF</a>
													<a href="pasien_pembayaran_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
												<?php } else { ?>
													<a href="pasien_pembayaran_indeks/cetak_pdf?akses_bayar=sosial&<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
													<a href="pasien_pembayaran_indeks/cetak_excel?akses_bayar=sosial&<?= $param ?>" class="btn btn-info">Cetak Excel</a>
												<?php } ?>
											</div>
											<table class="table table-bordered table-responsive-md" id="datatables3">
												<thead>
													<tr>
														<th>No</th>
														<th>Bulan</th>
														<th>Jumlah Pasien</th>
														<th>Total Harga</th>

													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													$total = 0;
													$jumlah = 0;
													foreach ($pasien_pembayaran_indeks_sosial_data as $pasien_pembayaran) { ?>
														<tr>
															<td><?= $i ?></td>
															<?php
															$bulan = $pasien_pembayaran->bulan;
															if ($bulan == 1) {
																$bulan =
																	"Januari " . $pasien_pembayaran->year;
															} else if ($bulan == 2) {
																$bulan =
																	"Februari " . $pasien_pembayaran->year;
															} else if ($bulan == 3) {
																$bulan =
																	"Maret " . $pasien_pembayaran->year;
															} else if ($bulan == 4) {
																$bulan =
																	"April " . $pasien_pembayaran->year;
															} else if ($bulan == 5) {
																$bulan =
																	"Mei " . $pasien_pembayaran->year;
															} else if ($bulan == 6) {
																$bulan =
																	"Juni " . $pasien_pembayaran->year;
															} else if ($bulan == 7) {
																$bulan =
																	"Juli " . $pasien_pembayaran->year;
															} else if ($bulan == 8) {
																$bulan =
																	"Agustus " . $pasien_pembayaran->year;
															} else if ($bulan == 9) {
																$bulan =
																	"September " . $pasien_pembayaran->year;
															} else if ($bulan == 10) {
																$bulan =
																	"Oktober " . $pasien_pembayaran->year;
															} else if ($bulan == 11) {
																$bulan =
																	"November " . $pasien_pembayaran->year;
															} else if ($bulan == 12) {
																$bulan =
																	"Desember " . $pasien_pembayaran->year;
															}
															?>
															<td><?= $bulan ?></td>
															<td><?= $pasien_pembayaran->jumlah_pasien ?></td>
															<td>Rp<?= $pasien_pembayaran->total_harga ?></td>
														</tr>
													<?php
														$i++;
														$total += $pasien_pembayaran->total_harga;
														$jumlah += $pasien_pembayaran->jumlah_pasien;
													}
													?>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2">Total</th>
														<th><?= $jumlah ?></th>
														<th>Rp<?= $total ?></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="card-footer">
							<a href="obat/cetak_pdf" class="btn btn-info">Cetak Data Kategori Obat</a>
						</div> -->
				</div>
			</div>
		</div>
</div>
</section>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
	$(document).ready(function() {
		$(function() {
			$('input[name="daterange"]').daterangepicker({
				opens: 'left'
			}, function(start, end, label) {
				console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			});
		});

		$('#datatables2').DataTable();
		$('#datatables3').DataTable();

	});
</script>
