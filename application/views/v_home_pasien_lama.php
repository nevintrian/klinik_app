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
						<form id="" action="home_pasien_lama/save" method="post">
							<h4 class="text-center mb-3">Daftar Pasien Lama</h4>

							<div class="text-center">
								<span class="step" id="step-1">1</span>
								<span class="step" id="step-2">2</span>
								<span class="step" id="step-3">3</span>
								<span class="step" id="step-4">4</span>
							</div>

							<div class="tab mt-4" id="tab-1">
								<div class="text-center mt-3">
									<h6>Pilih Dokter</h6>
								</div>
								<div>
									<?php
									$hari = date("D");
									$hari_ini = '';
									switch ($hari) {
										case 'Sun':
											$hari_ini = "Minggu";
											break;

										case 'Mon':
											$hari_ini = "Senin";
											break;

										case 'Tue':
											$hari_ini = "Selasa";
											break;

										case 'Wed':
											$hari_ini = "Rabu";
											break;

										case 'Thu':
											$hari_ini = "Kamis";
											break;

										case 'Fri':
											$hari_ini = "Jumat";
											break;

										case 'Sat':
											$hari_ini = "Sabtu";
											break;

										default:
											$hari_ini = "Tidak di ketahui";
											break;
									}
									?>
									<h6><?= $hari_ini . ', ' . date('d-m-Y') ?></h6>
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
													<th>Kuota</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($dokter_data as $dokter) { ?>
													<tr>
														<?php
														$data = explode(',', $dokter->hari_praktek);
														$status = false;
														foreach ($data as $d) {
															$d = str_replace(' ', '', $d);
															$d = ucfirst($d);
															if ($d == $hari_ini) {
																$status = true;
																break;
															}
														}
														?>
														<?php if ($dokter->kuota >= 10) { ?>
															<td>
																<div class="btn btn-primary btn-sm btn-dokter">Kuota Penuh</div>
															</td>
														<?php } else if ($status == false) { ?>
															<td>
																<div class="btn btn-primary btn-sm btn-dokter">Dokter Libur</div>
															</td>
														<?php } else { ?>
															<td>
																<div class="btn btn-primary btn-sm btn-dokter" onclick="run(1, 2);" data-dokter_id="<?= $dokter->id; ?>" data-dokter_nama="<?= $dokter->nama; ?>" data-poli_nama="<?= $dokter->poli_nama; ?>" data-jam_praktek="<?= $dokter->jam_praktek; ?>">Pilih Dokter</div>
															</td>
														<?php } ?>

														<td><?= $dokter->nama ?></td>
														<td><?= $dokter->poli_nama ?></td>
														<td><?= $dokter->hari_praktek ?></td>
														<td><?= $dokter->jam_praktek ?></td>
														<td><?= $dokter->kuota ?> / 10</td>
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
										<p for="no_rm" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">No RM</p>
										<div class="col-md-6 pl-0">
											<input type="number" class="form-control form-control-sm no_rm" id="no_rm" name="no_rm" placeholder="No rekam medis">
										</div>
									</div>
									<div class="form-group row">
										<p for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Tanggal Lahir</p>
										<div class="col-md-6 pl-0">
											<input type="date" class="form-control form-control-sm tanggal_lahir" name="tanggal_lahir" id="tanggal_lahir">
										</div>
									</div>
								</div>
								<div class="text-center mt-2">
									<div class="btn btn-secondary btn-sm" onclick="run(2, 1);">Kembali</div>
									<div class="btn btn-primary btn-sm btn-cari">Selanjutnya</div>
								</div>
							</div>

							<div class="tab mt-4" id="tab-3">
								<div class="text-center mt-3">
									<p>Data Sosial</p>
								</div>
								<div style="margin: 0 10% !important;">
									<div class="form-group row">
										<p for="no_rm" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">No RM</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm no_rm" name="no_rm" placeholder="No rekam medis" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Nama Pasien</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm nama" id="nama" name="nama" placeholder="Nama pasien" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="jk" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Jenis Kelamin</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm jk" id="jk" name="jk" placeholder="Jenis kelamin" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Tanggal Lahir</p>
										<div class="col-md-6 pl-0">
											<input type="date" class="form-control form-control-sm tanggal_lahir" name="tanggal_lahir" readonly>
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
											<input type="text" class="form-control form-control-sm tanggal" id="tanggal" placeholder="Tanggal berobat" value="<?= date('d-m-Y') ?>" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="dokter_nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Dokter</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm dokter_nama" id="dokter_nama" placeholder="Nama dokter" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="poli_nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Poli</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm poli_nama" id="poli_nama" name="poli_nama" placeholder="Nama poli" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="jam_praktek" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Jam Praktek</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm jam_praktek" id="jam_praktek" name="jam_praktek" readonly>
										</div>
									</div>
									<div class="form-group row">
										<p for="keluhan" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Keluhan</p>
										<div class="col-md-6 pl-0">
											<input type="text" class="form-control form-control-sm keluhan" id="keluhan" name="keluhan" placeholder="Masukkan keluhan anda" required>
										</div>
									</div>
									<div class="form-group row">
										<p for="akses_bayar" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Akses Bayar</p>
										<div class="col-md-6 pl-0">
											<select class="form-control form-control-sm akses_bayar" id="akses_bayar" name="akses_bayar">
												<option value="">-- Pilih Akses Bayar --</option>
												<option value="BPJS">BPJS</option>
												<option value="Umum">Umum</option>
												<option value="Sosial">Sosial</option>
											</select>
										</div>
									</div>
								</div>

								<div class="text-center">
									<div class="btn btn-secondary" onclick="run(3, 2);">Kembali</div>
									<div class="btn btn-primary" onclick="run(3, 4);">Next</div>
								</div>
							</div>

							<div class="tab" id="tab-4">
								<div class="text-center mt-3">
									<p>Validasi Data Pendaftaran</p>
									<div style="margin: 0 10% !important;">
										<div class="form-group row">
											<p for="no+rm" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">No RM</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm no_rm" id="no+rm" placeholder="No rekam medis" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Nama Pasien</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm nama" id="nama" placeholder="Nama pasien" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="jk" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Jenis Kelamin</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm jk" id="jk" placeholder="Jenis kelamin" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="tanggal_lahir" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Tanggal Lahir</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm tanggal_lahir" readonly>
											</div>
										</div>
									</div>

									<div class="text-center mt-3">
										<p>Data Kunjungan Berobat</p>
									</div>
									<div style="margin: 0 10% !important;">
										<div class="form-group row">
											<p for="no_rm" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Tanggal Berobat</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm no_rm" placeholder="No rekam medis" value="<?= date('d-m-Y') ?>" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="nama" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Dokter</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm nama" id="nama" placeholder="Nama pasien" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="jk" class="col-md-3 col-form-label col-form-label-sm text-left text-bold mr-0">Poli</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm jk" id="jk" placeholder="Jenis kelamin" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="jam_praktek" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Jam Berobat</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm jam_praktek" id="jam_praktek" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="keluhan" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Keluhan</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm keluhan" id="keluhan" readonly>
											</div>
										</div>
										<div class="form-group row">
											<p for="akses_bayar" class="col-md-3 col-form-label col-form-label-sm text-left text-bold">Akses Bayar</p>
											<div class="col-md-6 pl-0">
												<input type="text" class="form-control form-control-sm akses_bayar" readonly>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control dokter_id" name="dokter_id">
								<input type="hidden" class="form-control pasien_id" name="pasien_id">
								<div class="text-center">
									<div class="btn btn-secondary" onclick="run(4, 3);">Kembali</div>
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
		if (hideTab == 2 && showTab == 3) {
			if (document.getElementById("no_rm").value.length == 0 || document.getElementById("tanggal_lahir").value.length == 0) {
				alert("Data belum diisi!")
			} else {
				get()
			}
		} else if (hideTab == 3 && showTab == 4) {
			if (document.getElementById("akses_bayar").value.length == 0 || document.getElementById("keluhan").value.length == 0) {
				alert("Data belum diisi!")
			} else {
				get()
			}
		} else {
			get()
		}

		function get() {
			// Progress bar
			$("#step-" + hideTab).css("opacity", "25%");
			$("#step-" + showTab).css("opacity", "1");

			// Switch tab
			$("#tab-" + hideTab).css("display", "none");
			$("#tab-" + showTab).css("display", "block");
			$("input").css("background", "#fff");

			const akses_bayar = $('#akses_bayar').val();
			const keluhan = $('#keluhan').val();
			$('.akses_bayar').val(akses_bayar);
			$('.keluhan').val(keluhan);
		}

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

	$('.btn-cari').on('click', function() {
		const no_rm = $('#no_rm').val();
		const tanggal_lahir = $('#tanggal_lahir').val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('home_pasien_lama/get_data_pasien') ?>',
			Cache: false,
			dataType: "json",
			data: {
				'no_rm': no_rm,
				'tanggal_lahir': tanggal_lahir
			},
			success: function(resp) {
				if (no_rm) {
					if (resp == null) {
						alert('Data tidak ditemukan atau tanggal lahir tidak sesuai!')
					} else if (resp.jumlah_batal >= 5) {
						alert('No RM anda diblokir, silahkan daftar onsite atau hubungi admin!')
					} else {
						run(2, 3)
					}
				} else {
					alert('Data belum diisi')
				}
				$('.no_rm').val(no_rm);
				$('.tanggal_lahir').val(tanggal_lahir);
				$('.nama').val(resp.nama);
				$('.pasien_id').val(resp.pasien_id);
				$('.jk').val(resp.jk == 'L' ? 'Laki-laki' : 'Perempuan');
			}
		});
	})
</script>
</body>

</html>
