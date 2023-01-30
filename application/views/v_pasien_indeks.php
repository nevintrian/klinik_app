<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Indeks Pasien</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Indeks Pasien</h3>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<form action="">
									<div class="d-sm-flex align-items-center">
										<div class="form-group mr-3">
											<label>Tanggal Registrasi :</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="far fa-calendar-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="daterange" value="<?php echo isset($_GET['daterange']) ? $_GET['daterange'] : null ?>" />
											</div>
										</div>
										<button class="btn btn-info mt-3">Cari</button>
										<a href="pasien_indeks" class="btn btn-info mt-3 ml-3">Reset</a>
									</div>
								</form>
							</div>
							<hr>

							<div class="col-md-12">
								<div class="mb-3">
									<?php
									$url = basename($_SERVER['REQUEST_URI']);
									$data = explode('?', $url);
									$param = $data[1] ?? null;
									if ($param == null) {
									?>
										<a href="pasien_indeks/cetak_pdf" class="btn btn-primary">Cetak PDF</a>
										<a href="pasien_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
									<?php } else { ?>
										<a href="pasien_indeks/cetak_pdf?<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
										<a href="pasien_indeks/cetak_excel?<?= $param ?>" class="btn btn-info">Cetak Excel</a>
									<?php } ?>

								</div>
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th style="width: 10px">No</th>
												<th>Tanggal</th>
												<th>No RM</th>
												<th>No Identitas</th>
												<th>Nama</th>
												<th>JK</th>
												<th>Usia</th>
												<th>Gol Darah</th>
												<th>Pendidikan</th>
												<th>Pekerjaan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($pasien_indeks_data as $pasien) {
												$date1 = date("Y-m-d");
												$date2 = $pasien->tanggal_lahir;
												$diff = abs(strtotime($date2) - strtotime($date1));
												$years = floor($diff / (365 * 60 * 60 * 24));
											?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= date("d-m-Y", strtotime($pasien->tanggal)) ?></td>
													<td><?= $pasien->no_rm ?></td>
													<td><?= $pasien->no_identitas ?></td>
													<td><?= $pasien->nama ?></td>
													<td><?= $pasien->jk ?></td>
													<td><?= $years ?></td>
													<td><?= $pasien->gol_darah ?></td>
													<td><?= $pasien->pendidikan ?></td>
													<td><?= $pasien->pekerjaan ?></td>
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
						<!-- <div class="card-footer">
							<a href="obat_satuan/cetak_pdf" class="btn btn-info">Cetak Data Satuan Obat</a>
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
