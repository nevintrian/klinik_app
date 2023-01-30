<!-- Main -->
<link rel="stylesheet" href="<?php echo base_url('Klinik-RSK/docs/styles/style2.css') ?>">

<main>
	<section class="">
		<div class="container mb-3 mt-3 mb-3">

		</div>
	</section>

	<section>
		<!--
          <div class="container">
            <div class="col-sm-6">
              <h4 class="ml-2">Daftar Pasien Baru</h4>
              <p class="ml-2">Pasien yang belum pernah berobat di Klinik RSK Jember</p>
            </div>
          </div> -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="card ml-2 mr-2">
						<form id="" action="home_pasien_baru/save" method="post">
							<h4 class="text-center mb-3">Daftar Pasien Baru</h4>

							<div class="text-center">
								<span class="step" id="step-1">1</span>
								<span class="step" id="step-2">2</span>
								<span class="step" id="step-3">3</span>
							</div>

							<div class="tab mt-4" id="tab-1">
								<div class="text-center mt-3">
									<h6>Pilih Dokter</h6>
								</div>
								<div>
									<h6><?= date('D, d-m-Y') ?></h6>
									<br>
									<!-- /.card-header -->
									<div class="card-body table-responsive p-0">
										<table class="table table-hover text-nowrap">
											<thead>
												<tr>
													<th>Aksi</th>
													<th>Nama Dokter</th>
													<th>Poli</th>
													<th>Hari Praktek</th>
													<th>Jam Praktek</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($dokter_data as $dokter) { ?>
													<tr>
														<td>
															<div class="btn btn-primary btn-sm btn-dokter" onclick="run(1, 2);" data-dokter_id="<?= $dokter->id; ?>" data-dokter_nama="<?= $dokter->nama; ?>" data-poli_nama="<?= $dokter->poli_nama; ?>" data-jam_praktek="<?= $dokter->jam_praktek; ?>">Pilih Dokter</div>
														</td>
														<td><?= $dokter->nama ?></td>
														<td><?= $dokter->poli_nama ?></td>
														<td><?= $dokter->hari_praktek ?></td>
														<td><?= $dokter->jam_praktek ?></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<!-- /.card-body -->
								</div>
								<div class="text-right">

								</div>
							</div>

							<div class="tab mt-4" id="tab-2">
								<div class="text-center mt-3">
									<p>Data Sosial</p>
								</div>
								<div style="margin: 0 10% !important;">
									<div class="form-group row">
										<label for="no_identitas" class="col-md-3 col-form-label col-form-label-sm text-right">No Identitas</label>
										<div class="col-md-8 pl-0">
											<input type="number" class="form-control form-control-sm" id="no_identitas" name="no_identitas" placeholder="No identitas" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama" class="col-md-3 col-form-label col-form-label-sm text-right">Nama Pasien</label>
										<div class="col-md-8 pl-0">
											<input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama pasien" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="keluhan" class="col-md-3 col-form-label col-form-label-sm text-right">Keluhan</label>
										<div class="col-md-8 pl-0">
											<input type="text" class="form-control form-control-sm" id="keluhan" name="keluhan" placeholder="Keluhan" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="jk" class="col-md-3 col-form-label col-form-label-sm text-right">Jenis Kelamin</label>
										<div class="col-md-8 pl-0">
											<select class="form-control form-control-sm" id="jk" name="jk" required>
												<option value="">-- Pilih Jenis Kelamin --</option>
												<option value="L">Laki-laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="tempat_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tempat Lahir</label>
										<div class="col-md-8 pl-0">
											<input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-right">Tanggal Lahir</label>
										<div class="col-md-8 pl-0">
											<input type="date" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="status" class="col-md-3 col-form-label col-form-label-sm text-right">Status</label>
										<div class="col-md-8 pl-0">
											<select class="form-control form-control-sm" id="status" name="status" required>
												<option value="">-- Pilih Status --</option>
												<option value="Anak-anak">Anak-anak</option>
												<option value="Dewasa">Dewasa</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="agama" class="col-md-3 col-form-label col-form-label-sm text-right">Agama</label>
										<div class="col-md-8 pl-0">
											<select class="form-control form-control-sm" id="agama" name="agama" required>
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
											<select class="form-control form-control-sm" id="gol_darah" name="gol_darah" required>
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
											<input type="text" class="form-control form-control-sm" id="telepon" name="telepon" placeholder="Telepon" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="suku" class="col-md-3 col-form-label col-form-label-sm text-right">Suku</label>
										<div class="col-md-8 pl-0">
											<input type="text" class="form-control form-control-sm" id="suku" name="suku" placeholder="Suku" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="pendidikan" class="col-md-3 col-form-label col-form-label-sm text-right">Pendidikan</label>
										<div class="col-md-8 pl-0">
											<select class="form-control form-control-sm" id="pendidikan" name="pendidikan" required>
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
											<input type="text" class="form-control form-control-sm" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="akses_bayar" class="col-md-3 col-form-label col-form-label-sm text-right">Akses Bayar</label>
										<div class="col-md-8 pl-0">
											<select name="akses_bayar" class="form-control form-control-sm" id="akses_bayar" required>
												<option value="">-- Pilih Akses Bayar --</option>
												<option value="Umum">Umum</option>
												<option value="Sosial">Sosial</option>
												<option value="BPJS">BPJS</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="no_bpjs" class="col-md-3 col-form-label col-form-label-sm text-right">No BPJS</label>
										<div class="col-md-8 pl-0">
											<input type="text" class="form-control form-control-sm" id="no_bpjs" name="no_bpjs" placeholder="Kosongi jika tidak punya">
										</div>
									</div>
								</div>
								<div class="text-center mt-2">
									<div class="btn btn-secondary" onclick="run(2, 1);">Kembali</div>
									<div class="btn btn-primary btn-selanjutnya" onclick="run(2, 3);">Selanjutnya</div>
								</div>
							</div>



							<div class="tab" id="tab-3">
								<div class="text-center mt-3">
									<p>Validasi Data Pendaftaran</p>
									<div style="margin: 0 10% !important;">
										<div class="form-group row">
											<p for="nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Nama Pasien</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm nama" name="nama" placeholder="Nama Pasien" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Keluhan</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm keluhan" name="keluhan" placeholder="Keluhan" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="jk" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Jenis Kelamin</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm jk" name="jk" placeholder="Jenis Kelamin" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Tanggal Lahir</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm tanggal_lahir" placeholder="Tanggal Lahir" readonly>
											</div>
										</div>
									</div>

									<div class="text-center mt-3">
										<p>Data Kunjungan Berobat</p>
									</div>
									<div style="margin: 0 10% !important;">
										<div class="form-group row">
											<p for="tanggal" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Tanggal Berobat</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm" id="tanggal" value="<?= date('d-m-Y') ?>" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="dokter_nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Dokter</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm dokter_nama" id="dokter_nama" name="dokter_nama" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="poli_nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Poli</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm poli_nama" id="poli_nama" name="poli_nama" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="jam_praktek" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Jam Berobat</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm jam_praktek" id="jam_praktek" name="jam_praktek" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="akses_bayar" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Akses Bayar</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm akses_bayar" id="akses_bayar" name="akses_bayar" placeholder="Akses Bayar" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="no_bpjs" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">No BPJS</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm no_bpjs" id="no_bpjs" name="no_bpjs" placeholder="Kosongi jika tidak punya" readonly>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control dokter_id" name="dokter_id" id="dokter_id">
								<div class="text-center">
									<div class="btn btn-secondary" onclick="run(3, 2);">Kembali</div>
									<button class="btn btn-primary" type="submit">Simpan Data</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- Akhir Main -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	// Default tab
	$(".tab").css("display", "none");
	$("#tab-1").css("display", "block");

	$("#step-1").css("opacity", 1);


	function run(hideTab, showTab) {
		// Progress bar
		$("#step-" + hideTab).css("opacity", "25%");
		$("#step-" + showTab).css("opacity", "1");

		// Switch tab
		$("#tab-" + hideTab).css("display", "none");
		$("#tab-" + showTab).css("display", "block");
		$("input").css("background", "#fff");


		const id = $('#id').val();
		const no_identitas = $('#no_identitas').val();
		const nama = $('#nama').val();
		const keluhan = $('#keluhan').val();
		const jk = $('#jk').val();
		const tempat_lahir = $('#tempat_lahir').val();
		const tanggal_lahir = $('#tanggal_lahir').val();
		const status = $('#status').val();
		const agama = $('#agama').val();
		const gol_darah = $('#gol_darah').val();
		const alamat = $('#alamat').val();
		const telepon = $('#telepon').val();
		const suku = $('#suku').val();
		const pendidikan = $('#pendidikan').val();
		const pekerjaan = $('#pekerjaan').val();
		const akses_bayar = $('#akses_bayar').val();
		const no_bpjs = $('#no_bpjs').val();

		$('.id').val(id);
		$('.no_identitas').val(no_identitas);
		$('.nama').val(nama);
		$('.keluhan').val(keluhan);
		$('.jk').val(jk == 'L' ? 'Laki-laki' : 'Perempuan');
		$('.tempat_lahir').val(tempat_lahir);
		$('.tanggal_lahir').val(tanggal_lahir);
		$('.status').val(status);
		$('.agama').val(agama);
		$('.gol_darah').val(gol_darah);
		$('.alamat').val(alamat);
		$('.telepon').val(telepon);
		$('.suku').val(suku);
		$('.pendidikan').val(pendidikan);
		$('.pekerjaan').val(pekerjaan);
		$('.akses_bayar').val(akses_bayar);
		$('.no_bpjs').val(no_bpjs);


	}


	$('.btn-dokter').on('click', function() {
		const dokter_id = $(this).data('dokter_id');
		const dokter_nama = $(this).data('dokter_nama');
		const poli_nama = $(this).data('poli_nama');
		const jam_praktek = $(this).data('jam_praktek');
		$('.poli_nama').val(poli_nama);
		$('.dokter_id').val(dokter_id);
		$('.dokter_nama').val(dokter_nama);
		$('.jam_praktek').val(jam_praktek)
	})
</script>
</body>

</html>
