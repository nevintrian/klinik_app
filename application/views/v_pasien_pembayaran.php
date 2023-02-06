<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Pasien Pembayaran</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Pasien Pembayaran</h3>
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
												<th>JK</th>
												<th>Poli</th>
												<th>Akses Bayar</th>
												<th>Total Bayar</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($pasien_pembayaran_data as $pasien_pembayaran) { ?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $pasien_pembayaran->nama ?></td>
													<td><?= $pasien_pembayaran->jk ?></td>
													<td><?= $pasien_pembayaran->poli_nama ?></td>
													<td><?= $pasien_pembayaran->pasien_kunjungan_akses_bayar ?></td>
													<td>Rp<?= $pasien_pembayaran->total_harga ?></td>
													<?php
													if ($pasien_pembayaran->pasien_kunjungan_status == 0) {
													?>
														<td>
															<badge class="badge badge-warning">Menunggu</badge>
														</td>
													<?php } else if ($pasien_pembayaran->pasien_kunjungan_status == 1) { ?>
														<td>
															<badge class="badge badge-info">Diperiksa</badge>
														</td>
													<?php  } else if ($pasien_pembayaran->pasien_kunjungan_status == 2) { ?>
														<td>
															<badge class="badge badge-info">Peresepan</badge>
														</td>
													<?php  } else if ($pasien_pembayaran->pasien_kunjungan_status == 3) { ?>
														<td>
															<badge class="badge badge-info">Pembayaran</badge>
														</td>
													<?php  } else if ($pasien_pembayaran->pasien_kunjungan_status == 4) { ?>
														<td>
															<badge class="badge badge-info">Selesai</badge>
														</td>
													<?php } ?>

													<?php if ($pasien_pembayaran->pasien_kunjungan_status == 3) { ?>
														<!-- <td>
															<a href="pasien_pembayaran/konfirmasi?pasien_kunjungan_id=<?= $pasien_pembayaran->pasien_kunjungan_id ?>" class="btn btn-info mb-1"><i class="fa fa-check"></i></a>
														</td> -->
														<td>
															<a href="#" class="btn btn-primary btn-konfirmasi mb-1" data-pasien_pembayaran_id="<?= $pasien_pembayaran->pasien_pembayaran_id; ?>" data-id="<?= $pasien_pembayaran->id; ?>" data-tanggal="<?= date("d-m-Y", strtotime($pasien_pembayaran->tanggal)); ?>" data-pasien_no_rm="<?= $pasien_pembayaran->no_rm; ?>" data-pasien_nama="<?= $pasien_pembayaran->nama; ?>" data-poli_nama="<?= $pasien_pembayaran->poli_nama; ?>" data-pasien_akses_bayar="<?= $pasien_pembayaran->pasien_kunjungan_akses_bayar; ?>" data-dokter_nama="<?= $pasien_pembayaran->dokter_nama; ?>" data-pasien_kunjungan_id="<?= $pasien_pembayaran->pasien_kunjungan_id; ?>"><i class="fa fa-check"></i></a>
														</td>
													<?php } else { ?>
														<td>
															<a href="#" class="btn btn-primary btn-detail mb-1" data-pasien_pembayaran_id="<?= $pasien_pembayaran->pasien_pembayaran_id; ?>" data-total_harga="<?= $pasien_pembayaran->total_harga; ?>" data-id="<?= $pasien_pembayaran->id; ?>" data-tanggal="<?= date("d-m-Y", strtotime($pasien_pembayaran->tanggal)); ?>" data-pasien_no_rm="<?= $pasien_pembayaran->no_rm; ?>" data-pasien_nama="<?= $pasien_pembayaran->nama; ?>" data-poli_nama="<?= $pasien_pembayaran->poli_nama; ?>" data-pasien_akses_bayar="<?= $pasien_pembayaran->pasien_kunjungan_akses_bayar; ?>" data-dokter_nama="<?= $pasien_pembayaran->dokter_nama; ?>" data-pasien_kunjungan_id="<?= $pasien_pembayaran->pasien_kunjungan_id; ?>"><i class="fa fa-eye"></i></a>
														</td>
													<?php } ?>
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
							<a href="obat_kategori/cetak_pdf" class="btn btn-info">Cetak Data Pasien Pembayaran</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>



<form action="pasien_pembayaran/konfirmasi" method="post">
	<div class="modal fade bd-example-modal-lg" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pasien Pembayaran</h5>
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
							<th class="pr-4">Harga Satuan</th>
							<th class="pr-4">Harga</th>
						</thead>
						<tbody id="data-table"></tbody>
					</table>
					<table class="table table-sm">
						<tbody>
							<tr>
								<td class="pl-4"><b> Harga Resep</b></td>
								<td class="text-right pr-4 total_harga_resep"></td>
							</tr>
						</tbody>
					</table>

					<p class="text-center">Data Tindakan</p>
					<table class="table table-bordered table-responsive-md">
						<thead>
							<th class="pl-4">Nama Tindakan</th>
							<th class="pr-4">Harga</th>
						</thead>
						<tbody id="data-table1"></tbody>
					</table>
					<table class="table table-sm">
						<tbody>
							<tr>
								<td class="pl-4"><b> Harga Tindakan</b></td>
								<td class="text-right pr-4 total_harga_tindakan"></td>
							</tr>
						</tbody>
					</table>

				</div>
				<center>
					<h5 class="total_bayar mb-3"></h5>
				</center>
				<div class="pasien_sosial"></div>
				<input type="hidden" class="form-control pasien_pembayaran_id" name="pasien_pembayaran_id">
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

<form action="pasien_pembayaran/detail" method="post">
	<div class="modal fade bd-example-modal-lg" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Detail Pasien Pembayaran</h5>
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
							<th class="pr-4">Harga Satuan</th>
							<th class="pr-4">Harga</th>
						</thead>
						<tbody id="data-table2"></tbody>
					</table>
					<table class="table table-sm">
						<tbody>
							<tr>
								<td class="pl-4"><b> Harga Resep</b></td>
								<td class="text-right pr-4 total_harga_resep"></td>
							</tr>
						</tbody>
					</table>

					<p class="text-center">Data Tindakan</p>
					<table class="table table-bordered table-responsive-md">
						<thead>
							<th class="pl-4">Nama Tindakan</th>
							<th class="pr-4">Harga</th>
						</thead>
						<tbody id="data-table3"></tbody>
					</table>
					<table class="table table-sm">
						<tbody>
							<tr>
								<td class="pl-4"><b> Harga Tindakan</b></td>
								<td class="text-right pr-4 total_harga_tindakan"></td>
							</tr>
						</tbody>
					</table>

				</div>
				<center>
					<h5 class="total_bayar mb-3"></h5>
				</center>
				<div class="pasien_sosial"></div>
				<input type="hidden" class="form-control pasien_pembayaran_id" name="pasien_pembayaran_id">
				<input type="hidden" class="form-control pasien_kunjungan_id" name="pasien_kunjungan_id">
				<div class="modal-footer">
					<td>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</form>


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

		$('.btn-konfirmasi').on('click', function() {
			const id = $(this).data('id');
			const pasien_pembayaran_id = $(this).data('pasien_pembayaran_id');
			console.log(pasien_pembayaran_id)
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
			$('.pasien_pembayaran_id').val(pasien_pembayaran_id);
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('pasien_pembayaran/get_data_konfirmasi') ?>',
				Cache: false,
				dataType: "json",
				data: 'pasien_kunjungan_id=' + pasien_kunjungan_id,
				success: function(resp) {
					if (resp['resep'].length != 0) {
						let count = 0;
						let total_harga_resep = 0;
						let total_harga_tindakan = 0;
						resp['resep'].forEach(e => {
							let total_resep = parseInt(e.harga_jual) * parseInt(e.jumlah)
							total_harga_resep += total_resep
							$('#data-table').append(
								`<tr>
									<td class="pl-4">${e.nama}</td>
									<td class="pr-4">${e.obat_satuan_nama}</td>
									<td class="pr-4">${e.jumlah}</td>
									<td class="pr-4">Rp${e.harga_jual}</td>
									<td class="pr-4">Rp${total_resep}</td>
								</tr>`
							);
						});
						resp['tindakan'].forEach(e => {
							total_harga_tindakan += parseInt(e.tarif)
							$('#data-table1').append(
								`<tr>
								<td class="pl-4">${e.nama}</td>
								<td class="pr-4">Rp${e.tarif}</td>
								</tr>`
							);
						});

						$('.total_harga_tindakan').html(`<b>Rp${total_harga_tindakan}</b>`);
						$('.total_harga_resep').html(`<b>Rp${total_harga_resep}</b>`);
						if (pasien_akses_bayar == 'BPJS') {
							$('.total_bayar').html(`<b>Total Bayar : Rp${total_harga_resep + total_harga_tindakan} (GRATIS)</b>`);
						} else {
							$('.total_bayar').html(`<b>Total Bayar : Rp${total_harga_resep + total_harga_tindakan}</b>`);
						}
						if (pasien_akses_bayar == 'Sosial') {
							$data = `<div class="form-group m-5">
									<label>Pasien Sosial Bayar : </label>
									<input type="number" class="form-control pasien_sosial_bayar" name="pasien_sosial_bayar" placeholder="Masukkan uang yang dibayar pasien sosial" required>
								</div>`
							$('.pasien_sosial').html($data);
						}

					}
				}
			});
			$('#konfirmasiModal').modal('show');
		});
		$('#konfirmasiModal').on('hidden.bs.modal', function() {
			$('#data-table').empty()
			$('#data-table1').empty()
			$('.total_harga').empty()
			$('.pasien_sosial').empty()
		})


		$('.btn-detail').on('click', function() {
			const id = $(this).data('id');
			const pasien_pembayaran_id = $(this).data('pasien_pembayaran_id');
			const tanggal = $(this).data('tanggal');
			const pasien_no_rm = $(this).data('pasien_no_rm');
			const pasien_nama = $(this).data('pasien_nama');
			const poli_nama = $(this).data('poli_nama');
			const pasien_akses_bayar = $(this).data('pasien_akses_bayar');
			const dokter_nama = $(this).data('dokter_nama');
			const pasien_kunjungan_id = $(this).data('pasien_kunjungan_id');
			const pasien_total_harga = $(this).data('total_harga');
			$('.id').html(id);
			$('.tanggal').html(tanggal);
			$('.pasien_no_rm').html(pasien_no_rm);
			$('.pasien_nama').html(pasien_nama);
			$('.poli_nama').html(poli_nama);
			$('.pasien_akses_bayar').html(pasien_akses_bayar);
			$('.dokter_nama').html(dokter_nama);
			$('.pasien_kunjungan_id').val(pasien_kunjungan_id);
			$('.pasien_pembayaran_id').val(pasien_pembayaran_id);

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('pasien_pembayaran/get_data_konfirmasi') ?>',
				Cache: false,
				dataType: "json",
				data: 'pasien_kunjungan_id=' + pasien_kunjungan_id,
				success: function(resp) {
					if (resp['resep'].length != 0) {
						let count = 0;
						let total_harga_resep = 0;
						let total_harga_tindakan = 0;
						resp['resep'].forEach(e => {
							let total_resep = parseInt(e.harga_jual) * parseInt(e.jumlah)
							total_harga_resep += total_resep
							$('#data-table2').append(
								`<tr>
									<td class="pl-4">${e.nama}</td>
									<td class="pr-4">${e.obat_satuan_nama}</td>
									<td class="pr-4">${e.jumlah}</td>
									<td class="pr-4">Rp${e.harga_jual}</td>
									<td class="pr-4">Rp${total_resep}</td>
								</tr>`
							);
						});
						resp['tindakan'].forEach(e => {
							total_harga_tindakan += parseInt(e.tarif)
							$('#data-table3').append(
								`<tr>
								<td class="pl-4">${e.nama}</td>
								<td class="pr-4">Rp${e.tarif}</td>
								</tr>`
							);
						});

						$('.total_harga_tindakan').html(`<b>Rp${total_harga_tindakan}</b>`);
						$('.total_harga_resep').html(`<b>Rp${total_harga_resep}</b>`);
						if (pasien_akses_bayar == 'BPJS') {
							$('.total_bayar').html(`<b>Total Bayar : Rp${total_harga_resep + total_harga_tindakan} (GRATIS)</b>`);
						} else {
							$('.total_bayar').html(`<b>Total Bayar : Rp${total_harga_resep + total_harga_tindakan}</b>`);
						}
						if (pasien_akses_bayar == 'Sosial') {
							$data = `<div class="form-group m-5">
									<label>Pasien Sosial Bayar : </label>
									<input type="number" class="form-control pasien_sosial_bayar" name="pasien_sosial_bayar" placeholder="Masukkan uang yang dibayar pasien sosial" disabled>
								</div>`
							$('.pasien_sosial').html($data);
						}
						$('.pasien_sosial_bayar').val(pasien_total_harga);
					}
				}
			});

			$('#detailModal').modal('show');
		});

		$('#detailModal').on('hidden.bs.modal', function() {
			$('#data-table2').empty()
			$('#data-table3').empty()
			$('.total_harga').empty()
			$('.pasien_sosial').empty()
		})

		$('#datatables').DataTable();

	});
</script>
