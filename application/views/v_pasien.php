<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Pasien</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Pasien</h3>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th style="width: 10px">No</th>
												<th>No RM</th>
												<th>No Identitas</th>
												<th>Nama</th>
												<th>JK</th>
												<th>Usia</th>
												<th>Alamat</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($pasien_data as $pasien) {
												$date1 = date("Y-m-d");
												$date2 = $pasien->tanggal_lahir;
												$diff = abs(strtotime($date2) - strtotime($date1));
												$years = floor($diff / (365 * 60 * 60 * 24));
											?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $pasien->no_rm ?></td>
													<td><?= $pasien->no_identitas ?></td>
													<td><?= $pasien->nama ?></td>
													<td><?= $pasien->jk ?></td>
													<td><?= $years ?></td>
													<td><?= $pasien->alamat ?></td>
													<td>
														<a href="pasien_detail?id=<?= $pasien->id ?>" class="btn btn-primary mb-1"><i class="fa fa-eye"></i></a>
														<a href="pasien/cetak_pdf?id=<?= $pasien->id ?>" class="btn btn-warning mb-1"><i class="fa fa-print" style="color: white;"></i></a>
														<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $pasien->id; ?>"><i class="fa fa-trash"></i></a>
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
							<a href="obat_satuan/cetak_pdf" class="btn btn-info">Cetak Data Satuan Obat</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal Delete Product-->
<form action="<?php echo base_url("pasien/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Pasien</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data pasien?</h5>
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

		$('.btn-delete').on('click', function() {
			const id = $(this).data('id');
			$('.id').val(id);
			$('#deleteModal').modal('show');
		});
		$('#datatables').DataTable();

	});
</script>
