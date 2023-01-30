<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1>Data User</h1>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h3 class="card-title">Data User</h3>
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
												<th>No Identitsa</th>
												<th>Nama</th>
												<th>JK</th>
												<th>Jabatan</th>
												<th>Alamat</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($user_data as $user) { ?>
												<tr>
													<td style="width: 10px"><?= $i ?></td>
													<td><?= $user->no_identitas ?></td>
													<td><?= $user->nama ?></td>
													<td><?= $user->jk ?></td>
													<td><?= $user->jabatan ?></td>
													<td><?= $user->alamat ?></td>
													<td>
														<a href="#" class="btn btn-primary btn-view mb-1" data-id="<?= $user->id; ?>" data-no_identitas="<?= $user->no_identitas; ?>" data-nama="<?= $user->nama; ?>" data-jk="<?= $user->jk; ?>" data-tempat_lahir="<?= $user->tempat_lahir; ?>" data-tanggal_lahir="<?= $user->tanggal_lahir; ?>" data-agama="<?= $user->agama; ?>" data-gol_darah="<?= $user->gol_darah; ?>" data-alamat="<?= $user->alamat; ?>" data-telepon="<?= $user->telepon; ?>" data-pendidikan="<?= $user->pendidikan; ?>" data-email="<?= $user->email; ?>" data-password="<?= $user->password; ?>" data-jabatan="<?= $user->jabatan; ?>"><i class="fa fa-eye"></i></a>
														<a href="#" class="btn btn-info btn-edit mb-1" data-id="<?= $user->id; ?>" data-no_identitas="<?= $user->no_identitas; ?>" data-nama="<?= $user->nama; ?>" data-jk="<?= $user->jk; ?>" data-tempat_lahir="<?= $user->tempat_lahir; ?>" data-tanggal_lahir="<?= $user->tanggal_lahir; ?>" data-agama="<?= $user->agama; ?>" data-gol_darah="<?= $user->gol_darah; ?>" data-alamat="<?= $user->alamat; ?>" data-telepon="<?= $user->telepon; ?>" data-pendidikan="<?= $user->pendidikan; ?>" data-email="<?= $user->email; ?>" data-password="<?= $user->password; ?>" data-jabatan="<?= $user->jabatan; ?>"><i class="fa fa-marker"></i></a>
														<a href="#" class="btn btn-danger btn-delete mb-1" data-id="<?= $user->id; ?>"><i class="fa fa-trash"></i></a>
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
							<a href="user/cetak_pdf" class="btn btn-info">Cetak Data Kategori Obat</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal Delete Product-->
<form action="<?php echo base_url("user/delete"); ?>" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apa anda yakin ingin menghapus data user?</h5>
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


<!-- Modal Tambah Data User -->
<form action="<?php echo base_url("user/save"); ?>" method="post">
	<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 pr-0 mr-0 ml-0 p-5">
							<div class="form-group row">
								<label for="jabatan" class="col-md-3 col-form-label col-form-label-sm text-right" required>Jabatan</label>
								<div class="col-md-8 pl-0">
									<select class="form-control" id="jabatan" name="jabatan" required>
										<option value="">-- Pilih Jabatan --</option>
										<option value="Kepala Klinik">Kepala Klinik</option>
										<option value="Petugas Pendaftaran">Petugas Pendaftaran</option>
										<option value="Dokter">Dokter</option>
										<option value="Apoteker">Apoteker</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama" class="col-md-3 col-form-label col-form-label-sm text-right">Nama User</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" required>
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
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Nama User" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal Lahir</label>
								<div class="col-md-8 pl-0">
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
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
						</div>
						<div class="col-md-6 pl-0 ml-0 p-5">
							<div class="form-group row">
								<label for="alamat" class="col-md-3 col-form-label col-form-label-sm text-right">Alamat Lengkap</label>
								<div class="col-md-8 pl-0">
									<textarea class="form-control" id="alamat" rows="3" placeholder="Alamat" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="telepon" class="col-md-3 col-form-label col-form-label-sm text-right">Telepon</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" required>
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
								<label for="no_identitas" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
								<div class="col-md-8 pl-0">
									<input type="number" class="form-control" id="no_identitas" name="no_identitas" placeholder="3511100000011" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-3 col-form-label col-form-label-sm text-right">Email</label>
								<div class="col-md-8 pl-0">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-md-3 col-form-label col-form-label-sm text-right">Password</label>
								<div class="col-md-8 pl-0">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
								</div>
							</div>
						</div>
						<div class="col-7" style="margin-right: 2.5em;"></div>
						<div class="col-4 text-right">
							<a class="btn btn-secondary" href="" data-dismiss="modal">Batal</a>
							<button class="btn btn-info" type="submit">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Tambah Data User -->


<!-- Modal Detail Data User -->
<div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 pr-0 mr-0 ml-0 p-5">
						<div class="form-group row">
							<label for="jabatan" class="col-md-3 col-form-label col-form-label-sm text-right">Jabatan</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control jabatan" id="jabatan" name="jabatan" placeholder="Jabatan User" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-md-3 col-form-label col-form-label-sm text-right">Nama User</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama User" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="jk" class="col-md-3 col-form-label col-form-label-sm text-right">Jenis Kelamin</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control jk" id="jk" name="jk" placeholder="Jenis Kelamin User" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tempat Lahir</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control tempat_lahir" id="tempat_lahir" name="tempat_lahir" placeholder="Nama User" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal Lahir</label>
							<div class="col-md-8 pl-0">
								<input type="date" class="form-control tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="agama" class="col-md-3 col-form-label col-form-label-sm text-right">Agama</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control agama" id="agama" name="agama" placeholder="Agama" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="gol_darah" class="col-md-3 col-form-label col-form-label-sm text-right">Gol. Darah</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control gol_darah" id="gol_darah" name="gol_darah" placeholder="Golongan Darah" disabled>
							</div>
						</div>
					</div>
					<div class="col-md-6 pl-0 ml-0 p-5">
						<div class="form-group row">
							<label for="alamat" class="col-md-3 col-form-label col-form-label-sm text-right">Alamat Lengkap</label>
							<div class="col-md-8 pl-0">
								<textarea class="form-control alamat" id="alamat" rows="3" placeholder="Alamat" name="Alamat" disabled></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="telepon" class="col-md-3 col-form-label col-form-label-sm text-right">Telepon</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control telepon" id="telepon" placeholder="Telepon" name="telepon" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pendidikan" class="col-md-3 col-form-label col-form-label-sm text-right">Pendidikan</label>
							<div class="col-md-8 pl-0">
								<input type="text" class="form-control pendidikan" id="pendidikan" placeholder="Pendidikan" name="pendidikan" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_identitas" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
							<div class="col-md-8 pl-0">
								<input type="number" class="form-control no_identitas" id="no_identitas" name="no_identitas" placeholder="3511100000011" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-3 col-form-label col-form-label-sm text-right">Email</label>
							<div class="col-md-8 pl-0">
								<input type="email" class="form-control email" id="email" name="email" placeholder="Email" disabled>
							</div>
						</div>
					</div>
					<div class="col-7" style="margin-right: 2.5em;"></div>
					<div class="col-4 text-right">
						<a class="btn btn-secondary" href="" data-dismiss="modal">Batal</a>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Detail Data User -->


<!-- Modal Edit Data User -->
<form action="<?php echo base_url("user/update"); ?>" method="post">
	<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Detail Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 pr-0 mr-0 ml-0 p-5">
							<div class="form-group row">
								<label for="jabatan" class="col-md-3 col-form-label col-form-label-sm text-right">Jabatan</label>
								<div class="col-md-8 pl-0">
									<select class="form-control jabatan" id="jabatan" name="jabatan" required>
										<option value="">-- Pilih Jabatan --</option>
										<option value="Kepala Klinik">Kepala Klinik</option>
										<option value="Petugas Pendaftaran">Petugas Pendaftaran</option>
										<option value="Dokter">Dokter</option>
										<option value="Apoteker">Apoteker</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama" class="col-md-3 col-form-label col-form-label-sm text-right">Nama User</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama User" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="jk" class="col-md-3 col-form-label col-form-label-sm text-right">Jenis Kelamin</label>
								<div class="col-md-8 pl-0">
									<select class="form-control jk" id="jk" name="jk" required>
										<option value="">Pilih Jenis Kelamin</option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tempat Lahir</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control tempat_lahir" id="tempat_lahir" name="tempat_lahir" placeholder="Nama User" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal Lahir</label>
								<div class="col-md-8 pl-0">
									<input type="date" class="form-control tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-md-3 col-form-label col-form-label-sm text-right">Agama</label>
								<div class="col-md-8 pl-0">
									<select class="form-control agama" id="agama" name="agama" required>
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
								<label for="gol_darah" class="col-md-3 col-form-label col-form-label-sm text-right">Gol. Darah</label>
								<div class="col-md-8 pl-0">
									<select class="form-control gol_darah" id="gol_darah" name="gol_darah" required>
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
						</div>
						<div class="col-md-6 pl-0 ml-0 p-5">
							<div class="form-group row">
								<label for="alamat" class="col-md-3 col-form-label col-form-label-sm text-right">Alamat Lengkap</label>
								<div class="col-md-8 pl-0">
									<textarea class="form-control alamat" id="alamat" rows="3" placeholder="Alamat" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="telepon" class="col-md-3 col-form-label col-form-label-sm text-right">Telepon</label>
								<div class="col-md-8 pl-0">
									<input type="text" class="form-control telepon" id="telepon" placeholder="Telepon" name="telepon" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="pendidikan" class="col-md-3 col-form-label col-form-label-sm text-right">Pendidikan</label>
								<div class="col-md-8 pl-0">
									<select class="form-control pendidikan" id="pendidikan" name="pendidikan" required>
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
								<label for="no_identitas" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
								<div class="col-md-8 pl-0">
									<input type="number" class="form-control no_identitas" id="no_identitas" name="no_identitas" placeholder="3511100000011" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-3 col-form-label col-form-label-sm text-right">Email</label>
								<div class="col-md-8 pl-0">
									<input type="email" class="form-control email" id="email" name="email" placeholder="Email" required>
								</div>
							</div>
							<br>
							<center>
								<p>Catatan : Abaikan jika tidak ingin mengubah password</p>
							</center>
							<div class="form-group row">
								<label for="password" class="col-md-3 col-form-label col-form-label-sm text-right">Password</label>
								<div class="col-md-8 pl-0">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="col-7" style="margin-right: 2.5em;"></div>
						<div class="col-4 text-right">
							<input type="hidden" name="id" class="id">
							<a class="btn btn-secondary" href="" data-dismiss="modal">Batal</a>
							<button class="btn btn-info" type="submit">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit Data User -->


<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
	$(document).ready(function() {
		$('.btn-edit').on('click', function() {
			const id = $(this).data('id');
			const no_identitas = $(this).data('no_identitas');
			const nama = $(this).data('nama');
			const jk = $(this).data('jk');
			const tempat_lahir = $(this).data('tempat_lahir');
			const tanggal_lahir = $(this).data('tanggal_lahir');
			const agama = $(this).data('agama');
			const gol_darah = $(this).data('gol_darah');
			const alamat = $(this).data('alamat');
			const telepon = $(this).data('telepon');
			const pendidikan = $(this).data('pendidikan');
			const email = $(this).data('email');
			const password = $(this).data('password');
			const jabatan = $(this).data('jabatan');
			$('.id').val(id);
			$('.no_identitas').val(no_identitas);
			$('.nama').val(nama);
			$('.jk').val(jk);
			$('.tempat_lahir').val(tempat_lahir);
			$('.tanggal_lahir').val(tanggal_lahir);
			$('.agama').val(agama);
			$('.gol_darah').val(gol_darah);
			$('.alamat').val(alamat);
			$('.telepon').val(telepon);
			$('.pendidikan').val(pendidikan);
			$('.email').val(email);
			$('.password').val(password);
			$('.jabatan').val(jabatan);
			$('#editModal').modal('show');
		});

		$('.btn-view').on('click', function() {
			const id = $(this).data('id');
			const no_identitas = $(this).data('no_identitas');
			const nama = $(this).data('nama');
			const jk = $(this).data('jk');
			const tempat_lahir = $(this).data('tempat_lahir');
			const tanggal_lahir = $(this).data('tanggal_lahir');
			const agama = $(this).data('agama');
			const gol_darah = $(this).data('gol_darah');
			const alamat = $(this).data('alamat');
			const telepon = $(this).data('telepon');
			const pendidikan = $(this).data('pendidikan');
			const email = $(this).data('email');
			const password = $(this).data('password');
			const jabatan = $(this).data('jabatan');
			$('.id').val(id);
			$('.no_identitas').val(no_identitas);
			$('.nama').val(nama);
			$('.jk').val(jk);
			$('.tempat_lahir').val(tempat_lahir);
			$('.tanggal_lahir').val(tanggal_lahir);
			$('.agama').val(agama);
			$('.gol_darah').val(gol_darah);
			$('.alamat').val(alamat);
			$('.telepon').val(telepon);
			$('.pendidikan').val(pendidikan);
			$('.email').val(email);
			$('.password').val(password);
			$('.jabatan').val(jabatan);
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
