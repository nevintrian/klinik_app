<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Pasien Kunjungan</h1>
		</div>
	</section>
	<div class="d-sm-flex align-items-center justify-content-between">
		<h3 class="card-title"></h3>
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-onsite-tab" data-toggle="pill" href="#pills-onsite" role="tab" aria-controls="pills-onsite" aria-selected="true">Onsite</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-online-tab" data-toggle="pill" href="#pills-online" role="tab" aria-controls="pills-online" aria-selected="false">Online</a>
			</li>
		</ul>
		<h3></h3>
	</div>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="pills-onsite" role="tabpanel" aria-labelledby="pills-onsite-tab">
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="d-sm-flex align-items-center justify-content-between">
										<h3 class="card-title">Data Pasien Kunjungan</h3>
										<button type="button" class="btn btn-info ml-5" data-toggle="modal" data-target="#addModal">Tambah</button>
									</div>
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="card-body p-0">
											<table class="table table-bordered table-responsive-md" id="datatables">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Daftar</th>
														<th>Nama</th>
														<th>JK</th>
														<th>Poli</th>
														<th>DPJP</th>
														<th>Akses Bayar</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($pasien_kunjungan_onsite_data as $pasien_kunjungan_onsite) {
													?>

														<tr>
															<td><?= $i ?></td>
															<td><?= date("d-m-Y", strtotime($pasien_kunjungan_onsite->tanggal)) ?></td>
															<td><?= $pasien_kunjungan_onsite->nama ?></td>
															<td><?= $pasien_kunjungan_onsite->jk ?></td>
															<td><?= $pasien_kunjungan_onsite->poli_nama ?></td>
															<td><?= $pasien_kunjungan_onsite->dokter_nama ?></td>
															<td><?= $pasien_kunjungan_onsite->akses_bayar ?></td>
															<?php
															if ($pasien_kunjungan_onsite->pasien_kunjungan_status == 0) {
															?>
																<td>
																	<badge class="badge badge-warning">Menunggu</badge>
																</td>
															<?php } else if ($pasien_kunjungan_onsite->pasien_kunjungan_status == 1) { ?>
																<td>
																	<badge class="badge badge-info">Diperiksa</badge>
																</td>
															<?php  } else if ($pasien_kunjungan_onsite->pasien_kunjungan_status == 2) { ?>
																<td>
																	<badge class="badge badge-info">Peresepan</badge>
																</td>
															<?php  } else if ($pasien_kunjungan_onsite->pasien_kunjungan_status == 3) { ?>
																<td>
																	<badge class="badge badge-info">Pembayaran</badge>
																</td>
															<?php  } else if ($pasien_kunjungan_onsite->pasien_kunjungan_status == 4) { ?>
																<td>
																	<badge class="badge badge-info">Selesai</badge>
																</td>
															<?php } ?>
															<td>
																<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $pasien_kunjungan_onsite->pasien_kunjungan_id; ?>" data-nama="<?= $pasien_kunjungan_onsite->nama; ?>" data-keluhan="<?= $pasien_kunjungan_onsite->keluhan; ?>" data-tanggal="<?= $pasien_kunjungan_onsite->tanggal; ?>" data-dokter_nama="<?= $pasien_kunjungan_onsite->dokter_nama; ?>" data-poli_nama="<?= $pasien_kunjungan_onsite->poli_nama; ?>" data-jam_praktek="<?= $pasien_kunjungan_onsite->jam_praktek; ?>" data-akses_bayar="<?= $pasien_kunjungan_onsite->akses_bayar; ?>" data-no_rm="<?= $pasien_kunjungan_onsite->no_rm; ?>" data-status="<?= $pasien_kunjungan_onsite->pasien_kunjungan_status; ?>"><i class="fa fa-eye"></i></a>
																<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $pasien_kunjungan_onsite->pasien_kunjungan_id; ?>" data-nama="<?= $pasien_kunjungan_onsite->nama; ?>" data-keluhan="<?= $pasien_kunjungan_onsite->keluhan; ?>" data-tanggal="<?= $pasien_kunjungan_onsite->tanggal; ?>" data-pasien_id="<?= $pasien_kunjungan_onsite->pasien_id; ?>" data-dokter_id="<?= $pasien_kunjungan_onsite->dokter_id; ?>" data-jam_praktek="<?= $pasien_kunjungan_onsite->jam_praktek; ?>" data-poli_nama="<?= $pasien_kunjungan_onsite->poli_nama; ?>" data-jam_praktek="<?= $pasien_kunjungan_onsite->jam_praktek; ?>" data-akses_bayar="<?= $pasien_kunjungan_onsite->akses_bayar; ?>" data-no_antrian="<?= $pasien_kunjungan_onsite->no_antrian; ?>" data-status="<?= $pasien_kunjungan_onsite->pasien_kunjungan_status; ?>"><i class="fa fa-marker"></i></a>
																<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $pasien_kunjungan_onsite->pasien_kunjungan_id; ?>"><i class="fa fa-trash"></i></a>

															</td>
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
		<div class="tab-pane fade" id="pills-online" role="tabpanel" aria-labelledby="pills-online-tab">
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="d-sm-flex align-items-center justify-content-between">
										<h3 class="card-title">Data Pasien Kunjungan</h3>
									</div>
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="card-body p-0">
											<table class="table table-bordered table-responsive-md" id="datatables1">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Daftar</th>
														<th>Nama</th>
														<th>JK</th>
														<th>Poli</th>
														<th>DPJP</th>
														<th>Akses Bayar</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($pasien_kunjungan_online_data as $pasien_kunjungan_online) { ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= date("d-m-Y", strtotime($pasien_kunjungan_online->tanggal)) ?></td>
															<td><?= $pasien_kunjungan_online->nama ?></td>
															<td><?= $pasien_kunjungan_online->jk ?></td>
															<td><?= $pasien_kunjungan_online->poli_nama ?></td>
															<td><?= $pasien_kunjungan_online->dokter_nama ?></td>
															<td><?= $pasien_kunjungan_online->akses_bayar ?></td>
															<?php
															if ($pasien_kunjungan_online->pasien_kunjungan_status == 0) {
															?>
																<td>
																	<badge class="badge badge-warning">Menunggu</badge>
																</td>
															<?php } else if ($pasien_kunjungan_online->pasien_kunjungan_status == 1) { ?>
																<td>
																	<badge class="badge badge-info">Diperiksa</badge>
																</td>
															<?php  } else if ($pasien_kunjungan_online->pasien_kunjungan_status == 2) { ?>
																<td>
																	<badge class="badge badge-info">Peresepan</badge>
																</td>
															<?php  } else if ($pasien_kunjungan_online->pasien_kunjungan_status == 3) { ?>
																<td>
																	<badge class="badge badge-info">Pembayaran</badge>
																</td>
															<?php  } else if ($pasien_kunjungan_online->pasien_kunjungan_status == 4) { ?>
																<td>
																	<badge class="badge badge-info">Selesai</badge>
																</td>
															<?php } ?>
															<td>
																<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $pasien_kunjungan_online->pasien_kunjungan_id; ?>" data-nama="<?= $pasien_kunjungan_online->nama; ?>" data-keluhan="<?= $pasien_kunjungan_online->keluhan; ?>" data-tanggal="<?= $pasien_kunjungan_online->tanggal; ?>" data-dokter_nama="<?= $pasien_kunjungan_online->dokter_nama; ?>" data-poli_nama="<?= $pasien_kunjungan_online->poli_nama; ?>" data-jam_praktek="<?= $pasien_kunjungan_online->jam_praktek; ?>" data-akses_bayar="<?= $pasien_kunjungan_online->akses_bayar; ?>" data-no_rm="<?= $pasien_kunjungan_online->no_rm; ?>" data-status="<?= $pasien_kunjungan_online->pasien_kunjungan_status; ?>"><i class="fa fa-eye"></i></a>
																<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $pasien_kunjungan_online->pasien_kunjungan_id; ?>" data-nama="<?= $pasien_kunjungan_online->nama; ?>" data-keluhan="<?= $pasien_kunjungan_online->keluhan; ?>" data-tanggal="<?= $pasien_kunjungan_online->tanggal; ?>" data-pasien_id="<?= $pasien_kunjungan_online->pasien_id; ?>" data-dokter_id="<?= $pasien_kunjungan_online->dokter_id; ?>" data-jam_praktek="<?= $pasien_kunjungan_online->jam_praktek; ?>" data-poli_nama="<?= $pasien_kunjungan_online->poli_nama; ?>" data-jam_praktek="<?= $pasien_kunjungan_online->jam_praktek; ?>" data-akses_bayar="<?= $pasien_kunjungan_online->akses_bayar; ?>" data-no_antrian="<?= $pasien_kunjungan_online->no_antrian; ?>" data-status="<?= $pasien_kunjungan_online->pasien_kunjungan_status; ?>"><i class="fa fa-marker"></i></a>
																<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $pasien_kunjungan_online->pasien_kunjungan_id; ?>"><i class="fa fa-trash"></i></a>
															</td>
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
	</div>
</div>


<!-- Modal Add Product-->
<form action="<?php echo base_url("pasien_kunjungan/save"); ?>" method="post">
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Pasien Kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>No RM</label>
						<select name="pasien_id" class="pasien_id data_pasien bootstrap-select" data-width="100%" data-live-search="true" required>
							<option value="">-- Pilih No RM --</option>
							<?php foreach ($pasien_data as $pasien) : ?>
								<option value="<?= $pasien->id; ?>"><?= $pasien->no_rm; ?> - <?= $pasien->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Pasien</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama" readonly>
					</div>
					<div class="form-group">
						<label>Keluhan</label>
						<input type="text" class="form-control keluhan" name="keluhan" placeholder="Keluhan" required>
					</div>
					<div class="form-group">
						<label>Tanggal Berkunjung</label>
						<input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
					</div>
					<div class="form-group">
						<label>DPJP</label>
						<select name="pasien_id" class="dokter_id data_dokter bootstrap-select" data-width="100%" data-live-search="true" required>
							<option value="">-- Pilih Dokter --</option>
							<?php foreach ($dokter_data as $dokter) : ?>
								<option value="<?= $dokter->id; ?>"><?= $dokter->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Poli</label>
						<input type="text" class="form-control poli_nama" name="poli_nama" placeholder="Nama Poli" disabled>
					</div>
					<div class="form-group">
						<label>Jam Berobat</label>
						<input type="text" class="form-control jam_praktek" name="jam_praktek" placeholder="Jam Berobat" disabled>
					</div>
					<div class="form-group">
						<label>Akses Bayar</label>
						<select name="akses_bayar" class="form-control akses_bayar" required>
							<option value="">-- Pilih Akses Bayar --</option>
							<option value="Umum">Umum</option>
							<option value="Sosial">Sosial</option>
							<option value="BPJS">BPJS</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form action="<?php echo base_url("pasien_kunjungan/update"); ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Pasien Kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>No RM</label>
						<select name="pasien_id" id="dropdown_pasien_edit" class="pasien_id data_pasien bootstrap-select" data-width="100%" data-live-search="true" required>
							<?php foreach ($pasien_data as $pasien) : ?>
								<option value="<?= $pasien->id; ?>"><?= $pasien->no_rm; ?> - <?= $pasien->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Pasien</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama" readonly>
					</div>
					<div class="form-group">
						<label>Keluhan</label>
						<input type="text" class="form-control keluhan" name="keluhan" placeholder="Keluhan" required>
					</div>
					<div class="form-group">
						<label>Tanggal Berkunjung</label>
						<input type="date" class="form-control" name="nama" placeholder="Nama" value="<?php echo date("Y-m-d"); ?>" readonly>
					</div>
					<div class="form-group">
						<label>DPJP</label>
						<select name="dokter_id" id="dropdown_dokter_edit" class="dokter_id data_dokter bootstrap-select" data-width="100%" data-live-search="true" required>
							<?php foreach ($dokter_data as $dokter) : ?>
								<option value="<?= $dokter->id; ?>"><?= $dokter->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Poli</label>
						<input type="text" class="form-control poli_nama" name="poli_nama" placeholder="Nama Poli" disabled>
					</div>
					<div class="form-group">
						<label>Jam Berobat</label>
						<input type="text" class="form-control jam_praktek" name="jam_praktek" placeholder="Jam Berobat" disabled>
					</div>
					<div class="form-group">
						<label>Akses Bayar</label>
						<select name="akses_bayar" class="form-control akses_bayar" required>
							<option value="">-- Pilih Akses Bayar --</option>
							<option value="Umum">Umum</option>
							<option value="Sosial">Sosial</option>
							<option value="BPJS">BPJS</option>
						</select>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control status" required>
							<option value="">-- Pilih Status --</option>
							<option value="0">Menunggu</option>
							<option value="1">Diperiksa</option>
							<option value="2">Peresepan</option>
							<option value="3">Pembayaran</option>
							<option value="4">Selesai</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" class="id">
					<input type="hidden" name="no_antrian" class="no_antrian">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal View Product-->
<form>
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Lihat Pasien Kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>No RM</label>
						<input type="text" class="form-control no_rm" name="no_rm" placeholder="No RM" disabled>
					</div>
					<div class="form-group">
						<label>Nama Pasien</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama Pasien" disabled>
					</div>
					<div class="form-group">
						<label>Keluhan</label>
						<input type="text" class="form-control keluhan" name="keluhan" placeholder="Keluhan" disabled>
					</div>
					<div class="form-group">
						<label>Tanggal Berkunjung</label>
						<input type="text" class="form-control tanggal" name="tanggal" placeholder="Tanggal Berkunjung" disabled>
					</div>
					<div class="form-group">
						<label>DPJP</label>
						<input type="text" class="form-control dokter_nama" name="dokter_nama" placeholder="Nama Dokter" disabled>
					</div>
					<div class="form-group">
						<label>Poli</label>
						<input type="text" class="form-control poli_nama" name="poli_nama" placeholder="Nama Poli" disabled>
					</div>
					<div class="form-group">
						<label>Jam Berobat</label>
						<input type="text" class="form-control jam_praktek" name="jam_praktek" placeholder="Jam Berobat" disabled>
					</div>
					<div class="form-group">
						<label>Akses Bayar</label>
						<input type="text" class="form-control akses_bayar" name="akses_bayar" placeholder="Akses Bayar" disabled>
					</div>
					<div class="form-group">
						<label>Status</label>
						<input type="text" class="form-control status" name="status" placeholder="Status" disabled>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal View Product-->

<!-- Modal Delete Product-->
<form action="<?php echo base_url("pasien_kunjungan/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Pasien Kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data pasien kunjungan?</h5>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" class="id">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Delete Product-->

<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js'); ?>"></script>
<script>
	$(document).ready(function() {
		$('.bootstrap-select').selectpicker();
		$('.btn-edit').on('click', function() {
			const id = $(this).data('id');
			const pasien_id = $(this).data('pasien_id');
			const nama = $(this).data('nama');
			const keluhan = $(this).data('keluhan');
			const tanggal = $(this).data('tanggal');
			const dokter_id = $(this).data('dokter_id');
			const poli_nama = $(this).data('poli_nama');
			const jam_praktek = $(this).data('jam_praktek');
			const akses_bayar = $(this).data('akses_bayar');
			const no_antrian = $(this).data('no_antrian');
			const status = $(this).data('status');
			$('.id').val(id);
			$('.pasien_id').val(pasien_id);
			$('.nama').val(nama);
			$('.keluhan').val(keluhan);
			$('.tanggal').val(tanggal);
			$('.dokter_id').val(dokter_id);
			$('.jam_praktek').val(jam_praktek);
			$('.poli_nama').val(poli_nama);
			$('.akses_bayar').val(akses_bayar);
			$('.no_antrian').val(no_antrian);
			$('.status').val(status);
			// $('.dokter_nama_placeholder').val(nama);

			$('#dropdown_pasien_edit').selectpicker('val', pasien_id);
			$('#dropdown_dokter_edit').selectpicker('val', dokter_id);
			$('#editModal').modal('show');
		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const no_rm = $(this).data('no_rm');
			const nama = $(this).data('nama');
			const keluhan = $(this).data('keluhan');
			const tanggal = $(this).data('tanggal');
			const dokter_nama = $(this).data('dokter_nama');
			const poli_nama = $(this).data('poli_nama');
			const jam_praktek = $(this).data('jam_praktek');
			const akses_bayar = $(this).data('akses_bayar');
			const status = $(this).data('status') == 0 ? 'Menunggu' : 'Selesai';
			$('.id').val(id);
			$('.no_rm').val(no_rm);
			$('.nama').val(nama);
			$('.keluhan').val(keluhan);
			$('.tanggal').val(tanggal);
			$('.dokter_nama').val(dokter_nama);
			$('.poli_nama').val(poli_nama);
			$('.jam_praktek').val(jam_praktek);
			$('.akses_bayar').val(akses_bayar);
			$('.status').val(status);
			$('#viewModal').modal('show');
		});

		$('.btn-delete').on('click', function() {
			const id = $(this).data('id');
			$('.id').val(id);
			$('#deleteModal').modal('show');
		});

		$('#datatables').DataTable();
		$('#datatables1').DataTable();

		$('.data_pasien').change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('pasien_kunjungan/cek_data_pasien') ?>',
				Cache: false,
				dataType: "json",
				data: 'id=' + id,
				success: function(resp) {
					$('.nama').val(resp.nama);
				}
			});
		});

		$('.data_dokter').change(function() {
			console.log('abc');
			var id = $(this).val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('pasien_kunjungan/cek_data_dokter') ?>',
				Cache: false,
				dataType: "json",
				data: 'id=' + id,
				success: function(resp) {
					$('.jam_praktek').val(resp.jam_praktek);
					$('.poli_nama').val(resp.poli_nama);
				}
			});
		});
	});
</script>
