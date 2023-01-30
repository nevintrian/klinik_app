<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data Antrian Pasien</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">

			<?php
			$j = 1;
			foreach ($pasien_antrian_data as $key => $value) {
			?>

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="d-sm-flex align-items-center justify-content-between">
									<h3 class="card-title mr-5">Data Antrian Poli <?= $key ?></h3>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="<?= $key ?>-antrian-tab" data-toggle="tab" href="#<?= $key ?>-antrian" role="tab" aria-controls="<?= $key ?>-antrian" aria-selected="false">Antrian</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="<?= $key ?>-selesai-tab" data-toggle="tab" href="#<?= $key ?>-selesai" role="tab" aria-controls="<?= $key ?>-selesai" aria-selected="false">Selesai</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="col-md-12">
									<div class="card-body p-0">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade  show active" id="<?= $key ?>-antrian" role="tabpanel" aria-labelledby="<?= $key ?>-antrian-tab">
												<table class="table table-bordered table-responsive-md" id="datatables<?= $j ?>">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal Daftar</th>
															<th>Nama</th>
															<th>JK</th>
															<th>Poli</th>
															<th>DPJP</th>
															<th>Akses Bayar</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$i = 1;
														foreach ($value['antrian'] as $pasien_data) {
														?>

															<tr>
																<td><?= $i ?></td>
																<td><?= date("d-m-Y", strtotime($pasien_data->tanggal)) ?></td>
																<td><?= $pasien_data->nama ?></td>
																<td><?= $pasien_data->jk ?></td>
																<td><?= $pasien_data->poli_nama ?></td>
																<td><?= $pasien_data->dokter_nama ?></td>
																<td><?= $pasien_data->akses_bayar ?></td>
																<?php
																if ($pasien_data->pasien_kunjungan_status == 0) {
																?>
																	<td>
																		<badge class="badge badge-warning">Menunggu</badge>
																	</td>
																<?php } else if ($pasien_data->pasien_kunjungan_status != 1) { ?>
																	<td>
																		<badge class="badge badge-info">Selesai</badge>
																	</td>
																<?php } ?>
																<td>
																	<a href="pasien_antrian/hadir?pasien_kunjungan_id=<?= $pasien_data->pasien_kunjungan_id ?>" class="btn btn-info mb-1"><i class="fa fa-check"></i></a>
																	<a href="pasien_antrian/tidak_hadir?pasien_kunjungan_id=<?= $pasien_data->pasien_kunjungan_id ?>" class="btn btn-danger mb-1"><i class="fa fa-xmark-large"></i><b>X</b></a>
																</td>
															</tr>
														<?php
															$i++;
														}
														?>
													</tbody>
												</table>
												<br>
											</div>
											<div class="tab-pane fade" id="<?= $key ?>-selesai" role="tabpanel" aria-labelledby="<?= $key ?>-selesai-tab">
												<table class="table table-bordered table-responsive-md" id="datatables<?= $j + 1 ?>">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal Daftar</th>
															<th>Nama</th>
															<th>JK</th>
															<th>Poli</th>
															<th>DPJP</th>
															<th>Akses Bayar</th>
															<th>Status</th>
															<!-- <th>Action</th> -->
														</tr>
													</thead>
													<tbody>
														<?php
														$i = 1;
														foreach ($value['selesai'] as $pasien_data) {
														?>

															<tr>
																<td><?= $i ?></td>
																<td><?= date("d-m-Y", strtotime($pasien_data->tanggal)) ?></td>
																<td><?= $pasien_data->nama ?></td>
																<td><?= $pasien_data->jk ?></td>
																<td><?= $pasien_data->poli_nama ?></td>
																<td><?= $pasien_data->dokter_nama ?></td>
																<td><?= $pasien_data->akses_bayar ?></td>

																<td>
																	<badge class="badge badge-primary">Selesai</badge>
																</td>

																<!-- <td>
																<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $pasien_kunjungan_onsite->pasien_kunjungan_id; ?>" data-nama="<?= $pasien_kunjungan_onsite->nama; ?>" data-tanggal="<?= $pasien_kunjungan_onsite->tanggal; ?>" data-dokter_nama="<?= $pasien_kunjungan_onsite->dokter_nama; ?>" data-poli_nama="<?= $pasien_kunjungan_onsite->poli_nama; ?>" data-jam_praktek="<?= $pasien_kunjungan_onsite->jam_praktek; ?>" data-akses_bayar="<?= $pasien_kunjungan_onsite->akses_bayar; ?>" data-no_rm="<?= $pasien_kunjungan_onsite->no_rm; ?>" data-status="<?= $pasien_kunjungan_onsite->pasien_kunjungan_status; ?>"><i class="fa fa-eye"></i></a>
																<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $pasien_kunjungan_onsite->pasien_kunjungan_id; ?>" data-nama="<?= $pasien_kunjungan_onsite->nama; ?>" data-tanggal="<?= $pasien_kunjungan_onsite->tanggal; ?>" data-pasien_id="<?= $pasien_kunjungan_onsite->pasien_id; ?>" data-dokter_id="<?= $pasien_kunjungan_onsite->dokter_id; ?>" data-jam_praktek="<?= $pasien_kunjungan_onsite->jam_praktek; ?>" data-poli_nama="<?= $pasien_kunjungan_onsite->poli_nama; ?>" data-jam_praktek="<?= $pasien_kunjungan_onsite->jam_praktek; ?>" data-akses_bayar="<?= $pasien_kunjungan_onsite->akses_bayar; ?>" data-no_antrian="<?= $pasien_kunjungan_onsite->no_antrian; ?>" data-status="<?= $pasien_kunjungan_onsite->pasien_kunjungan_status; ?>"><i class="fa fa-marker"></i></a>
																<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $pasien_kunjungan_onsite->pasien_kunjungan_id; ?>"><i class="fa fa-trash"></i></a>
															</td> -->
															</tr>
														<?php
															$i++;
														}
														?>
													</tbody>
												</table>
												<br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
				$j += 2;
			}
			?>
		</div>
	</section>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<script>
		$(document).ready(function() {
			let i = 1;
			while (true) {
				var myEle = document.getElementById(`datatables${i}`);
				if (myEle) {
					$(`#datatables${i}`).DataTable();
					i++;
				} else {
					break;
				}
			}
		});
	</script>
