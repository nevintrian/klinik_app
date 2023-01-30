<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Diagnosis</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data Diagnosis</h3>
							</div>
						</div>
						<div class="card-body">
							<b>
								<p>info : data diagnosa ambil dari database icd who</p>
							</b>
							<div class="col-md-12">
								<div class="card-body p-0">
									<table class="table table-bordered table-responsive-md" id="datatables">
										<thead>
											<tr>
												<th style="width: 10px">No</th>
												<th>Kode</th>
												<th>Nama</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($diagnosis_data as $diagnosis) { ?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $diagnosis->kode ?></td>
													<td><?= $diagnosis->nama ?></td>
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

<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
	$(document).ready(function() {


		$('#datatables').DataTable();

	});
</script>
