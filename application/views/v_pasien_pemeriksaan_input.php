<?php
$url = basename($_SERVER['REQUEST_URI']);
$idstr = explode("?", $url)[1];
$id = explode("=", $idstr)[1];

?>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Input Data Pemeriksaan</h1>
						</div><!-- /.col -->
						<div class="col-sm-6 text-right">
							<a class="btn btn-info" href="">Cetak Resume Medis</a>
							<a class="btn btn-primary" href="pasien_pemeriksaan_input/save_all?id=<?= $id ?>">Selesai Pemeriksaan</a>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-header">
									<div class="">
										<h3 class="card-title">Input Hasil Pemeriksaan</h3>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<form action="pasien_pemeriksaan_input/save_pemeriksaan" method="post">
										<input type="hidden" name="pasien_kunjungan_id" value="<?= $id ?>">
										<div class="form-group row">
											<label for="suhu" class="col-md-3 col-form-label col-form-label-sm text-right">Suhu</label>
											<div class="col-md-7 pl-0">
												<input type="text" class="form-control " id="suhu" name="suhu" placeholder="Suhu" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="td" class="col-md-3 col-form-label col-form-label-sm text-right">TD</label>
											<div class="col-md-7 pl-0">
												<input type="text" class="form-control " id="td" name="td" placeholder="TD" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="ra" class="col-md-3 col-form-label col-form-label-sm text-right">RA</label>
											<div class="col-md-7 pl-0">
												<input type="text" class="form-control " id="ra" name="ra" placeholder="RA" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="rpd" class="col-md-3 col-form-label col-form-label-sm text-right">RPD</label>
											<div class="col-md-7 pl-0">
												<input type="text" class="form-control " id="rpd" name="rpd" placeholder="RPD" required>
											</div>
										</div>
										<div class="form-group row">
											<?php
											function limit_text($text, $limit)
											{
												if (str_word_count($text, 0) > $limit) {
													$words = str_word_count($text, 2);
													$pos   = array_keys($words);
													$text  = substr($text, 0, $pos[$limit]) . '...';
												}
												return $text;
											}
											?>
											<label class="col-md-3 col-form-label col-form-label-sm text-right">Pilih Diagnosis</label>
											<div class="col-md-7 pl-0">
												<select class="bootstrap-select strings" name="diagnosis[]" data-width="100%" data-live-search="true" data-actions-box="true" multiple required>
													<?php foreach ($diagnosis_data as $diagnosis_data) : ?>
														<option value="<?= $diagnosis_data->id; ?>"><?= substr($diagnosis_data->nama, 0, 50) . ((strlen($diagnosis_data->nama) > 50) ? '...' : ''); ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label col-form-label-sm text-right">Pilih Tindakan</label>
											<div class="col-md-7 pl-0">
												<select class="bootstrap-select strings" name="tindakan[]" data-width="100%" data-live-search="true" data-actions-box="true" multiple required>
													<?php foreach ($tindakan_data as $tindakan_data) : ?>
														<option value="<?= $tindakan_data->id; ?>"><?= $tindakan_data->nama; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="keterangan_pemeriksaan" class="col-md-3 col-form-label col-form-label-sm text-right">Keterangan</label>
											<div class="col-md-7 pl-0">
												<textarea class="form-control" id="keterangan_pemeriksaan" name="keterangan_pemeriksaan" rows="2" placeholder="Keterangan Pemeriksaan" required></textarea>
											</div>
										</div>
										<div class="text-right mr-5">
											<button class="btn btn-primary" type="submit">Simpan Hasil Pemeriksaan</button>
										</div>
									</form>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card">
								<div class="card-header">
									<div class="">
										<h3 class="card-title">Input Resep / Terapi Obat</h3>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<form action="pasien_pemeriksaan_input/save_resep" method="post">
										<div class="form-group row">
											<label class="col-md-3 col-form-label col-form-label-sm text-right">Pilih Obat</label>
											<div class="col-md-7 pl-0">
												<select name="obat_id" class="form-control obat_id" required>
													<option value="">-- Pilih Obat --</option>
													<?php foreach ($obat_data as $obat) : ?>
														<option value="<?= $obat->id; ?>"><?= $obat->nama; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="jumlah" class="col-md-3 col-form-label col-form-label-sm text-right">Jumlah</label>
											<div class="col-md-7 pl-0">
												<input type="number" class="form-control " id="jumlah" name="jumlah" placeholder="" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="keterangan_obat" class="col-md-3 col-form-label col-form-label-sm text-right">Keterangan</label>
											<div class="col-md-7 pl-0">
												<textarea class="form-control" id="keterangan_obat" name="keterangan_obat" rows="2" placeholder="Keterangan Obat" required></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label for="keterangan_obat" class="col-md-3 col-form-label col-form-label-sm text-right">Keterangan</label>
											<div class="col-md-7 pl-0">
												<select class="form-control" id="keterangan_obat" name="keterangan_obat">
													<option value="">-- Pilih Keterangan Obat --</option>
													<option value="3x1/hari setelah makan">3x1/hari setelah makan</option>
													<option value="2x1/hari setelah makan">2x1/hari setelah makan</option>
													<option value="3x1/hari sebelum makan">3x1/hari sebelum makan</option>
													<option value="2x1/hari sebelum makan">2x1/hari sebelum makan</option>
												</select>
											</div>
										</div>
										<input type="hidden" name="pasien_kunjungan_id" value="<?= $id ?>">
										<div class="text-right mr-5">
											<button class="btn btn-primary" type="submit">Simpan Resep Obat</button>
										</div>
									</form>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-6">
							<div class="card">
								<div class="card-body mt-2">
									<table class="table table-sm">
										<tbody>
											<tr>
												<td class="pl-4">No RM</td>
												<td class="text-right pr-4"><?= $pasien->no_rm ?></td>
											</tr>
											<tr>
												<td class="pl-4">Tanggal Daftar</td>
												<td class="text-right pr-4"><?= $pasien->pasien_tanggal ?></td>
											</tr>
											<tr>
												<td class="pl-4">Nama Lengkap</td>
												<td class="text-right pr-4"><?= $pasien->nama ?></td>
											</tr>
											<tr>
												<td class="pl-4">Jenis Kelamin</td>
												<td class="text-right pr-4"><?= $pasien->jk == 'L' ? 'Laki-laki' : 'Perempuan'  ?></td>
											</tr>
											<tr>
												<td class="pl-4">Akses Bayar</td>
												<td class="text-right pr-4"><?= $pasien->akses_bayar ?></td>
											</tr>
											<tr>
												<td class="pl-4">Keluhan</td>
												<td class="text-right pr-4"><?= $pasien->keluhan ?></td>
											</tr>
											<tr>
												<td class="pl-4">DPJP</td>
												<td class="text-right pr-4"><?= $pasien->dokter_nama ?></td>
											</tr>
										</tbody>
									</table>
									<div class="text-center mt-1">
										<button class="btn btn-info mr-3 pl-4 pr-4 btn-rekam-medik" data-toggle="modal" data-pasien_kunjungan_id="<?= $id ?>" data-target="#exampleModalCenterRiwayatPemeriksaan">Lihat Riwayat Pemeriksaan</button>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->

							<div class="card">
								<div class="card-body">
									<p class="text-center">Data Pemeriksaan</p>
									<table class="table table-sm">
										<tbody>
											<tr>
												<td class="pl-4">Suhu</td>
												<td class="text-right pr-4"><?= $pemeriksaan->suhu ?? '' ?></td>
											</tr>
											<tr>
												<td class="pl-4">Tekanan Darah</td>
												<td class="text-right pr-4"><?= $pemeriksaan->td ?? '' ?></td>
											</tr>
											<tr>
												<td class="pl-4">Riwayat Alergi</td>
												<td class="text-right pr-4"><?= $pemeriksaan->ra ?? '' ?></td>
											</tr>
											<tr>
												<td class="pl-4">Riwayat Penyakit Dalam</td>
												<td class="text-right pr-4"><?= $pemeriksaan->rpd ?? '' ?></td>
											</tr>
											<tr>
												<td class="pl-4">Diagnosis</td>
												<?php
												$diagnosis_result = "";
												if ($diagnosis != null) {
													$data_diagnosis = [];

													foreach ($diagnosis as $d) {
														array_push($data_diagnosis, $d->nama);
													}
													$diagnosis_result = join(", ", $data_diagnosis);
												}
												?>
												<td class="text-right pr-4"><?= $diagnosis_result ?></td>
											</tr>
											<tr>
												<td class="pl-4">Tindakan</td>
												<?php
												$tindakan_result = "";
												if ($tindakan != null) {
													$data_tindakan = [];
													foreach ($tindakan as $d) {
														array_push($data_tindakan, $d->nama);
													}
													$tindakan_result = join(", ", $data_tindakan);
												}
												?>
												<td class="text-right pr-4"><?= $tindakan_result ?></td>
											</tr>
											<tr>
												<td class="pl-4">Keterangan</td>
												<td class="text-right pr-4"><?= $pemeriksaan->keterangan ?? '' ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->

							<div class="card">
								<div class="card-body">
									<p class="text-center">Data Resep Obat</p>
									<table class="table table-sm">
										<thead>
											<th class=""></th>
											<th class="">Nama</th>
											<th class="pr-4">Satuan</th>
											<th class="pr-4">Jumlah</th>
											<th class="pr-4">Keterangan</th>
										</thead>
										<tbody>
											<?php

											foreach ($resep as $r) { ?>
												<tr>
													<td>
														<a class="btn btn-sm pl-0" href="pasien_pemeriksaan_input/delete_resep?pasien_resep_id=<?= $r->pasien_resep_id ?>&id=<?= $id ?>">
															<i class="fas fa-solid fa-minus-circle text-red"></i>
														</a>
													</td>
													<td class=""><?= $r->nama ?></td>
													<td class="pr-4"><?= $r->obat_satuan_nama ?></td>
													<td class="pr-4"><?= $r->jumlah ?></td>
													<td class="pr-4"><?= $r->keterangan ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Modal Summary Rekam Medis -->
		<div class="modal fade bd-example-modal-lg" id="exampleModalCenterRiwayatPemeriksaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Summary Rekam Medis</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="card-body">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th style="width: 25%">Nama Dokter</th>
										<th style="width: 10%">Poli</th>
										<th style="width: 15%">Tgl Periksa</th>
										<th>Summary</th>
									</tr>
								</thead>
								<tbody id="data-summary"></tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Control Sidebar -->

		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js'); ?>"></script>
	<script>
		$(document).ready(function() {
			$('.bootstrap-select').selectpicker();
		});

		$('.btn-rekam-medik').on('click', function() {
			const pasien_kunjungan_id = $(this).data('pasien_kunjungan_id');
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('pasien_pemeriksaan_input/get_rekam_medik') ?>',
				Cache: false,
				dataType: "json",
				data: {
					'pasien_kunjungan_id': pasien_kunjungan_id
				},
				success: function(resp) {
					resp.forEach((e, i) => {
						$('#data-summary').append(
							`<tr>
									<td class="pl-4">${i+1}</td>
									<td class="pl-4">${e.dokter_nama}</td>
									<td class="pr-4">${e.poli_nama}</td>
									<td class="pr-4">${e.pasien_kunjungan_tanggal}</td>
									<td>
											S(Subjective) = data ambil dari anamnesa/keluhan
											<br>
											O(Objective) = data diambil dari tekanan dara , riwayat alergi riwayat penyakit dalam
											<br>
											A(Assesment) = data diambil dari diagnosis, tindakan
											<br>
											P(Plan) = data diambil dari obat
										</td>
								</tr>`
						);
					})
				}
			});
			$('#data-summary').empty()
			$('#exampleModalCenter3').modal('show');
		})
	</script>
