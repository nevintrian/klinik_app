<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Obat</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Obat</h3>
								<?php
								if ($this->session->userdata('jabatan') != 'Petugas Pendaftaran') {
								?>
									<button type="button" class="btn btn-info ml-5" data-toggle="modal" data-target="#addModal">Tambah</button>
								<?php
								}
								?>
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
												<th>Kategori</th>
												<th>Satuan</th>
												<!-- <th>Stok</th> -->
												<th>Kadaluarsa</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($obat_data as $obat) { ?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $obat->nama ?></td>
													<td><?= $obat->obat_kategori_nama ?></td>
													<td><?= $obat->obat_satuan_nama ?></td>
													<!-- <td><?= $obat->stok ?></td> -->
													<td><?= date("d-m-Y", strtotime($obat->kadaluarsa)) ?></td>
													<td>
														<!-- data-stok="<?= $obat->stok; ?>" -->
														<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $obat->id; ?>" data-nama="<?= $obat->nama; ?>" data-harga_beli="<?= $obat->harga_beli; ?>" data-harga_jual="<?= $obat->harga_jual; ?>" data-kadaluarsa="<?= $obat->kadaluarsa; ?>" data-obat_kategori_nama="<?= $obat->obat_kategori_nama; ?>" data-obat_satuan_nama="<?= $obat->obat_satuan_nama; ?>"><i class="fa fa-eye"></i></a>
														<?php
														if ($this->session->userdata('jabatan') != 'Petugas Pendaftaran') {
														?>
															<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $obat->id; ?>" data-nama="<?= $obat->nama; ?>" data-stok="<?= $obat->stok; ?>" data-harga_beli="<?= $obat->harga_beli; ?>" data-harga_jual="<?= $obat->harga_jual; ?>" data-kadaluarsa="<?= $obat->kadaluarsa; ?>" data-obat_kategori_id="<?= $obat->obat_kategori_id; ?>" data-obat_satuan_id="<?= $obat->obat_satuan_id; ?>"><i class="fa fa-marker"></i></a>
															<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $obat->id; ?>"><i class="fa fa-trash"></i></a>
														<?php
														}
														?>
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
							<a href="obat/cetak_pdf" class="btn btn-info">Cetak Data Kategori Obat</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal Add Product-->
<form action="<?php echo base_url("obat/save"); ?>" method="post">
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
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
						<label>Kategori</label>
						<select name="obat_kategori_id" class="form-control obat_kategori_id" required>
							<option value="">-- Pilih Kategori --</option>
							<?php foreach ($obat_kategori_data as $obat_kategori) : ?>
								<option value="<?= $obat_kategori->id; ?>"><?= $obat_kategori->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="obat_satuan_id" class="form-control obat_satuan_id" required>
							<option value="">-- Pilih Satuan --</option>
							<?php foreach ($obat_satuan_data as $obat_satuan) : ?>
								<option value="<?= $obat_satuan->id; ?>"><?= $obat_satuan->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<!-- <div class="form-group">
						<label>Stok</label>
						<input type="number" min="1" class="form-control" name="stok" placeholder="Stok" required>
					</div> -->
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli" required>
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="number" class="form-control" name="harga_jual" placeholder="Harga Jual" required>
					</div>
					<div class="form-group">
						<label>Kadaluarsa</label>
						<input type="date" class="form-control" name="kadaluarsa" placeholder="Kadaluarsa" required>
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
<form action="<?php echo base_url("obat/update"); ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
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
						<label>Kategori</label>
						<select name="obat_kategori_id" class="form-control obat_kategori_id" required>
							<option value="">-- Pilih Kategori --</option>
							<?php foreach ($obat_kategori_data as $obat_kategori) : ?>
								<option value="<?= $obat_kategori->id; ?>"><?= $obat_kategori->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="obat_satuan_id" class="form-control obat_satuan_id" required>
							<option value="">-- Pilih Satuan --</option>
							<?php foreach ($obat_satuan_data as $obat_satuan) : ?>
								<option value="<?= $obat_satuan->id; ?>"><?= $obat_satuan->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<!-- <div class="form-group">
						<label>Stok</label>
						<input type="text" class="form-control stok" name="stok" placeholder="Stok" required>
					</div> -->
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="text" class="form-control harga_beli" name="harga_beli" placeholder="Harga Beli" required>
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="text" class="form-control harga_jual" name="harga_jual" placeholder="Harga Jual" required>
					</div>
					<div class="form-group">
						<label>Kadaluarsa</label>
						<input type="date" class="form-control kadaluarsa" name="kadaluarsa" placeholder="Kadaluarsa" required>
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
					<h5 class="modal-title" id="exampleModalLabel">Lihat Obat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control nama" name="nama" placeholder="Nama" readonly>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<input type="text" class="form-control obat_kategori_nama" name="obat_kategori_nama" placeholder="Kategori" readonly>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" class="form-control obat_satuan_nama" name="obat_satuan_nama" placeholder="Satuan" readonly>
					</div>
					<!-- <div class="form-group">
						<label>Stok</label>
						<input type="text" class="form-control stok" name="stok" placeholder="Stok" readonly>
					</div> -->
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="text" class="form-control harga_beli" name="harga_beli" placeholder="Harga Beli" readonly>
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="text" class="form-control harga_jual" name="harga_jual" placeholder="Harga Jual" readonly>
					</div>
					<div class="form-group">
						<label>Kadaluarsa</label>
						<input type="date" class="form-control kadaluarsa" name="kadaluarsa" placeholder="Kadaluarsa" readonly>
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
<form action="<?php echo base_url("obat/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Obat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data obat?</h5>
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
			// const stok = $(this).data('stok');
			const harga_beli = $(this).data('harga_beli');
			const harga_jual = $(this).data('harga_jual');
			const kadaluarsa = $(this).data('kadaluarsa');
			const obat_kategori_id = $(this).data('obat_kategori_id');
			const obat_satuan_id = $(this).data('obat_satuan_id');
			$('.id').val(id);
			$('.nama').val(nama);
			// $('.stok').val(stok);
			$('.harga_beli').val(harga_beli);
			$('.harga_jual').val(harga_jual);
			$('.kadaluarsa').val(kadaluarsa);
			$('.obat_kategori_id').val(obat_kategori_id);
			$('.obat_satuan_id').val(obat_satuan_id);
			$('#editModal').modal('show');
		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			// const stok = $(this).data('stok');
			const harga_beli = $(this).data('harga_beli');
			const harga_jual = $(this).data('harga_jual');
			const kadaluarsa = $(this).data('kadaluarsa');
			const obat_kategori_nama = $(this).data('obat_kategori_nama');
			const obat_satuan_nama = $(this).data('obat_satuan_nama');
			$('.id').val(id);
			$('.nama').val(nama);
			// $('.stok').val(stok);
			$('.harga_beli').val(harga_beli);
			$('.harga_jual').val(harga_jual);
			$('.kadaluarsa').val(kadaluarsa);
			$('.obat_kategori_nama').val(obat_kategori_nama);
			$('.obat_satuan_nama').val(obat_satuan_nama);
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
