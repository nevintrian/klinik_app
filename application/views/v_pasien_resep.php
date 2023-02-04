<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Peresepan</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title mr-5">Data Peresepan</h3>
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="menunggu-tab" data-toggle="tab" href="#menunggu" role="tab" aria-controls="menunggu" aria-selected="true">Menunggu</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="selesai-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="card-body p-0">
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">
											<table class="table table-bordered table-responsive-md" id="datatables">
												<thead>
													<tr>
														<th style="width: 10px">No</th>
														<th>No RM</th>
														<th>Nama Pasien</th>
														<th>JK</th>
														<th>DPJP</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($pasien_resep_menunggu_data as $pasien_resep) { ?>
														<tr>
															<td style="width: 10px"><?= $i ?></td>
															<td><?= $pasien_resep->pasien_no_rm ?></td>
															<td><?= $pasien_resep->pasien_nama ?></td>
															<td><?= $pasien_resep->pasien_jk ?></td>
															<td><?= $pasien_resep->dokter_nama ?></td>
															<td>
																<badge class="badge badge-warning">Menunggu</badge>
															</td>
															<td>
																<a href="#" class="btn btn-primary btn-konfirmasi mb-1" data-id="<?= $pasien_resep->id; ?>" data-tanggal="<?= date("d-m-Y", strtotime($pasien_resep->tanggal)); ?>" data-pasien_no_rm="<?= $pasien_resep->pasien_no_rm; ?>" data-pasien_nama="<?= $pasien_resep->pasien_nama; ?>" data-poli_nama="<?= $pasien_resep->poli_nama; ?>" data-pasien_akses_bayar="<?= $pasien_resep->pasien_akses_bayar; ?>" data-dokter_nama="<?= $pasien_resep->dokter_nama; ?>" data-pasien_kunjungan_id="<?= $pasien_resep->pasien_kunjungan_id; ?>"><i class="fa fa-check"></i></a>
															</td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>

										<div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
											<table class="table table-bordered table-responsive-md" id="datatables1">
												<thead>
													<tr>
														<th style="width: 10px">No</th>
														<th>No RM</th>
														<th>Nama Pasien</th>
														<th>JK</th>
														<th>DPJP</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($pasien_resep_selesai_data as $pasien_resep) { ?>
														<tr>
															<td style="width: 10px"><?= $i ?></td>
															<td><?= $pasien_resep->pasien_no_rm ?></td>
															<td><?= $pasien_resep->pasien_nama ?></td>
															<td><?= $pasien_resep->pasien_jk ?></td>
															<td><?= $pasien_resep->dokter_nama ?></td>
															<td>
																<badge class="badge badge-info">Selesai</badge>
															</td>
															<td>
																<a href="#" class="btn btn-primary btn-detail mb-1" data-id="<?= $pasien_resep->id; ?>" data-tanggal="<?= date("d-m-Y", strtotime($pasien_resep->tanggal)); ?>" data-pasien_no_rm="<?= $pasien_resep->pasien_no_rm; ?>" data-pasien_nama="<?= $pasien_resep->pasien_nama; ?>" data-poli_nama="<?= $pasien_resep->poli_nama; ?>" data-pasien_akses_bayar="<?= $pasien_resep->pasien_akses_bayar; ?>" data-dokter_nama="<?= $pasien_resep->dokter_nama; ?>" data-pasien_kunjungan_id="<?= $pasien_resep->pasien_kunjungan_id; ?>"><i class="fa fa-eye"></i></a>
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
					<!-- <div class="card-footer">
							<a href="pasien_resep/cetak_pdf" class="btn btn-info">Cetak Data Satuan Obat</a>
						</div> -->
				</div>
			</div>
		</div>
</div>
</section>
</div>


<!-- Start Konfirmasi Peresepan -->
<form action="pasien_resep/update" method="post">
	<div class="modal fade bd-example-modal-lg" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Peresepan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<table class="table table-sm">
						<tbody>
							<tr>
								<td class="pl-4">Id Resep</td>
								<td class="text-right pr-4 id"></td>
							</tr>
							<tr>
								<td class="pl-4">Tanggal Peresepan</td>
								<td class="text-right pr-4 tanggal"></td>
							</tr>
							<tr>
								<td class="pl-4">No RM</td>
								<td class="text-right pr-4 pasien_no_rm"></td>
							</tr>
							<tr>
								<td class="pl-4">Nama Pasien</td>
								<td class="text-right pr-4 pasien_nama"></td>
							<tr>
								<td class="pl-4">Poli</td>
								<td class="text-right pr-4 poli_nama"></td>
							</tr>
							<tr>
								<td class="pl-4">Akses Bayar</td>
								<td class="text-right pr-4 pasien_akses_bayar"></td>
							</tr>
							</tr>
							<tr>
								<td class="pl-4">DPJP</td>
								<td class="text-right pr-4 dokter_nama"></td>
							</tr>
						</tbody>
					</table>

					<p class="text-center">Data Resep Obat</p>
					<table class="table table-bordered table-responsive-md">
						<thead>
							<th class="pl-4">Nama Obat</th>
							<th class="pr-4">Satuan</th>
							<th class="pr-4">Jumlah</th>
							<th class="pr-4">Keterangan</th>
							<th class="pr-4">Harga Satuan</th>
							<th class="pr-4">Harga</th>
						</thead>
						<tbody id="data-table"></tbody>
					</table>
					<table class="table table-sm">
						<tbody>
							<tr>
								<td class="pl-4"><b>Total Harga</b></td>
								<td class="text-right pr-4 total_harga"></td>
							</tr>
						</tbody>
					</table>

				</div>
				<input type="hidden" class="form-control pasien_kunjungan_id" name="pasien_kunjungan_id">
				<div class="modal-footer">
					<td>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Konfirmasi Pemberian Resep</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Konfirmasi Peresepan -->

<!-- Start Detail Peresepan -->
<div class="modal fade bd-example-modal-lg" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Peresepan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<table class="table table-sm">
					<tbody>
						<tr>
							<td class="pl-4">Id Resep</td>
							<td class="text-right pr-4 id"></td>
						</tr>
						<tr>
							<td class="pl-4">Tanggal Peresepan</td>
							<td class="text-right pr-4 tanggal"></td>
						</tr>
						<tr>
							<td class="pl-4">No RM</td>
							<td class="text-right pr-4 pasien_no_rm"></td>
						</tr>
						<tr>
							<td class="pl-4">Nama Pasien</td>
							<td class="text-right pr-4 pasien_nama"></td>
						<tr>
							<td class="pl-4">Poli</td>
							<td class="text-right pr-4 poli_nama"></td>
						</tr>
						<tr>
							<td class="pl-4">Akses Bayar</td>
							<td class="text-right pr-4 pasien_akses_bayar"></td>
						</tr>
						</tr>
						<tr>
							<td class="pl-4">DPJP</td>
							<td class="text-right pr-4 dokter_nama"></td>
						</tr>
					</tbody>
				</table>

				<p class="text-center">Data Resep Obat</p>
				<table class="table table-bordered table-responsive-md">
					<thead>
						<th class="pl-4">Nama Obat</th>
						<th class="pr-4">Satuan</th>
						<th class="pr-4">Jumlah</th>
						<th class="pr-4">Keterangan</th>
						<th class="pr-4">Harga Satuan</th>
						<th class="pr-4">Harga</th>
					</thead>
					<tbody id="data-table1"></tbody>
				</table>
				<table class="table table-sm">
					<tbody>
						<tr>
							<td class="pl-4"><b>Total Harga</b></td>
							<td class="text-right pr-4 total_harga"></td>
						</tr>
					</tbody>
				</table>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- End Detail Peresepan -->

<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
	$(document).ready(function() {


		function menunggu() {
			var menunggu = document.getElementById("menunggu");
			var selesai = document.getElementById("selesai");
			menunggu.style.display = 'block';
			selesai.style.display = 'none';
		}

		function selesai() {
			var menunggu = document.getElementById("menunggu");
			var selesai = document.getElementById("selesai");
			menunggu.style.display = 'none';
			selesai.style.display = 'selesai';
		}

		$('.btn-konfirmasi').on('click', function() {
			const id = $(this).data('id');
			const tanggal = $(this).data('tanggal');
			const pasien_no_rm = $(this).data('pasien_no_rm');
			const pasien_nama = $(this).data('pasien_nama');
			const poli_nama = $(this).data('poli_nama');
			const pasien_akses_bayar = $(this).data('pasien_akses_bayar');
			const dokter_nama = $(this).data('dokter_nama');
			const pasien_kunjungan_id = $(this).data('pasien_kunjungan_id');
			$('.id').html(id);
			$('.tanggal').html(tanggal);
			$('.pasien_no_rm').html(pasien_no_rm);
			$('.pasien_nama').html(pasien_nama);
			$('.poli_nama').html(poli_nama);
			$('.pasien_akses_bayar').html(pasien_akses_bayar);
			$('.dokter_nama').html(dokter_nama);
			$('.pasien_kunjungan_id').val(pasien_kunjungan_id);
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('obat_indeks/get_data_obat') ?>',
				Cache: false,
				dataType: "json",
				data: 'pasien_kunjungan_id=' + pasien_kunjungan_id,
				success: function(resp) {
					if (resp.length != 0) {
						let count = 0;
						let total_harga = 0;
						resp.forEach(e => {
							let total = e.harga_jual * e.jumlah
							total_harga += total
							$('#data-table').append(
								`<tr>
									<td class="pl-4">${e.nama}</td>
									<td class="pr-4">${e.obat_satuan_nama}</td>
									<td class="pr-4">${e.jumlah}</td>
									<td class="pr-4">${e.keterangan}</td>
									<td class="pr-4">Rp${e.harga_jual}</td>
									<td class="pr-4">Rp${total}</td>
								</tr>`
							);
						});
						$('.total_harga').html(`<b>Rp${total_harga}</b>`);
					}
				}
			});
			$('#konfirmasiModal').modal('show');
		});
		$('#konfirmasiModal').on('hidden.bs.modal', function() {
			$('#data-table').empty()
			$('.total_harga').empty()
		})

		$('.btn-detail').on('click', function() {
			const id = $(this).data('id');
			const tanggal = $(this).data('tanggal');
			const pasien_no_rm = $(this).data('pasien_no_rm');
			const pasien_nama = $(this).data('pasien_nama');
			const poli_nama = $(this).data('poli_nama');
			const pasien_akses_bayar = $(this).data('pasien_akses_bayar');
			const dokter_nama = $(this).data('dokter_nama');
			const pasien_kunjungan_id = $(this).data('pasien_kunjungan_id');
			$('.id').html(id);
			$('.tanggal').html(tanggal);
			$('.pasien_no_rm').html(pasien_no_rm);
			$('.pasien_nama').html(pasien_nama);
			$('.poli_nama').html(poli_nama);
			$('.pasien_akses_bayar').html(pasien_akses_bayar);
			$('.dokter_nama').html(dokter_nama);
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('obat_indeks/get_data_obat') ?>',
				Cache: false,
				dataType: "json",
				data: 'pasien_kunjungan_id=' + pasien_kunjungan_id,
				success: function(resp) {
					if (resp.length != 0) {
						let count = 0;
						let total_harga = 0;
						resp.forEach(e => {
							let total = e.harga_jual * e.jumlah
							total_harga += total
							$('#data-table1').append(
								`<tr>
									<td class="pl-4">${e.nama}</td>
									<td class="pr-4">${e.obat_satuan_nama}</td>
									<td class="pr-4">${e.jumlah}</td>
									<td class="pr-4">${e.keterangan}</td>
									<td class="pr-4">Rp${e.harga_jual}</td>
									<td class="pr-4">Rp${total}</td>
								</tr>`
							);
						});
						$('.total_harga').html(`<b>Rp${total_harga}</b>`);
					}
				}
			});
			$('#detailModal').modal('show');
		});
		$('#detailModal').on('hidden.bs.modal', function() {
			$('#data-table1').empty()
			$('.total_harga').empty()
		})

		$('#datatables').DataTable();
		$('#datatables1').DataTable();

	});
</script>
