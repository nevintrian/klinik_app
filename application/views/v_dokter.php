<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Dokter</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Dokter</h3>
								<button type="button" class="btn btn-info ml-5" data-toggle="modal" data-target="#addModal">Tambah</button>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th style="width: 10px">No</th>
												<th>No Identitas</th>
												<th>Nama</th>
												<th>JK</th>
												<th>Spesialis</th>
												<th>Hari Praktek</th>
												<th>Jam Praktek</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($dokter_data as $dokter) { ?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $dokter->no_identitas ?></td>
													<td><?= $dokter->nama ?></td>
													<td><?= $dokter->jk ?></td>
													<td><?= $dokter->poli_nama ?></td>
													<td><?= $dokter->hari_praktek ?></td>
													<td><?= $dokter->jam_praktek ?></td>

													<td>
														<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $dokter->id; ?>" data-nama="<?= $dokter->nama; ?>" data-poli_nama="<?= $dokter->poli_nama; ?>" data-jam_praktek="<?= $dokter->jam_praktek; ?>" data-hari_praktek="<?= $dokter->hari_praktek; ?>"><i class="fa fa-eye"></i></a>
														<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $dokter->id; ?>" data-nama="<?= $dokter->nama; ?>" data-poli_id="<?= $dokter->poli_id; ?>" data-user_id="<?= $dokter->user_id; ?>" data-jam_praktek="<?= $dokter->jam_praktek; ?>" data-hari_praktek="<?= $dokter->hari_praktek; ?>"><i class="fa fa-marker"></i></a>
														<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $dokter->id; ?>"><i class="fa fa-trash"></i></a>
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
						<!-- <div class="card-footer">
							<a href="dokter/cetak_pdf" class="btn btn-info">Cetak Data Kategori Obat</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal Add Product-->
<form action="<?php echo base_url("dokter/save"); ?>" method="post">
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Dokter</label>
						<select name="user_id" class="form-control user_id" required>
							<option value="">-- Pilih Dokter --</option>
							<?php foreach ($user_data as $user) : ?>
								<option value="<?= $user->id; ?>"><?= $user->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Spesialis</label>
						<select name="poli_id" class="form-control poli_id" required>
							<option value="">-- Pilih Spesialis --</option>
							<?php foreach ($poli_data as $poli) : ?>
								<option value="<?= $poli->id; ?>"><?= $poli->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Jam Praktek</label>
						<input type="text" class="form-control" name="jam_praktek" placeholder="Jam Praktek" required>
					</div>
					<div class="form-group">
						<label>Hari Praktek</label>
						<select class="bootstrap-select strings" name="hari_praktek[]" data-width="100%" data-live-search="true" data-actions-box="true" multiple required>
							<option value="Senin">Senin</option>
							<option value="Selasa">Selasa</option>
							<option value="Rabu">Rabu</option>
							<option value="Kamis">Kamis</option>
							<option value="Jumat">Jumat</option>
							<option value="Sabtu">Sabtu</option>
							<option value="Minggu">Minggu</option>
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
<form action="<?php echo base_url("dokter/update"); ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Dokter</label>
						<select name="user_id" class="form-control user_id" required>
							<option value="">-- Pilih Dokter --</option>
							<?php foreach ($user_data as $user) : ?>
								<option value="<?= $user->id; ?>"><?= $user->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Spesialis</label>
						<select name="poli_id" class="form-control poli_id" required>
							<?php foreach ($poli_data as $poli) : ?>
								<option value="<?= $poli->id; ?>"><?= $poli->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Jam Praktek</label>
						<input type="text" class="form-control jam_praktek" name="jam_praktek" placeholder="Jam Praktek" required>
					</div>
					<div class="form-group">
						<label>Hari Praktek</label>
						<select class="bootstrap-select strings" id="dropdown_dokter_edit" name="hari_praktek[]" data-width="100%" data-live-search="true" data-actions-box="true" multiple required>
							<option value="Senin">Senin</option>
							<option value="Selasa">Selasa</option>
							<option value="Rabu">Rabu</option>
							<option value="Kamis">Kamis</option>
							<option value="Jumat">Jumat</option>
							<option value="Sabtu">Sabtu</option>
							<option value="Minggu">Minggu</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" class="id">
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
					<h5 class="modal-title" id="exampleModalLabel">Lihat Obat Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Dokter</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama Dokter" disabled>
					</div>
					<div class="form-group">
						<label>Spesialis</label>
						<input type="text" class="form-control poli_nama" name="poli_nama" placeholder="Spesialis" disabled>
					</div>
					<div class="form-group">
						<label>Jam Praktek</label>
						<input type="text" class="form-control jam_praktek" name="jam_praktek" placeholder="Jam Praktek" disabled>
					</div>
					<div class="form-group">
						<label>Hari Praktek</label>
						<input type="text" class="form-control hari_praktek" name="hari_praktek" placeholder="Hari Praktek" disabled>
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
<form action="<?php echo base_url("dokter/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data dokter?</h5>
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
<script>
	$(document).ready(function() {
		$('.bootstrap-select').selectpicker();
		$('.btn-edit').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const user_id = $(this).data('user_id');
			const poli_id = $(this).data('poli_id');
			const jam_praktek = $(this).data('jam_praktek');
			const hari_praktek = $(this).data('hari_praktek');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.user_id').val(user_id);
			$('.poli_id').val(poli_id);
			$('.jam_praktek').val(jam_praktek);
			$('.hari_praktek').val(hari_praktek);
			$('#editModal').modal('show');
			$('#dropdown_dokter_edit').selectpicker('val', hari_praktek.split(', '));

		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const poli_nama = $(this).data('poli_nama');
			const jam_praktek = $(this).data('jam_praktek');
			const hari_praktek = $(this).data('hari_praktek');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.poli_nama').val(poli_nama);
			$('.jam_praktek').val(jam_praktek);
			$('.hari_praktek').val(hari_praktek);
			$('#viewModal').modal('show');
		});

		$('.btn-delete').on('click', function() {
			const id = $(this).data('id');
			$('.id').val(id);
			$('#deleteModal').modal('show');
		});

		$('#datatables').DataTable();

	});
</script>
