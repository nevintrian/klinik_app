<!-- Header -->

<header>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<div class="row mt-5 mb-5">
				<!-- Desktop -->
				<div class="col-sm-8 my-auto d-none d-md-block desktop-header-des">
					<h2 class="">Pendaftaran Online</h2>
					<p class="">Daftar periksa secara online dan mudah di Klinik <br> Rumah Sehat Keluarga Jember</p>
					<a href="#daftarperiksa" target="" class="btn btn-email-me mt-3 mr-2">Daftar Periksa</a>
					<a href="" target="" class="btn btn-outline-primary mt-3 mr-2" style="padding-top: 10px; padding-left: 30px; padding-right: 30px; padding-bottom: 10px;">Alur Pendaftaran</a>
				</div>

				<!-- Desktop -->
				<div class="col-sm-4 d-none d-md-block">
					<img src="<?php echo base_url('Klinik-RSK/docs/assets/img/custom/image1.png') ?>" alt="" width="95%" />
				</div>
			</div>

			<!-- Mobile -->
			<div class="d-block d-md-none text-center">
				<img src="<?php echo base_url('Klinik-RSK/docs/assets/img/custom/image1.png') ?>" alt="" width="183px" />
			</div>

			<!-- Mobile -->
			<div class="d-block d-md-none mx-auto mobile-header-des text-center mt-4">
				<h2 class="">Pendaftaran Online</h2>
				<p class="">Daftar periksa secara online dan mudah di Klinik Rumah Sehat Keluarga Jember</p>
				<a href="" target="" class="btn btn-email-me mt-3 mr-2">Daftar Periksa</a>
				<a href="" target="" class="btn btn-outline-primary mt-3 mr-2" style="padding-top: 10px; padding-left: 30px; padding-right: 30px; padding-bottom: 10px;">Alur Pendaftaran</a>
			</div>
		</div>
	</div>
</header>

<!-- Akhir Header -->

<!-- Main -->
<main>
	<section class="section-project mt-5" id="daftarperiksa">
		<div class="container mb-3 mt-3 mb-3">
			<h4 class="pt-5">Informasi</h4>

			<div class="row">
				<div class="col-lg-12">
					<h6>Informasi Praktek Klinik</h6>
					<table class="table table-bordered" style="background-color: #fff;">
						<thead>
							<tr>
								<th>Poliklinik</th>
								<th>No Antrian Saat Ini</th>
								<th>Jumlah Antrian</th>
								<th>Keberadaan Dokter</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pasien_antrian_data as $pasien_antrian) { ?>
								<tr>
									<td><?= $pasien_antrian['sekarang']->poli_nama ?></td>
									<td><?= $pasien_antrian['sekarang']->no_antrian ?? '-' ?></td>
									<td><?= $pasien_antrian['total']->no_antrian ?? '-' ?></td>
									<td><?= $pasien_antrian['sekarang']->poli_status ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="project pb-3">
				<p>Keterangan</p>
				<ol>
					<li>Pasien yang hendak melakukan periksa/berobat kini dapat langsung mendaftar secara online pada tanggal berkunjung</li>
					<li>Bagi pasien yang belum pernah berobat di Klinik RSK jember dapat memilih daftar pasien baru</li>
					<li>Bagi pasien yang sudah pernah berobat di Klinik RSK Jember seblumnha dapat memilih daftar pasien lama</li>
					<li>pasien yang sudah melakukan pendaftaran baik pasien baru / pasien lama dapat melihat bukti pendaftaran serta dapat membatalkan pendaftaran yang telah dibuat dengan alasan yang jelas dengan memilih cek bukti pendaftaran</li>
					<li>menerapkan protokol kesehatan saat menuju ke Klinik</li>
				</ol>
			</div>
			<div class="d-none d-md-block">
				<table class="table table-bordered mb-3" style="background-color: #fff;">
					<tbody class="">

						<!-- Tampilan Button Dekstop -->
						<tr class="text-center">
							<td>
								Pasien Baru<br>
								<a href="home_pasien_baru" target="" class="btn btn-email-me mt-3 mb-2">Daftar Pasien Baru</a>
							</td>
							<td>
								Pasien Lama<br>
								<a href="home_pasien_lama" target="" class="btn btn-email-me mt-3 mb-2">Daftar Pasien Lama</a>
							</td>
							<td>
								Cek Pendaftaran<br>
								<a href="home_pasien_cetak" target="" class="btn btn-email-me mt-3 mb-2">Cek Bukti Pendaftaran</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- Tampilan Button Mobile -->
			<div class="d-block d-md-none">
				<div class="text-center pt-2 pb-2 mb-2" style="border-style: solid;">
					<h5 style="margin-bottom: -10px;">Pasien Baru</h5><br>
					<a href="home_pasien_baru" target="" class="btn btn-email-me mb-2 text-black">Daftar Pasien Baru</a>
				</div>
				<div class="text-center pt-2 pb-2 mb-2" style="border-style: solid;">
					<h5 style="margin-bottom: -10px;">Pasien Lama</h5><br>
					<a href="home_pasien_lama" target="" class="btn btn-email-me mb-2 text-black">Daftar Pasien Lama</a>
				</div>
				<div class="text-center pt-2 pb-2 mb-2" style="border-style: solid;">
					<h5 style="margin-bottom: -10px;">Cek Pendaftaran</h5><br>
					<a href="home_pasien_cetak" target="" class="btn btn-email-me mb-2 text-black">Cek Bukti Pendaftaran</a>
				</div>
			</div>
			<div class="mb-3 pb-5">
			</div>
		</div>
	</section>
</main>
<!-- Akhir Main -->
