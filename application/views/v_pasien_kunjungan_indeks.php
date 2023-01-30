<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Indeks Pasien Kunjungan</h1>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Indeks Pasien Kunjungan</h3>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<form action="">
									<div class="d-sm-flex align-items-center mb-3">
										<div class="form-group mr-3">
											<label>Tanggal Daftar :</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="far fa-calendar-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="daterange" value="<?php echo isset($_GET['daterange']) ? $_GET['daterange'] : '' ?>" />
											</div>
										</div>
										<div class="form-group mr-3">
											<label>Nama Poli :</label>
											<select name="poli_id" class="form-control poli_id" required>
												<option value="0">Semua Poli</option>
												<?php foreach ($poli_data as $poli) : ?>
													<option value="<?= $poli->id; ?>" <?php echo (isset($_GET['poli_id']) && $_GET['poli_id'] == $poli->id) ? 'selected' : ''; ?>><?= $poli->nama; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group mr-3">
											<label>Akses Bayar :</label>
											<select name="akses_bayar" class="form-control akses_bayar" required>
												<option value="0" <?php echo (isset($_GET['akses_bayar']) && $_GET['akses_bayar'] == 0) ? 'selected' : ''; ?>>Semua Akses Bayar</option>
												<option value="Umum" <?php echo (isset($_GET['akses_bayar']) && $_GET['akses_bayar'] == 'Umum') ? 'selected' : ''; ?>>Umum</option>
												<option value="Sosial" <?php echo (isset($_GET['akses_bayar']) && $_GET['akses_bayar'] == 'Sosial') ? 'selected' : ''; ?>>Sosial</option>
												<option value="BPJS" <?php echo (isset($_GET['akses_bayar']) && $_GET['akses_bayar'] == 'BPJS') ? 'selected' : ''; ?>>BPJS</option>
											</select>
										</div>
										<div class="form-group mr-3">
											<label>Cara Daftar :</label>
											<select name="daftar" class="form-control daftar" required>
												<option value="0">Semua Cara Daftar</option>
												<option value="Online" <?php echo (isset($_GET['daftar']) && $_GET['daftar'] == 'Online') ? 'selected' : ''; ?>>Online</option>
												<option value="Onsite" <?php echo (isset($_GET['daftar']) && $_GET['daftar'] == 'Onsite') ? 'selected' : ''; ?>>Onsite</option>
											</select>
										</div>
										<button class="btn btn-info mt-3">Cari</button>
										<a href="pasien_kunjungan_indeks" class="btn btn-info mt-3 ml-3">Reset</a>
									</div>
								</form>
								<hr>
								<div class="mb-3">
									<?php
									$url = basename($_SERVER['REQUEST_URI']);
									$data = explode('?', $url);
									$param = $data[1] ?? null;
									if ($param == null) {
									?>
										<a href="pasien_kunjungan_indeks/cetak_pdf" class="btn btn-primary">Cetak PDF</a>
										<a href="pasien_kunjungan_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
									<?php } else { ?>
										<a href="pasien_kunjungan_indeks/cetak_pdf?<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
										<a href="pasien_kunjungan_indeks/cetak_excel?<?= $param ?>" class="btn btn-info">Cetak Excel</a>
									<?php } ?>

								</div>
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal Daftar</th>
												<th>No RM</th>
												<th>Nama</th>
												<th>JK</th>
												<th>Poli</th>
												<th>DPJP</th>
												<th>Akses Bayar</th>
												<th>Daftar</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($pasien_kunjungan_indeks_data as $pasien_kunjungan) {
											?>
												<tr>
													<td><?= $i ?></td>
													<td><?= date("d-m-Y", strtotime($pasien_kunjungan->tanggal)) ?></td>
													<td><?= $pasien_kunjungan->no_rm ?></td>
													<td><?= $pasien_kunjungan->nama ?></td>
													<td><?= $pasien_kunjungan->jk ?></td>
													<td><?= $pasien_kunjungan->poli_nama ?></td>
													<td><?= $pasien_kunjungan->dokter_nama ?></td>
													<td><?= $pasien_kunjungan->akses_bayar ?></td>
													<td><?= $pasien_kunjungan->daftar ?></td>
												</tr>
											<?php
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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
				autoUpdateInput: false,
				locale: {
					cancelLabel: 'Clear'
				},
				opens: 'left'
			}, function(start, end, label) {
				console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			});

			$('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
				$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			});

			$('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
				$(this).val('');
			});
		});
		$('#datatables').DataTable();

	});
</script>
