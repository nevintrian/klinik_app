<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Indeks Obat</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title mr-5">Indeks Obat</h3>
								<ul class="nav nav-tabs" id="myTab" role="tablist">

									<li class="nav-item">
										<a class="nav-link active" id="semua-tab" data-toggle="tab" href="#semua" role="tab" aria-controls="semua" aria-selected="true">Semua</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="bpjs-tab" data-toggle="tab" href="#bpjs" role="tab" aria-controls="bpjs" aria-selected="false">Pasien BPJS</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="false">Pasien Umum</a>
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
									<div class="d-sm-flex align-items-center mb-3">
										<div class="form-group mr-3">
											<label>Tanggal Keluar Obat :</label>
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
											<label>Nama Obat :</label>
											<select name="obat_id" class="form-control obat_id" required>
												<option value="0">Semua Obat</option>
												<?php foreach ($obat_data as $obat) : ?>
													<option value="<?= $obat->id; ?>" <?php echo (isset($_GET['obat_id']) && $_GET['obat_id'] == $obat->id) ? 'selected' : ''; ?>><?= $obat->nama; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<button class="btn btn-info mt-3">Cari</button>
										<a href="obat_indeks" class="btn btn-info mt-3 ml-3">Reset</a>
									</div>
								</form>
								<hr>

								<div class="card-body p-0">
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
											<div class="mb-3">
												<?php
												$url = basename($_SERVER['REQUEST_URI']);
												$data = explode('?', $url);
												$param = $data[1] ?? null;
												if ($param == null) {
												?>
													<a href="obat_indeks/cetak_pdf" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
												<?php } else { ?>
													<a href="obat_indeks/cetak_pdf?<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel?<?= $param ?>" class="btn btn-info">Cetak Excel</a>
												<?php } ?>
											</div>
											<table class="table table-bordered table-responsive-md" id="datatables">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Obat</th>
														<th>Nama Obat</th>
														<th>Satuan</th>
														<th>Jumlah</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($obat_indeks_data as $obat) { ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= date("d-m-Y", strtotime($obat->tanggal)) ?></td>
															<td><?= $obat->obat_nama ?></td>
															<td><?= $obat->obat_satuan_nama ?></td>
															<td><?= $obat->obat_jumlah ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
										<div class="tab-pane fade" id="bpjs" role="tabpanel" aria-labelledby="bpjs-tab">
											<div class="mb-3">
												<?php
												$url = basename($_SERVER['REQUEST_URI']);
												$data = explode('?', $url);
												$param = $data[1] ?? null;
												if ($param == null) {
												?>
													<a href="obat_indeks/cetak_pdf?akses_bayar=BPJS&" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
												<?php } else { ?>
													<a href="obat_indeks/cetak_pdf?akses_bayar=BPJS&<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel?akses_bayar=BPJS&<?= $param ?>" class="btn btn-info">Cetak Excel</a>
												<?php } ?>
											</div>
											<table class="table table-bordered table-responsive-md" id="datatables1">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Obat</th>
														<th>Nama Obat</th>
														<th>Satuan</th>
														<th>Jumlah</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($obat_indeks_bpjs_data as $obat) { ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= date("d-m-Y", strtotime($obat->tanggal)) ?></td>
															<td><?= $obat->obat_nama ?></td>
															<td><?= $obat->obat_satuan_nama ?></td>
															<td><?= $obat->obat_jumlah ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
										<div class="tab-pane fade" id="umum" role="tabpanel" aria-labelledby="umum-tab">
											<div class="mb-3">
												<?php
												$url = basename($_SERVER['REQUEST_URI']);
												$data = explode('?', $url);
												$param = $data[1] ?? null;
												if ($param == null) {
												?>
													<a href="obat_indeks/cetak_pdf?akses_bayar=umum&" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
												<?php } else { ?>
													<a href="obat_indeks/cetak_pdf?akses_bayar=umum&<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel?akses_bayar=umum&<?= $param ?>" class=" btn btn-info">Cetak Excel</a>
												<?php } ?>

											</div>
											<table class="table table-bordered table-responsive-md" id="datatables2">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Obat</th>
														<th>Nama Obat</th>
														<th>Satuan</th>
														<th>Jumlah</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($obat_indeks_umum_data as $obat) { ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= date("d-m-Y", strtotime($obat->tanggal)) ?></td>
															<td><?= $obat->obat_nama ?></td>
															<td><?= $obat->obat_satuan_nama ?></td>
															<td><?= $obat->obat_jumlah ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
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
													<a href="obat_indeks/cetak_pdf?akses_bayar=sosial&" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
												<?php } else { ?>
													<a href="obat_indeks/cetak_pdf?akses_bayar=sosial&<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
													<a href="obat_indeks/cetak_excel?akses_bayar=sosial&<?= $param ?>" class="btn btn-info">Cetak Excel</a>
												<?php } ?>
											</div>
											<table class="table table-bordered table-responsive-md" id="datatables3">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Obat</th>
														<th>Nama Obat</th>
														<th>Satuan</th>
														<th>Jumlah</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($obat_indeks_sosial_data as $obat) { ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= date("d-m-Y", strtotime($obat->tanggal)) ?></td>
															<td><?= $obat->obat_nama ?></td>
															<td><?= $obat->obat_satuan_nama ?></td>
															<td><?= $obat->obat_jumlah ?></td>
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
					<div class="form-group">
						<label>Stok</label>
						<input type="number" min="1" class="form-control" name="stok" placeholder="Stok" required>
					</div>
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
					<div class="form-group">
						<label>Stok</label>
						<input type="text" class="form-control stok" name="stok" placeholder="Stok" required>
					</div>
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
					<div class="form-group">
						<label>Stok</label>
						<input type="text" class="form-control stok" name="stok" placeholder="Stok" readonly>
					</div>
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
		$('.btn-edit').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const harga_beli = $(this).data('harga_beli');
			const harga_jual = $(this).data('harga_jual');
			const kadaluarsa = $(this).data('kadaluarsa');
			const obat_kategori_id = $(this).data('obat_kategori_id');
			const obat_satuan_id = $(this).data('obat_satuan_id');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.stok').val(stok);
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
			const stok = $(this).data('stok');
			const harga_beli = $(this).data('harga_beli');
			const harga_jual = $(this).data('harga_jual');
			const kadaluarsa = $(this).data('kadaluarsa');
			const obat_kategori_nama = $(this).data('obat_kategori_nama');
			const obat_satuan_nama = $(this).data('obat_satuan_nama');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.stok').val(stok);
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
		$('#datatables1').DataTable();
		$('#datatables2').DataTable();
		$('#datatables3').DataTable();

	});
</script>
