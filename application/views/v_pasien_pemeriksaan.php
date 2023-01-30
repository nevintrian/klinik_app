<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Input Pemeriksaan</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Input Pemeriksaan</h3>

							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th style="width: 10px">No</th>
												<th>Antrian</th>
												<th>Tanggal Daftar</th>
												<th>Nama</th>
												<th>JK</th>
												<th>Usia</th>
												<th>DPJP</th>
												<!-- <th>Status</th> -->
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($pasien_pemeriksaan_data as $pasien_pemeriksaan) {
												$date1 = date("Y-m-d");
												$date2 = $pasien_pemeriksaan->tanggal_lahir;
												$diff = abs(strtotime($date2) - strtotime($date1));
												$years = floor($diff / (365 * 60 * 60 * 24));
											?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $pasien_pemeriksaan->no_antrian ?></td>
													<td><?= $pasien_pemeriksaan->tanggal ?></td>
													<td><?= $pasien_pemeriksaan->nama ?></td>
													<td><?= $pasien_pemeriksaan->jk ?></td>
													<td><?= $years ?></td>
													<td><?= $pasien_pemeriksaan->dokter_nama ?></td>
													<!-- <?php
															if ($pasien_pemeriksaan->pasien_pemeriksaan_status == 0) {
															?>
														<td>
															<badge class="badge badge-warning">Menunggu</badge>
														</td>
													<?php } else if ($pasien_pemeriksaan->pasien_pemeriksaan_status == 1) { ?>
														<td>
															<badge class="badge badge-info">Selesai</badge>
														</td>
													<?php } ?> -->
													<td>
														<a href="pasien_pemeriksaan_input?id=<?= $pasien_pemeriksaan->pasien_kunjungan_id ?>" class="btn btn-info ml-5">Rekam Data</a>
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
							<a href="pasien_pemeriksaan/cetak_pdf" class="btn btn-info">Cetak Data Kategori Obat</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal Add Product-->
<form action="<?php echo base_url("pasien_pemeriksaan/save"); ?>" method="post">
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Obat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama" required>
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
<form action="<?php echo base_url("pasien_pemeriksaan/update"); ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Obat Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama">
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
						<label>Nama</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama" disabled>
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
<form action="<?php echo base_url("pasien_pemeriksaan/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Kategori Obat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data kategori obat?</h5>
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
			$('.id').val(id);
			$('.nama').val(nama);
			$('#editModal').modal('show');
		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			$('.id').val(id);
			$('.nama').val(nama);
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
