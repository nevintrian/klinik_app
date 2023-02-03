<?php
$url = basename($_SERVER['REQUEST_URI']);
$idstr = explode("?", $url)[1];
$id_pasien = explode("=", $idstr)[1];

?>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Detail Data Pasien</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="col-12">
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<div class="">
											<div class="d-sm-flex align-items-center justify-content-between">
												<h3 class="card-title">Daftar Sosial</h3>
											</div>
										</div>
									</div>
									<!-- /.card-header -->
									<?php
									$date1 = date("Y-m-d");
									$date2 = $pasien->tanggal_lahir;
									$diff = abs(strtotime($date2) - strtotime($date1));
									$years = floor($diff / (365 * 60 * 60 * 24));
									?>
									<div class="card-body">
										<div>
											<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">No RM</h5><br>
											<p><?= $pasien->no_rm ?></p>
										</div>
										<div>
											<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Nama Lengkap</h5><br>
											<p><?= $pasien->nama ?></p>
										</div>
										<div>
											<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Tempat Lahir</h5><br>
											<p><?= $pasien->tempat_lahir ?></p>
										</div>
										<div>
											<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Usia</h5><br>
											<p><?= $years ?></p>
										</div>
										<div>
											<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Jenis Kelamin</h5><br>
											<p><?= $pasien->jk ?></p>
										</div>

										<!-- Button Detail Data -->
										<button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#detailData">
											Detail Data Sosial
										</button>
										<button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#editData">
											Edit Data Sosial
										</button>
									</div>


									<!-- /.card-body -->
								</div>
								<!-- /.card -->
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-12">
										<div class="card">
											<div class="card-header">
												<div class="d-sm-flex align-items-center justify-content-between">
													<h3 class="card-title mr-auto p-2">Riwayat Kunjungan</h3>
													<a href="" type="button" class="btn btn-info mr-2 mb-1 btn-rekam-medik" data-pasien_id="<?= $id_pasien ?>" data-toggle="modal" data-target="#exampleModalCenter3">Summary Rekam Medis</a>
													<a class="btn btn-info mb-1" href="pasien">Kembali</a>
												</div>
											</div>
											<!-- /.card-header -->
											<div class="card-body table-responsive p-0" style="height: 300px;">
												<table class="table table-head-fixed text-nowrap">
													<thead>
														<tr>
															<th>Detail</th>
															<th>#</th>
															<th>Tanggal kunjungan</th>
															<th>Poli</th>
															<th>Suhu</th>
															<th>TD</th>
															<th>RA</th>
															<th>RPD</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														// echo "<pre>";
														// var_dump($pasien_kunjungan_data);
														// echo "</pre>";
														// die();
														foreach ($pasien_kunjungan_data as $pasien_kunjungan) { ?>
															<tr>
																<td>
																	<!-- Button trigger modal -->
																	<badge type="button" class="badge badge-info btn-lihat" data-id="<?= $pasien_kunjungan->pasien_kunjungan_id ?>">
																		Lihat
																	</badge>
																</td>
																<td><?= $no ?></td>
																<td><?= $pasien_kunjungan->tanggal ?></td>
																<td><?= $pasien_kunjungan->poli_nama ?></td>
																<td><?= $pasien_kunjungan->suhu ?></td>
																<td><?= $pasien_kunjungan->td ?></td>
																<td><?= $pasien_kunjungan->ra ?></td>
																<td><?= $pasien_kunjungan->rpd ?></td>
															</tr>
														<?php
															$no++;
														}
														?>
													</tbody>
												</table>
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.card -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Modal Detail Data Sosial -->
		<div class="modal fade bd-example-modal-lg" id="detailData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Data Sosial</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4 pr-0 mr-0 ml-0">
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Tanggal Registrasi</h5><br>
									<p><?= $pasien->tanggal ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">No RM</h5><br>
									<p><?= $pasien->no_rm ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">No Identitas</h5><br>
									<p><?= $pasien->no_identitas ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Nama Lengkap</h5><br>
									<p><?= $pasien->nama ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Tempat Lahir</h5><br>
									<p><?= $pasien->tempat_lahir ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Tanggal Lahir</h5><br>
									<p><?= $pasien->tanggal_lahir ?></p>
								</div>
							</div>
							<div class="col-md-4 pr-0 mr-0 ml-0">
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Usia</h5><br>
									<p><?= $years ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Jenis Kelamin</h5><br>
									<p><?= $pasien->jk ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Agama</h5><br>
									<p><?= $pasien->agama ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Golongan Darah</h5><br>
									<p><?= $pasien->gol_darah ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Alamat Lengkap</h5><br>
									<p><?= $pasien->alamat ?></p>
								</div>
							</div>
							<div class="col-md-4 pr-0 mr-0 ml-0">
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">No HP</h5><br>
									<p><?= $pasien->telepon ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Suku</h5><br>
									<p><?= $pasien->suku ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Pendidikan</h5><br>
									<p><?= $pasien->pendidikan  ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Pekerjaan</h5><br>
									<p><?= $pasien->pekerjaan ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">No BPJS</h5><br>
									<p><?= $pasien->no_bpjs == '' ? '-' : $pasien->no_bpjs ?></p>
								</div>
								<div>
									<h5 style="margin-bottom: -25px; font-size:1.06em; font-weight: 550;" class="">Status Blokir</h5><br>
									<p><?= $pasien->blokir == '1' ? 'Ya' : 'Tidak' ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Edit Data Sosial -->
		<form action="pasien_detail/save" method="post">
			<div class="modal fade bd-example-modal-lg" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Sosial</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4 pr-0 mr-0 ml-0 p-5">
									<div>
										<b class="">Tanggal Registrasi</b>
										<input type="date" class="form-control mb-3" name="tanggal" value="<?= $pasien->tanggal ?>" required>
									</div>
									<div>
										<b class="">No RM</b>
										<input type="number" class="form-control mb-3" name="no_rm" value="<?= $pasien->no_rm ?>" required>
									</div>
									<div>
										<b class="">No Identitas</b>
										<input type="text" class="form-control mb-3" name="no_identitas" value="<?= $pasien->no_identitas ?>" required>
									</div>
									<div>
										<b class="">Nama Lengkap</b>
										<input type="text" class="form-control mb-3" name="nama" value="<?= $pasien->nama ?>" required>
									</div>
									<div>
										<b class="">Tempat Lahir</b>
										<input type="text" class="form-control mb-3" name="tempat_lahir" value="<?= $pasien->tempat_lahir ?>" required>
									</div>
									<div>
										<b class="">Tanggal Lahir</b>
										<input type="date" class="form-control mb-3" name="tanggal_lahir" value="<?= $pasien->tanggal_lahir ?>" required>
									</div>
								</div>
								<div class="col-md-4 pr-0 mr-0 ml-0 p-5">
									<div>
										<b class="">Jenis Kelamin</b>
										<select class="form-control mb-3" id="jk" name="jk" required>
											<option value="">-- Pilih Jenis Kelamin --</option>
											<option value="L" <?= $pasien->jk == 'L' ? 'selected' : '' ?>>Laki-laki</option>
											<option value="P" <?= $pasien->jk == 'P' ? 'selected' : '' ?>>Perempuan</option>
										</select>
									</div>
									<div>
										<b class="">Agama</b>
										<select class="form-control mb-3" id="agama" name="agama" required>
											<option value="">-- Pilih Agama --</option>
											<option value="Islam" <?= $pasien->agama == 'Islam' ? 'selected' : '' ?>>Islam</option>
											<option value="Kristen" <?= $pasien->agama == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
											<option value="Katolik" <?= $pasien->agama == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
											<option value="Hindu" <?= $pasien->agama == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
											<option value="Budha" <?= $pasien->agama == 'Budha' ? 'selected' : '' ?>>Budha</option>
											<option value="Konghucu" <?= $pasien->agama == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
										</select>
									</div>
									<div>
										<b class="">Golongan Darah</b>
										<select class="form-control mb-3" id="gol_darah" name="gol_darah" required>
											<option value="">-- Pilih Golongan Darah --</option>
											<option value="A" <?= $pasien->gol_darah == 'A' ? 'selected' : '' ?>>A</option>
											<option value="B" <?= $pasien->gol_darah == 'B' ? 'selected' : '' ?>>B</option>
											<option value="AB" <?= $pasien->gol_darah == 'AB' ? 'selected' : '' ?>>AB</option>
											<option value="C" <?= $pasien->gol_darah == 'C' ? 'selected' : '' ?>>C</option>
											<option value="O" <?= $pasien->gol_darah == 'O' ? 'selected' : '' ?>>O</option>
											<option value="-" <?= $pasien->gol_darah == '-' ? 'selected' : '' ?>>-</option>
										</select>
									</div>
									<div>
										<b class="">Alamat Lengkap</b>
										<input type="text" class="form-control mb-3" name="alamat" value="<?= $pasien->alamat ?>" required>
									</div>
								</div>
								<div class="col-md-4 pr-0 mr-0 ml-0 p-5">
									<div>
										<b class="">No HP</b>
										<input type="text" class="form-control mb-3" name="telepon" value="<?= $pasien->telepon ?>" required>
									</div>
									<div>
										<b class="">Suku</b>
										<input type="text" class="form-control mb-3" name="suku" value="<?= $pasien->suku ?>" required>
									</div>
									<div>
										<b class="">Pendidikan</b>
										<select class="form-control mb-3" id="pendidikan" name="pendidikan" required>
											<option value="">-- Pilih Pendidikan --</option>
											<option value="Paud/TK" <?= $pasien->pendidikan == 'Paud/TK' ? 'selected' : '' ?>>Paud/TK</option>
											<option value="SD/MI" <?= $pasien->pendidikan == 'SD/MI' ? 'selected' : '' ?>>SD/MI</option>
											<option value="SMP/MTS" <?= $pasien->pendidikan == 'SMP/MTS' ? 'selected' : '' ?>>SMP/MTS</option>
											<option value="SMA/MA" <?= $pasien->pendidikan == 'SMA/MA' ? 'selected' : '' ?>>SMA/MA</option>
											<option value="D1" <?= $pasien->pendidikan == 'D1' ? 'selected' : '' ?>>D1</option>
											<option value="D3" <?= $pasien->pendidikan == 'D3' ? 'selected' : '' ?>>D3</option>
											<option value="D4" <?= $pasien->pendidikan == 'D4' ? 'selected' : '' ?>>D4</option>
											<option value="S1" <?= $pasien->pendidikan == 'S1' ? 'selected' : '' ?>>S1</option>
											<option value="S2" <?= $pasien->pendidikan == 'S2' ? 'selected' : '' ?>>S2</option>
											<option value="S3" <?= $pasien->pendidikan == 'S3' ? 'selected' : '' ?>>S3</option>
										</select>
									</div>
									<div>
										<b class="">Pekerjaan</b>
										<input type="text" class="form-control mb-3" name="pekerjaan" value="<?= $pasien->pekerjaan ?>" required>
									</div>
									<div>
										<b class="">No BPJS</b>
										<input type="text" class="form-control mb-3" name="no_bpjs" value="<?= $pasien->no_bpjs ?>" required>
									</div>
									<div>
										<b class="">Status Blokir</b>
										<select class="form-control mb-3" id="blokir" name="blokir" required>
											<option value="">-- Pilih Status Blokir --</option>
											<option value="1" <?= $pasien->blokir == '1' ? 'selected' : '' ?>>Ya</option>
											<option value="0" <?= $pasien->blokir == '0' ? 'selected' : '' ?>>Tidak</option>
										</select>
									</div>
									<input type="hidden" class="form-control mb-3" name="id" value="<?= $pasien->id ?>">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info">Simpan</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- Modal Detail Riwayat -->
		<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Detail Riwayat Kunjungan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table table-sm">
							<tbody>
								<tr>
									<td class="pl-4">No RM</td>
									<td class="text-right pr-4 no_rm"></td>
								</tr>
								<tr>
									<td class="pl-4">Tanggal Kunjungan</td>
									<td class="text-right pr-4 tanggal"></td>
								</tr>
								<tr>
									<td class="pl-4">Poli</td>
									<td class="text-right pr-4 poli_nama"></td>
								</tr>
								<tr>
									<td class="pl-4">Akses Bayar</td>
									<td class="text-right pr-4 akses_bayar"></td>
								</tr>
								<tr>
									<td class="pl-4">Keluhan</td>
									<td class="text-right pr-4 keluhan"></td>
								</tr>
								<tr>
									<td class="pl-4">DPJP</td>
									<td class="text-right pr-4 dokter_nama"></td>
								</tr>
							</tbody>
						</table>

						<p class="text-center">Data Pemeriksaan</p>
						<table class="table table-sm">
							<tbody>
								<tr>
									<td class="pl-4">Suhu</td>
									<td class="text-right pr-4 suhu"></td>
								</tr>
								<tr>
									<td class="pl-4">Tekanan Darah</td>
									<td class="text-right pr-4 td"></td>
								</tr>
								<tr>
									<td class="pl-4">Riwayat Alergi</td>
									<td class="text-right pr-4 ra"></td>
								</tr>
								<tr>
									<td class="pl-4">Riwayat Penyakit Dalam</td>
									<td class="text-right pr-4 rpd"></td>
								</tr>
								<tr>
									<td class="pl-4">Diagnosis</td>
									<td class="text-right pr-4 diagnosis"></td>
								</tr>
								<tr>
									<td class="pl-4">Tindakan</td>
									<td class="text-right pr-4 tindakan"></td>
								</tr>
								<tr>
									<td class="pl-4">Keterangan</td>
									<td class="text-right pr-4 keterangan_pemeriksaan">-</td>
								</tr>
							</tbody>
						</table>

						<p class="text-center">Data Resep Obat</p>
						<table class="table table-sm">
							<thead>
								<th class="pl-4">Nama Obat</th>
								<th class="pr-4">Satuan</th>
								<th class="pr-4">Jumlah</th>
								<th class="pr-4">Keterangan</th>
							</thead>
							<tbody id="data-obat">

							</tbody>
						</table>

					</div>
					<div class="modal-footer">
						<a href="" class="btn btn-info">Cetak</a>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Summary Rekam Medis -->
		<div class="modal fade bd-example-modal-lg" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			$('.btn-lihat').on('click', function() {
				const id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('pasien_detail/get_data_pasien') ?>',
					Cache: false,
					dataType: "json",
					data: {
						'pasien_kunjungan_id': id
					},
					success: function(resp) {
						console.log(resp)
						$('.no_rm').html(resp.pasien[0].no_rm);
						$('.tanggal').html(resp.pasien[0].tanggal);
						$('.poli_nama').html(resp.pasien[0].poli_nama);
						$('.akses_bayar').html(resp.pasien[0].akses_bayar);
						$('.keluhan').html(resp.pasien[0].keluhan);
						$('.dokter_nama').html(resp.pasien[0].dokter_nama);

						$('.suhu').html(resp.pemeriksaan.suhu);
						$('.td').html(resp.pemeriksaan.td);
						$('.ra').html(resp.pemeriksaan.ra);
						$('.rpd').html(resp.pemeriksaan.rpd);
						$('.keterangan_pemeriksaan').html(resp.pemeriksaan.keterangan);

						let diagnosis_data = []
						resp.diagnosis.forEach(e => {
							diagnosis_data.push(resp.diagnosis[0].nama)
						})
						let diagnosis = diagnosis_data.join(', ')

						let tindakan_data = []
						resp.tindakan.forEach(e => {
							tindakan_data.push(resp.tindakan[0].nama)
						})
						let tindakan = tindakan_data.join(', ')

						$('.diagnosis').html(diagnosis);
						$('.tindakan').html(tindakan);
						$('.keterangan').html(resp.pemeriksaan.keterangan);

						resp.resep.forEach(e => {
							$('#data-obat').append(
								`<tr>
									<td class="pl-4">${e.nama}</td>
									<td class="pr-4">${e.obat_satuan_nama}</td>
									<td class="pr-4">${e.jumlah}</td>
									<td class="pr-4">${e.keterangan}</td>
								</tr>`
							);
						})

					}
				});
				$('#data-obat').empty()
				$('#exampleModalCenter2').modal('show');
			})

			$('.btn-rekam-medik').on('click', function() {
				const pasien_id = $(this).data('pasien_id');
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('pasien_detail/get_rekam_medik') ?>',
					Cache: false,
					dataType: "json",
					data: {
						'pasien_id': pasien_id
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
