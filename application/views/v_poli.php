<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Info Dokter</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Info Dokter</h3>
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
												<th>Nama</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($poli_data as $poli) { ?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $poli->nama ?></td>

													<?php if ($poli->status == "Sudah Ditempat") { ?>
														<td>
															<badge class="badge badge-info"><?= $poli->status ?></badge>
														</td>
													<?php } else { ?>
														<td>
															<badge class="badge badge-warning"><?= $poli->status ?></badge>
														</td>
													<?php } ?>

													<td>
														<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $poli->id; ?>" data-nama="<?= $poli->nama; ?>" data-status="<?= $poli->status; ?>"><i class="fa fa-eye"></i></a>
														<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $poli->id; ?>" data-nama="<?= $poli->nama; ?>" data-status="<?= $poli->status; ?>"><i class="fa fa-marker"></i></a>
														<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $poli->id; ?>"><i class="fa fa-trash"></i></a>
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
							<a href="obat_kategori/cetak_pdf" class="btn btn-info">Cetak Data Kategori Obat</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal Add Product-->
<form action="<?php echo base_url("poli/save"); ?>" method="post">
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Info Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama" required>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control status" required>
							<option value="">-- Pilih Status --</option>
							<option value="Belum Datang">Belum Datang</option>
							<option value="Sudah Ditempat">Sudah Ditempat</option>
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
<form action="<?php echo base_url("poli/update"); ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Info Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama" required>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control status" required>
							<option value="">-- Pilih Status --</option>
							<option value="Belum Datang">Belum Datang</option>
							<option value="Sudah Ditempat">Sudah Ditempat</option>
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
					<h5 class="modal-title" id="exampleModalLabel">Lihat Info Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama" disabled>
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
<form action="<?php echo base_url("poli/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Info Dokter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data info dokter?</h5>
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
		$('.btn-edit').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const status = $(this).data('status');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.status').val(status);
			$('#editModal').modal('show');
		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const status = $(this).data('status');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.status').val(status);
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
