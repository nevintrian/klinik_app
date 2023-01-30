<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Daftar Pasien</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Daftar Pasien</h3>
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
											foreach ($pasien_daftar_data as $pasien) {
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
														<a href="#" class="btn btn-primary mb-1 btn-view" data-id="<?= $pasien->id; ?>" data-tanggal="<?= $pasien->tanggal; ?>" data-status="<?= $pasien->status; ?>" data-no_rm="<?= $pasien->no_rm; ?>" data-no_identitas="<?= $pasien->no_identitas; ?>" data-nama="<?= $pasien->nama; ?>" data-jk="<?= $pasien->jk; ?>" data-tempat_lahir="<?= $pasien->tempat_lahir; ?>" data-tanggal_lahir="<?= $pasien->tanggal_lahir; ?>" data-agama="<?= $pasien->agama; ?>" data-gol_darah="<?= $pasien->gol_darah; ?>" data-alamat="<?= $pasien->alamat; ?>" data-telepon="<?= $pasien->telepon; ?>" data-suku="<?= $pasien->suku; ?>" data-pendidikan="<?= $pasien->pendidikan; ?>" data-pekerjaan="<?= $pasien->pekerjaan; ?>" data-no_bpjs="<?= $pasien->no_bpjs; ?>"><i class="fa fa-eye"></i></a>
														<a href="pasien/cetak_pdf?id=<?= $pasien->id ?>" class="btn btn-warning mb-1"><i class="fa fa-print" style="color: white;"></i></a>
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

<!-- Start Modal Add -->
<form action="<?php echo base_url("pasien_daftar/save"); ?>" method="post">
	<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pasien</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 pr-0 mr-0 ml-0 p-5">
							<div class="form-group row">
								<label for="no_identitas" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
								<div class="col-md-8 pl-0">
									<input type="number" class="form-control" id="no_identitas" name="no_identitas" placeholder="No Identitas" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama" class="col-md-3 col-form-label col-form-label-sm text-right">Nama Pasien</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pasien" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="jk" class="col-md-3 col-form-label col-form-label-sm text-right">Jenis Kelamin</label>
								<div class="col-md-8 pl-0">
									<select class="form-control" id="jk" name="jk" required>
										<option value="">-- Pilih Jenis Kelamin --</option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tempat Lahir</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal Lahir</label>
								<div class="col-md-8 pl-0">
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-md-3 col-form-label col-form-label-sm text-right">Agama</label>
								<div class="col-md-8 pl-0">
									<select class="form-control" id="agama" name="agama" required>
										<option value="">-- Pilih Agama --</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="Konghucu">Konghucu</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="status" class="col-md-3 col-form-label col-form-label-sm text-right">Status</label>
								<div class="col-md-8 pl-0">
									<select class="form-control" id="status" name="status" required>
										<option value="">-- Pilih Status --</option>
										<option value="Anak-anak">Anak-anak</option>
										<option value="Dewasa">Dewasa</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 pl-0 ml-0 p-5">
							<div class="form-group row">
								<label for="gol_darah" class="col-md-3 col-form-label col-form-label-sm text-right">Gol. Darah</label>
								<div class="col-md-8 pl-0">
									<select class="form-control" id="gol_darah" name="gol_darah" required>
										<option value="">-- Pilih Golongan Darah --</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="AB">AB</option>
										<option value="C">C</option>
										<option value="O">O</option>
										<option value="-">-</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="alamat" class="col-md-3 col-form-label col-form-label-sm text-right">Alamat Lengkap</label>
								<div class="col-md-8 pl-0">
									<textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="telepon" class="col-md-3 col-form-label col-form-label-sm text-right">Telepon</label>
								<div class="col-md-8 pl-0">
									<input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="suku" class="col-md-3 col-form-label col-form-label-sm text-right">Suku</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="suku" name="suku" placeholder="Suku" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="pendidikan" class="col-md-3 col-form-label col-form-label-sm text-right">Pendidikan</label>
								<div class="col-md-8 pl-0">
									<select class="form-control" id="pendidikan" name="pendidikan" required>
										<option value="">-- Pilih Pendidikan --</option>
										<option value="Paud/TK">Paud/TK</option>
										<option value="SD/MI">SD/MI</option>
										<option value="SMP/MTS">SMP/MTS</option>
										<option value="SMA/MA">SMA/MA</option>
										<option value="D1">D1</option>
										<option value="D3">D3</option>
										<option value="D4">D4</option>
										<option value="S1">S1</option>
										<option value="S2">S2</option>
										<option value="S3">S3</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="pekerjaan" class="col-md-3 col-form-label col-form-label-sm text-right">Pekerjaan</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="no_bpjs" class="col-md-3 col-form-label col-form-label-sm text-right">No BPJS</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="no_bpjs" name="no_bpjs" placeholder="Kosongi jika tidak mempunyai BPJS">
								</div>
							</div>
						</div>
						<div class="col-7" style="margin-right: 2.5em;"></div>
						<div class="col-4 text-right">
							<a class="btn btn-secondary" href="" data-dismiss="modal">Kembali</a>
							<button class="btn btn-info" type="submit">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- End Modal Add -->

<!-- Start Modal Detail -->
<div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Data Pasien</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 pr-0 mr-0 ml-0 p-5">
						<div class="form-group row">
							<label for="tanggal" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal</label>
							<div class="col-md-8 pl-0">
								<input type="date" class="form-control tanggal" id="tanggal" name="tanggal" placeholder="Tanggal" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_rm" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
							<div class="col-md-8 pl-0">
								<input type="number" class="form-control no_rm" id="no_rm" name="no_rm" placeholder="No Identitas" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_identitas" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
							<div class="col-md-8 pl-0">
								<input type="number" class="form-control no_identitas" id="no_identitas" name="no_identitas" placeholder="No Identitas" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-md-3 col-form-label col-form-label-sm text-right">Nama Pasien</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama Pasien" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="jk" class="col-md-3 col-form-label col-form-label-sm text-right">Jenis Kelamin</label>
							<div class="col-md-8 pl-0">
								<select class="form-control jk" id="jk" name="jk" disabled>
									<option value="">-- Pilih Jenis Kelamin --</option>
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tempat Lahir</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control tempat_lahir" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal Lahir</label>
							<div class="col-md-8 pl-0">
								<input type="date" class="form-control tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="agama" class="col-md-3 col-form-label col-form-label-sm text-right">Agama</label>
							<div class="col-md-8 pl-0">
								<select class="form-control agama" id="agama" name="agama" disabled>
									<option value="">-- Pilih Agama --</option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Katolik">Katolik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
									<option value="Konghucu">Konghucu</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-md-3 col-form-label col-form-label-sm text-right">Status</label>
							<div class="col-md-8 pl-0">
								<select class="form-control status" id="status" name="status" disabled>
									<option value="">-- Pilih Status --</option>
									<option value="Anak-anak">Anak-anak</option>
									<option value="Dewasa">Dewasa</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 pl-0 ml-0 p-5">
						<div class="form-group row">
							<label for="gol_darah" class="col-md-3 col-form-label col-form-label-sm text-right">Gol. Darah</label>
							<div class="col-md-8 pl-0">
								<select class="form-control gol_darah" id="gol_darah" name="gol_darah" disabled>
									<option value="">-- Pilih Golongan Darah --</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
									<option value="C">C</option>
									<option value="O">O</option>
									<option value="-">-</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-md-3 col-form-label col-form-label-sm text-right">Alamat Lengkap</label>
							<div class="col-md-8 pl-0">
								<textarea class="form-control alamat" id="alamat" name="alamat" rows="2" placeholder="Alamat" disabled></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="telepon" class="col-md-3 col-form-label col-form-label-sm text-right">Telepon</label>
							<div class="col-md-8 pl-0">
								<input type="number" class="form-control telepon" id="telepon" name="telepon" placeholder="Telepon" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="suku" class="col-md-3 col-form-label col-form-label-sm text-right">Suku</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control suku" id="suku" name="suku" placeholder="Suku" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pendidikan" class="col-md-3 col-form-label col-form-label-sm text-right">Pendidikan</label>
							<div class="col-md-8 pl-0">
								<select class="form-control pendidikan" id="pendidikan" name="pendidikan" disabled>
									<option value="">-- Pilih Pendidikan --</option>
									<option value="Paud/TK">Paud/TK</option>
									<option value="SD/MI">SD/MI</option>
									<option value="SMP/MTS">SMP/MTS</option>
									<option value="SMA/MA">SMA/MA</option>
									<option value="D1">D1</option>
									<option value="D3">D3</option>
									<option value="D4">D4</option>
									<option value="S1">S1</option>
									<option value="S2">S2</option>
									<option value="S3">S3</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="pekerjaan" class="col-md-3 col-form-label col-form-label-sm text-right">Pekerjaan</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control pekerjaan" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_bpjs" class="col-md-3 col-form-label col-form-label-sm text-right">No BPJS</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control no_bpjs" id="no_bpjs" name="no_bpjs" placeholder="No BPJS" disabled>
							</div>
						</div>
					</div>
					<div class="col-7" style="margin-right: 2.5em;"></div>
					<div class="col-4 text-right">
						<a class="btn btn-secondary mr-2" href="" data-dismiss="modal">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Detail -->
<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
	$(document).ready(function() {
		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const tanggal = $(this).data('tanggal');
			const no_rm = $(this).data('no_rm');
			const no_identitas = $(this).data('no_identitas');
			const nama = $(this).data('nama');
			const jk = $(this).data('jk');
			const tempat_lahir = $(this).data('tempat_lahir');
			const tanggal_lahir = $(this).data('tanggal_lahir');
			const agama = $(this).data('agama');
			const status = $(this).data('status');
			const gol_darah = $(this).data('gol_darah');
			const alamat = $(this).data('alamat');
			const telepon = $(this).data('telepon');
			const suku = $(this).data('suku');
			const pendidikan = $(this).data('pendidikan');
			const pekerjaan = $(this).data('pekerjaan');
			const no_bpjs = $(this).data('no_bpjs');
			$('.id').val(id);
			$('.tanggal').val(tanggal);
			$('.no_rm').val(no_rm);
			$('.no_identitas').val(no_identitas);
			$('.nama').val(nama);
			$('.jk').val(jk);
			$('.tempat_lahir').val(tempat_lahir);
			$('.tanggal_lahir').val(tanggal_lahir);
			$('.agama').val(agama);
			$('.status').val(status);
			$('.gol_darah').val(gol_darah);
			$('.alamat').val(alamat);
			$('.telepon').val(telepon);
			$('.suku').val(suku);
			$('.pendidikan').val(pendidikan);
			$('.pekerjaan').val(pekerjaan);
			$('.no_bpjs').val(no_bpjs);
			$('#viewModal').modal('show');
		});

		$('#datatables').DataTable();

	});
</script>
