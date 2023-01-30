<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Indeks Dokter</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title mr-5">Indeks Dokter</h3>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<form action="">
									<div class="d-sm-flex align-items-center mb-3">
										<div class="form-group mr-3">
											<label>Tanggal Pelayanan :</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="far fa-calendar-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="daterange" value="<?php echo isset($_GET['daterange']) ? $_GET['daterange'] : '' ?>" />
											</div>
										</div>
										<?php if ($this->session->userdata('jabatan') == 'Dokter') { ?>
											<div class="form-group mr-3">
												<label>Nama Dokter :</label>
												<select name="dokter_id" class="form-control dokter_id" disabled>
													<option value="<?= $dokter_id ?>"><?= $this->session->userdata('nama') ?></option>
												</select>
											</div>
										<?php } else { ?>
											<div class="form-group mr-3">
												<label>Nama Dokter :</label>
												<select name="dokter_id" class="form-control dokter_id" required>
													<option value="0">Semua Dokter</option>
													<?php foreach ($dokter_data as $dokter) : ?>
														<option value="<?= $dokter->id; ?>" <?php echo (isset($_GET['dokter_id']) && $_GET['dokter_id'] == $dokter->id) ? 'selected' : ''; ?>><?= $dokter->nama; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										<?php } ?>
										<button class="btn btn-info mt-3">Cari</button>
										<a href="dokter_indeks" class="btn btn-info mt-3 ml-3">Reset</a>
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
										<a href="dokter_indeks/cetak_pdf" class="btn btn-primary">Cetak PDF</a>
										<a href="dokter_indeks/cetak_excel" class="btn btn-info">Cetak Excel</a>
									<?php } else { ?>
										<a href="dokter_indeks/cetak_pdf?<?= $param ?>" class="btn btn-primary">Cetak PDF</a>
										<a href="dokter_indeks/cetak_excel?<?= $param ?>" class="btn btn-info">Cetak Excel</a>
									<?php } ?>

								</div>
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal Registrasi</th>
												<th>Nama Dokter</th>
												<th>Nama Pasien</th>
												<th>Poli</th>
												<th>Akses Bayar</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($dokter_indeks_data as $dokter) { ?>
												<tr>
													<td><?= $i ?></td>
													<td><?= date("d-m-Y", strtotime($dokter->tanggal)) ?></td>
													<td><?= $dokter->dokter_nama ?></td>
													<td><?= $dokter->nama ?></td>
													<td><?= $dokter->poli_nama ?></td>
													<td><?= $dokter->akses_bayar ?></td>
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
					<!-- <div class="card-footer">
							<a href="dokter/cetak_pdf" class="btn btn-info">Cetak Data Kategori dokter</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Tambah dokter</h5>
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
						<select name="dokter_kategori_id" class="form-control dokter_kategori_id" required>
							<option value="">-- Pilih Kategori --</option>
							<?php foreach ($dokter_kategori_data as $dokter_kategori) : ?>
								<option value="<?= $dokter_kategori->id; ?>"><?= $dokter_kategori->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="dokter_satuan_id" class="form-control dokter_satuan_id" required>
							<option value="">-- Pilih Satuan --</option>
							<?php foreach ($dokter_satuan_data as $dokter_satuan) : ?>
								<option value="<?= $dokter_satuan->id; ?>"><?= $dokter_satuan->nama; ?></option>
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
<form action="<?php echo base_url("dokter/update"); ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit dokter</h5>
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
						<select name="dokter_kategori_id" class="form-control dokter_kategori_id" required>
							<option value="">-- Pilih Kategori --</option>
							<?php foreach ($dokter_kategori_data as $dokter_kategori) : ?>
								<option value="<?= $dokter_kategori->id; ?>"><?= $dokter_kategori->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="dokter_satuan_id" class="form-control dokter_satuan_id" required>
							<option value="">-- Pilih Satuan --</option>
							<?php foreach ($dokter_satuan_data as $dokter_satuan) : ?>
								<option value="<?= $dokter_satuan->id; ?>"><?= $dokter_satuan->nama; ?></option>
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
					<h5 class="modal-title" id="exampleModalLabel">Lihat dokter</h5>
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
						<input type="text" class="form-control dokter_kategori_nama" name="dokter_kategori_nama" placeholder="Kategori" readonly>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" class="form-control dokter_satuan_nama" name="dokter_satuan_nama" placeholder="Satuan" readonly>
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
<form action="<?php echo base_url("dokter/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus dokter</h5>
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
		$('.btn-edit').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const harga_beli = $(this).data('harga_beli');
			const harga_jual = $(this).data('harga_jual');
			const kadaluarsa = $(this).data('kadaluarsa');
			const dokter_kategori_id = $(this).data('dokter_kategori_id');
			const dokter_satuan_id = $(this).data('dokter_satuan_id');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.stok').val(stok);
			$('.harga_beli').val(harga_beli);
			$('.harga_jual').val(harga_jual);
			$('.kadaluarsa').val(kadaluarsa);
			$('.dokter_kategori_id').val(dokter_kategori_id);
			$('.dokter_satuan_id').val(dokter_satuan_id);
			$('#editModal').modal('show');
		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const harga_beli = $(this).data('harga_beli');
			const harga_jual = $(this).data('harga_jual');
			const kadaluarsa = $(this).data('kadaluarsa');
			const dokter_kategori_nama = $(this).data('dokter_kategori_nama');
			const dokter_satuan_nama = $(this).data('dokter_satuan_nama');
			$('.id').val(id);
			$('.nama').val(nama);
			$('.stok').val(stok);
			$('.harga_beli').val(harga_beli);
			$('.harga_jual').val(harga_jual);
			$('.kadaluarsa').val(kadaluarsa);
			$('.dokter_kategori_nama').val(dokter_kategori_nama);
			$('.dokter_satuan_nama').val(dokter_satuan_nama);
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
